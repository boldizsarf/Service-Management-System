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

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$urole = $dbuser[0]["role"];

if ($urole == 0) {
    header("Location: /dashboard/home");
    return;
}

$did = $_POST["did"];
$serial = $_POST["serial"];
$oldsn = $_POST["oldsn"];

// Get UID
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

// Get ID
$dbchanges = $dbc->get("SELECT * FROM dsnchgs ORDER BY id DESC");
$id = $dbchanges[0]["id"] + 1;

$dbc->set("INSERT INTO dsnchgs (id, did, old, changedto, changeruid, date) VALUES (?, ?, ?, ?, ?, ?)",
    [$id, $did, $oldsn, $serial, $uid, date("Y-m-d H:i:s")]);

$dbc->set("UPDATE devices SET serial=? WHERE id=?",
    [$serial, $did]);

header("Location: /dashboard/device/" . $did);
return;