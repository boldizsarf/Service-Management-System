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

// Get ID
$dbendtest = $dbc->get("SELECT * FROM endtest ORDER BY id DESC");
$id = $dbendtest[0]["id"] + 1;

// Get data from POST
$cid = $_POST["cid"];

$external = $_POST["external"];
$internal = $_POST["internal"];
$position = $_POST["position"];
$flightdynamics = $_POST["flightdynamics"];
$gimbal = $_POST["gimbal"];
$obstacle = $_POST["obstacle"];
$rc = $_POST["rc"];
$recording = $_POST["recording"];

$date = date("Y-m-d H:i:s");

$dbc->set("INSERT INTO endtest (id, cid, uid, external, internal, position, flightdynamics, gimbal, obstacle, rc, recording, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$id, $cid, $uid, $external, $internal, $position, $flightdynamics, $gimbal, $obstacle, $rc, $recording, $date]);

header("Location: /dashboard/case/" . $cid);
return;