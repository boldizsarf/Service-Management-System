<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}
?>
<script type="text/javascript">
    $(document).ready( function () {
        $("#casestable").dataTable( {
            ordering: true,
            colReorder: false,
            "pageLength": 100,
            "columnDefs": [
                { "sortable": false, "targets": [9] }
            ]
        } );
    } );
</script>
<section class="section">
    <div class="section-header">
        <h1>Feladatok</h1>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Feladatok</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 7, "asc" ]]' id="casestable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Ügy</th>
                            <th>Készülék</th>
                            <th>Beérkezett</th>
                            <th>Árajánlat</th>
                            <th>Elfogadva</th>
                            <th>Javítás alatt</th>
                            <th>Befejezve</th>
                            <th>Határidő</th>
                            <th>Intézi</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbcase = $dbc->get("SELECT * FROM cases WHERE type=? ORDER BY created ASC", ["paid"]);

                        foreach ($dbcase as $case) {
                            $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);
                            $dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
                            $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id ASC", [$case["id"]]);
                            if ($case["type"] == "warranty") {
                                $type = $lang->warranty;
                            } else if ($case["type"] == "paid") {
                                $type = "";
                                if ($case["price"] == "express") {
                                    $type .= " [SOS]";
                                }
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
                            $dbstatus1 = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "3"]);
                            $dbstatus2 = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "7"]);
                            $dbstatus3 = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "8"]);
                            $dbstatus4 = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "9"]);
                            $dbstatus5 = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "10"]);
                            if (empty($dbstatus2[0]["date"])) {
                                $dbstatus2[0]["date"] = "";
                            }
                            if (empty($dbstatus3[0]["date"])) {
                                $dbstatus3[0]["date"] = "";
                            }
                            if (empty($dbstatus4[0]["date"])) {
                                $dbstatus4[0]["date"] = "";
                            }
                            if (empty($dbstatus5[0]["date"])) {
                                $dbstatus5[0]["date"] = "";
                            }

                            $dbstatus6 = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "5"]);
                            if (empty($dbstatus6[0]["date"])) {
                                $dbstatus6[0]["date"] = "";
                            }
                            if ($dbstatus6[0]["date"] == null) {
                                if (isset($dbstatus1[0]["date"])) {
                                    if ($statuscolor != "text-success") {
                                        $statuscolor = "text-primary";

                                        if ($dbstatus2[0]["date"] != null) {
                                            if ($case["price"] == "express") {
                                                $dayslimit = 4;
                                            } else if ($case["price"] == "normal") {
                                                $dayslimit = 8;
                                            }
                                            if ($dbstatus3[0]["date"] == null) {
                                                $days = 4000;
                                                $lejarat = "Ajánlat elfogadásra vár";
                                            }
                                            $date1 = strtotime($dbstatus3[0]["date"] . " + " . $dayslimit . " days");
                                            $date2 = strtotime(date("Y-m-d H:i:s"));
                                            if ($date2 - $date1 > 0) {
                                                if ($dbstatus5[0]["date"] == null) {
                                                    $days = 0;
                                                    $lejarat = "Lejárt</br>(Javításig)";
                                                    $statuscolor = "text-danger";
                                                } else {
                                                    $days = 5000;
                                                    $lejarat = "Lezárásra vár";
                                                }
                                            } else {
                                                $diff = abs($date2 - $date1);
                                                $years = floor($diff / (365*60*60*24));
                                                $months = floor(($diff - $years * 365*60*60*24)
                                                    / (30*60*60*24));
                                                $days = floor(($diff - $years * 365*60*60*24 -
                                                        $months*30*60*60*24)/ (60*60*24));
                                                $lejarat = floor(($diff - $years * 365*60*60*24 -
                                                            $months*30*60*60*24)/ (60*60*24)) . " nap javítás befejezéséig";
                                                if ($days < 0 || $days == 0) {
                                                    $statuscolor = "text-warning";
                                                }

                                                $hours = floor(($diff - $years * 365*60*60*24
                                                        - $months*30*60*60*24 - $days*60*60*24)
                                                    / (60*60));
                                                $minutes = floor(($diff - $years * 365*60*60*24
                                                        - $months*30*60*60*24 - $days*60*60*24
                                                        - $hours*60*60)/ 60);
                                            }
                                        } else {
                                            if ($case["price"] == "express") {
                                                $dayslimit = 3;
                                            } else if ($case["price"] == "normal") {
                                                $dayslimit = 6;
                                            }
                                            $date1 = strtotime($dbstatus1[0]["date"] . " + " . $dayslimit . " days");
                                            $date2 = strtotime(date("Y-m-d H:i:s"));
                                            if ($date2 - $date1 > 0) {
                                                $days = 0;
                                                $lejarat = "Lejárt</br>(Bevizsgálásig)";
                                                $statuscolor = "text-danger";
                                            } else {
                                                $diff = abs($date2 - $date1);
                                                $years = floor($diff / (365*60*60*24));
                                                $months = floor(($diff - $years * 365*60*60*24)
                                                    / (30*60*60*24));
                                                $days = floor(($diff - $years * 365*60*60*24 -
                                                        $months*30*60*60*24)/ (60*60*24));
                                                $lejarat = floor(($diff - $years * 365*60*60*24 -
                                                            $months*30*60*60*24)/ (60*60*24)) . " nap árajánlat kiadásáig";

                                                if ($days < 0 || $days == 0) {
                                                    $statuscolor = "text-warning";
                                                }

                                                $hours = floor(($diff - $years * 365*60*60*24
                                                        - $months*30*60*60*24 - $days*60*60*24)
                                                    / (60*60));
                                                $minutes = floor(($diff - $years * 365*60*60*24
                                                        - $months*30*60*60*24 - $days*60*60*24
                                                        - $hours*60*60)/ 60);
                                            }
                                        }

                                        if ($dbstatus2[0]["date"] != null) {
                                            if ($dbstatus3[0]["date"] == null) {
                                                $days = 4000;

                                                $lejarat = $statustext;
                                            }
                                        }

                                        $cuser = "Senki";
                                        $dbcuser = $dbc->get("SELECT * FROM users WHERE id=?", [$case["carriedby"]]);
                                        if (isset($dbcuser[0]["firstname"])) {
                                            $cuser = substr($dbcuser[0]["lastname"], 0, 1) . ". " . $dbcuser[0]["firstname"];
                                        }
                                        echo "<tr class='" . $statuscolor . "'>\n";
                                        echo "                    <th data-order=\"" . $case["id"] . "\">C" . $case["id"] . " " . $type . "</th>\n";
                                        echo "                    <td>" . $dbdevice[0]["name"] . "</td>\n";
                                        echo "                    <td>" . $dbstatus1[0]["date"] . "</td>\n";
                                        echo "                    <td>" . $dbstatus2[0]["date"] . "</td>\n";
                                        echo "                    <td>" . $dbstatus3[0]["date"] . "</td>\n";
                                        echo "                    <td>" . $dbstatus4[0]["date"] . "</td>\n";
                                        echo "                    <td>" . $dbstatus5[0]["date"] . "</td>\n";
                                        echo "                    <td data-order=\"" . $days . "\">" . $lejarat . "</td>\n";
                                        echo "                    <td>" . $cuser . "</td>\n";
                                        echo "<td><a href='/dashboard/case/" . $case["id"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                                        echo "                </tr>";
                                    }
                                }
                            }


                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>