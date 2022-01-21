<?php

$devices = $dbc->get("SELECT * FROM devices");
$products = simplexml_load_file('../db/sn.xml');

foreach ($devices as $device) {
    $dbc->set("UPDATE devices SET serial=? WHERE id=?",
        [strtoupper($device["serial"]), $device["id"]]);
}

foreach ($devices as $device) {
    $dbc->set("UPDATE devices SET serial=? WHERE id=?",
        [str_replace("O", "0", $device["serial"]), $device["id"]]);
}

foreach ($devices as $device) {
    $dbc->set("UPDATE devices SET serial=? WHERE id=?",
        [str_replace("SN:", "", $device["serial"]), $device["id"]]);
}

foreach ($devices as $device) {
    $dbc->set("UPDATE devices SET serial=? WHERE id=?",
        [str_replace("SN: ", "", $device["serial"]), $device["id"]]);
}

foreach ($devices as $device) {
    foreach ($products->product as $product) {
        if ($product->sn == $device["serial"]) {
            $dbc->set("UPDATE devices SET dupli=? WHERE id=?",
                ["1", $device["id"]]);
        }
    }
}