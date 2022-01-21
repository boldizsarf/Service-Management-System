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

if ($dbuser[0]["role"] == 0) {
    return;
}

$query = $_GET["q"];

if ($query == "e218bd0daa57accfca47805e412f122c8c0675efca4a4e2b838fd7a1270fbf60") {
    $status = $_POST["status"];
    $case1 = $_POST["case"];
    $smsChk = $_POST["smsChk"];

    $dbstatus = $dbc->get("SELECT * FROM casestatuses ORDER BY id DESC");
    $sid = $dbstatus[0]["id"] + 1;
    $dbc->set("INSERT INTO casestatuses (id, cid, uid, status, date) VALUES (?, ?, ?, ?, ?)",
        [$sid, $case1, $uid, $status, date("Y-m-d H:i:s")]);

    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$case1]);
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

    $mtext = "Az MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . " ügyszámú esetének állapota megváltozott. Az eset új állapota: <b>" . $statustext . "</b>. Az esettel kapcsolatban további információt a rendszerünkön belül talál.";

    if ($smsChk == true) {
        $smstext = "Tisztelt Ügyfelünk! Az MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . " ügyszámú esetének állapota megváltozott. Az eset új állapota: " . $statustext . ". Az esettel kapcsolatban további információt a rendszerünkön belül talál. Üdvözlettel: A MyDroneService Csapata";
    } else {
        $smstext = null;
    }

    $notify->add($user["id"], $statustext, $mtext, $smstext, $serverurl .  "/dashboard/mycase/" . $case["id"], "Megtekintés", $statusicon);

    // Ügy jóváhagyva email értesítő
    if ($status === "2") {
        $to = $user["email"];
        $subject = "Teendők a további ügyintézéshez";

        $mtitle = "Tisztelt " . $user["firstname"] . "!";
        $mtext = null;

        $mtext .= "<p>Az MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . " ügyszámú esetének jóváhagyása kollégáink által megtörtént.</p>";

        if ($case["takeover"] == "courier") {
            $daddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["daddress"]]);
            $address = $daddress[0];
            $mtext .= "<p>Kollégáink hamarosan regisztrálják az eszközt a futárszolgálat rendszerébe, így az napokon belül felveszi Öntől a csomagot a megadott címen: <b>" . $address["postcode"] . " " . $address["city"] . ", " . $address["address"] . "</b></p>";
        }

        if ($case["takeover"] == "ars") {
            $mtext .= "<p>Eszközét kérjük hozza be a DJI ARS üzletbe nyitvatartási időben.<br>";
            $mtext .= "Az üzlet címe az alábbi: 1138 Budapest, Népfürdő utca 22. A épület Fsz.<br>";
            $mtext .= "Az üzlet nyitvatartása:<br><ul>";
            $mtext .= "<li>Hétfő - péntek: 10:00 - 18:00</li>";
            $mtext .= "<li>Szombat: 9:00 - 15:00</li>";
            $mtext .= "<li>Vasárnap: zárva</li></ul></p>";
        }

        if ($case["takeover"] == "duplitec") {
            $mtext .= "<p>Eszközét kérjük hozza be a MyDroneService szervizközpontba nyitvatartási időben.<br>";
            $mtext .= "A szervizközpont címe az alábbi: 1141 Budapest, Öv utca 35.<br>";
            $mtext .= "A szervizközpont nyitvatartása:<br><ul>";
            $mtext .= "<li>Hétfő - péntek: 8:30 - 17:00";
            $mtext .= "<li>Szombat és vasárnap: zárva</li></ul></p>";
        }

        $mtext .= "<p>Kérjük, hogy eszközét körültekintően csomagolja be. Szolgáltatásunk igénybevételéhez csak a hibás egységet juttassa el számunkra. Amennyiben a hiba megköveteli, az összes hibás egységet juttassa el hozzánk, például egy jelvesztéses hiba esetében a távirányítót is. Amennyiben garanciális ügyintézésünket veszi igénybe, kérjük juttassa el számunkra az eszközhöz tartozó számlát, és jótállási jegyet is. Ha ez nem megoldható, csatolja ezeket rendszerünkön belül az ügyhöz, a “Fájlok” menüpontban.</p>";

        $mtextbtn = "Belépés a rendszerbe";
        $murl = $serverurl;

        require 'sendmail.php';
    }

    header("Location: /dashboard/case/" . $case1);
    return;
}

if ($query == "modify") {
    $cid = $_GET["cid"];
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
    $casnumber = $_POST["casnumber"];
    $dhlnumber = $_POST["dhlnumber"];
    $glsnumber = $_POST["glsnumber"];

    $dbc->set("UPDATE cases SET type=? WHERE id=?",
        [$type, $cid]);
    $dbc->set("UPDATE cases SET care=? WHERE id=?",
        [$care, $cid]);
    $dbc->set("UPDATE cases SET sync=? WHERE id=?",
        [$sync, $cid]);
    $dbc->set("UPDATE cases SET djiuser=? WHERE id=?",
        [$djiuser, $cid]);
    $dbc->set("UPDATE cases SET problem=? WHERE id=?",
        [$problem, $cid]);
    $dbc->set("UPDATE cases SET date=? WHERE id=?",
        [$date, $cid]);
    $dbc->set("UPDATE cases SET location=? WHERE id=?",
        [$location, $cid]);
    $dbc->set("UPDATE cases SET sendback=? WHERE id=?",
        [$sendback, $cid]);
    $dbc->set("UPDATE cases SET price=? WHERE id=?",
        [$price, $cid]);
    $dbc->set("UPDATE cases SET payment=? WHERE id=?",
        [$payment, $cid]);
    $dbc->set("UPDATE cases SET takeover=? WHERE id=?",
        [$takeover, $cid]);

    $dbstatus = $dbc->get("SELECT * FROM casestatuses ORDER BY id DESC");
    $sid = $dbstatus[0]["id"] + 1;

    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$cid]);
    $case = $dbcase[0];

    if ($case["casnumber"] == null && $casnumber != null) {
        $status = "5";
        $dbc->set("UPDATE cases SET casnumber=? WHERE id=?",
            [$casnumber, $cid]);

        $dbc->set("INSERT INTO casestatuses (id, cid, status, date) VALUES (?, ?, ?, ?)",
            [$sid, $cid, $status, date("Y-m-d H:i:s")]);


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

        $mtext = "A MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . " ügyszámú esetének állapota megváltozott. Az eset új állapota: <b>" . $statustext . "</b>. Az esettel kapcsolatban további információt a rendszerünkön belül talál.";

        $notify->add($dbuser2[0]["id"], $statustext, $mtext, null, $serverurl .  "/dashboard/mycase/" . $case["id"], "Megtekintés", $statusicon);


    } else if ($glsnumber != null || $dhlnumber != null) {
        $dbc->set("UPDATE cases SET glsnumber=? WHERE id=?",
            [$glsnumber, $cid]);
        $dbc->set("UPDATE cases SET dhlnumber=? WHERE id=?",
            [$dhlnumber, $cid]);
    } else {
        $dbc->set("INSERT INTO casestatuses (id, cid, status, date) VALUES (?, ?, ?, ?)",
            [$sid, $cid, "17", date("Y-m-d H:i:s")]);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}

if ($query == "delete") {
    $cid = $_GET["cid"];

    $dbc->set("DELETE FROM cases WHERE id=?",
        [$cid]);

    $dbc->set("DELETE FROM casestatuses WHERE cid=?",
        [$cid]);

    $dbc->set("DELETE FROM messages WHERE cid=?",
        [$cid]);

    $dbinspection = $dbc->get("SELECT * FROM inspections WHERE cid=?", [$cid]);
    $uid = $dbinspection[0]["id"];

    $dbc->set("DELETE FROM inspections WHERE cid=?",
        [$dbinspection[0]["id"]]);

    $dbc->set("DELETE FROM parts WHERE iid=?",
        [$dbinspection[0]["id"]]);

    header('Location: /dashboard/cases/');
    return;
}

if ($query == "newscomment") {
    $sid = $_POST["sid"];
    $comment = $_POST["newcomment-" . $sid];

    $dbcomments = $dbc->get("SELECT * FROM statusnotes ORDER BY id DESC");
    $commentid = $dbcomments[0]["id"] + 1;

    $dbc->set("INSERT INTO statusnotes (id, sid, uid, note, date) VALUES (?, ?, ?, ?, ?)",
        [$commentid, $sid, $uid, $comment, date("Y-m-d H:i:s")]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}