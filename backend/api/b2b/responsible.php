<?php

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