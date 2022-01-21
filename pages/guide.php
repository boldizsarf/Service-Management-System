<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

switch ($param[3]) {
    default:
        require 'guidemodules/selector.php';
        break;
    case 'shiny':
        require 'guidemodules/shiny.php';
        break;
    case 'water':
        require 'guidemodules/water.php';
        break;
    case 'spot':
        require 'guidemodules/spot.php';
        break;
    case 'rc':
        require 'guidemodules/rc.php';
        break;
    case 'tello':
        require 'guidemodules/tello.php';
        break;
    case 'battery':
        require 'guidemodules/battery.php';
        break;
}