<?php
$card = $dbc->get("SELECT * FROM tmkCards WHERE cardnumber=?", [$param[2]]);

if ($card[0]["id"] == null) {
    header("Location: /");
    return;
}

if ($card[0]["hash1"] != $param[3]) {
    header("Location: /");
    return;
}

if ($card[0]["hash2"] != $param[4]) {
    header("Location: /");
    return;
}

if ($card[0]["did"] == null) {
    require 'servicebookNewCard.php';
    return;
} else {
    require 'servicebookView.php';
    return;
}

?>
