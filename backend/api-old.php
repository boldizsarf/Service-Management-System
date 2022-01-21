<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$username = $_POST["username"];
$token = $_POST["token"];
$query = $_POST["query"];


$dbapiacces = $dbc->get("SELECT * FROM apiaccess WHERE username=? AND token=?", [$username, $token]);

if (empty($dbapiacces[0]["id"])) {
    $data = array();

    $data["Username"] = $username;
    $data["Token"] = $token;

    $data["Answer"] = "Access denied!";

    // Adat kiírása
    header('Content-type: text/javascript; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return;
}

if (substr( $query, 0, 2 ) == "CB") {
    $dbpcase = $dbc->get("SELECT * FROM pcases WHERE trackid=?", [$query]);

    if (empty($dbpcase[0]["id"])) {
        $data["Answer"] = "No data found!";

        // Adat kiírása
        header('Content-type: text/javascript; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return;
    }

    $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$dbpcase[0]["uid"]]);

    $data = array();

    $data["CaseID"] = $dbpcase[0]["id"];
    $data["TrackingID"] = $dbpcase[0]["trackid"];
    $data["ExternalID"] = $dbpcase[0]["etrackid"];
    $data["CAS"] = $dbpcase[0]["cas"];

    $data["SubmitDate"] = $dbpcase[0]["submitdate"];

    $data["HandlingWay"] = $dbpcase[0]["handlingway"];

    $data["Courier"] = $dbpcase[0]["courier"];
    $data["SendDate"] = $dbpcase[0]["senddate"];

    // Partner
    $data["Partner"]["ID"] = $dbuser[0]["id"];
    $data["Partner"]["Name"] = $dbuser[0]["lastname"];
    $data["Partner"]["Store"] = $dbuser[0]["firstname"];

    // kapcsolattartó
    $data["Partner"]["Contact"]["Name"] = $dbpcase[0]["cname"];
    $data["Partner"]["Contact"]["Email"] = $dbpcase[0]["cemail"];
    $data["Partner"]["Contact"]["Phone"] = $dbpcase[0]["cphone"];
    $data["Partner"]["Contact"]["Address"] = $dbpcase[0]["caddress"];

    // Készülék
    $data["Device"]["Name"] = $dbpcase[0]["device"];
    $data["Device"]["SerialNumber"] = $dbpcase[0]["sn"];
    $data["Device"]["PurchaseDate"] = $dbpcase[0]["purchasedate"];

    // Probléma
    $data["Problem"]["Date"] = $dbpcase[0]["problemdate"];
    $data["Problem"]["Description"] = $dbpcase[0]["problemdesc"];

    $data["Note"] = $dbpcase[0]["note"];

    $data["Branch"] = $dbpcase[0]["branch"];

    // -- Dátum kalkuláció --

    $y = 1;

    if ($dbpcase[0]["branch"] == "submitted") {
        $y = 7;
    } else if ($dbpcase[0]["branch"] == "nff") {
        $y = 9;
    } else if ($dbpcase[0]["branch"] == "rejected") {
        $y = 9;
    } else if ($dbpcase[0]["branch"] == "doa") {
        $y = 8;
    } else if ($dbpcase[0]["branch"] == "warranty") {
        $y = 30;
    }

    $wd = 0;
    $nextDay = $dbpcase[0]["submitdate"];
    for ($x = 0; $x <= $y; $x++) {

        $date = date('Y-m-d', strtotime($dbpcase[0]["submitdate"]. ' + ' . $x . ' days'));

        $weekendDay = false;
        $day = date("D", strtotime($date));
        $dayFull = date("l", strtotime($date));
        if($day == 'Sat' || $day == 'Sun') {
            $weekendDay = true;
        }

        if ($weekendDay == false) {
            $wd++;
        }

        $data["Dates"][$x]["DayNumber"] = $x;
        $data["Dates"][$x]["DayName"] = $dayFull;
        $data["Dates"][$x]["Weekend"] = $weekendDay;

        // Branch
        if ($dbpcase[0]["branch"] == "submitted") {
            // Submitted
            switch ($wd) {
                default:
                    $status = 0;
                    break;
                case '1':
                    $status = 1;
                    break;
                case '2':
                    $status = 2;
                    break;
                case '3':
                case '4':
                    $status = 3;
                    break;
                case '5':
                    $status = 4;
                    break;
            }
        } else if ($dbpcase[0]["branch"] == "nff") {
            // NFF
            switch ($wd) {
                default:
                    $status = "No planned action";
                    break;
                case '1':
                    $status = "Case submitted";
                    break;
                case '2':
                    $status = "Case accepted";
                    break;
                case '3':
                case '4':
                    $status = "At courier";
                    break;
                case '5':
                    $status = "Case processing";
                    break;
                case '6':
                case '7':
                    $status = "Going back to store";
                    break;
            }
        } else if ($dbpcase[0]["branch"] == "rejected") {
            // Rejected
            switch ($wd) {
                default:
                    $status = "No planned action";
                    break;
                case '1':
                    $status = "Case submitted";
                    break;
                case '2':
                    $status = "Case accepted";
                    break;
                case '3':
                case '4':
                    $status = "At courier";
                    break;
                case '5':
                    $status = "Case processing";
                    break;
                case '6':
                case '7':
                    $status = "Going back to store";
                    break;
            }
        } else if ($dbpcase[0]["branch"] == "doa") {
            // DOA
            switch ($wd) {
                default:
                    $status = "No planned action";
                    break;
                case '1':
                    $status = "Case submitted";
                    break;
                case '2':
                    $status = "Case accepted";
                    break;
                case '3':
                case '4':
                    $status = "At courier";
                    break;
                case '5':
                    $status = "Case processing";
                    break;
                case '6':
                    $status = "Processing crediting ";
                    break;
            }
        } else if ($dbpcase[0]["branch"] == "warranty") {
            // Warranty
            switch ($wd) {
                default:
                    $status = 0;
                    break;
                case '1':
                    $status = 1;
                    break;
                case '2':
                    $status = 2;
                    break;
                case '3':
                case '4':
                    $status = 3;
                    break;
                case '5':
                    $status = 4;
                    break;
                case '6':
                    $status = 5;
                    break;
                case '7':
                case '8':
                case '9':
                    $status = 6;
                    break;
                case '10':
                case '11':
                    $status = 7;
                    break;
                case '12':
                case '13':
                case '14':
                    $status = 8;
                    break;
                case '15':
                    $status = 9;
                    break;
                case '16':
                case '17':
                case '18':
                    $status = 10;
                    break;
                case '19':
                    $status = 11;
                    break;
                case '20':
                case '21':
                    $status = 12;
                    break;

            }
        }

        if ($weekendDay) {
            $status = 0;
        }

        $statuses = simplexml_load_file('db/pstatuses.db');
        foreach ($statuses->status as $xmlstatus) {
            if ($xmlstatus["id"] == $status) {
                $statushu = $xmlstatus->hu;
                $statusen = $xmlstatus->gb;
                $statuscolor = $xmlstatus->color;
                $statusicon = $xmlstatus->icon;
            }
        }


        $data["Dates"][$x]["PlannedAction"]["TextHU"] = strval($statushu);
        $data["Dates"][$x]["PlannedAction"]["TextEN"] = strval($statusen);
        $data["Dates"][$x]["PlannedAction"]["Color"] = strval($statuscolor);
        $data["Dates"][$x]["PlannedAction"]["Icon"] = strval($statusicon);

        switch ($statuscolor) {
            case 'text-danger':
                $data["Dates"][$x]["PlannedAction"]["BgColor"] = "#ffc2b3";
                $data["Dates"][$x]["PlannedAction"]["BorderColor"] = "#e62e00";
                $data["Dates"][$x]["PlannedAction"]["TextColor"] = "#e62e00";
                break;
            case 'text-warning':
                $data["Dates"][$x]["PlannedAction"]["BgColor"] = "#fff0b3";
                $data["Dates"][$x]["PlannedAction"]["BorderColor"] = "#e6b800";
                $data["Dates"][$x]["PlannedAction"]["TextColor"] = "#e6b800";
                break;
            case 'text-success':
                $data["Dates"][$x]["PlannedAction"]["BgColor"] = "#c2f0c2";
                $data["Dates"][$x]["PlannedAction"]["BorderColor"] = "#29a329";
                $data["Dates"][$x]["PlannedAction"]["TextColor"] = "#29a329";
                break;
            case 'text-dark':
                $data["Dates"][$x]["PlannedAction"]["BgColor"] = "#e6e6e6";
                $data["Dates"][$x]["PlannedAction"]["BorderColor"] = "#404040";
                $data["Dates"][$x]["PlannedAction"]["TextColor"] = "#404040";
                break;
        }

        $dbpstatuses = $dbc->get("SELECT * FROM pcasestatuses WHERE date=? AND pcid=?", [$date, $dbpcase[0]["id"]]);

        if (empty($dbpstatuses[0]["status"])) {
            $status = 0;
        } else {
            $status = $dbpstatuses[0]["status"];
        }

        foreach ($statuses->status as $xmlstatus) {
            if ($xmlstatus["id"] == $status) {
                $statushu = $xmlstatus->hu;
                $statusen = $xmlstatus->gb;
                $statuscolor = $xmlstatus->color;
                $statusicon = $xmlstatus->icon;
            }
        }

        $data["Dates"][$x]["RealAction"]["TextHU"] = strval($statushu);
        $data["Dates"][$x]["RealAction"]["TextEN"] = strval($statusen);
        $data["Dates"][$x]["RealAction"]["Color"] = strval($statuscolor);
        $data["Dates"][$x]["RealAction"]["Icon"] = strval($statusicon);

        switch ($statuscolor) {
            case 'text-danger':
                $data["Dates"][$x]["RealAction"]["BgColor"] = "#e62e00";
                $data["Dates"][$x]["RealAction"]["BorderColor"] = "#e62e00";
                $data["Dates"][$x]["RealAction"]["TextColor"] = "#ffc2b3";
                break;
            case 'text-warning':
                $data["Dates"][$x]["RealAction"]["BgColor"] = "#e6b800";
                $data["Dates"][$x]["RealAction"]["BorderColor"] = "#e6b800";
                $data["Dates"][$x]["RealAction"]["TextColor"] = "#ffeb99";
                break;
            case 'text-success':
                $data["Dates"][$x]["RealAction"]["BgColor"] = "#29a329";
                $data["Dates"][$x]["RealAction"]["BorderColor"] = "#29a329";
                $data["Dates"][$x]["RealAction"]["TextColor"] = "#c2f0c2";
                break;
            case 'text-dark':
                $data["Dates"][$x]["RealAction"]["BgColor"] = "#e6e6e6";
                $data["Dates"][$x]["RealAction"]["BorderColor"] = "#404040";
                $data["Dates"][$x]["RealAction"]["TextColor"] = "#404040";
                break;
        }

        $data["Dates"][$x]["Date"] = $date;
    }

    $dbpstatuse = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? ORDER BY id DESC", [$dbpcase[0]["id"]]);

    if (empty($dbpstatuse[0]["status"])) {
        $status = 0;
    } else {
        $status = $dbpstatuse[0]["status"];
    }

    foreach ($statuses->status as $xmlstatus) {
        if ($xmlstatus["id"] == $status) {
            $statushu = $xmlstatus->hu;
            $statusen = $xmlstatus->gb;
            $statuscolor = $xmlstatus->color;
            $statusicon = $xmlstatus->icon;
            $respid = $xmlstatus->responsible->id;
            $respname = $xmlstatus->responsible->name;
            $respemail = $xmlstatus->responsible->email;
            $resptext = $xmlstatus->responsible->text;
            $respmaxdays = $xmlstatus->responsible->maxdays;
            $nextsid = $xmlstatus->responsible->nextsid;
            $resplang = $xmlstatus->responsible->lang;
        }
    }

    $data["Status"]["Id"] = strval($dbpstatuse[0]["status"]);
    $data["Status"]["TextHU"] = strval($statushu);
    $data["Status"]["TextEN"] = strval($statusen);
    $data["Status"]["Color"] = strval($statuscolor);
    $data["Status"]["Icon"] = strval($statusicon);
    $data["Status"]["Date"] = strval($dbpstatuse[0]["date"]);

    switch ($respid) {
        case 'store':
            $respname = $dbuser[0]["firstname"];
            $respemail = $dbpcase[0]["cemail"];
            break;
    }

    $data["Status"]["Responsible"]["Id"] = strval($respid);
    $data["Status"]["Responsible"]["Name"] = strval($respname);
    $data["Status"]["Responsible"]["Email"] = strval($respemail);
    $data["Status"]["Responsible"]["Text"] = strval($resptext);
    $data["Status"]["Responsible"]["MaxDays"] = strval($respmaxdays);
    $data["Status"]["Responsible"]["NextSID"] = strval($nextsid);
    $data["Status"]["Responsible"]["Lang"] = strval($resplang);

    $date1 = strtotime($dbpstatuse[0]["date"] . " + " . $respmaxdays . " days");
    $date2 = strtotime(date("Y-m-d H:i:s"));

    $days = 0;
    $hours = 0;
    $minutes = 0;

    if ($date2 - $date1 > 0) {
        $data["Status"]["Task"]["Left"] = strval(0);
        $data["Status"]["Task"]["LeftType"] = strval("expired");
        $time_seconds = $days * 86400 + $hours * 3600 + $minutes * 60;
        $data["Status"]["Task"]["LeftInSec"] = strval($time_seconds);
        $data["Status"]["Task"]["Color"] = strval("text-danger");
        $data["Status"]["Task"]["TaskNoteHU"] = strval("Lejárt");
        $data["Status"]["Task"]["TaskNoteEN"] = strval("Expired");
        $data["Status"]["Task"]["KeyWord"] = strval("expired");
        $data["Status"]["Task"]["KeyWordStatus"] = strval($dbpcase[0]["tnExpired"]);
    } else {
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24)
            / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 -
                $months*30*60*60*24)/ (60*60*24));

        if ($days != 0) {
            $data["Status"]["Task"]["Left"] = strval($days);
            $data["Status"]["Task"]["LeftType"] = strval("days");
            $time_seconds = $days * 86400 + $hours * 3600 + $minutes * 60;
            $data["Status"]["Task"]["LeftInSec"] = strval($time_seconds);
            $data["Status"]["Task"]["Color"] = strval("text-warning");
            $data["Status"]["Task"]["TaskNoteHU"] = strval($days . " nap van hátra");
            $data["Status"]["Task"]["TaskNoteEN"] = strval($days . " days left");
            if ($days != 1) {
                $data["Status"]["Task"]["KeyWord"] = strval("days");
                $data["Status"]["Task"]["KeyWordStatus"] = strval($dbpcase[0]["tnDays"]);
            }
        }

        $hours = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24)
            / (60*60));

        if ($hours != 0 && $days == 0) {
            $data["Status"]["Task"]["Left"] = strval($hours);
            $data["Status"]["Task"]["LeftType"] = strval("hours");
            $time_seconds = $days * 86400 + $hours * 3600 + $minutes * 60;
            $data["Status"]["Task"]["LeftInSec"] = strval($time_seconds);
            $data["Status"]["Task"]["Color"] = strval("text-warning");
            $data["Status"]["Task"]["TaskNoteHU"] = strval($hours . " óra van hátra");
            $data["Status"]["Task"]["TaskNoteEN"] = strval($hours . " hours left");
            if ($hours == 1) {
                $data["Status"]["Task"]["KeyWord"] = strval("1h");
                $data["Status"]["Task"]["KeyWordStatus"] = strval($dbpcase[0]["tn1Hour"]);
            } else {
                $data["Status"]["Task"]["KeyWord"] = strval("1d");
                $data["Status"]["Task"]["KeyWordStatus"] = $dbpcase[0]["tn1Day"];
            }
        }

        $minutes = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24
                - $hours*60*60)/ 60);

        if ($minutes != 0 && $hours == 0 && $days == 0) {
            $data["Status"]["Task"]["Left"] = strval($minutes);
            $data["Status"]["Task"]["LeftType"] = strval("minutes");
            $time_seconds = $days * 86400 + $hours * 3600 + $minutes * 60;
            $data["Status"]["Task"]["LeftInSec"] = strval($time_seconds);
            $data["Status"]["Task"]["Color"] = strval("text-warning");
            $data["Status"]["Task"]["TaskNoteHU"] = strval($minutes . " óra van hátra");
            $data["Status"]["Task"]["TaskNoteEN"] = strval($minutes . " hours left");
        }
    }


    // Adat kiírása
    header('Content-type: text/javascript; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return;
}


?>