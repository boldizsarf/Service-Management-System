<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->search . ' - "' . $_POST["search"] . '"'; ?></h1>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Ügyfelek</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Azonosító</th>
                        <th scope="col"></th>
                        <th scope="col">Vezetéknév</th>
                        <th scope="col">Keresztnév</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbuser = $dbc->get("SELECT * FROM users WHERE id LIKE ? OR firstname LIKE ? OR lastname LIKE ? OR email LIKE ? OR phone LIKE ?", ["%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%"]);

                    foreach ($dbuser as $user) {
                        echo "<tr>\n";
                        echo "                    <th scope=\"row\">" . $user["id"] . "</th>\n";
                        echo "<td><figure class=\"avatar mr-2 avatar-sm\">\n";
                        echo "                      <img src='https://www.gravatar.com/avatar/" . hash("md5", $user['email']) . "?d=" . urlencode("https://dev.tracking.dupliglobal.com/assets/drone.jpg") . "' alt=\"...\">\n";
                        echo "                    </figure></td>\n";
                        echo "                    <td>" . $user["lastname"] . "</td>\n";
                        echo "                    <td>" . $user["firstname"] . "</td>\n";
                        echo "                    <td>" . $user["email"] . "</td>\n";
                        echo "<td><a href='/dashboard/user/" . $user["id"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

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
                    $dbcase = $dbc->get("SELECT * FROM cases WHERE id LIKE ? OR uid LIKE ? OR device LIKE ? OR type LIKE ? OR djiuser LIKE ? OR problem LIKE ? OR date LIKE ? OR price LIKE ? OR payment LIKE ? OR takeover LIKE ? OR casnumber LIKE ? ORDER BY id DESC", ["%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%"]);

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
                        <!-- <th scope="col"></th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbdevice = $dbc->get("SELECT * FROM devices WHERE id LIKE ? OR uid LIKE ? OR name LIKE ? OR serial LIKE ? ", ["%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%"]);

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
                        //echo "<td><a href='/dashboard/mydevice/" . $device["id"] . "' class=\"btn btn-primary\">" . $lang->show . "</a></td>";
                        echo "                </tr>";


                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>