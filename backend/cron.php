<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require 'dbc.php';

$cronlog =  "Beginning of CronLog on " . date("Y-m-d H:i:s") . "<br>\n";

$start = date_create(date("Y-m-d H:i:s"));
$start2 = date("Y-m-d H:i:s");

// B2B üzenet válasz emailek beolvasása
require 'cron/emailchecker.php';

// B2C helyesírási hibák javítása
require 'cron/b2cTypoCorrector.php';

//require 'pemailnot.php';
//require 'readp.php';

$cronlog .=  "End of CronLog on " . date("Y-m-d H:i:s") . "<br>\n";
$end = date_create(date("Y-m-d H:i:s"));
$end2 = date("Y-m-d H:i:s");

$dbcronlogs = $dbc->get("SELECT * FROM cronlog ORDER BY id DESC");
$cronid = $dbcronlogs[0]["id"] + 1;

$duration = date_diff($start, $end);

//echo $duration->format('%s');

$dbc->set("INSERT INTO cronlog (id, log, duration, start, end) VALUES (?, ?, ?, ?, ?)",
    [$cronid, $cronlog, 0, $start2, $end2]);

die;