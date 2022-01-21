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

$partners = simplexml_load_file('./../db/gar.xml');


foreach ($partners->partner as $partner) {
    echo $partner->Store . " processing. <br>";
    $email_count = $dbc->numRows("SELECT * FROM users WHERE email=?", [$partner->StoreEmail]);

    if ($email_count < 1) {
        $dbusers = $dbc->get("SELECT * FROM users ORDER BY id DESC");
        $uid = $dbusers[0]["id"] + 1;

        $partnerName = $partner->Name;

        if (strpos($partnerName, "MM") !== false) {
            $partnerName = "MediaMarkt";
        }

        if (strpos($partnerName, "Euronics") !== false) {
            $partnerName = "Euronics";
        }

        $dbc->set("INSERT INTO users (id, firstname, lastname, email, phone, password, role, emailconfirmed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [$uid, $partner->Store, $partnerName, $partner->StoreEmail, "0", hash("sha256", "SilverWolf2003"), "10", "1"]);

        $dbcontacts = $dbc->get("SELECT * FROM pcontacts ORDER BY id DESC");
        $contctid = $dbcontacts[0]["id"] + 1;

        $dbc->set("INSERT INTO pcontacts (id, uid, name, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)",
            [$contctid, $uid, $partner->Store, $partner->StoreEmail, $partner->ContactPhone, $partner->ContactAddress]);

        echo $partner->Store . " added. <br>";
    } else {
        $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$partner->StoreEmail]);
        if ($dbuser[0]["phone"] == 0) {
            $dbc->set("UPDATE users SET phone=? WHERE email=?",
                [$partner->No, $partner->StoreEmail]);
        }
    }
}