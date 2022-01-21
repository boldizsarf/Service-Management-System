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
                { "sortable": false, "targets": [6] }
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
                    <table data-order='[[ 0, "asc" ]]' id="casestable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Tracking ID</th>
                            <th>Üzlet</th>
                            <th>Készülék</th>
                            <th>Állapot</th>
                            <th>Utolsó update</th>
                            <th>Feladat</th>
                            <th>Határidő</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($role == 11) {
                            $respid = "mds-2";
                        } else if ($role == 12) {
                            $respid = "mds-2";
                        } else {
                            $respid = "mds-1";
                        }
                        $dbcase = $dbc->get("SELECT * FROM pcases ORDER BY id ASC");

                        foreach ($dbcase as $case) {

                            $dbstatus = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? ORDER BY id DESC", [$case["id"]]);

                            if ($dbstatus[0]["status"] != 16) {
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

                                if ($caseapi["Status"]["Responsible"]["Id"] == $respid) {
                                    echo "<tr class='" . $caseapi["Status"]["Task"]["Color"] . "'>\n";
                                    echo "                    <th data-order=\"" . $caseapi["CaseID"] . "\">" . $caseapi["TrackingID"] . "</th>\n";
                                    echo "                    <td>" . $caseapi["Partner"]["Store"] . "</td>\n";
                                    echo "                    <td>" . $caseapi["Device"]["Name"] . "</td>\n";
                                    echo "                    <td data-order=\"" . $caseapi["Status"]["Id"] . "\">" . $caseapi["Status"]["TextHU"] . "</td>\n";
                                    echo "                    <td>" . date_format(date_create($caseapi["Status"]["Date"]),"Y-m-d") . "</td>\n";
                                    echo "                    <td>" . $caseapi["Status"]["Responsible"]["Text"] . "</td>\n";
                                    echo "                    <td data-order=\"" . $caseapi["Status"]["Task"]["LeftInSec"] . "\">" . $caseapi["Status"]["Task"]["TaskNoteHU"] . "</td>\n";
                                    echo "<td><a href='/dashboard/pcase/" . $case["trackid"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
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
    </div>
</section>