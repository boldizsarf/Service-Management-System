<div class="tab-pane fade active show" id="status" role="tabpanel" aria-labelledby="status-casetabs">
    <div class="row centered">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $lang->status; ?></h4>
                </div>
                <div class="card-body">
                    <center>
                        <?php
                        $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id ASC", [$param[3]]);
                        $statuses = simplexml_load_file('db/statuses.db');
                        $lngcd = strval($_COOKIE["sw_lang"]);
                        foreach ($dbstatus as $status) {
                            foreach ($statuses->status as $xmlstatus) {
                                if ($xmlstatus["id"] == $status["status"]) {
                                    $statustext = $xmlstatus->$lngcd;
                                    $statuscolor = $xmlstatus->color;
                                    $statusicon = $xmlstatus->icon;
                                }
                            }
                        }
                        ?>
                        <h4 class="<?php echo $statuscolor; ?>"><?php echo $statustext; ?></h4>
                        <i class="<?php echo $statusicon; ?> <?php echo $statuscolor; ?>" style="font-size: 1000%;"></i>
                        <br/><br/>
                        <script type="text/javascript">
                            function refreshClick() {
                                swal({
                                    title: 'Biztos, hogy frissíted az ügy állapotát?',
                                    icon: 'warning',
                                    buttons: true,
                                    dangerMode: true,
                                })
                                    .then((willAdd) => {
                                        if (willAdd) {
                                            document.getElementById("refreshform").submit();
                                        }
                                    });
                            }
                        </script>
                        <form id="refreshform" method="POST" action="/backend/mdcs.php?q=e218bd0daa57accfca47805e412f122c8c0675efca4a4e2b838fd7a1270fbf60">
                            <input type="text" class="form-control" name="case" id="case" value="<?php echo $dbcase[0]["id"]; ?>" hidden>
                            <div class="form-group col-12 text-left">
                                <label class="form-label"><?php echo $lang->status; ?><span class="text-primary mb-2">*</span>
                                    <?php
                                    if ($dbuser[0]['role'] == 5 || $dbuser[0]['role'] == 8) {
                                        echo '- <a href="/dashboard/case/' . $param[3] . '/god">Godmode</a>';
                                    }
                                    ?>
                                </label>
                                <select class="form-control select2" name="status" id="status" required>
                                    <?php

                                    if ($param[4] == "god") {
                                        if ($dbuser[0]['role'] == 5 || $dbuser[0]['role'] == 8) {
                                            $statuses = simplexml_load_file('db/statuses.db');
                                            $lngcd = strval($_COOKIE["sw_lang"]);
                                            foreach ($statuses->status as $status) {
                                                echo " <option value='" . $status["id"] . "'>" . $status->$lngcd . "</option>";
                                            }
                                        }
                                    } else {
                                        $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$param[3]]);
                                        $statuses = simplexml_load_file('db/statuses.db');
                                        $lngcd = strval($_COOKIE["sw_lang"]);
                                        $nextsids = array();
                                        if ($dbstatus[0]["status"] != 17) {
                                            foreach ($statuses->status as $status) {
                                                if ($dbstatus[0]["status"] == $status["id"]) {
                                                    foreach ($status->nextsids->sid as $nextsid) {
                                                        array_push($nextsids, $nextsid);
                                                    }
                                                }
                                            }
                                        } else {
                                            foreach ($statuses->status as $status) {
                                                if ($dbstatus[1]["status"] == $status["id"]) {
                                                    foreach ($status->nextsids->sid as $nextsid) {
                                                        array_push($nextsids, $nextsid);
                                                    }
                                                }
                                            }
                                        }

                                        $statuses = simplexml_load_file('db/statuses.db');
                                        $lngcd = strval($_COOKIE["sw_lang"]);
                                        foreach ($statuses->status as $status) {
                                            foreach ($nextsids as $nextsidfromarr) {
                                                if (intval($status["id"]) == intval($nextsidfromarr)) {
                                                    echo " <option value='" . $status["id"] . "'>" . $status->$lngcd . "</option>";
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <option disabled selected hidden></option>
                                </select>
                            </div>
                            <div class="form-group col-12 text-left">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="smsChk" name="smsChk">
                                    <label class="form-check-label" for="smsChk">
                                        <?php
                                        $cURLConnection = curl_init();

                                        curl_setopt($cURLConnection, CURLOPT_URL, 'https://rest.messagebird.com/balance');
                                        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
                                            'Authorization: AccessKey aaXOH0ivu54FmfyFLysp4kdS9'
                                        ));
                                        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

                                        $smsBalance = curl_exec($cURLConnection);
                                        curl_close($cURLConnection);
                                        $smsJson = json_decode($smsBalance, true);
                                        ?>
                                        SMS értesítő (Egyenleg: <?php echo $smsJson['amount'] . " " . $smsJson['type']; ?>)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-12 text-left">
                                <a onclick="refreshClick()" href="#" type="submit" class="btn btn-primary btn-lg btn-block">
                                    <?php echo $lang->refresh; ?>
                                </a>
                            </div>
                        </form>
                        <form method="post" action="/backend/atveteli.php" target="_blank">
                            <input type="text" class="form-control" name="cid" id="cid" value="<?php echo $param[3]; ?>" hidden>
                            <div class="form-group col-12 text-left">
                                <label>Leadott elemek</label>
                                <select id="accessoriesatveteli[]" name="accessoriesatveteli[]" class="form-control select2" multiple="">
                                    <?php
                                    $dbaccessory = $dbc->get("SELECT * FROM accessories WHERE did=?", [$case["device"]]);
                                    echo "<option value='deviceitself'>" . $device["name"] . ": " . $device["serial"] . "</option>";
                                    foreach ($dbaccessory as $accessory) {
                                        echo "<option>" . $accessory["type"] . ": " . $accessory["serial"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-12 text-left">
                                <button name="action" type="submit" value="new" class="btn btn-primary btn-lg btn-block">
                                    1. Szerviz Átvételi Lap
                                </button>
                                <button name="action" type="submit" value="end" class="btn btn-primary btn-lg btn-block" <?php if (empty($dbendtest[0]["id"]) || $dbendtest[0]["confirmUser"] == null) { echo "disabled"; } ?>>
                                    2. Szerviz Átadási Lap
                                </button>
                                <button name="action" type="submit" value="old" class="btn btn-primary btn-lg btn-block" hidden>
                                    Régi Szerviz Átvételi Lap
                                </button>
                            </div>
                        </form>

                        <?php
                        $glshidden = "";
                        $dbdaddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["daddress"]]);
                        if (empty($dbdaddress[0])) {
                            $glshidden = "hidden";
                        }
                        ?>

                        <form method="post" action="/backend/glsapi.php">
                            <div class="form-group col-12 text-left" <?php echo $glshidden; ?>>
                                <label>Futár rendelés</label>
                                <input type="text" name="cid" id="cid" value="<?php echo $param[3]; ?>" hidden>
                                <input type="text" name="name" id="name" value="<?php echo $duser["lastname"] . " " . $duser["firstname"]; ?>" hidden>
                                <input type="text" name="phone" id="phone" value="<?php echo $duser["phone"]; ?>" hidden>
                                <input type="text" name="email" id="email" value="<?php echo $duser["email"]; ?>" hidden>
                                <?php
                                $daddress = null;
                                $postcode = null;
                                $city = null;
                                $address = null;
                                if ($case["daddress"] != 0) {
                                    $dbdaddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["daddress"]]);

                                    $daddress = $dbdaddress[0];
                                    $postcode = $daddress["postcode"];
                                    $city = $daddress["city"];
                                    $address = $daddress["address"];

                                    $addressBlocks = explode(", ", $address);

                                    $streetBlocks = explode(" ", $addressBlocks[0]);

                                    $housenumber = str_replace(".", "", $streetBlocks[count($streetBlocks)-1]);

                                    $street = null;

                                    foreach ($streetBlocks as $streetBlock) {
                                        if ($streetBlock != $streetBlocks[count($streetBlocks)-1]) {
                                            $street .= $streetBlock . " ";
                                        }
                                    }

                                    if (substr($street, -1) == " ") {
                                        $street = substr($street, 0, -1);
                                    }

                                    $addressEnd = null;

                                    if (isset($addressBlocks[1])) {
                                        $addressEnd .= $addressBlocks[1];
                                    }

                                    if (isset($addressBlocks[2])) {
                                        $addressEnd .= " " . $addressBlocks[2];
                                    }
                                }
                                ?>
                                <input type="text" name="postcode" id="postcode" value="<?php echo $postcode; ?>" hidden>
                                <input type="text" name="city" id="city" value="<?php echo $city; ?>" hidden>
                                <input type="text" name="street" id="street" value="<?php echo $street; ?>" hidden>
                                <input type="text" name="housenumber" id="housenumber" value="<?php echo $housenumber; ?>" hidden>
                                <input type="text" name="addressend" id="addressend" value="<?php echo $addressEnd; ?>" hidden>

                                <?php
                                $beDis = "disabled";
                                if (file_exists("uploads/" . hash("sha256", $param[3]) . "/GLS_C" . $param[3] . "_BE.pdf")) {
                                    $beDis = "disabled";
                                }
                                ?>
                                <button name="action" type="submit" value="client-to-mds" class="btn btn-primary btn-lg btn-block" <?php echo $beDis; ?>>
                                    GLS futár rendelés - Ügyfél to MDS
                                </button>

                                <?php
                                $kiDis = "disabled";
                                if (file_exists("uploads/" . hash("sha256", $param[3]) . "/GLS_C" . $param[3] . "_KI.pdf")) {
                                    $kiDis = "disabled";
                                }
                                ?>
                                <button name="action" type="submit" value="mds-to-client" class="btn btn-primary btn-lg btn-block" <?php echo $kiDis; ?>>
                                    GLS futár rendelés - MDS to Ügyfél
                                </button>
                            </div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="activities">
                <?php
                $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$param[3]]);
                $statuses = simplexml_load_file('db/statuses.db');
                $lngcd = strval($_COOKIE["sw_lang"]);
                foreach ($dbstatus as $status) {
                    foreach ($statuses->status as $xmlstatus) {
                        if ($xmlstatus["id"] == $status["status"]) {
                            $statustext = $xmlstatus->$lngcd;
                            $statuscolor = $xmlstatus->color;
                            $statusicon = $xmlstatus->icon;
                        }
                    }

                    if ($status["uid"] != null) {
                        $dbstatususer = $dbc->get("SELECT * FROM users WHERE id=? ORDER BY id DESC", [$status["uid"]]);
                        $statususer = "- " . $dbstatususer[0]["lastname"] . ' ' . $dbstatususer[0]["firstname"];
                    } else {
                        $dbactivity = $dbc->get("SELECT * FROM activity WHERE date=? ORDER BY id DESC", [$status["date"]]);
                        if (isset($dbactivity[0]["uid"])) {
                            $dbstatususer = $dbc->get("SELECT * FROM users WHERE id=? ORDER BY id DESC", [$dbactivity[0]["uid"]]);
                            $statususer = "- " . $dbstatususer[0]["lastname"] . ' ' . $dbstatususer[0]["firstname"];
                        } else {
                            $statususer = "";
                        }
                    }

                    echo "                                            <div class=\"activity\">\n";
                    echo "                                                <div class=\"activity-icon bg-primary text-white shadow-primary\">\n";
                    echo "                                                    <i class=\"" . $statusicon . "\"></i>\n";
                    echo "                                                </div>\n";
                    echo "                                                <div class=\"activity-detail col-9\">\n";
                    echo "                                                    <div class=\"mb-2\">\n";
                    echo "                                                        <span class=\"text-job\">" . $status["date"] . " " . $statususer . "</span>\n";
                    echo "                                                    </div>\n";
                    echo "                                                    <p style='margin-bottom: 10px;'>" . $statustext . "</p>\n";

                    $dbcomments = $dbc->get("SELECT * FROM statusnotes WHERE sid=? ORDER BY id DESC", [$status["id"]]);
                    foreach ($dbcomments as $comment) {
                        $dbcommentuser = $dbc->get("SELECT * FROM users WHERE id=? ORDER BY id DESC", [$comment["uid"]]);
                        echo '<div id="accordion">';
                        echo '<div class="accordion">';
                        echo '<div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#comment-body-' . $comment["id"] . '" aria-expanded="false">';
                        echo '<p>' . $dbcommentuser[0]["lastname"] . ' ' . $dbcommentuser[0]["firstname"] . ' megjegyzése - ' . $comment["date"] . '</p>';
                        echo '</div>';
                        echo '<div class="accordion-body collapse" id="comment-body-' . $comment["id"] . '" data-parent="#accordion" style="">';
                        echo '<p>';
                        echo $comment["note"];
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#newcomment-body-<?php echo $status["id"]; ?>" aria-expanded="false">
                                <p>Új megjegyzés</p>
                            </div>
                            <div class="accordion-body collapse" id="newcomment-body-<?php echo $status["id"]; ?>" data-parent="#accordion" style="">
                                <form id="newcommentform" method="POST" action="/backend/mdcs.php?q=newscomment">
                                    <textarea name="newcomment-<?php echo $status["id"]; ?>" id="newcomment-<?php echo $status["id"]; ?>" rows="10" cols="80"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'newcomment-<?php echo $status["id"]; ?>' );
                                    </script>
                                    <input type="text" name="sid" id="sid" value="<?php echo $status["id"]; ?>" hidden>
                                    <button name="action" type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px;">
                                        Megjegyzés hozzáadása
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($status["status"] == "5") {
                        if ($case["casnumber"] != null) {
                            echo "<p>Nemzetközi nyomonkövetési szám: " . $case["casnumber"] . "</p>\n";
                            echo "<p><a href='https://repair.dji.com/en/support/RepairTrace' target='_blank'>Nyomonkövetés az alábbi linken</a></p>\n";
                        }
                    }
                    echo "                                                </div>\n";
                    echo "                                            </div>\n";

                }
                ?>
            </div>
        </div>
    </div>
</div>