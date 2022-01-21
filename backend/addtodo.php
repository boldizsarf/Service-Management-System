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

$dbtodo = $dbc->get("SELECT * FROM todo ORDER BY id DESC");
$id = $dbtodo[0]["id"] + 1;

$todo = $_POST["todo"];
$expire = $_POST["expire"];

$added = date("Y-m-d H:i:s");

$dbc->set("INSERT INTO todo (id, uid, text, expire, added) VALUES (?, ?, ?, ?, ?)",
    [$id, $uid, $todo, $expire, $added]);

header("Location: /dashboard/todo/");
return;