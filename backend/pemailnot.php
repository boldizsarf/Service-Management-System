<?php

$dbpcases = $dbc->get("SELECT * FROM pcases");

foreach ($dbpcases as $pcase) {
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $pcase["trackid"]);

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

    if ($case["Status"]["Task"]["KeyWordStatus"] == 0) {
        $to = $case["Status"]["Responsible"]["Email"];
        $subject = "MDS Case Notice: " . $case["TrackingID"];

        if ($case["Status"]["Responsible"]["Lang"] == "hu") {

            $mtitle = "Kedves " . $case["Status"]["Responsible"]["Name"] . "!";
            $mtext = null;

            $mtext .= "<p>A " . $case["TrackingID"] . " számú ügyhöz értesítés érkezett " . date("Y-m-d H:i:s") . " dátumon.</p>";

            $mtext .= "<hr>";

            $mtext .= "Tracking ID: <b>" . $case["TrackingID"] . "</b><br/>";
            $mtext .= "External ID: <b>" . $case["ExternalID"] . "</b><br/>";
            $mtext .= "CAS: <b>" . $case["CAS"] . "</b><br/>";

            $mtext .= "<hr>";

            $mtext .= "Állapot<br/>";
            $mtext .= "<b>" . $case["Status"]["Date"] . " - " . $case["Status"]["TextHU"] . "</b><br/><br/>";

            $mtext .= "Teendőd: <b>" . $case["Status"]["Responsible"]["Text"] . "</b><br/>";
            $mtext .= "Esedékes: <b>" . $case["Status"]["Task"]["TaskNoteHU"] . "</b><br/>";

            $mtextbtn = "Nyomonkövetés";
            $murl = $serverurl . '/quicktrack/' . $case["TrackingID"];

        } else if ($case["Status"]["Responsible"]["Lang"] == "gb") {

            $mtitle = "Dear " . $case["Status"]["Responsible"]["Name"] . "!";
            $mtext = null;

            $mtext .= "<p>You have a notification for " . $case["TrackingID"] . " on " . date("Y-m-d H:i:s") . ".</p>";

            $mtext .= "<hr>";

            $mtext .= "Tracking ID: <b>" . $case["TrackingID"] . "</b><br/>";
            $mtext .= "External ID: <b>" . $case["ExternalID"] . "</b><br/>";
            $mtext .= "CAS: <b>" . $case["CAS"] . "</b><br/>";

            $mtext .= "<hr>";

            $mtext .= "Status<br/>";
            $mtext .= "<b>" . $case["Status"]["Date"] . " - " . $case["Status"]["TextEN"] . "</b><br/><br/>";

            $mtext .= "Your task: <b>" . $case["Status"]["Responsible"]["Text"] . "</b><br/>";
            $mtext .= "Due: <b>" . $case["Status"]["Task"]["TaskNoteEN"] . "</b><br/>";

            $mtextbtn = "Tracking";
            $murl = $serverurl . '/quicktrack/' . $case["TrackingID"];

        }

        switch ($case["Status"]["Task"]["KeyWord"]) {
            case "1h":
                $dbc->set("UPDATE pcases SET tn1Hour=? WHERE id=?",
                    ["1", $case["CaseID"]]);
                break;
            case "1d":
                $dbc->set("UPDATE pcases SET tn1Day=? WHERE id=?",
                    ["1", $case["CaseID"]]);
                break;
            case "days":
                $dbc->set("UPDATE pcases SET tnDays=? WHERE id=?",
                    ["1", $case["CaseID"]]);
                break;
            case "expired":
                $dbc->set("UPDATE pcases SET tnExpired=? WHERE id=?",
                    ["1", $case["CaseID"]]);
                break;
        }

        require 'sendmail.php';
    }
}
