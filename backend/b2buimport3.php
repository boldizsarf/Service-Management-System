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

//beszkennel minden partnert
foreach ($partners->partner as $partner) {
    echo $partner->Store . " processing. <br>";

    // lekéri az adott partner felhasználóját
    $dbusers = $dbc->get("SELECT * FROM users WHERE email=?", [$partner->StoreEmail]);

    // lekéri az összes kapcsolattartót
    $dbcontacts = $dbc->get("SELECT * FROM pcontacts WHERE name=?", [$partner->Store]);

    // végig megy az összes kapcsolattartón
    foreach ($dbcontacts as $contact) {
        //ha a kapcsolattartó uid -ja nem egyenlő az user uid -val akk törli
        if ($contact["uid"] != $dbusers[0]["id"]) {
            $dbc->set("DELETE FROM pcontacts WHERE id=?", [$contact["id"]]);
            echo $contact["uid"] . " deleted. <br>";
        }
    }
}