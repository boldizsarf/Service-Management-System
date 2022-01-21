<?php

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

// Get UID
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

// Permission check
$role = $dbuser[0]["role"];

if ($role == 0) {
    header("Location: /");
    return;
}

// Get data from POST
$etid = $_POST["etid"];
$cid = $_POST["cid"];

$dbc->set("UPDATE endtest SET confirmUser=? WHERE id=?",
    [$uid, $etid]);

$dbc->set("UPDATE endtest SET confirmDate=? WHERE id=?",
    [date("Y-m-d H:i:s"), $etid]);

header("Location: /dashboard/case/" . $cid);
return;
