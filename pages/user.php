<?php
$dbuser1 = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$role = $dbuser1[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

$uid = $param[3];
$dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$uid]);

if ($param[4] == "emailconfirm") {
    $dbc->set("UPDATE users SET emailconfirmed=? WHERE email=?",
        ["1", $dbuser[0]["email"]]);

    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/user/' . $param[3] . '">';
    return;
}

$firstlogin = $dbc->get("SELECT * FROM loginlog WHERE user=? ORDER BY id ASC", [$dbuser[0]["email"]]);
$lastlogin = $dbc->get("SELECT * FROM loginlog WHERE user=? ORDER BY id DESC", [$dbuser[0]["email"]]);
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $dbuser[0]["id"] . " - " . $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"]; ?></h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->userdata; ?></h4>
                </div>
                <div class="card-body">
                    <h6><?php echo $lang->name; ?>: <span class="text-primary mb-2"><?php echo $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"]; ?></span></h6>
                    <?php
                    if ($dbuser[0]["emailconfirmed"] == "1") {
                        echo "<h6>" . $lang->email . ": <span class=\"text-primary mb-2\">" . $dbuser[0]["email"] . "</span></h6>";
                    } else {
                        echo "<h6>" . $lang->email . ": <span class=\"text-danger mb-2\">" . $dbuser[0]["email"] . "</span> - <a href='/dashboard/user/" . $param[3] . "/emailconfirm'>Megerősítés</a></h6>";
                    }
                    ?>
                    <h6><?php echo $lang->phone; ?>: <span class="text-primary mb-2"><?php echo $dbuser[0]["phone"]; ?></span></h6>
                    <h6>Első belépés: <span class="text-primary mb-2">
                            <?php
                            if (isset($firstlogin[0]["date"])) {
                                echo "                    <td>" . $firstlogin[0]["date"] . "</td>\n";
                            } else {
                                echo "                    <td data-order='0'>Még nem lépett be</td>\n";
                            }
                            ?>
                        </span></h6>
                    <h6>Utolsó belépés: <span class="text-primary mb-2">
                            <?php

                            if (isset($lastlogin[0]["date"])) {
                                echo "                    <td>" . $lastlogin[0]["date"] . "</td>\n";
                            } else {
                                echo "                    <td data-order='0'>Még nem lépett be</td>\n";
                            }
                            ?>
                        </span></h6>
                    <h6><span class="text-primary mb-2"><a href="/dashboard/activity/<?php echo $dbuser[0]["id"]; ?>">Activity log</a></span></h6>

                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Rendszerben töltött idő</h4>
                </div>
                <div class="card-body">
                    <?php
                    require 'usertime1/data.php';
                    require 'usertime1/graph.php';
                    ?>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="wcasesbystatus"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->deliveryaddresses; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo $lang->name; ?></th>
                            <th scope="col"><?php echo $lang->country; ?></th>
                            <th scope="col"><?php echo $lang->state; ?></th>
                            <th scope="col"><?php echo $lang->postcode; ?></th>
                            <th scope="col"><?php echo $lang->city; ?></th>
                            <th scope="col"><?php echo $lang->address; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$uid]);
                        $dbaddress = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type='home'", [$dbuser[0]["id"]]);

                        foreach ($dbaddress as $address) {
                            echo "<tr>\n";
                            echo "<td scope=\"col\">" . $address["name"] . "</td>\n";
                            echo "<td scope=\"col\">" . $address["country"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["state"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["postcode"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["city"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["address"] . "</td>\n";
                            echo "                </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->billingaddresses; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo $lang->name; ?></th>
                            <th scope="col"><?php echo $lang->taxnumber; ?></th>
                            <th scope="col"><?php echo $lang->country; ?></th>
                            <th scope="col"><?php echo $lang->state; ?></th>
                            <th scope="col"><?php echo $lang->postcode; ?></th>
                            <th scope="col"><?php echo $lang->city; ?></th>
                            <th scope="col"><?php echo $lang->address; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$uid]);
                        $dbaddress = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type='billing'", [$dbuser[0]["id"]]);

                        foreach ($dbaddress as $address) {
                            echo "<tr>\n";
                            echo "<td scope=\"col\">" . $address["name"] . "</td>\n";
                            echo "<td scope=\"col\">" . $address["taxnumber"] . "</td>\n";
                            echo "<td scope=\"col\">" . $address["country"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["state"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["postcode"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["city"] . "</td>\n";
                            echo "                    <td scope=\"col\">" . $address["address"] . "</td>\n";
                            echo "                </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Ügyek</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo $lang->id; ?></th>
                            <th scope="col"><?php echo $lang->type; ?></th>
                            <th scope="col">Ügyfél neve</th>
                            <th scope="col"><?php echo $lang->device; ?></th>
                            <th scope="col" hidden><?php echo $lang->serial; ?></th>
                            <th scope="col"><?php echo $lang->status; ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbcase = $dbc->get("SELECT * FROM cases WHERE uid=? ORDER BY id DESC", [$dbuser[0]["id"]]);

                        foreach ($dbcase as $case) {
                            $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);
                            $dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
                            $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id ASC", [$case["id"]]);
                            if ($case["type"] == "warranty") {
                                $type = $lang->warranty;
                            } else if ($case["type"] == "paid") {
                                $type = $lang->paid;
                            }
                            $statuses = simplexml_load_file('db/statuses.db');
                            $lngcd = strval($_COOKIE["sw_lang"]);
                            $statustext = null;
                            $statuscolor = null;
                            $statusicon = null;
                            foreach ($dbstatus as $status) {
                                foreach ($statuses->status as $xmlstatus) {
                                    if ($xmlstatus["id"] == $status["status"]) {
                                        $statustext = $xmlstatus->$lngcd;
                                        $statuscolor = $xmlstatus->color;
                                        $statusicon = $xmlstatus->icon;
                                    }
                                }
                            }
                            echo "<tr>\n";
                            echo "                    <th scope=\"row\">MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . "</th>\n";
                            echo "                    <th scope=\"row\">" . $type . "</th>\n";
                            echo "                    <td>" . $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . "</td>\n";
                            echo "                    <td>" . $dbdevice[0]["name"] . "</td>\n";
                            //echo "                    <td>" . $dbdevice[0]["serial"] . "</td>\n";
                            echo "                    <td><i class=\"" . $statusicon . "\"></i> " . $statustext . "</td>\n";
                            echo "<td><a href='/dashboard/case/" . $case["id"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                            echo "                </tr>";


                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->devices; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo $lang->id; ?></th>
                            <th scope="col"></th>
                            <th scope="col"><?php echo $lang->device; ?></th>
                            <th scope="col"><?php echo $lang->serial; ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                        $dbdevice = $dbc->get("SELECT * FROM devices WHERE uid=?", [$uid]);

                        foreach ($dbdevice as $device) {
                            echo "<tr>\n";
                            echo "                    <th scope=\"row\">D" . $device["id"] . "</th>\n";
                            echo "                    <td>";
                            if ($device["dupli"] == true) {
                                echo "<span class=\"badge badge-success\">" . $lang->duplitrue . "</span>";
                            } else {
                                echo "<span class=\"badge badge-danger\">" . $lang->duplifalse . "</span>";
                            }
                            echo "                    </td>";
                            echo "                    <td>" . $device["name"] . "</td>\n";
                            echo "                    <td>" . $device["serial"] . "</td>\n";
                            echo "<td><a href='/dashboard/device/" . $device["id"] . "' class=\"btn btn-primary\">" . $lang->show . "</a></td>";
                            echo "                </tr>";


                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <script type="text/javascript">
                $(document).ready( function () {
                    $("#logins").dataTable( {
                        ordering: true
                    } );
                } );
            </script>
            <div class="col-12" hidden>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><?php echo $lang->loginattempts; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table data-order='[[ 3, "desc" ]]' id="logins" class="table table-striped">
                            <thead>
                            <tr>
                                <th><?php echo $lang->ip; ?></th>
                                <th><?php echo $lang->useragent; ?></th>
                                <th><?php echo $lang->login; ?></th>
                                <th><?php echo $lang->date; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$uid]);
                            $dblogin = $dbc->get("SELECT * FROM loginlog WHERE user=? ORDER BY date DESC", [$dbuser[0]['email']]);

                            foreach ($dblogin as $login) {
                                echo "<tr>\n";
                                echo "                    <td>" . $login["ip"] . "</td>";
                                echo "                    <td>" . $login["useragent"] . "</td>";
                                if ($login["attempt"] == "0") {
                                    echo "                    <td>Sikertelen</td>";
                                } else {
                                    echo "                    <td>Sikeres</td>";
                                }
                                echo "                    <td>" . $login["date"] . "</td>";
                                echo "                </tr>";


                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>