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

$user = $_POST["user"];
$role = $_POST["role"];

$dbc->set("UPDATE users SET role=? WHERE id=?",
    [$role, $user]);

//$notify->add($user, "Gratulálunk a kinevezéshez!", "Gratulálunk a kinevezéshez!", "Gratulálunk a kinevezéshez!", "https://dev.tracking.dupliglobal.com/dashboard/team/", "Megnyitás", "fas fa-graduation-cap");

header("Location: /dashboard/team");
return;