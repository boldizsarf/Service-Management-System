<?php

error_reporting(-1);
ini_set('display_errors', 'On');

ini_set('memory_limit', '-1');

if (strtotime("2020-08-31 09:15:00") > strtotime(date("Y-m-d H:i:s"))) {
    require 'coming/coming.php';
    return;
}

if ($_SERVER['SERVER_NAME'] == "tracking.dupliglobal.com") {
    header("Location: https://tracking.mydroneservice.hu/");
    return;
}


error_reporting(-1);
ini_set('display_errors', 'On');

ini_set("allow_url_fopen", 1);

ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();

setlocale(LC_MONETARY, 'hu_HU');

require 'backend/dbc.php';

$maintenance = false;
if ($maintenance) {
    echo "Az oldalon jelenleg karbantartást végzünk! Kérjük szíves türelmét, és megértését!";
    return;
}

if (isset($_GET['fbclid'])) {
    header("Location: /");
    return;
}

$param = explode('/', $_SERVER['REQUEST_URI']);

if ($param[1] == "cron") {
    header("Location: /backend/cron.php");
    return;
}

if ($param[1] == "api") {
    require 'backend/api.php';
    return;
}

if ($param[1] == "ping") {
    require 'backend/ping.php';
    return;
}

if ($param[1] == "setlang") {
    require 'setlang.php';
    return;
}

if (isset($_COOKIE["sw_lang"])) {
    $lang = simplexml_load_file('lang/' . $_COOKIE["sw_lang"] . '.db');
} else {
    header("Location: /setlang/hu");
    return;
}

if ($param[1] == "quicktrack") {
    require 'quicktrack.php';
    return;
}

if ($param[1] == "servicebook") {
    require 'servicebook.php';
    return;
}

if ($param[1] == "contract") {
    require 'contract.php';
    return;
}

if ($param[1] == "changelog") {
    require 'changelog.php';
    return;
}

if (substr($_SERVER['REQUEST_URI'], -1) != "/") {
    header("Location: " . $_SERVER['REQUEST_URI'] . "/");
}


if (isset($_SESSION["email"])) {
    if ($param[1] != "dashboard") {
        header("Location: /dashboard");
        return;
    }
}

if (empty($param[1])) {
    header("Location: /home");
}

if ($param[1] == "stolen") {
    require 'stolen.php';
    return;
}

switch ($param[1]) {
    default:
        require '404.php';
        break;
    case 'home':
        header("Location: /login");
        break;
    case 'login':
        require 'login.php';
        break;
    case 'lostpass':
        require 'lostpass.php';
        break;
    case 'passwdreset':
        require 'passwdreset.php';
        break;
    case 'emailconfirm':
        require 'emailconfirm.php';
        break;
    case 'register':
        require 'register.php';
        break;
    case 'contract':
        require 'contract.php';
        break;
    case 'dashboard':
        require 'dashboard.php';
        break;
    case 'show':
        require 'show.php';
        break;
}
