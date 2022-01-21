<?php
ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

$dbdevice = $dbc->get("SELECT * FROM devices ORDER BY id DESC");
$id = $dbdevice[0]["id"] + 1;

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];


$name = $_POST["device"];
$serial = $_POST["serial"];
$dupli = false;

$products = simplexml_load_file('.././db/sn.xml');

foreach ($products->product as $product) {
    if ($product->sn == $serial) {
        $dupli = true;
    }
}

$added = date("Y-m-d H:i:s");

$dbc->set("INSERT INTO devices (id, uid, name, serial, dupli, added) VALUES (?, ?, ?, ?, ?, ?)",
    [$id, $uid, $name, $serial, $dupli, $added]);

header("Location: /dashboard/newaccessory/0/" . $id);
return;