<div class="tab-pane fade" id="devicedata" role="tabpanel" aria-labelledby="devicedata-casetabs">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $lang->devicedata; ?></h4>
                </div>
                <div class="card-body">
                    <h6><?php echo $lang->device; ?>: <span class="text-primary mb-2"><?php echo $device["name"]; ?></span></h6>
                    <h6><?php echo $lang->serial; ?>: <span class="text-primary mb-2"><?php echo $device["serial"]; ?></span></h6>
                    <h6 hidden><?php echo $lang->distributor; ?>: <?php
                        if ($device["dupli"] == true) {
                            echo "<span class=\"text-success mb-2\">" . $lang->duplitrue . "</span>";
                        } else {
                            echo "<span class=\"text-danger mb-2\">" . $lang->duplifalse . "</span>";
                        }
                        ?></h6>
                    <h6><?php echo $lang->added; ?>: <span class="text-primary mb-2"><?php echo $device["added"]; ?></span></h6>
                    <h6>Aktivált szolgáltatások:
                        <?php
                        $dbcards = $dbc->get("SELECT * FROM cards WHERE usedfor=?", [$device["id"]]);
                        if (isset($dbcards[0]["id"])) {
                            switch ($dbcards[0]["type"]) {
                                case "mdsafety-1":
                                    $product = "MyDroneSafety +1 év";
                                    break;
                                case "mdsafety-2":
                                    $product = "MyDroneSafety +2 év";
                                    break;
                            }
                            echo "<br><span class=\"text-success mb-2\">" . $product . "; " . date_format(date_create($dbcards[0]["date"]), "Y-m-d") . " -tól</span>";
                        } else {
                            echo "<span class=\"text-danger mb-2\">Nincs</span>";
                        }
                        ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $lang->accessories; ?></h4>
                    <div class="card-header-action">
                        <a href="/dashboard/newaccessory/<?php echo $device["id"]; ?>" class="btn btn-primary">
                            <?php echo $lang->addnew; ?>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo $lang->accessory; ?></th>
                            <th scope="col"><?php echo $lang->serial; ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbaccessory = $dbc->get("SELECT * FROM accessories WHERE did=?", [$case["device"]]);
                        foreach ($dbaccessory as $accessory) {
                            echo "<tr>";
                            echo "<td>" . $accessory["type"] . "</td>";
                            echo "<td>" . $accessory["serial"] . "</td>";
                            echo "<td><a href=\"/backend/deleteaccessory.php?id=" . $accessory["id"] . "\" class=\"btn btn-icon btn-sm btn-danger\"><i class=\"fas fa-trash\"></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $lang->devicecases; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo $lang->id; ?></th>
                            <th scope="col"></th>
                            <th scope="col"><?php echo $lang->device; ?></th>
                            <th scope="col"><?php echo $lang->serial; ?></th>
                            <th scope="col"><?php echo $lang->status; ?></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbcase = $dbc->get("SELECT * FROM cases WHERE device=? ORDER BY id DESC", [$case["device"]]);

                        foreach ($dbcase as $case) {
                            $dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
                            $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id ASC", [$case["id"]]);

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
                            echo "<tr>\n";
                            echo "                    <th scope=\"row\">MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . "</th>\n";
                            echo "                    <td></td>\n";
                            echo "                    <td>" . $dbdevice[0]["name"] . "</td>\n";
                            echo "                    <td>" . $dbdevice[0]["serial"] . "</td>\n";
                            echo "                    <td><i class=\"" . $statusicon . "\"></i> " . $statustext . "</td>\n";
                            echo "<td><a href='/dashboard/mycase/" . $case["id"] . "' class=\"btn btn-primary\">" . $lang->show . "</a></td>";
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