<?php

session_start();
require 'dbc.php';

if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

if ($dbuser[0]["role"] == 0) {
    header("Location: /dashboard/home");
    return;
}

$qty = $_POST["qty"];
$product = $_POST["product"];
$device = $_POST["device"];
$date = date("Y-m-d H:i:s");

for ($x = 1; $x <= $qty; $x++) {
    $dbcards = $dbc->get("SELECT * FROM cards ORDER BY id DESC");
    $cardid = $dbcards[0]["id"] + 1;

    $precode = hash("sha256", $cardid + rand(1, 1000));
    $pre2code = str_replace("o", "0", $precode);
    $pre3code = strtoupper($pre2code);

    $code1 = substr($pre3code, rand(0, 25), "5");
    $code2 = substr($pre3code, rand(20, 40), "5");
    $code3 = substr($pre3code, rand(30, 55), "5");

    $dbc->set("INSERT INTO cards (id, device, code1, code2, code3, date, usedfor, used, generatedby, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
        [$cardid, $device, $code1, $code2, $code3, $date, null, null, $uid, $product]);
}

header("Location: /dashboard/cards");
return;
