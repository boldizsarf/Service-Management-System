<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'dbc.php';
$partners = simplexml_load_file('./../db/partners.db');

foreach ($partners as $partner) {
    $dbusers = $dbc->get("SELECT * FROM users ORDER BY id DESC");
    $uid = $dbusers[0]["id"] + 1;

    $dbc->set("INSERT INTO users (id, firstname, lastname, email, phone, password, role, emailconfirmed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
        [$uid, $partner->Store, $partner->Name, $partner->StoreEmail, null, hash("sha256", $uid), "10", "1"]);

    $dbcontacts = $dbc->get("SELECT * FROM pcontacts ORDER BY id DESC");
    $contactid = $dbcontacts[0]["id"] + 1;

    $dbc->set("INSERT INTO pcontacts (id, uid, name, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)",
        [$contactid, $uid, $partner->ContactName, $partner->ContactEmail, $partner->ContactPhone, $partner->ContactAddress]);


    $mtitle = "Kedves " . $partner->Store . "!";
    $mtext = null;

    $mtext .= "<p>Szervizünk a mai naptól csak a rendszerünkön belül fogad eset lejelentéseket. Az ehhez szükséges felhaszálói fiókot létrehoztuk.</p>";

    $mtext .= "<hr>";

    $mtext .= "Partner neve: <b>" . $partner->Name . "</b><br/>";
    $mtext .= "Üzlet neve: <b>" . $partner->Store . "</b><br/><br/>";

    $mtext .= "Kapcsolattartó neve: <b>" . $partner->ContactName . "</b><br/>";
    $mtext .= "Kapcsolattartó email címe: <b>" . $partner->ContactEmail . "</b><br/>";
    $mtext .= "Kapcsolattartó telefonszáma: <b>" . $partner->ContactPhone . "</b><br/>";
    $mtext .= "Kapcsolattartó címe: <b>" . $partner->ContactAddress . "</b><br/><br/>";

    $mtext .= "Belépéshez szükséges email cím: <b>" . $partner->StoreEmail . "</b><br/>";
    $mtext .= "Belépéshez szükséges jelszó: <b>Kérjük az első belépés előtt egy jelszó emlékeztető segítségével hozzon létre fiókjának egy új jelszót.</b><br/>";


    $mtextbtn = "Belépés";
    $murl = $serverurl;

    $to = $partner->StoreEmail;
    $subject = "MDS Notice: Új B2B fiók létrehozva";

    require 'sendmail.php';

    echo "Created " . $partner->Store . "\n";
}