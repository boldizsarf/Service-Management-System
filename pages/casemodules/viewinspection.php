<?php
$dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$param[3]]);
$case = $dbcase[0];
?>
<div class="tab-pane fade" id="viewinspection" role="tabpanel" aria-labelledby="viewinspection-casetabs">
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->inspection; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo $lang->iswarranty; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["type"] == "paid") {
                                    echo "<span class=\"text-primary mb-2\"><i class=\"fas fa-money-bill-wave-alt\"></i> " . $lang->paid . "</span>";
                                }
                                if ($dbinspection[0]["type"] == "warranty") {
                                    echo "<span class=\"text-primary mb-2\"><i class=\"fas fa-clipboard-check\"></i> " . $lang->warranty . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["imu"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->imu; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["imu"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["imu"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["compass"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->compass; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["compass"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["compass"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["gps"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->gps; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["gps"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["gps"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["gimbal"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->gimbal; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["gimbal"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["gimbal"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["video"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->video; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["video"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["video"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["flying"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->flying; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["flying"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["flying"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["position"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->position; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["position"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["position"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["stable"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->stable; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["stable"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->good . "</span>";
                                }
                                if ($dbinspection[0]["stable"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notgood . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr <?php if ($dbinspection[0]["testvideo"] == null) { echo "hidden"; }?>>
                            <th scope="row"><?php echo $lang->testvideo; ?></th>
                            <td>
                                <?php
                                if ($dbinspection[0]["testvideo"] == "true") {
                                    echo "<span class=\"text-success mb-2\"><i class=\"fas fa-check\"></i> " . $lang->did . "</span>";
                                }
                                if ($dbinspection[0]["testvideo"] == "false") {
                                    echo "<span class=\"text-danger mb-2\"><i class=\"fas fa-times\"></i> " . $lang->notdid . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->inspectnote; ?></h4>
                </div>
                <div class="card-body">
                    <?php echo $dbinspection[0]["text"]; ?>
                </div>
                <div class="card-footer">
                    <?php
                    $dbmsguser = $dbc->get("SELECT * FROM users WHERE id=?", [$dbinspection[0]["uid"]]);
                    $msguser = $dbmsguser[0];
                    $roles = simplexml_load_file('db/roles.db');
                    $langc = $_COOKIE["sw_lang"];
                    foreach ($roles->role as $role) {
                        if ($role["id"] == $msguser["role"]) {
                            $roletext = $role->$langc;
                            $roleicon = $role->icon;
                            $rolecolor = $role->color;
                        }
                    }
                    echo "<div class=\"row\" style='margin-left: 1px;'>";
                    echo "                                                                <div class=\"font-weight-600\">" . $msguser["lastname"] . " " . $msguser["firstname"] . "</div>\n";
                    echo "                                                                <div class=\"bullet\"></div>\n";
                    echo "                                                                <div class=\"font-weight-600 " . $rolecolor . "\"><i class=\"" . $roleicon . "\"></i> " . $roletext . "</div>\n";
                    echo "                                                                <div class=\"bullet\"></div>\n";
                    echo "                                                                <div class=\"font-weight-600\"> " . $dbinspection[0]["date"] . "</div>\n";
                    echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row" <?php if (is_dir("db/caseimages/" . $case["id"]) == false) { echo "hidden"; } ?>>
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->images; ?></h4>
                </div>
                <div class="card-body">
                    <div class="gallery gallery-md">
                        <?php
                        $files = scandir('db/caseimages/' . $case["id"] . "/");
                        $i2 = null;
                        foreach($files as $file) {
                            $i2++;
                            if ($i2 > 2)
                                echo "<div class=\"gallery-item\" data-image=\"/db/caseimages/" . $case["id"] . "/" . $file . "\" data-title=\"" . $file . "\"></div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" <?php if ($dbinspection[0]["workhours"] == null) { echo "hidden"; } ?>>
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->ibill; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo $lang->sku; ?></th>
                            <th scope="col"><?php echo $lang->name; ?></th>
                            <th scope="col"><?php echo $lang->pricent; ?></th>
                            <th scope="col"><?php echo $lang->pricebr; ?></th>
                            <th scope="col"><?php echo $lang->quantity; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = null;
                        $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$dbinspection[0]["id"]]);
                        foreach ($dbparts as $part) {
                            echo "<tr class='text-primary'>";
                            echo "<th scope=\"row\">" . $part["sku"] . "</th>";
                            echo "<td>" . $part["longname"] . "</td>";
                            echo "<td>" . money_format('%.0n', intval($part["pricebr"])) . "</td>";
                            echo "<td>" . money_format('%.0n', intval($part["pricebr"]*1.27)) . "</td>";
                            echo "<td>" . $part["quantity"] . "</td>";
                            echo "</tr>";
                            $total += intval($part["pricebr"]*$part["quantity"]);
                        }
                        //Alkatrész kuponok figyelembevétele
                        $dbcoupons = $dbc->get("SELECT * FROM coupons ORDER BY id ASC");
                        foreach ($dbcoupons as $coupon) {
                            $today = date('Y-m-d', strtotime($dbinspection[0]["date"]));

                            $cStart = date('Y-m-d', strtotime($coupon["start"]));
                            $cEnd = date('Y-m-d', strtotime($coupon["end"]));

                            if (($today >= $cStart) && ($today <= $cEnd)){
                                if ($coupon["device"] == "all" || $coupon["device"] == $device["name"]) {
                                    if ($coupon["type"] == "parts") {
                                        echo "<tr class='text-danger'>";
                                        echo "<th scope=\"row\"></th>";
                                        echo "<td>" . $coupon["name"] . " (-" . $coupon["value"] . "%)</td>";
                                        echo "<td>-" . money_format('%.0n', intval(($total*$coupon["value"])/100)) . "</td>";
                                        echo "<td>-" . money_format('%.0n', intval(($total*$coupon["value"])/100*1.27)) . "</td>";
                                        echo "</tr>";
                                        $total *= (100-$coupon["value"])/100;
                                    }
                                }
                            }
                        }
                        ?>
                        <?php
                        $workhours = $dbinspection[0]["workhours"];
                        if (strtotime("2020-10-31 00:00:00") < strtotime($dbinspection[0]["date"])) {
                            $devicedata = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
                            $devicexml = simplexml_load_file("db/devices.db");
                            foreach ($devicexml->devicegroup as $devicegroup) {
                                foreach ($devicegroup->device as $device) {
                                    if ($device["name"] == $devicedata[0]["name"]) {
                                        $nworkhnt = $device["nworkhnt"];
                                        $fworkhnt = $device["fworkhnt"];
                                    }
                                }
                            }
                            switch ($case["price"]) {
                                case "normal":
                                    $workhoursbr = $nworkhnt*$workhours;
                                    $workhourbr = $nworkhnt;
                                    $workhourstype = "Normál";
                                    break;
                                case "express":
                                    $workhoursbr = $fworkhnt*$workhours;
                                    $workhourbr = $fworkhnt;
                                    $workhourstype = "Sürgősségi";
                                    break;
                            }
                        } else {
                            switch ($case["price"]) {
                                case "normal":
                                    $workhoursbr = 7795*$workhours;
                                    $workhourbr = 7795;
                                    $workhourstype = "Normál";
                                    break;
                                case "express":
                                    $workhoursbr = 11692*$workhours;
                                    $workhourbr = 11692;
                                    $workhourstype = "Sürgősségi";
                                    break;
                            }
                        }

                        echo "<tr class='text-primary'>";
                        echo "<th scope=\"row\"></th>";
                        echo "<td>" . $workhourstype . " javítási óradíj</td>";
                        echo "<td>" . money_format('%.0n', intval($workhourbr)) . "</td>";
                        echo "<td>" . money_format('%.0n', intval($workhourbr*1.27)) . "</td>";
                        echo "<td>" . $workhours . "</td>";
                        echo "</tr>";

                        //Munkadíj kuponok figyelembevétele
                        $dbcoupons = $dbc->get("SELECT * FROM coupons ORDER BY id ASC");
                        foreach ($dbcoupons as $coupon) {
                            $today = date('Y-m-d', strtotime($dbinspection[0]["date"]));

                            $cStart = date('Y-m-d', strtotime($coupon["start"]));
                            $cEnd = date('Y-m-d', strtotime($coupon["end"]));

                            if (($today >= $cStart) && ($today <= $cEnd)){
                                if ($coupon["device"] == "all" || $coupon["device"] == $device["name"]) {
                                    if ($coupon["type"] == "hours") {
                                        echo "<tr class='text-danger'>";
                                        echo "<th scope=\"row\"></th>";
                                        echo "<td>" . $coupon["name"] . " (-" . $coupon["value"] . "%)</td>";
                                        echo "<td>-" . money_format('%.0n', intval(($workhoursbr*$coupon["value"])/100)) . "</td>";
                                        echo "<td>-" . money_format('%.0n', intval(($workhoursbr*$coupon["value"])/100*1.27)) . "</td>";
                                        echo "</tr>";
                                        $workhoursbr *= (100-$coupon["value"])/100;
                                    }
                                }
                            }
                        }

                        $total += intval($workhoursbr);

                        if ($dbinspection[0]["discount"] != 0) {
                            echo "<tr class='text-danger'>";
                            echo "<th scope=\"row\"></th>";
                            echo "<td>-" . $dbinspection[0]["discount"] . "% kedvezmény</td>";
                            echo "<td>-" . money_format('%.0n', intval(($total*$dbinspection[0]["discount"])/100)) . "</td>";
                            echo "<td>-" . money_format('%.0n', intval(($total*$dbinspection[0]["discount"])/100*1.27)) . "</td>";
                            echo "</tr>";
                            $total *= (100-$dbinspection[0]["discount"])/100;
                        }

                        //Végösszeg kuponok figyelembevétele
                        $dbcoupons = $dbc->get("SELECT * FROM coupons ORDER BY id ASC");
                        foreach ($dbcoupons as $coupon) {
                            $today = date('Y-m-d', strtotime($dbinspection[0]["date"]));

                            $cStart = date('Y-m-d', strtotime($coupon["start"]));
                            $cEnd = date('Y-m-d', strtotime($coupon["end"]));

                            if (($today >= $cStart) && ($today <= $cEnd)){
                                if ($coupon["device"] == "all" || $coupon["device"] == $device["name"]) {
                                    if ($coupon["type"] == "final") {
                                        echo "<tr class='text-danger'>";
                                        echo "<th scope=\"row\"></th>";
                                        echo "<td>" . $coupon["name"] . " (-" . $coupon["value"] . "%)</td>";
                                        echo "<td>-" . money_format('%.0n', intval(($total*$coupon["value"])/100)) . "</td>";
                                        echo "<td>-" . money_format('%.0n', intval(($total*$coupon["value"])/100*1.27)) . "</td>";
                                        echo "</tr>";
                                        $total *= (100-$coupon["value"])/100;
                                    }
                                }
                            }
                        }

                        echo "<tr class='text-primary'>";
                        echo "<th scope=\"row\">" . $lang->total . "</th>";
                        echo "<td></td>";
                        echo "<td>" . money_format('%.0n', intval($total)) . "</td>";
                        echo "<td>" . money_format('%.0n', intval($total*1.27)) . "</td>";
                        echo "<td></td>";
                        echo "</tr>";
                        if ($dbinspection[0]["accepted"] != null) {
                            echo "<tr>";
                            echo "<th scope=\"row\">" . $lang->ibillstatus . "</th>";
                            echo "<td></td>";
                            if ($dbinspection[0]["accepted"] == "1") {
                                echo "<td> " . $lang->acceptedwhen . "</td>";
                            }
                            if ($dbinspection[0]["accepted"] == "0") {
                                echo "<td> " . $lang->declinedwhen . "</td>";
                            }
                            echo "<td>" . $dbinspection[0]["accepteddate"] . "</td>";
                            echo "<td>" . $dbinspection[0]["acceptnote"] . "</td>";
                            echo "<td></td>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>