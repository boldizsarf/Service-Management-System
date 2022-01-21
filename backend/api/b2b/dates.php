<?php

// -- Dátum kalkuláció -- //

// Változók felvétele
$y = 1; // kalkulált napok száma
$wd = 0; // hétvége változó
$nextDay = $dbpcase[0]["submitdate"]; // következő nap

// y változó beállítása branch szerint
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

// Kalkuláció
for ($x = 0; $x <= $y; $x++) {

    // Adott dátum kiszámítása
    $date = date('Y-m-d', strtotime($dbpcase[0]["submitdate"]. ' + ' . $x . ' days'));

    // Munkanap kalkuláció
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
            case '7':
                $status = 13;
                break;
        }
    } else if ($dbpcase[0]["branch"] == "rejected") {
        // Rejected
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
            case '7':
                $status = 14;
                break;
        }
    } else if ($dbpcase[0]["branch"] == "doa") {
        // DOA
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
            case '7':
                $status = 15;
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