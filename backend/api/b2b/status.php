<?php

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

