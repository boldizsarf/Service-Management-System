<?php

$imapResource = imap_open($mailbox, $username, $password);

if($imapResource === false){
    throw new Exception(imap_last_error());
}

$search = 'SINCE "' . date("j F Y", strtotime("-7 days")) . '"';
$emails = imap_search($imapResource, $search);

//If the $emails variable is not a boolean FALSE value or
//an empty array.
if(!empty($emails)){
    //Loop through the emails.
    foreach($emails as $email){
        //Fetch an overview of the email.
        $overview = imap_fetch_overview($imapResource, $email);
        $overview = $overview[0];
        $header = imap_headerinfo($imapResource, $email);
        //Print out the subject of the email.
        //echo '<b>' . htmlentities($overview->subject) . '</b><br>';
        //Print out the sender's email address / from email address.
        //echo 'From: ' . imap_utf8($overview->from) . '<br><br>';
        //Get the body of the email.
        $message = imap_fetchbody($imapResource, $email, 2, FT_PEEK | FT_INTERNAL);
        //echo 'Body: ' . imap_qprint(substr($message, 0, strpos($message, "On"))) . '<br><br>';

        if (strpos(htmlentities($overview->subject), "Re: Message notice for ") !== false) {
            $trackingid = str_replace("Re: Message notice for ", "", htmlentities($overview->subject));
            $msg= imap_qprint(substr($message, 0, strpos($message, "On")));
            $msg= str_replace(' dir="ltr"', "", $msg);
            $msg= str_replace(' class="gmail_attr"', "", $msg);
            $msg= str_replace(' class="gmail_quote">', "", $msg);
            $msg= str_replace(' class="gmail_signature"', "", $msg);

            $url = $serverurl . '/api/';
            $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $trackingid);

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $case = json_decode($result, true);

            $cid = $case["CaseID"];

            $dbcase = $dbc->get("SELECT * FROM pcases WHERE trackid=?", [$trackingid]);
            $uid = $dbcase[0]["uid"];

            $dbpuser = $dbc->get("SELECT * FROM users WHERE id=?", [$uid]);
            $firstname = $dbpuser[0]["firstname"];

            $msg_count = $dbc->numRows("SELECT * FROM pmessages WHERE cid=? AND uid=? AND msg=?", [$cid, $uid, $msg]);

            if ($msg_count == 0) {
                $dbmessages = $dbc->get("SELECT * FROM pmessages ORDER BY id DESC");
                $id = $dbmessages[0]["id"] + 1;

                $dbc->set("INSERT INTO pmessages (id, cid, uid, title, msg, date) VALUES (?, ?, ?, ?, ?, ?)",
                    [$id, $cid, $uid, "Email", $msg, date("Y-m-d H:i:s")]);

                $dbadmins = $dbc->get("SELECT * FROM users WHERE role <>? AND role <>?", ["0", "10"]);
                $ntxt = $firstname . " emailt küldött";
                foreach ($dbadmins as $admin) {
                    $notify->add($admin["id"], $ntxt, null, null, $serverurl . "/dashboard/pcase/" . $case["TrackingID"], null, "fas fa-comment");
                }

                $cronlog .= "Imported 1 mail for " . $case["TrackingID"] . " <br>\n";
            }
        }
    }
}