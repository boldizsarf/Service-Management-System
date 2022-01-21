<?php


session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

require 'dbc.php';

$dbsuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$suser = $dbsuser[0];

$role = $dbsuser[0]["role"];

if ($role == 0) {
    echo "No permission";
    return;
}

$cid = $_POST["cid"];
$postacc = $_POST["accessoriesatveteli"];

$action = $_POST["action"];

$dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$cid]);
$case = $dbcase[0];

$dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);
$user = $dbuser[0];

$dbdaddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["baddress"]]);
$daddress = $dbdaddress[0];

$dbdeladdress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["daddress"]]);
$deladdress = $dbdeladdress[0];

$dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
$device = $dbdevice[0];

$dbaccessories = $dbc->get("SELECT * FROM accessories WHERE did=?", [$case["device"]]);

foreach ($postacc as $accessory) {
    if ($accessory != "deviceitself") {
        $accs .= $accessory . "; ";
    }
}

if ($action == "old") {
    require 'b2clap-old.php';
} else if ($action == "new") {
    require 'b2clap.php';
} else if ($action == "end") {
    require 'endtestlap.php';
}
