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

$cid = $_POST["cid"];

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

$role = $dbuser[0]["role"];

if ($role == 0) {
    $dbdcheck = $dbc->get("SELECT * FROM cases WHERE uid=?", [$uid]);
    if (empty($dbdcheck[0]["id"])) {
        header("Location: /dashboard/home");
        return;
    }
}

error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('file_uploads', 'On');

if (is_dir("./../uploads/" . hash("sha256", $cid)) == false) {
    mkdir("./../uploads/" . hash("sha256", $cid));
}

$uploads_dir = "./../uploads/" . hash("sha256", $cid);

foreach ($_FILES["upload"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        if ($_FILES['upload']['size'][$key] > 6000000) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . 'toobig');
            return;
        }
        $tmp_name = $_FILES["upload"]["tmp_name"][$key];
        $name = basename($_FILES["upload"]["name"][$key]);

        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}

$dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$cid]);
$case = $dbcase[0];

$ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " fájlt küldött";

// Ha az ügy tulajdonosa küldi az üzenetet
if ($uid == $case["uid"]) {
    // Adminok bekérése
    $dbadmins = $dbc->get("SELECT * FROM users WHERE role <>? AND role <>? AND role <>? AND role <>?", ["0", "10", "11", "12"]);
    foreach ($dbadmins as $admin) {
        // Küldés az adminoknak
        $notify->add($admin["id"], $ntxt, null, null, $serverurl .  "/dashboard/case/" . $cid, null, "fas fa-file");
    }
} else {
    $ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " fájlt küldött";
    $mtxt = "Fájlt küldtek Önnek a MyDroneService rendszerén keresztül.";
    $notify->add($dbcase[0]["uid"], $ntxt, $mtxt, null, $serverurl . "/dashboard/mycase/" . $cid, "Megtekintés", "fas fa-file");

}

header('Location: ' . $_SERVER['HTTP_REFERER']);
return;
