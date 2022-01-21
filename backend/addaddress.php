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

$name = $_POST["name"];
$country = $_POST["country"];
$state = $_POST["state"];
$postcode = $_POST["postcode"];
$city = $_POST["city"];
$addressname = $_POST["addressname"];
$addresssuffix = $_POST["addresssuffix"];
$housenumber = $_POST["housenumber"];
$floor = $_POST["floor"];
$door = $_POST["door"];
$type = $_POST["type"];
$taxnumber = $_POST["taxnumber"];

$address = $addressname . " " . $addresssuffix . " " . $housenumber . ".";

if (!(empty($floor))) {
    $address .= ", " . $floor . ". emelet";
}

if (!(empty($door))) {
    $address .= ", " . $door . ". ajtó";
}

$dbaddress = $dbc->get("SELECT * FROM addresses ORDER BY id DESC");
$id = $dbaddress[0]["id"] + 1;

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);

$dbc->set("INSERT INTO addresses (id, uid, name, taxnumber, country, postcode, state, city, address, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$id, $dbuser[0]["id"], $name, $taxnumber, $country, $postcode, $state, $city, $address, $type]);

header("Location: /dashboard/myaddresses");
return;