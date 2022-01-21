<?php

ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

// Accept Q
if ($_GET["q"] == "acceptq") {

    $qid = $_GET["qid"];
    $acceptkey = $_GET["acceptkey"];

    $dbquote = $dbc->get("SELECT * FROM pquote WHERE id=?", [$qid]);

    if ($dbquote[0]["accpeted"] !== null) {
        echo "Ezt az ajánlatot már elfogadták.";
        return;
    } else {
        if ($dbquote[0]["acceptkey"] == $acceptkey) {
            $dbc->set("UPDATE pquote SET accpeted=? WHERE id=?",
                ["true", $qid]);
            $dbc->set("UPDATE pquote SET acceptdate=? WHERE id=?",
                [date("Y-m-d H:i:s"), $qid]);
            echo "Sikeresen elfogadtad az ajánlatot!";
            return;
        } else {
            echo "Ehhez nincs jogod!";
            return;
        }
    }
}

if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

// Send message
if ($_GET["q"] == "sendmsg") {

    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
    $uid = $dbuser[0]["id"];
    $role = $dbuser[0]["role"];

    $dbmessages = $dbc->get("SELECT * FROM pmessages ORDER BY id DESC");
    $id = $dbmessages[0]["id"] + 1;

    $cid = $_POST["cid"];
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $title = $_POST["title"];
    $msg = $_POST["msg"];

    if (empty($msg)) {
        header("Location: /dashboard/home");
        return;
    }

    $added = date("Y-m-d H:i:s");

    $dbc->set("INSERT INTO pmessages (id, cid, uid, title, msg, date) VALUES (?, ?, ?, ?, ?, ?)",
        [$id, $case["CaseID"], $uid, $title, $msg, $added]);


    if ($uid == $case["Partner"]["ID"]) {
        $dbadmins = $dbc->get("SELECT * FROM users WHERE role <>? AND role <>?", ["0", "10"]);
        $ntxt = $dbuser[0]["firstname"] . " üzenetet küldött";
        foreach ($dbadmins as $admin) {
            $notify->add($admin["id"], $ntxt, null, null, $serverurl . "/dashboard/pcase/" . $case["TrackingID"], null, "fas fa-comment");
        }
    } else {
        $ntxt = "Message notice for " . $case["TrackingID"];
        $mtxt = "Üzenete érkezett a MyDroneService rendszerén belül. Erre az emailre történő válaszolással válaszolhat az üzenetre. Az üzenet tartalma: " . $msg;
        $notify->add($case["Partner"]["ID"], $ntxt, $mtxt, null, $serverurl . "/dashboard/mypcase/" . $case["TrackingID"], "Megtekintés", "fas fa-comment");
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}

// Send file
if ($_GET["q"] == "sendfile") {
    $cid = $_POST["cid"];
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
    $uid = $dbuser[0]["id"];

    if (is_dir("./../puploads/" . hash("sha256", $cid)) == false) {
        mkdir("./../puploads/" . hash("sha256", $cid));
    }

    $uploads_dir = "./../puploads/" . hash("sha256", $cid);

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

    if ($uid == $case["Partner"]["ID"]) {
        $ntxt = $case["Partner"]["Store"] . " fájlt küldött";
        $dbadmins = $dbc->get("SELECT * FROM users WHERE role <>? AND role <>?", ["0", "10"]);
        foreach ($dbadmins as $admin) {
            // Küldés az adminoknak
            $notify->add($admin["id"], $ntxt, null, null, $serverurl .  "/dashboard/pcase/" . $cid, null, "fas fa-file");
        }
    } else {
        $ntxt = "Message notice for " . $case["TrackingID"];
        $mtxt = "Fájlt küldtek Önnek a MyDroneService rendszerén keresztül. Erre az emailre történő válaszolással válaszolhat az üzenetre.";
        $notify->add($case["Partner"]["ID"], $ntxt, $mtxt, null, $serverurl . "/puploads/" . hash("sha256", $cid) . "/" . $name, "Letöltés", "fas fa-comment");
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;

}

// Update status
if ($_GET["q"] == "updatestatus") {
    $cid = $_POST["cid"];
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
    $uid = $dbuser[0]["id"];

    $status = $_POST["status"];

    $dbstatus = $dbc->get("SELECT * FROM pcasestatuses ORDER BY id DESC");
    $sid = $dbstatus[0]["id"] + 1;

    $dbc->set("INSERT INTO pcasestatuses (id, pcid, status, date) VALUES (?, ?, ?, ?)",
        [$sid, $case["CaseID"], $status, date("Y-m-d H:i:s")]);


    // Státusz update email

    $cid = $_POST["cid"];
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $mtext = "Az " . $case["TrackingID"] . " ügyszámú (hiv. sz.: " . $case["ExternalID"] . ", termék: " . $case["Device"]["Name"] . " - SN " . $case["Device"]["SerialNumber"] . ") esetének állapota megváltozott. Az eset új állapota: <b>" . $case["Status"]["TextHU"] . "</b>. Az esettel kapcsolatban további információt a rendszerünkön belül talál.";

    $notify->add($case["Partner"]["ID"], $case["Status"]["TextHU"], $mtext, null, $serverurl .  "/dashboard/mypcase/" . $case["TrackingID"], "Megtekintés", $case["Status"]["Icon"]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}

// Add inspection
if ($_GET["q"] == "addinspection") {

    // Tracking ID lekérése
    $cid = $_POST["cid"];

    // API lehívása
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    // User lehívása
    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
    $uid = $dbuser[0]["id"];

    // Változók
    $branch = $_POST["branch"];
    $text = $_POST["text"];
    $forcecrediting = $_POST["forcecrediting"];
    $warehouse = $_POST["warehouse"];

    // Bevizsgálás hozzáadása
    $dbinsp = $dbc->get("SELECT * FROM pinspections ORDER BY id DESC");
    $iid = $dbinsp[0]["id"] + 1;

    $dbc->set("INSERT INTO pinspections (id, uid, pcid, text, warehouse, date) VALUES (?, ?, ?, ?, ?, ?)",
        [$iid, $uid, $case["CaseID"], $text, $warehouse, date("Y-m-d H:i:s")]);

    // Branch frissítése

    $dbc->set("UPDATE pcases SET branch=? WHERE id=?",
        [$branch, $case["CaseID"]]);

    // Státusz frissítése

    $dbstatus = $dbc->get("SELECT * FROM pcasestatuses ORDER BY id DESC");
    $sid = $dbstatus[0]["id"] + 1;

    switch ($branch) {
        case "warranty":
            $status = "5";
            break;
        case "rejected":
            $status = "14";
            break;
        case "nff":
            $status = "13";
            break;
        case "doa":
            $status = "15";
            break;
    }

    if ($forcecrediting == 1) {
        $status = "15";
    }

    $dbc->set("INSERT INTO pcasestatuses (id, pcid, status, date) VALUES (?, ?, ?, ?)",
        [$sid, $case["CaseID"], $status, date("Y-m-d H:i:s")]);

    // Státusz update email

    $cid = $_POST["cid"];
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $mtext = "Az " . $case["TrackingID"] . " ügyszámú (hiv. sz.: " . $case["ExternalID"] . ", termék: " . $case["Device"]["Name"] . " - SN " . $case["Device"]["SerialNumber"] . ") esetének állapota megváltozott. Az eset új állapota: <b>" . $case["Status"]["TextHU"] . "</b>. Az esettel kapcsolatban további információt a rendszerünkön belül talál.";

    $notify->add($case["Partner"]["ID"], $case["Status"]["TextHU"], $mtext, null, $serverurl .  "/dashboard/mypcase/" . $case["TrackingID"], "Megtekintés", $case["Status"]["Icon"]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;

}

// Modify
if ($_GET["q"] == "modify") {

    // Tracking ID lekérése
    $cid = $_POST["cid"];
    $cas = $_POST["casnumber"];

    // API lehívása
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    // CAS Number
    $dbc->set("UPDATE pcases SET cas=? WHERE id=?",
        [$cas, $case["CaseID"]]);

    if ($case["CAS"] === null || empty($case["CAS"]) && !(empty($cas))) {
        $dbstatus = $dbc->get("SELECT * FROM pcasestatuses ORDER BY id DESC");
        $sid = $dbstatus[0]["id"] + 1;

        $dbc->set("INSERT INTO pcasestatuses (id, pcid, status, date) VALUES (?, ?, ?, ?)",
            [$sid, $case["CaseID"], "6", date("Y-m-d H:i:s")]);
    }

    $dbc->set("UPDATE pcases SET cname=? WHERE id=?",
        [$_POST["nameCell"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET cemail=? WHERE id=?",
        [$_POST["emailCell"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET cphone=? WHERE id=?",
        [$_POST["phoneCell"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET caddress=? WHERE id=?",
        [$_POST["addressCell"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET etrackid=? WHERE id=?",
        [$_POST["etrackid"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET purchasedate=? WHERE id=?",
        [$_POST["purchasedate"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET submitdate=? WHERE id=?",
        [$_POST["submitdate"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET handlingway=? WHERE id=?",
        [$_POST["handlingway"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET courier=? WHERE id=?",
        [$_POST["courier"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET senddate=? WHERE id=?",
        [$_POST["senddate"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET device=? WHERE id=?",
        [$_POST["device"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET sn=? WHERE id=?",
        [$_POST["sn"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET problemdate=? WHERE id=?",
        [$_POST["problemdate"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET problemdesc=? WHERE id=?",
        [$_POST["problemdesc"], $case["CaseID"]]);

    $dbc->set("UPDATE pcases SET note=? WHERE id=?",
        [$_POST["note"], $case["CaseID"]]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;

}

// Crediting
if ($_GET["q"] == "crediting") {

    // Tracking ID lekérése
    $cid = $_POST["cid"];
    $creditingid = $_POST["creditingid"];

    // API lehívása
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $dbc->set("UPDATE pcases SET creditingid=? WHERE id=?",
        [$creditingid, $case["CaseID"]]);

    $dbstatus = $dbc->get("SELECT * FROM pcasestatuses ORDER BY id DESC");
    $sid = $dbstatus[0]["id"] + 1;

    $dbc->set("INSERT INTO pcasestatuses (id, pcid, status, date) VALUES (?, ?, ?, ?)",
        [$sid, $case["CaseID"], "16", date("Y-m-d H:i:s")]);

    // Státusz update email

    $cid = $_POST["cid"];
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $cid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $mtext = "Az " . $case["TrackingID"] . " ügyszámú (hiv. sz.: " . $case["ExternalID"] . ", termék: " . $case["Device"]["Name"] . " - SN " . $case["Device"]["SerialNumber"] . ") esetének állapota megváltozott. Az eset új állapota: <b>" . $case["Status"]["TextHU"] . "</b>. Jóváírási szám: " . $case["CreditingID"] . ". Az esettel kapcsolatban további információt a rendszerünkön belül talál.";

    $notify->add($case["Partner"]["ID"], $case["Status"]["TextHU"], $mtext, null, $serverurl .  "/dashboard/mypcase/" . $case["TrackingID"], "Megtekintés", $case["Status"]["Icon"]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;

}

// Change SN
if ($_GET["q"] == "changesn") {

    $oldsn = $_POST["oldsn"];
    $newsn = $_POST["newsn"];
    $pcid = $_POST["pcid"];

    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
    $uid = $dbuser[0]["id"];

    // Tracking ID lekérése
    $trackingid = $_POST["trackingid"];

    // API lehívása
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $trackingid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $dbc->set("UPDATE pcases SET sn=? WHERE id=?",
        [$newsn, $case["CaseID"]]);

    $dbchanges = $dbc->get("SELECT * FROM b2bsnchange ORDER BY id DESC");
    $chgid = $dbchanges[0]["id"] + 1;

    $dbc->set("INSERT INTO b2bsnchange (id, pcid, trackingid, oldsn, newsn, uid, date) VALUES (?, ?, ?, ?, ?, ?, ?)",
        [$chgid, $pcid, $trackingid, $oldsn, $newsn, $uid, date("Y-m-d H:i:s")]);


    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;

}

// Add quote
if ($_GET["q"] == "addquote") {

    $pcid = $_POST["pcid"];
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
    $workhour = $_POST["workhour"];
    $workhours = $_POST["workhours"];
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $longname = $_POST["longname"];
    $price = $_POST["ar"];
    $quantity = $_POST["quantity"];
    $discount = $_POST["discount"];
    $date = date("Y-m-d H:i:s");

    $acceptkey = hash("sha256", random_bytes(256));

    $totalnt = $workhour*$workhours;

    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
    $uid = $dbuser[0]["id"];

    // Tracking ID lekérése
    $trackingid = $_POST["trackingid"];

    echo $trackingid;

    // API lehívása
    $url = $serverurl . '/api/';
    $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $trackingid);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $case = json_decode($result, true);

    $dbquote = $dbc->get("SELECT * FROM pquote ORDER BY id DESC");
    $quoteid = $dbquote[0]["id"] + 1;

    // Add parts
    foreach($sku as $key => $n ) {
        $dbparts = $dbc->get("SELECT * FROM qparts ORDER BY id DESC");
        $pid = $dbparts[0]["id"] + 1;
        $parTotalNt = $price[$key]*$quantity[$key];
        $dbc->set("INSERT INTO qparts (id, qid, sku, name, longname, pricent, quantity, totalnt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [$pid, $quoteid, $sku[$key], $name[$key], $longname[$key], $price[$key], $quantity[$key], $parTotalNt]);
        $totalnt += $price[$key]*$quantity[$key];
    }

    $totalnt *= (100-$discount)/100;

    $dbc->set("INSERT INTO pquote (id, uid, pcid, imu, compass, gps, gimbal, video, flying, position, stable, collision, testvideo, text, workhour, workhours, discount, totalnt, date, acceptkey) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
        [$quoteid, $uid, $pcid, $imu, $compass, $gps, $gimbal, $video, $flying, $position, $stable, $collision, $testvideo, $text, $workhour, $workhours, $discount, $totalnt, $date, $acceptkey]);

    // IMG Upload
    if (is_dir("./../pqimages/" . $pcid) == false) {
        mkdir("./../pqimages/" . $pcid);
    }

    $uploads_dir = "./../pqimages/" . $pcid;

    foreach ($_FILES["images"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["images"]["tmp_name"][$key];
            $name = basename($_FILES["images"]["name"][$key]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
        }
    }

    // Email kiküldése
    $ntxt = "Message notice for " . $case["TrackingID"];
    $mtxt = "Árajánlat érkezett a MyDroneService rendszerén belül. Erre az emailre történő válaszolással válaszolhat az üzenetre. Az ajánlatot az 'Elfogadás' gomb megnyomásával tudja elfogadni. </br>";
    $mtxt .= "<p>";

    // IMU
    if (isset($imu)) {
        $mtxt .= "<div>";
        if ($imu == "true") {
            $mtxt .= "<b>IMU:</b> Megfelelő </br>";
        } else if ($imu == "false") {
            $mtxt .= "<b>IMU:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }


    // Compass
    if (isset($compass)) {
        $mtxt .= "<div>";
        if ($compass == "true") {
            $mtxt .= "<b>Iránytű:</b> Megfelelő </br>";
        } else if ($compass == "false") {
            $mtxt .= "<b>Iránytű:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // GPS
    if (isset($gps)) {
        $mtxt .= "<div>";
        if ($gps == "true") {
            $mtxt .= "<b>GPS:</b> Megfelelő </br>";
        } else if ($gps == "false") {
            $mtxt .= "<b>GPS:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // Gimbal
    if (isset($gimbal)) {
        $mtxt .= "<div>";
        if ($gimbal == "true") {
            $mtxt .= "<b>Gimbal stabilizálás:</b> Megfelelő </br>";
        } else if ($gimbal == "false") {
            $mtxt .= "<b>Gimbal stabilizálás:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // Képátviteli minőség:
    if (isset($video)) {
        $mtxt .= "<div>";
        if ($video == "true") {
            $mtxt .= "<b>Képátviteli minőség:</b> Megfelelő </br>";
        } else if ($video == "false") {
            $mtxt .= "<b>Képátviteli minőség:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // Irányíthatóság
    if (isset($flying)) {
        $mtxt .= "<div>";
        if ($flying == "true") {
            $mtxt .= "<b>Irányíthatóság:</b> Megfelelő </br>";
        } else if ($flying == "false") {
            $mtxt .= "<b>Irányíthatóság:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // Pozíció tartás
    if (isset($position)) {
        $mtxt .= "<div>";
        if ($position == "true") {
            $mtxt .= "<b>Pozíció tartás:</b> Megfelelő </br>";
        } else if ($position == "false") {
            $mtxt .= "<b>Pozíció tartás:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // Stabilitás
    if (isset($stable)) {
        $mtxt .= "<div>";
        if ($stable == "true") {
            $mtxt .= "<b>Stabilitás:</b> Megfelelő </br>";
        } else if ($stable == "false") {
            $mtxt .= "<b>Stabilitás:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // Akadály érzékelés
    if (isset($collision)) {
        $mtxt .= "<div>";
        if ($collision == "true") {
            $mtxt .= "<b>Akadály érzékelés:</b> Megfelelő </br>";
        } else if ($collision == "false") {
            $mtxt .= "<b>Akadály érzékelés:</b> Nem megfelelő </br>";
        }
        $mtxt .= "</div>";
    }

    // Repülési tesztvideó
    if (isset($testvideo)) {
        $mtxt .= "<div>";
        if ($testvideo == "true") {
            $mtxt .= "<b>Repülési tesztvideó:</b> Készült </br>";
        } else if ($testvideo == "false") {
            $mtxt .= "<b>Repülési tesztvideó:</b> Nem készült </br>";
        }
        $mtxt .= "</div>";
    }

    // Jegyzőkönyv
    $mtxt .= "<p>";
    if (isset($text)) {
        $mtxt .= "<div><b>Jegyzőkönyv:</b></div></br>" . $text . "</br>";
    }
    $mtxt .= "</p>";

    $mtxt .= "<p>";

    $mtxt .= "<div>";
    $mtxt .= "<b>Óradíj:</b> " . money_format('%.0n', intval(($workhour))) . "Ft </br>";
    $mtxt .= "</div>";
    $mtxt .= "<div>";
    $mtxt .= "<b>Munkaóra:</b> " . $workhours . " óra </br>";
    $mtxt .= "</div>";

    $mtxt .= "</p>";

    if (isset($sku)) {
        $mtxt .= "<p>";
        $mtxt .= "<b>Szükséges alkatrészek:</b></br>";
        foreach($sku as $key => $n ) {
            $mtxt .= "<div>" . $sku[$key] . " - " . $longname[$key] . " - " . money_format('%.0n', intval(($price[$key]))) . "Ft - " . $quantity[$key] . "db" . "</div></br>";
        }
        $mtxt .= "</p>";
    }

    $mtxt .= "<hr>";

    if (isset($discount)) {
        $mtxt .= "<p>";
        $mtxt .= "<b>Kedvezmény:</b> " . $discount . "% </br>";
        $mtxt .= "</p>";
    }

    $mtxt .= "<p>";
    $mtxt .= "<div><b>Végösszeg:</b></div></br>";
    $mtxt .= "<div><b>Nettó:</b> " . money_format('%.0n', intval(($totalnt))) . "Ft</div></br>";
    $mtxt .= "<div><b>Bruttó:</b> " . money_format('%.0n', intval(($totalnt*1.27))) . "Ft</div></br>";
    $mtxt .= "</p>";

    $mtxt .= "<hr>";

    if (isset($_FILES["images"]["error"])) {
        $mtxt .= "<p>";
        $mtxt .= "<div><b>Képek:</b></div></br>";
        $files = scandir("./../pqimages/" . $pcid . "/");
        $i2 = null;
        foreach($files as $file) {
            $i2++;
            if ($i2 > 2)
                $mtxt .= "<div><a href='" . $serverurl . "/pqimages/" . $pcid . "/" . $file . "'>" . $file . "</a></div>";
        }
        $mtxt .= "</p>";
    }

    $mtxt .= "</p>";

    $notify->add($case["Partner"]["ID"], $ntxt, $mtxt, null, $serverurl . "/backend/pcaseman.php?q=acceptq&qid=" . $quoteid . "&acceptkey=" . $acceptkey, "Elfogadás", "fas fa-comment");

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;

}
