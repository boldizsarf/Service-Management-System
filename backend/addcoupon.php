<?php

error_reporting(-1);
ini_set('display_errors', 'On');

session_start();
require 'dbc.php';

if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

if ($dbuser[0]["role"] == 0) {
    header("Location: /dashboard/home");
    return;
}

$name = $_POST["name"];
$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];
$cval = $_POST["cval"];
$device = $_POST["device"];
$type = $_POST["type"];

$date = date("Y-m-d H:i:s");

$dbcoupons = $dbc->get("SELECT * FROM coupons ORDER BY id DESC");
$couponid = $dbcoupons[0]["id"] + 1;


$dbc->set("INSERT INTO coupons (id, name, start, end, value, device, type, added, addedby) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$couponid, $name, $startdate, $enddate, $cval, $device, $type, $date, $uid]);


header("Location: /dashboard/coupons");
return;
