<?php

ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

$email = $_POST["email"];

$dbchk1 = $dbc->get("SELECT * FROM users WHERE email=?", [$email]);

if (empty($dbchk1[0]["id"])) {
    header("Location: /lostpass/2");
    return;
}

if ($dbchk1[0]['emailconfirmed'] == "0") {
    header("Location: /lostpass/3");
    return;
}

$key1 = hash("sha256", rand(0, 10000));

$key2 = hash("sha256", rand(0, 10000));

$dbc->set("DELETE FROM passwdgen WHERE email=?",
    [$email]);

$dbc->set("INSERT INTO passwdgen (email, key1, key2) VALUES (?, ?, ?)",
    [$email, $key1, $key2]);

$to = $email;
$subject = "Duplitec Service Management System jelszó helyreállítás";

$mtitle = "Tisztelt Ügyfelünk!";
$mtext = "A jelszavának helyreállítását megteheti amennyiben az alábbi gombra kattint. Amennyiben nem kért jelszó helyreállítást, kérjük hagyja figyelmen kívül ezt az emailt.";
$mtextbtn = "Jelszó helyreállÍtása";
$murl = $serverurl . "/passwdreset/" . $email . "/" . $key1 . "/" . $key2;

require 'sendmail.php';

unset($_SESSION["email"]);

header("Location: /login/4");
return;