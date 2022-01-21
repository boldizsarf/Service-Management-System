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
<section class="section">
    <div class="section-header">
        <h1>Ügyek</h1>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Ügyek</h4>
            </div>
            <div class="card-body">
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
                            echo "<td><a href='/dashboard/mypcase/" . $case["trackid"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                            echo "                </tr>";


                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>