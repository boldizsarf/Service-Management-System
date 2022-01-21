<?php

session_start();
require 'dbc.php';

if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

$code = $_POST["code"];
$did = $_POST["did"];

$code1 = null;
$code2 = null;
$code3 = null;

$codeexp = explode('-', $code);

$code1 = $codeexp[0];
$code2 = $codeexp[1];
$code3 = $codeexp[2];

$card_count = $dbc->numRows("SELECT * FROM cards WHERE code1=? AND code2=? AND code3=?", [$code1, $code2, $code3]);

if ($card_count == 0) {
    header("Location: /dashboard/activate/" . $did . "/e/2");
    return;
}

$dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$did]);
$dbcards = $dbc->get("SELECT * FROM cards WHERE code1=? AND code2=? AND code3=?", [$code1, $code2, $code3]);
if ($dbdevice[0]["name"] != $dbcards[0]["device"]) {
    header("Location: /dashboard/activate/" . $did . "/e/3");
    return;
}

if ($dbcards[0]["used"] != null) {
    header("Location: /dashboard/activate/" . $did . "/e/4");
    return;
}

$dbc->set("UPDATE cards SET usedfor=? WHERE id=?",
    [$did, $dbcards[0]["id"]]);

$dbc->set("UPDATE cards SET used=? WHERE id=?",
    [date("Y-m-d H:i:s"), $dbcards[0]["id"]]);

header("Location: /dashboard/activate/" . $did . "/s/1");
return;