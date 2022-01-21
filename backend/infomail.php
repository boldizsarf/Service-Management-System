<?php

require 'dbc.php';

$count = 0;

$dbdata = $dbc->get("SELECT * FROM cases");
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);

        $mtitle = "Kedves " . $dbuser[0]["firstname"] . "!";
        $mtext = null;

        $mtext .= "Szervizünkben január 7-től személyes ügyintézés céljából is újra várjuk régi és leendő ügyfeleinket!
        Emellett örömünkre szolgál bejelenteni új szolgáltatásainkat: a szervizben elindult a kártyás fizetés, amelyet immár nem csak a szakszerű javítások ellentételezésére, de mostantól alkatrészek és termék vásárlására is lehet használni!
        Várjuk ügyfeleinket!<br/><br/>";

        $mtextbtn = "Tovább a weboldalunkra";
        $murl = "https://mydroneservice.hu/";

        $to = $dbuser[0]["email"];
        $subject = "MyDroneService személyes ügyfélfogadás";

        require 'sendmail.php';
        echo "Email sent to <b>" . $to . "</b><br/>";

        $count++;
    }
}

echo "Összesen <b>" . $count . "</b> email<br/>";
