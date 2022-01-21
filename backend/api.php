<?php

$username = $_POST["username"];
$token = $_POST["token"];
$query = $_POST["query"];
$data = array();


$dbapiacces = $dbc->get("SELECT * FROM apiaccess WHERE username=? AND token=?", [$username, $token]);

if (empty($dbapiacces[0]["id"])) {
    $data["Error"] = "Access denied!";
}

if (substr( $query, 0, 2 ) == "CB") {
    require 'api/b2b.php';
}

// Adat kiírása
header('Content-type: text/javascript; charset=utf-8');
echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
return;

?>