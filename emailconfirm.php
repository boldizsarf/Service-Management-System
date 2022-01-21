<?php

if (empty($param[2])) {
    header("Location: /");
    return;
}

if (empty($param[3])) {
    header("Location: /");
    return;
}

if (empty($param[4])) {
    header("Location: /");
    return;
}

$email = $param[2];
$key1 = $param[3];
$key2 = $param[4];

$dbmconfirm = $dbc->get("SELECT * FROM emailconfirm WHERE email=?", [$email]);

if ($dbmconfirm[0]["email"] != $email) {
    header("Location: /login/");
    return;
}

if ($dbmconfirm[0]["key1"] != $key1) {
    header("Location: /login/");
    return;
}

if ($dbmconfirm[0]["key2"] != $key2) {
    header("Location: /login/");
    return;
}

$dbc->set("UPDATE users SET emailconfirmed=? WHERE email=?",
    ["1", $email]);

$dbc->set("DELETE FROM emailconfirm WHERE email=?",
    [$email]);

header("Location: /login/7");
return;