<?php
error_reporting(-1);
ini_set('display_errors', 'On');

if (file_exists('show/' . $param[2] . '/index.php')) {
    require 'show/' . $param[2] . '/index.php';
} else {
    header("Location: /404");
    return;
}