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
        require 'newapcasemodules/dist.php';
        break;
    case 'duplitec':
        require 'newapcasemodules/newpduplicase.php';
        break;
    case 'magnew':
        require 'newapcasemodules/newpmagnewcase.php';
        break;
}