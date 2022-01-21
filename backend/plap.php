<?php

use setasign\Fpdi\Fpdi;
ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}
require 'dbc.php';
require 'fpdf/fpdf.php';
require 'fpdi/autoload.php';

$dbsuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$suser = $dbsuser[0];

$role = $dbsuser[0]["role"];

if ($role == 0) {
    echo "No permission";
    return;
}

$trackingid = $_POST["trackingid"];

$url = $serverurl . '/api/';
$data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $trackingid);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$case = json_decode($result, true);


// initiate FPDI
$pdf = new Fpdi();

$pdf->SetTitle($case["TrackingID"] . " Szervizlap", true);

// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('./../assets/plap.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0);

$pdf->Image('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($serverurl . '/quicktrack/' . $case["TrackingID"]),8,8,38,0,'PNG');

$pdf->SetFont('Arial','B',12);

$pdf->SetXY(48, 56);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["TrackingID"]));

$pdf->SetXY(48, 64);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["ExternalID"]));

$pdf->SetXY(48, 80);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Device"]["Name"]));

$pdf->SetXY(48, 88);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Device"]["SerialNumber"]));

$pdf->SetXY(48, 96);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Problem"]["Description"]));

$pdf->SetXY(48, 112);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Partner"]["Name"]));

$pdf->SetXY(48, 120);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Partner"]["Store"]));

$pdf->SetXY(48, 136);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Partner"]["Contact"]["Name"]));

$pdf->SetXY(48, 144);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Partner"]["Contact"]["Email"]));

$pdf->SetXY(48, 152);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Partner"]["Contact"]["Phone"]));

$pdf->SetXY(48, 160);
$pdf->SetMargins(48, 0, 10);
$pdf->Write(5, utf8_decode($case["Partner"]["Contact"]["Address"]));


$pdf->Output();
?>