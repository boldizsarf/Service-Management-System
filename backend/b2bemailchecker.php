<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require 'dbc.php';

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

    }
}