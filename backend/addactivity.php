<?php
$param = explode('/', $_SERVER['REQUEST_URI']);
if (isset($_SESSION["email"])) {
    if ($param[2] != "activity") {
        $aop = true;
        while ($aop) {
            try {
                $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                $dbact = $dbc->get("SELECT * FROM activity ORDER BY id DESC");
                $actid = $dbact[0]["id"] + 1;

                $ref = null;

                if (isset($_SERVER['HTTP_REFERER'])) {
                    $ref = $_SERVER['HTTP_REFERER'];
                }


                if (!(substr($_SERVER['REQUEST_URI'], -1) != "/")) {
                    $dbc->set("INSERT INTO activity (id, uid, page, referer, ip, date) VALUES (?, ?, ?, ?, ?, ?)",
                        [$actid, $dbuser[0]["id"], $_SERVER['REQUEST_URI'], $ref, $_SERVER['REMOTE_ADDR'], date("Y-m-d H:i:s")]);
                }

                if (strpos($_SERVER['REQUEST_URI'], "php")) {
                    $dbc->set("INSERT INTO activity (id, uid, page, referer, ip, date) VALUES (?, ?, ?, ?, ?, ?)",
                        [$actid, $dbuser[0]["id"], $_SERVER['REQUEST_URI'], $ref, $_SERVER['REMOTE_ADDR'], date("Y-m-d H:i:s")]);
                }

                $aop = false;
            } catch (exception $e) {
                $aop = true;
            }
        }
    }
}
