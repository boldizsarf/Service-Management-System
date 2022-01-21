<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://qrcode-monkey.p.rapidapi.com/qr/custom?data=https%3A%2F%2Fwww.qrcode-monkey.com&size=600&file=png&config=%7B%22bodyColor%22%3A%20%22%230277BD%22%2C%20%22body%22%3A%22mosaic%22%7D",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: qrcode-monkey.p.rapidapi.com",
        "x-rapidapi-key: b796721a16msha5364d1c8a1dbf6p1e679djsnd0020e34d40f"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}