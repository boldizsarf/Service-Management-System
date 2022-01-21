<?php

if (empty($param[3])) {
    header("Location: /");
    return;
}

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$dbnotifyc = $dbc->get("SELECT * FROM notifications WHERE id=? AND uid=?", [$param[3], $dbuser[0]["id"]]);
$notifyc = $dbnotifyc[0];

if (empty($notifyc["id"])) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/">';
    return;
}

$dbc->set("UPDATE notifications SET viewed=? WHERE id=?",
    ["1", $param[3]]);

echo '<meta http-equiv="refresh" content="0; URL=' . $notifyc["url"] . '">';
return;