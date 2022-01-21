<?php

use setasign\Fpdi\Fpdi;
ini_set('session.gc_probability', '0');
ini_set('session.gc_maxlifetime', '31536000');
ini_set('file_uploads', 'On');


if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

require 'fpdf/fpdf.php';
require 'fpdi/autoload.php';

$dbsuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$suser = $dbsuser[0];

$role = $dbsuser[0]["role"];

if ($role == 0) {
    echo "No permission";
    return;
}



// initiate FPDI
$pdf = new Fpdi();

$pdf->SetTitle("C" . $case["id"] . " átvételi lap", true);

// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('./../assets/atveteli.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0);
$pdf->SetFont('Arial','B',16);

$pdf->SetXY(162, 50.5);
$pdf->Write(0, "C" . $case["id"]);

$pdf->SetXY(60, 69.5);
$pdf->Write(0, $device["name"]);

foreach ($postacc as $accessory) {
    if ($accessory == "deviceitself") {
        $pdf->SetXY(60, 78);
        $pdf->Write(0, $device["serial"]);
    }
}

$pdf->SetFont('Arial','B',8);

$pdf->SetXY(60, 81.5);
$pdf->SetMargins(60, 0, 10);
$pdf->Write(5, utf8_decode($accs));

$pdf->SetXY(60, 101.5);
$pdf->Write(0, utf8_decode($user["lastname"]) .  " " . utf8_decode($user["firstname"]));

$pdf->SetXY(60, 107);
$pdf->Write(0, utf8_decode("Számlázási: ") . utf8_decode($daddress["country"]) . ", " . utf8_decode($daddress["postcode"]) .  " " . utf8_decode($daddress["city"]) . ", " . utf8_decode($daddress["address"]));

$pdf->SetXY(60, 112);
$pdf->Write(0, utf8_decode($user["phone"]));

$pdf->SetXY(60, 117.5);
$pdf->Write(0, utf8_decode($user["email"]));

$problem = str_replace("\n", " ", $case["problem"]);

$pdf->SetXY(27, 126);
$pdf->SetMargins(27, 0, 10);
$pdf->Write(5, utf8_decode($problem));

if ($case["care"] == 1) {
    $pdf->SetXY(114, 161);
    $pdf->Write(0, "X");
} else {
    $pdf->SetXY(134, 161);
    $pdf->Write(0, "X");
}

if ($case["type"] == "warranty") {
    $pdf->SetXY(114, 166);
    $pdf->Write(0, "X");
} else {
    $pdf->SetXY(134, 166);
    $pdf->Write(0, "X");
}

$pdf->SetXY(103, 176.5);
$pdf->Write(0, $case["djiuser"]);

$pdf->SetXY(103, 182);
$pdf->Write(0, $case["date"]);

$pdf->SetXY(103, 192.5);
$pdf->Write(0, utf8_decode($case["location"]));

if ($case["sync"] == 1) {
    $pdf->SetXY(134, 203);
    $pdf->Write(0, "X");
} else {
    $pdf->SetXY(172.5, 203);
    $pdf->Write(0, "X");
}



// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('./../assets/atveteli.pdf');
// import page 1
$tplIdx = $pdf->importPage(2);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0);

switch ($case["takeover"]) {
    case "duplitec":
        $pdf->SetXY(171, 134.5);
        $pdf->Write(0, "X");
        break;
    case "ars":
        $pdf->SetXY(171, 143);
        $pdf->Write(0, "X");
        break;
    case "courier":
        $pdf->SetXY(171, 152);
        $pdf->Write(0, "X");
        break;
}


switch ($case["payment"]) {
    case "cash":
        $pdf->SetXY(180, 183.7);
        $pdf->Write(0, "X");
        break;
    case "banktransfer":
        $pdf->SetXY(180, 189.1);
        $pdf->Write(0, "X");
        break;
    case "creditcard":
        $pdf->SetXY(180, 194.5);
        $pdf->Write(0, "X");
        break;
}

$pdf->SetXY(84, 205);
$pdf->Write(0, date("Y-m-d H:i:s"));


$pdf->Output();
?>