<?php

error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('file_uploads', 'On');

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

$dbuser = $dbc->get("SELECT * FROM pcontacts WHERE email=? AND phone=? AND address=? AND name=?", [$_POST["emailCell"], $_POST["phoneCell"], $_POST["addressCell"], $_POST["nameCell"]]);
$uid = $dbuser[0]["uid"];

$dbpcase = $dbc->get("SELECT * FROM pcases ORDER BY id DESC");

// Változók
$id = $dbpcase[0]["id"] + 1;
$cname = $_POST["nameCell"];
$cemail = $_POST["emailCell"];
$cphone = $_POST["phoneCell"];
$caddress = $_POST["addressCell"];
$etrackid = $_POST["etrackid"];
$purchasedate = $_POST["purchasedate"];
$submitdate = $_POST["submitdate"];
$handlingway = $_POST["handlingway"];
$courier = $_POST["courier"];
$senddate = $_POST["senddate"];
$problemdate = $_POST["problemdate"];
$problemdesc = $_POST["problemdesc"];
$device = $_POST["device"];
$sn = $_POST["sn"];
$note = $_POST["note"];
$distributor = $_POST["dist"];
$date = date("Y-m-d H:i:s");

//Tracking id generálása
$uidhash = hash("sha256", $uid);
$pre1code = str_replace("o", "0", $uidhash);
$pre2code = strtoupper($pre1code);
$code1 = substr($pre2code, 0, 5);

$uidhash = hash("sha256", $id);
$pre1code2 = str_replace("o", "0", $uidhash);
$pre2code2 = strtoupper($pre1code2);
$code2 = substr($pre2code2, 0, 5);

$trackid = "CB-" . $code1 . '-' . $code2;

$dbc->set("INSERT INTO pcases (id, trackid, cname, cemail, cphone, caddress, etrackid, purchasedate, submitdate, handlingway, courier, senddate, problemdate, problemdesc, device, sn, note, distributor, uid, date, branch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$id, $trackid, $cname, $cemail, $cphone, $caddress, $etrackid, $purchasedate, $submitdate, $handlingway, $courier, $senddate, $problemdate, $problemdesc, $device, $sn, $note, $distributor, $uid, $date, "submitted"]);

$dbstatus = $dbc->get("SELECT * FROM pcasestatuses ORDER BY id DESC");
$sid = $dbstatus[0]["id"] + 1;
$dbc->set("INSERT INTO pcasestatuses (id, pcid, status, date) VALUES (?, ?, ?, ?)",
    [$sid, $id, 1, date("Y-m-d H:i:s")]);

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

if ($dbuser[0]["role"] == 10) {
    header("Location: /dashboard/mypcase/" . $trackid . "/s/1");
} else {
    header("Location: /dashboard/pcase/" . $trackid);
}

return;
