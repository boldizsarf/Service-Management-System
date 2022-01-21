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
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/hu.json'
            },
            "columnDefs": [
                { "sortable": false, "targets": [1, 2, 4, 5, 8, 7] },
                {
                    "targets": [ 9 ],
                    "visible": false
                }
            ],
            initComplete: function () {
                this.api().columns([1, 2, 4, 5, 7]).every( function () {
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
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newcase" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
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
                            <th>ID</th>
                            <th><?php echo $lang->type; ?></th>
                            <th>takeover</th>
                            <th>Ügyfél neve</th>
                            <th><?php echo $lang->device; ?></th>
                            <th><?php echo $lang->status; ?></th>
                            <th>Utolsó update</th>
                            <th>Létrehozás</th>
                            <th></th>
                            <th>SN</th>
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
                                $type = "G";
                            } else if ($case["type"] == "paid") {
                                $type = "F";
                                if ($case["price"] == "express") {
                                    $type = "S";
                                }
                            }
                            if ($case["takeover"] == "courier") {
                                $takeover = "GLS";
                            } else if ($case["takeover"] == "duplitec") {
                                $takeover = "MDS";
                            } else if ($case["takeover"] == "ars") {
                                $takeover = "ARS";
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
                            echo "<tr class='" . $statuscolor . "'>\n";
                            echo "                    <th data-order=\"" . $case["id"] . "\">C" . $case["id"] . "</th>\n";
                            echo "                    <th>" . $type . "</th>\n";
                            echo "                    <th>" . $takeover . "</th>\n";
                            echo "                    <td>" . $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . "</td>\n";
                            echo "                    <td>" . $dbdevice[0]["name"] . "</td>\n";
                            //echo "                    <td>" . $dbdevice[0]["serial"] . "</td>\n";
                            echo "                    <td data-order=\"" . $statustext . "\">" . $statustext . "</td>\n";
                            echo "                    <td>" . date_format(date_create($status["date"]),"y-m-d") . "</td>\n";
                            echo "                    <td>" . date_format(date_create($case["created"]),"y-m") . "</td>\n";
                            echo "<td><a href='/dashboard/case/" . $case["id"] . "' class=\"btn btn-icon btn-sm btn-primary\"><i class='fas fa-eye'></i></a></td>";
                            echo "                    <td>" . $dbdevice[0]["serial"] . "</td>\n";
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