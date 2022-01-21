<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require 'track.class.php';

$track = new Tracktry;
$track = $track->getSingleTrackingResult('gls','916152106','en');

header('Content-type: text/javascript; charset=utf-8');
echo json_encode($track, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);