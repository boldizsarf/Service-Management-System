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

$dbmessages = $dbc->get("SELECT * FROM messages ORDER BY id DESC");
$id = $dbmessages[0]["id"] + 1;

$cid = $_POST["cid"];

$title = $_POST["title"];
$msg = $_POST["msg"];

$dbchk1 = $dbc->get("SELECT * FROM cases WHERE uid=? AND id=?", [$uid, $cid]);

if (empty($dbchk1[0]["id"])) {
    //header("Location: /dashboard/home");
    //return;
}

if (empty($msg)) {
    header("Location: /dashboard/home");
    return;
}

$added = date("Y-m-d H:i:s");

$dbc->set("INSERT INTO messages (id, cid, uid, title, msg, date) VALUES (?, ?, ?, ?, ?, ?)",
    [$id, $cid, $uid, $title, $msg, $added]);

$dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$cid]);
$case = $dbcase[0];

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

if ($uid == $case["uid"]) {
    $dbadmins = $dbc->get("SELECT * FROM users WHERE role <>? AND role <>? AND role <>? AND role <>?", ["0", "10", "11", "12"]);
    $ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " üzenetet küldött";
    foreach ($dbadmins as $admin) {
        $notify->add($admin["id"], $ntxt, null, null, $serverurl . "/dashboard/case/" . $cid, null, "fas fa-comment");
    }
} else {
    $ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " üzenetet küldött";
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$cid]);
    $mtxt = "Üzenete érkezett a MyDroneService rendszerén belül.";
    $notify->add($dbcase[0]["uid"], $ntxt, $mtxt, null, $serverurl . "/dashboard/mycase/" . $cid, "Megtekintés", "fas fa-comment");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
return;