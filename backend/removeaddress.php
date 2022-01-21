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

$addrverify = $dbc->numRows("SELECT * FROM addresses WHERE id=? AND uid=?", [$_GET["id"], $dbuser[0]["id"]]);

if ($addrverify == 0) {
    header("Location: /dashboard/myaddresses");
    return;
}

$dbc->set("DELETE FROM addresses WHERE id=?", [$_GET["id"]]);

header("Location: /dashboard/myaddresses");
return;