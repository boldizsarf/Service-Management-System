<?php

error_reporting(-1);
ini_set('display_errors', 'On');

use setasign\Fpdi\Fpdi;

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

require 'dbc.php';
require 'fpdf/fpdf.php';
require 'fpdi/autoload.php';

for ($i = 0; $i < 100; $i++){
    $dbcards = $dbc->get("SELECT * FROM tmkCards ORDER BY id DESC");
    $id = $dbcards[0]["id"] + 1;

    $num = sprintf("%05d", $id);

    //Tracking id generálása
    $uidhash = hash("sha256", $id);
    $pre1code = str_replace("o", "0", $uidhash);
    $pre2code = strtoupper($pre1code);
    $code1 = substr($pre2code, 0, 3);

    $cardnumber = "OSC" . $code1 . rand(0, 9) . $num . rand(0, 9);

    $hash1 = hash("sha256", random_bytes(256));
    $hash2 = hash("sha256", random_bytes(256));

    $date = date("Y-m-d H:i:s");

    $dbc->set("INSERT INTO tmkCards (id, cardnumber, hash1, hash2, date) VALUES (?, ?, ?, ?, ?)",
        [$id, $cardnumber, $hash1, $hash2, $date]);

    $url =  "https://tracking.mydroneservice.hu/servicebook/" . $cardnumber . "/" . $hash1 . "/" . $hash2;

    // initiate FPDI
    $pdf = new Fpdi();

    $pdf->SetTitle($cardnumber, true);

    // add a page
    $pdf->AddPage('L', array(110, 83));
    // set the source file
    $pdf->setSourceFile('./../assets/mds-service-card-2.pdf');
    // import page 1
    $tplIdx = $pdf->importPage(1);
    // use the imported page and place it at position 10,10 with a width of 100 mm
    $pdf->useTemplate($tplIdx, 0, 0);

    $pdf->Image('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($url),42.6,30.53,25,0,'PNG');

    $pdf->SetFont('Arial','B',14);

    $pdf->SetXY(52.5, 20.7);
    $pdf->SetMargins(50, 0, 10);
    $pdf->Write(5, utf8_decode($cardnumber));

    $filename= './../cards/mds-service-card-' . $id . '-' . $cardnumber . '.pdf';
    $pdf->Output($filename,'F');

}

echo "Done";
return;


