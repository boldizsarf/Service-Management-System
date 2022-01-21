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

$dbaccessory = $dbc->get("SELECT * FROM accessories ORDER BY id DESC");
$id = $dbaccessory[0]["id"] + 1;

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

$did = $_POST["did"];
$type = $_POST["device"];
$serial = $_POST["serial"];

$role = $dbuser[0]["role"];

if ($role == 0) {
    $dbdcheck = $dbc->get("SELECT * FROM devices WHERE id=? AND uid=?", [$did, $uid]);
    if (empty($dbdcheck[0]["id"])) {
        header("Location: /dashboard/home");
        return;
    }
}


$added = date("Y-m-d H:i:s");

$dbc->set("INSERT INTO accessories (id, did, uid, type, serial, added) VALUES (?, ?, ?, ?, ?, ?)",
    [$id, $did, $uid, $type, $serial, $added]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
return;