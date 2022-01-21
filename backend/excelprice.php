<?php

error_reporting(-1);
ini_set('display_errors', 'On');

session_start();
require 'dbc.php';

if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

$dbpcases = $dbc->get("SELECT * FROM pcases ORDER BY id DESC");

foreach ($dbpcases as $pcase) {
    $pcasesArray[$pcase["id"]] = array('TrackingID' => $pcase["trackid"], 'Product' => $pcase["device"], 'Price' => $pcase["trackid"]);
}