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

$dbcase = $dbc->get("SELECT * FROM cases ORDER BY id DESC");
$id = $dbcase[0]["id"] + 1;
$device = $_POST["device"];

$dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$device]);

$dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$dbdevice[0]["uid"]]);
$uid = $dbuser[0]["id"];

$type = $_POST["type"];
$care = $_POST["care"];
$sync = $_POST["sync"];
$djiuser = $_POST["djiuser"];
$problem = $_POST["problem"];
$date = $_POST["date"];
$location = $_POST["location"];
$sendback = $_POST["sendback"];
$price = $_POST["price"];
$payment = $_POST["payment"];
$takeover = $_POST["takeover"];
$baddress = $_POST["baddress"];
$daddress = $_POST["daddress"];
$created = date("Y-m-d H:i:s");

if ($daddress == null) {
    $daddress = 0;
}

$dbc->set("INSERT INTO cases (id, uid, device, type, care, sync, djiuser, problem, date, location, sendback, price, payment, takeover, baddress, daddress, created) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$id, $uid, $device, $type, $care, $sync, $djiuser, $problem, $date, $location, $sendback, $price, $payment, $takeover, $baddress, $daddress, $created]);

$dbstatus = $dbc->get("SELECT * FROM casestatuses ORDER BY id DESC");
$sid = $dbstatus[0]["id"] + 1;

$dbc->set("INSERT INTO casestatuses (id, cid, status, date) VALUES (?, ?, ?, ?)",
    [$sid, $id, "1", date("Y-m-d H:i:s")]);

$dbadmins = $dbc->get("SELECT * FROM users WHERE role=?", ["2"]);
$ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " létrehozott egy ügyet";
foreach ($dbadmins as $admin) {
    $notify->add($admin["id"], $ntxt, null, null, $serverurl . "/dashboard/case/" . $id, null, "fas fa-plus");
}

header("Location: /dashboard/mycases/1");
return;