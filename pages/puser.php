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
        <h1><?php echo $dbuser[0]["id"] . " - " . $dbuser[0]["lastname"] . " - " . $dbuser[0]["firstname"]; ?></h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Partner adatai</h4>
                </div>
                <div class="card-body">
                    <h6>Partner neve: <span class="text-primary mb-2"><?php echo $dbuser[0]["lastname"]; ?></span></h6>
                    <h6>Üzlet neve: <span class="text-primary mb-2"><?php echo $dbuser[0]["firstname"]; ?></span></h6>
                    <?php
                    if ($dbuser[0]["emailconfirmed"] == "1") {
                        echo "<h6>Üzlet email címe: <span class=\"text-primary mb-2\">" . $dbuser[0]["email"] . "</span></h6>";
                    } else {
                        echo "<h6>Üzlet email címe: <span class=\"text-danger mb-2\">" . $dbuser[0]["email"] . "</span> - <a href='/dashboard/user/" . $param[3] . "/emailconfirm'>Megerősítés</a></h6>";
                    }
                    ?>
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
                    <h4>Kapcsolattartók</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Név</th>
                            <th scope="col">Email cím</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Cím</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbcontacts = $dbc->get("SELECT * FROM pcontacts WHERE uid=?", [$uid]);

                        foreach ($dbcontacts as $contact) {
                            echo "<tr>\n";
                            echo "                    <td>" . $contact["name"] . "</td>\n";
                            echo "                    <td>" . $contact["email"] . "</td>\n";
                            echo "                    <td>" . $contact["phone"] . "</td>\n";
                            echo "                    <td>" . $contact["address"] . "</td>\n";
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
                    <script type="text/javascript">
                        $(document).ready( function () {
                            $("#casestable").dataTable( {
                                ordering: true,
                                colReorder: false,
                                "columnDefs": [
                                    { "sortable": false, "targets": [6, 1, 3, 4] }
                                ],
                                initComplete: function () {
                                    this.api().columns([4]).every( function () {
                                        var column = this;
                                        var select = $('<select><option value=""></option></select>')
                                            .appendTo( $(column.header()).empty() )
                                            .on( 'change', function () {
                                                var val = $.fn.dataTable.util.escapeRegex(
                                                    $(this).val()
                                                );

                                                column
                                                    .search( val ? '^'+val+'$' : '', true, false )
                                                    .draw();
                                            } );

                                        column.data().unique().sort().each( function ( d, j ) {
                                            select.append( '<option value="'+d+'">'+d+'</option>' )
                                        } );
                                    } );
                                }
                            } );
                        } );
                    </script>
                    <div class="table-responsive">
                        <table data-order='[[ 0, "desc" ]]' id="casestable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Tracking ID</th>
                                <th>Hivatkozási szám</th>
                                <th>Készülék</th>
                                <th>S/N</th>
                                <th>Státusz</th>
                                <th>Utolsó update</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $dbcase = $dbc->get("SELECT * FROM pcases WHERE uid=? ORDER BY id DESC", [$uid]);

                            foreach ($dbcase as $case) {

                                $url = $serverurl . '/api/';
                                $data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $case["trackid"]);

                                $options = array(
                                    'http' => array(
                                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                        'method'  => 'POST',
                                        'content' => http_build_query($data)
                                    )
                                );
                                $context  = stream_context_create($options);
                                $result = file_get_contents($url, false, $context);
                                $caseapi = json_decode($result, true);

                                echo "<tr class='" . $caseapi["Status"]["Color"] . "'>\n";
                                echo "                    <th data-order=\"" . $caseapi["CaseID"] . "\">" . $caseapi["TrackingID"] . "</th>\n";
                                echo "                    <td>" . $caseapi["ExternalID"] . "</td>\n";
                                echo "                    <td>" . $caseapi["Device"]["Name"] . "</td>\n";
                                echo "                    <td>" . $caseapi["Device"]["SerialNumber"] . "</td>\n";
                                echo "                    <td data-order=\"" . $caseapi["Status"]["Id"] . "\">" . $caseapi["Status"]["TextHU"] . "</td>\n";
                                echo "                    <td>" . date_format(date_create($caseapi["Status"]["Date"]),"Y-m-d") . "</td>\n";
                                echo "<td><a href='/dashboard/pcase/" . $case["trackid"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                                echo "                </tr>";


                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
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