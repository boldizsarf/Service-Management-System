<?php

require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

$firstname = $_POST["firstname"];
$lasttname = $_POST["lastname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$passwd = $_POST["passwd"];
$passwd2 = $_POST["passwd2"];

$country = $_POST["country"];
$state = $_POST["state"];
$postcode = $_POST["postcode"];
$city = $_POST["city"];
$addressname = $_POST["addressname"];
$addresssuffix = $_POST["addresssuffix"];
$housenumber = $_POST["housenumber"];
$floor = $_POST["floor"];
$door = $_POST["door"];

if ($passwd != $passwd2) {
    header("Location: /register/2");
    return;
}

$email_count = $dbc->numRows("SELECT * FROM users WHERE email=?", [$email]);

if ($email_count > 0) {
    header("Location: /register/3");
    return;
}

$address = $addressname . " " . $addresssuffix . " " . $housenumber . ".";

if (!(empty($floor))) {
    $address .= ", " . $floor . ". emelet";
}

if (!(empty($door))) {
    $address .= ", " . $door . ". ajtó";
}

$dbusers = $dbc->get("SELECT * FROM users ORDER BY id DESC");
$uid = $dbusers[0]["id"] + 1;

$dbaddress = $dbc->get("SELECT * FROM addresses ORDER BY id DESC");
$aid1 = $dbaddress[0]["id"] + 1;
$aid2 = $dbaddress[0]["id"] + 2;


$dbc->set("INSERT INTO users (id, firstname, lastname, email, phone, password, role, emailconfirmed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [$uid, $firstname, $lasttname, $email, $phone, hash("sha256", $passwd), "0", "0"]);

$dbc->set("INSERT INTO addresses (id, uid, name, country, postcode, state, city, address, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$aid1, $uid, $lasttname . " " . $firstname, $country, $postcode, $state, $city, $address, "home"]);

$dbc->set("INSERT INTO addresses (id, uid, name, country, postcode, state, city, address, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$aid2, $uid, $lasttname . " " . $firstname, $country, $postcode, $state, $city, $address, "billing"]);

$key1 = hash("sha256", rand(0, 10000));

$key2 = hash("sha256", rand(0, 10000));

$dbc->set("INSERT INTO emailconfirm (email, key1, key2) VALUES (?, ?, ?)",
    [$email, $key1, $key2]);

$to = $email;
$subject = "Kérjük erősítse meg email címét";

$mtitle = "Tisztelt " . $firstname . "!";
$mtext = "Köszönjük, hogy regisztrált a MyDroneService online rendszerébe! Ahhoz, hogy regisztrációját véglegesítse, s el tudja kezdeni használni felületünket, kérjük, erősítse meg az alábbi linkre kattintva email címét! ";
$mtextbtn = "Megerősítem";
$murl = $serverurl . "/emailconfirm/" . $email . "/" . $key1 . "/" . $key2;

require 'sendmail.php';

header("Location: /login/1");
return;