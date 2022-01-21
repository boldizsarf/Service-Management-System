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
        require 'newpcasemodules/dist.php';
        break;
    case 'duplitec':
        require 'newpcasemodules/newpduplicase.php';
        break;
    case 'magnew':
        require 'newpcasemodules/newpmagnewcase.php';
        break;
}