<?php

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