<?php

error_reporting(-1);
ini_set('display_errors', 'On');

//$to = "fodorboldi7@gmail.com";
//$subject = 'Teszt üzenet';
$headers = "From: \"MyDroneService\" <bot@mail.mydroneservice.hu>\r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

//$mtitle = "Teszt";
//$mtext = "Teszt";
//$mtextbtn = "Teszt";
//$murl = "Teszt";

ob_start();
require './../assets/emailtmp.php';
$message = ob_get_clean();
$message = wordwrap($message, 70, "\r\n");

mail($to, $subject, $message, $headers);