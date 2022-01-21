<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

$dbcheck = $dbc->get("SELECT * FROM todo WHERE uid=?", [$uid]);
$hastodo = true;
if (empty($dbcheck[0]["id"])) {
    $hastodo = false;
}

if ($param[3] == "finish") {
    $dbc->set("DELETE FROM todo WHERE id=?", [$param[4]]);

    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/todo">';
    return;
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->todo; ?></h1>
    </div>
    <div class="section-body">

        <div class="card card-primary">
            <div class="card-header">
                <h4><?php echo $lang->todo; ?></h4>
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
                    $dbcase = $dbc->get("SELECT * FROM cases ORDER BY id DESC");

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
                        // Szerviztechnikus és Vezető szerviztechnikus
                        if ($role == "1" || $role == "4") {
                            if ($status["status"] == 3 || $status["status"] == 4 || $status["status"] == 7 || $status["status"] == 8 || $status["status"] == 9 || $status["status"] == 10 || $status["status"] == 16) {
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
                        }

                        // Szerviz Adminisztrációs Munkatárs
                        if ($role == "2") {
                            if ($status["status"] == 1 || $status["status"] == 2 || $status["status"] == 3 || $status["status"] == 5 || $status["status"] == 6 || $status["status"] == 10 || $status["status"] == 11 || $status["status"] == 12 || $status["status"] == 13 || $status["status"] == 14) {
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
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>