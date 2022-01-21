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
ini_set('file_uploads', 'On');

setlocale(LC_MONETARY, 'hu_HU');

// Get UID
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

// Get ID
$dbinspection = $dbc->get("SELECT * FROM inspections ORDER BY id DESC");
$id = $dbinspection[0]["id"] + 1;


// Permission check
$role = $dbuser[0]["role"];

if ($role == 0) {
    header("Location: /");
    return;
}

// Get data from POST
$type = $_POST["type"];
$imu = $_POST["imu"];
$compass = $_POST["compass"];
$gps = $_POST["gps"];
$gimbal = $_POST["gimbal"];
$video = $_POST["video"];
$flying = $_POST["flying"];
$position = $_POST["position"];
$stable = $_POST["stable"];
$collision = $_POST["collision"];
$testvideo = $_POST["testvideo"];
$text = $_POST["text"];
$workhours = $_POST["workhours"];
$sku = $_POST["sku"];
$name = $_POST["name"];
$longname = $_POST["longname"];
$price = $_POST["ar"];
$quantity = $_POST["quantity"];
$cid = $_POST["cid"];
$date = date("Y-m-d H:i:s");
$discount = $_POST["discount"];
$tmkselector = $_POST["tmkselector"];

$totalbr = null;
$workhoursbr = null;
$workhourstype = null;


// Add parts
foreach($sku as $key => $n ) {
    $dbparts = $dbc->get("SELECT * FROM parts ORDER BY id DESC");
    $pid = $dbparts[0]["id"] + 1;
    $dbc->set("INSERT INTO parts (id, iid, sku, name, longname, pricebr, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)",
        [$pid, $id, $sku[$key], $name[$key], $longname[$key], $price[$key], $quantity[$key]]);
    $totalbr += $price[$key]*$quantity[$key];
}

if (isset($workhours)) {
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$cid]);
    $case = $dbcase[0];
    switch ($case["price"]) {
        case "normal":
            $workhoursbr = 7795*$workhours;
            $workhourbr = 7795;
            $workhourstype = "Normál";
            break;
        case "express":
            $workhoursbr = 11692*$workhours;
            $workhourbr = 11692;
            $workhourstype = "Sürgősségi";
            break;
    }
    $totalbr += $workhoursbr;
}

if (isset($discount)) {
    $totalbr *= (100-$discount)/100;
}

// Add inspection
$dbc->set("INSERT INTO inspections (id, uid, cid, type, imu, compass, gps, gimbal, video, flying, position, stable, collision, testvideo, text, workhours, totalbr, discount, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$id, $uid, $cid, $type, $imu, $compass, $gps, $gimbal, $video, $flying, $position, $stable, $collision, $testvideo, $text, $workhours, "0", $discount, $date]);

// Update case type
$dbc->set("UPDATE cases SET type=? WHERE id=?",
    [$type, $cid]);

if (is_dir("./../db/caseimages/" . $cid) == false) {
    mkdir("./../db/caseimages/" . $cid);
}

$uploads_dir = "./../db/caseimages/" . $cid;

foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $name = basename($_FILES["images"]["name"][$key]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}

// Megszólítás
$messagetext = "<p>Tisztelt Ügyfelünk!</p>";

// Ügy típusa
switch ($type) {
    case "warranty":
        $messagetext .= "<p>Eszközének bevizsgálását elvégeztük. Csatolva küldjük a bevizsgálási jegyzőkönyvet.</p>";
        $messagetext .= "<div class=\"row\"> <div class=\"form-group col-6\"> <label class=\"form-label\">Az eset típusa</label> <div> <p>Garanciális</p></div></div></div>";
        break;
    case "paid":
        $messagetext .= "<p>Eszközének bevizsgálását elvégeztük, csatolva küldjük a javítási ajánlatot. Várjuk minél hamarabbi visszajelzését az ajánlattal kapcsolatban.</p>";
        $messagetext .= "<div class=\"row\"> <div class=\"form-group col-6\"> <label class=\"form-label\">Az eset típusa</label> <div> <p>Fizetős</p></div></div></div>";
        break;
}

// IMU
if (isset($imu)) {
    switch ($imu) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">IMU</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">IMU</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Compass
if (isset($compass)) {
    switch ($compass) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Iránytű</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Iránytű</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// GPS
if (isset($gps)) {
    switch ($gps) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">GPS</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">GPS</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Gimbal
if (isset($gimbal)) {
    switch ($gimbal) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Gimbal stabilizálás</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Gimbal stabilizálás</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Video
if (isset($video)) {
    switch ($video) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Képátviteli minőség</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Képátviteli minőség</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Flying
if (isset($flying)) {
    switch ($flying) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Irányíthatóság</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Irányíthatóság</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Position
if (isset($position)) {
    switch ($position) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Pozíció tartás</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Pozíció tartás</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Stable
if (isset($stable)) {
    switch ($stable) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Stabilitás</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Stabilitás</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Collision
if (isset($collision)) {
    switch ($collision) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Akadály érzékelés</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Megfelelő</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Akadály érzékelés</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem megfelelő</span> </div></div></div>";
            break;
    }
}

// Testvideo
if (isset($testvideo)) {
    switch ($testvideo) {
        case "true":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Repülési tesztvideó</label> <div > <span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> Készült</span> </div></div></div>";
            break;
        case "false":
            $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Repülési tesztvideó</label> <div > <span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> Nem készült</span> </div></div></div>";
            break;
    }
}

// Jegyzőkönyv
if (isset($text)) {
    $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Jegyzőkönyv</label> <div> <p>" . $text . "</p></div></div></div>";
}

// Add parts
if (isset($sku) || isset($workhours)) {
    $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <label class=\"form-label\">Javítási ajánlat</label> <table class=\"table\"  id=\"partstable\"> <thead> <tr> <th scope=\"col\">Cikkszám</th> <th scope=\"col\">Név</th> <th scope=\"col\">Ár (Nettó)</th> <th scope=\"col\">Ár (Bruttó)</th> <th scope=\"col\">Darabszám</th> </tr></thead> <tbody>";

    foreach($sku as $key => $n ) {
        $messagetext .= "<tr>";
        $messagetext .= "<th>" . $sku[$key] . "</th>";
        $messagetext .= "<th>" . $longname[$key] . "</th>";
        $messagetext .= "<th>" . money_format('%.0n', intval($price[$key]*0.73)) . "</th>";
        $messagetext .= "<th>" . money_format('%.0n', intval($price[$key])) . "</th>";
        $messagetext .= "<th>" . $quantity[$key] . "</th>";
        $messagetext .= "</tr>";
    }

    // Munkaórák
    if ($workhours != 0) {
        $messagetext .= "<tr>";
        $messagetext .= "<th></th>";
        $messagetext .= "<th>" . $workhourstype . " javítási munkaóra</th>";
        $messagetext .= "<th>" . money_format('%.0n', intval($workhourbr*0.73)) . "</th>";
        $messagetext .= "<th>" . money_format('%.0n', intval($workhourbr)) . "</th>";
        $messagetext .= "<th>" . $workhours . "</th>";
        $messagetext .= "</tr>";
    }

    $messagetext .= "</tbody> <tfoot> <tr> <th scope=\"col\">Összesen</th> <th scope=\"col\"></th> <th scope=\"col\">" . money_format('%.0n', intval($totalbr*0.73)) . "</th> <th scope=\"col\">" . money_format('%.0n', intval($totalbr)) . "</th> <th scope=\"col\"></th> </tr></tfoot> </table> </div></div>";

    $messagetext .= "<div class=\"row\"> <div class=\"form-group col-12\"> <div> <a href=\"/dashboard/inspection/" . $id . "/accept\" class=\"btn btn-success\">Elfogadás</a> <a href=\"/dashboard/inspection/" . $id . "/decline\" class=\"btn btn-danger\">Elutasítás</a> </div></div></div>";
}

// Get MID
$dbmessages = $dbc->get("SELECT * FROM messages ORDER BY id DESC");
$mid = $dbmessages[0]["id"] + 1;

//$dbc->set("INSERT INTO messages (id, cid, uid, title, msg, date) VALUES (?, ?, ?, ?, ?, ?)",
    //[$mid, $cid, $uid, "Árajánlat", $messagetext, $date]);

// Send mail and update status

switch ($type) {
    case "warranty":
        $status = "4";
        break;
    case "paid":
        $status = "7";
        break;
}

$dbstatus = $dbc->get("SELECT * FROM casestatuses ORDER BY id DESC");
$sid = $dbstatus[0]["id"] + 1;
$dbc->set("INSERT INTO casestatuses (id, cid, status, date) VALUES (?, ?, ?, ?)",
    [$sid, $cid, $status, date("Y-m-d H:i:s")]);

$dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$cid]);
$case = $dbcase[0];

$dbuser2 = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);
$user = $dbuser2[0];

$dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
$device = $dbdevice[0];

$statuses = simplexml_load_file('./../db/statuses.db');
$lngcd = strval($_COOKIE["sw_lang"]);
$statustext = null;
$statuscolor = null;
$statusicon = null;
foreach ($statuses->status as $xmlstatus) {
    if ($xmlstatus["id"] == $status) {
        $statustext = $xmlstatus->$lngcd;
        $statuscolor = $xmlstatus->color;
        $statusicon = $xmlstatus->icon;
    }
}

$dbuser2 = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);

$mtext = "A MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . " ügyszámú esetének állapota megváltozott. Az eset új állapota: <b>" . $statustext . "</b>. Az esettel kapcsolatban további információt a rendszerünkön belül talál.";

$notify->add($dbuser2[0]["id"], $statustext, $mtext, null, $serverurl .  "/dashboard/mycase/" . $case["id"], "Megtekintés", $statusicon);

// Testvideo
if (isset($tmkselector)) {
    switch ($tmkselector) {
        case 1:
            $dbc->set("UPDATE tmkrepairs SET first=? WHERE did=?",
                [$cid, $device["id"]]);
            break;
        case 2:
            $dbc->set("UPDATE tmkrepairs SET second=? WHERE did=?",
                [$cid, $device["id"]]);
            break;
        case 3:
            $dbc->set("UPDATE tmkrepairs SET third=? WHERE did=?",
                [$cid, $device["id"]]);
            break;
        case 4:
            $dbc->set("UPDATE tmkrepairs SET fourth=? WHERE did=?",
                [$cid, $device["id"]]);
            break;
    }
}

require 'sendmail.php';

header("Location: /dashboard/case/" . $cid);
return;
