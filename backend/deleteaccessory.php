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
$role = $dbuser[0]["role"];

if ($role == 0) {
    $accverify = $dbc->numRows("SELECT * FROM accessories WHERE id=? AND uid=?", [$_GET["id"], $dbuser[0]["id"]]);

    if ($accverify == 0) {
        header("Location: /");
        return;
    }
}

$dbc->set("DELETE FROM accessories WHERE id=?", [$_GET["id"]]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
return;
