<?php

ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

// Add user
if ($_GET["q"] == "adduser") {

    // Változók
    $role = $_POST["role"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $country = $_POST["country"];
    $state = $_POST["state"];
    $postcode = $_POST["postcode"];
    $city = $_POST["city"];
    $addressname = $_POST["addressname"];
    $addresssuffix = $_POST["addresssuffix"];
    $housenumber = $_POST["housenumber"];
    $floor = $_POST["floor"];
    $door = $_POST["door"];

    // Cím összerakása
    $address = $addressname . " " . $addresssuffix . " " . $housenumber . ".";

    if (!(empty($floor))) {
        $address .= ", " . $floor . ". emelet";
    }

    if (!(empty($door))) {
        $address .= ", " . $door . ". ajtó";
    }

    // ID generálás
    $dbaddress = $dbc->get("SELECT * FROM addresses ORDER BY id DESC");
    $aid1 = $dbaddress[0]["id"] + 1;
    $aid2 = $dbaddress[0]["id"] + 2;

    $dbusers = $dbc->get("SELECT * FROM users ORDER BY id DESC");
    $uid = $dbusers[0]["id"] + 1;

    // Felvétel a DB -be
    $dbc->set("INSERT INTO users (id, firstname, lastname, email, phone, password, role, emailconfirmed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
        [$uid, $name, $name, $email, $phone, hash("sha256", "Duplitec1234"), $role, "1"]);

    $dbc->set("INSERT INTO addresses (id, uid, name, country, postcode, state, city, address, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
        [$aid1, $uid, $name, $country, $postcode, $state, $city, $address, "home"]);

    $dbc->set("INSERT INTO addresses (id, uid, name, country, postcode, state, city, address, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
        [$aid2, $uid, $name, $country, $postcode, $state, $city, $address, "billing"]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}

// Add device
if ($_GET["q"] == "adddevice") {

    // Változók
    $device = $_POST["device"];
    $serial = $_POST["serial"];
    $reseller = $_POST["reseller"];
    $enduser = $_POST["enduser"];
    $purchasedate = $_POST["purchasedate"];

    // ID generálás
    $dbdevice = $dbc->get("SELECT * FROM devices ORDER BY id DESC");
    $id = $dbdevice[0]["id"] + 1;

    $dbtmkconnect = $dbc->get("SELECT * FROM tmkUserToReseller ORDER BY id DESC");
    $connectid = $dbtmkconnect[0]["id"] + 1;

    $dbtmkddata = $dbc->get("SELECT * FROM tmkdevicedata ORDER BY id DESC");
    $dataid = $dbtmkddata[0]["id"] + 1;

    $dbtmkrepairs = $dbc->get("SELECT * FROM tmkrepairs ORDER BY id DESC");
    $repairsid = $dbtmkrepairs[0]["id"] + 1;

    // Felvétel a DB -be
    $dbc->set("INSERT INTO devices (id, uid, name, serial, dupli, added) VALUES (?, ?, ?, ?, ?, ?)",
        [$id, $enduser, $device, $serial, "1", date("Y-m-d H:i:s")]);

    $dbc->set("INSERT INTO tmkUserToReseller (id, uidReseller, uidUser) VALUES (?, ?, ?)",
        [$connectid, $reseller, $enduser]);

    $dbc->set("INSERT INTO tmkdevicedata (id, did, purchaseDate) VALUES (?, ?, ?)",
        [$dataid, $id, $purchasedate]);

    $dbc->set("INSERT INTO tmkrepairs (id, did) VALUES (?, ?)",
        [$repairsid, $id]);


    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}

// Add flight
if ($_GET["q"] == "addflight") {

    $did = $_POST["did"];
    $timeinmin = $_POST["timeinmin"];
    $date = $_POST["date"];

    $dbflights = $dbc->get("SELECT * FROM tmkflights ORDER BY id DESC");
    $fid = $dbflights[0]["id"] + 1;

    $dbc->set("INSERT INTO tmkflights (id, did, timeinmin, time, date) VALUES (?, ?, ?, ?, ?)",
        [$fid, $did, $timeinmin, $date, date("Y-m-d H:i:s")]);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}