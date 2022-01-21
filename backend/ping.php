<?php

if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

if ($dbuser[0]["role"] != 0) {
    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
    $uid = $dbuser[0]["id"];

    $dbpings = $dbc->get("SELECT * FROM onlineping ORDER BY id DESC");
    $pingid = $dbpings[0]["id"] + 1;

    $date = date("Y-m-d H:i:s");

    $dbc->set("INSERT INTO onlineping (id, uid, time) VALUES (?, ?, ?)",
        [$pingid, $uid, $date]);

    return;
}