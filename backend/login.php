<?php
ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

$email = $_POST["email"];
$passwd = $_POST["passwd"];

$email_count = $dbc->numRows("SELECT * FROM users WHERE email=?", [$email]);

if ($email_count == 0) {
    header("Location: /login/2");
    return;
}

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$email]);

if ($dbuser[0]['emailconfirmed'] == "0") {
    header("Location: /login/8");
    return;
}

if ($dbuser[0]['banned'] == "1") {
    header("Location: /login/9");
    return;
}

$dblogs = $dbc->get("SELECT * FROM loginlog ORDER BY id DESC");
$id = $dblogs[0]["id"] + 1;

if (hash("sha256", $passwd) != $dbuser[0]['password']) {
    $dbc->set("INSERT INTO loginlog (id, user, attempt, useragent, ip, forwardedfor, date) VALUES (?, ?, ?, ?, ?, ?, ?)",
        [$id, $email, 0, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_X_FORWARDED_FOR'], date("Y-m-d H:i:s")]);
    header("Location: /login/3");
    return;
}

$_SESSION["email"] = $email;
$_SESSION["SYSTEM"] = "allowed";
$dbc->set("INSERT INTO loginlog (id, user, attempt, useragent, ip, forwardedfor, date) VALUES (?, ?, ?, ?, ?, ?, ?)",
    [$id, $email, 1, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_X_FORWARDED_FOR'], date("Y-m-d H:i:s")]);

header("Location: /dashboard");
return;