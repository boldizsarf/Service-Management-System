<?php
// Header
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('file_uploads', 'On');

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}

require 'dbc.php';

// API lekérése

$file = "https://dev.tracking.dupliglobal.com/assets/testpdf.pdf";
$url = "https://api.ocr.space/parse/imageurl?apikey=cb90b29cfe88957&url=" . $file . "&OCREngine=2";

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST'
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url);

$ocr = json_decode($result, true);

//echo $ocr["ParsedResults"][0]["ParsedText"];

$text = $ocr["ParsedResults"][0]["ParsedText"];

// Változók beolvasása

$sku_pre1 = explode(': P', $text);
$sku_pre2 = explode(')', $sku_pre1[1]);

$sku = $sku_pre2[0];

$buydate_pre1 = explode('dopontja [2]: ', $text);
$buydate_pre2 = explode('Kifog', $buydate_pre1[1]);

$buydate = str_replace("-", ".", str_replace("D", "0", $buydate_pre2[0]));

$createdate_pre1 = explode('bejelentésének idöpontja: ', $text);
$createdate_pre2 = explode(' ', $createdate_pre1[1]);

$createdate = str_replace("-", ".", str_replace("D", "0", $createdate_pre2[0]));

$shopdata_pre1 = explode('aruhaz adatal: ', $text);
$shopdata_pre2 = explode('A TermeK', $shopdata_pre1[1]);

$shopdata1 = explode(" ", $shopdata_pre2[0]);
$e = -1;
foreach ($shopdata1 as $shopdata1e) {
    $e++;
}
$shopemail = $shopdata1[$e];


$ecasenumber_pre1 = explode('#', $text);
$ecasenumber_pre2 = explode('.', $ecasenumber_pre1[1]);

$ecasenumber = $ecasenumber_pre2[0];

$problem_pre1 = explode('Kifogas leiràsa:', $text);
$problem_pre2 = explode('Fogyasztó', $problem_pre1[1]);

$problem = $problem_pre2[0];

// Ügy létrehozása

$dbuser = $dbc->get("SELECT * FROM pcontacts WHERE email=?", [$shopemail]);
$uid = $dbuser[0]["uid"];

$dbpcase = $dbc->get("SELECT * FROM pcases ORDER BY id DESC");

$id = $dbpcase[0]["id"] + 1;

$cname = $dbuser[0]["name"];
$cemail = $dbuser[0]["email"];
$cphone = $dbuser[0]["phone"];
$caddress = $dbuser[0]["address"];

$etrackid = $ecasenumber;

$purchasedate = $buydate;

$submitdate = $createdate;

$handlingway = "1";
$courier = "0";
$senddate = date("Y-m-d H:i:s");

$problemdate = $_POST["problemdate"];

$problemdesc = $problem;

$products = simplexml_load_file('../db/Products.xml');
foreach ($products->Product as $product) {
    if ($product->sku == $sku) {
        $device = $product->name;
        if ($product->forg == "MG") {
            $distributor = "magnew";
        } else {
            $distributor = "duplitec";
        }
    }
}

$sn = "";
$note = "";
$date = date("Y-m-d H:i:s");

//Tracking id generálása
$uidhash = hash("sha256", $uid);
$pre1code = str_replace("o", "0", $uidhash);
$pre2code = strtoupper($pre1code);
$code1 = substr($pre2code, 0, 5);

$uidhash = hash("sha256", $id);
$pre1code2 = str_replace("o", "0", $uidhash);
$pre2code2 = strtoupper($pre1code2);
$code2 = substr($pre2code2, 0, 5);

$trackid = "CB-" . $code1 . '-' . $code2;

$dbc->set("INSERT INTO pcases (id, trackid, cname, cemail, cphone, caddress, etrackid, purchasedate, submitdate, handlingway, courier, senddate, problemdate, problemdesc, device, sn, note, distributor, uid, date, branch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
    [$id, $trackid, $cname, $cemail, $cphone, $caddress, $etrackid, $purchasedate, $submitdate, $handlingway, $courier, $senddate, $problemdate, $problemdesc, $device, $sn, $note, $distributor, $uid, $date, "submitted"]);

$dbstatus = $dbc->get("SELECT * FROM pcasestatuses ORDER BY id DESC");
$sid = $dbstatus[0]["id"] + 1;
$dbc->set("INSERT INTO pcasestatuses (id, pcid, status, date) VALUES (?, ?, ?, ?)",
    [$sid, $id, 1, date("Y-m-d H:i:s")]);

return;