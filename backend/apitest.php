<?php
$url = $serverurl . '/api/';
$data = array('username' => $apiuser, 'token' => $apitoken, 'query' => "CB-48B36-D4735");

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

