<?php
ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

$email = $_POST["email"];
$key1 = $_POST["key1"];
$key2 = $_POST["key2"];

$passwd = $_POST["passwd"];
$passwd2 = $_POST["passwd2"];

$dbpasswdgen = $dbc->get("SELECT * FROM passwdgen WHERE email=?", [$email]);

if ($passwd != $passwd2) {
    header("Location: /passwdreset/" . $email . "/" . $key1 . "/" . $key2 . "/2");
    return;
}

if ($dbpasswdgen[0]["email"] != $email) {
    header("Location: /login/");
    return;
}

if ($dbpasswdgen[0]["key1"] != $key1) {
    header("Location: /login/");
    return;
}

if ($dbpasswdgen[0]["key2"] != $key2) {
    header("Location: /login/");
    return;
}

$dbc->set("UPDATE users SET password=? WHERE email=?",
    [hash("sha256", $passwd), $email]);

$dbc->set("DELETE FROM passwdgen WHERE email=?",
    [$email]);

header("Location: /login/5");
return;