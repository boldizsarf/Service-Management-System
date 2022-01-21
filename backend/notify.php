<?php
class notify
{
    public function add($uid, $shorttext, $emailtext, $smstext, $url, $btntext, $icon)
    {
        $dbc = new DBC();
        // Generál egy értesítés id -t
        $dbnotiid = $dbc->get("SELECT * FROM notifications ORDER BY id DESC");
        $id = $dbnotiid[0]["id"] + 1;

        // Lekéri az adatbázisból azt a felhasználót, akinek küldjük az értesítést
        $userfdb = $dbc->get("SELECT * FROM users WHERE id=?", [$uid]);
        $user = $userfdb[0];

        // Ha nincs megadva ikon, akkor az alapértelmezett a kérdőjel ikon
        if ($icon == null) {
            $icon = "fas fa-question";
        }

        // Értesítés létrehozása az adatbázisba
        $dbc->set("INSERT INTO notifications (id, uid, shorttext, emailtext, smstext, url, btntext, icon, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [$id, $uid, $shorttext, $emailtext, $smstext, $url, $btntext, $icon, date("Y-m-d H:i:s")]);

        // Ha meg van adva az $emailtext, akkor küldjön email értesítést
        if ($emailtext != null) {

            $to = $user["email"];
            $subject = $shorttext;

            $mtitle = "Tisztelt " . $user["firstname"] . "!";
            $mtext = $emailtext;
            $mtextbtn = $btntext;
            $murl = $url;

            require 'sendmail.php';
        }

        // Ha meg van adva az $smstext, akkor küldjön sms értesítést
        if ($smstext != null) {
            $postRequest = array(
                'recipients' => $user["phone"],
                'originator' => 'Duplitec',
                'body' => $smstext
            );

            $cURLConnection = curl_init('https://rest.messagebird.com/messages');
            curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
                'Authorization: AccessKey aaXOH0ivu54FmfyFLysp4kdS9'
            ));
            curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

            $apiResponse = curl_exec($cURLConnection);
            curl_close($cURLConnection);
        }
    }

}
$notify = new notify();