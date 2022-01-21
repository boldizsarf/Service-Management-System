<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$param = explode('/', $_SERVER['REQUEST_URI']);

setcookie("sw_lang", $param[2], time() + (86400 * 30), "/");

header("Location: /");
return;