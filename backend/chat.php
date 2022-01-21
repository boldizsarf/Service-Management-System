<?php
error_reporting(-1);
ini_set('display_errors', 'On');

session_start();

if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

require 'dbc.php';

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

$cid = $_POST["cid"];
$ctype = $_POST["ctype"];
$text = $_POST["chatarea"];

$date = date("Y-m-d H:i:s");

$dbchat = $dbc->get("SELECT * FROM chat ORDER BY id DESC");
$id = $dbchat[0]["id"] + 1;

$dbc->set("INSERT INTO chat (id, cid, ctype, uid, text, seenby, date) VALUES (?, ?, ?, ?, ?, ?, ?)",
    [$id, $cid, $ctype, $uid, $text, null, $date]);

$dbadmins = $dbc->get("SELECT * FROM users WHERE role <>? AND role <>? AND id <>?", ["0", "10", $uid]);
$ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " chat üzenetet küldött";
foreach ($dbadmins as $admin) {
    $notify->add($admin["id"], $ntxt, null, null, $_SERVER['HTTP_REFERER'], null, "far fa-paper-plane");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
return;