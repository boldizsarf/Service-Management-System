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
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$dbnews = $dbc->get("SELECT * FROM pcontacts ORDER BY id DESC");
$id = $dbnews[0]["id"] + 1;

$dbc->set("INSERT INTO pcontacts (id, uid, name, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)",
    [$id, $uid, $name, $email, $phone, $address]);

header("Location: /dashboard/b2bcontacts");
return;
