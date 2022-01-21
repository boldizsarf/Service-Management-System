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
                { "sortable": false, "targets": [6, 1, 3, 4, 2] },
                {
                    "targets": [ 7 ],
                    "visible": false
                }
            ],
            initComplete: function () {
                this.api().columns([2, 4]).every( function () {
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
        <h1>Partner ügyek</h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newapcase" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Partner ügyek</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' id="casestable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Tracking ID</th>
                            <th>Hiv. szám</th>
                            <th>Üzlet</th>
                            <th>Készülék</th>
                            <th>Státusz</th>
                            <th>Update</th>
                            <th></th>
                            <th>SN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbcase = $dbc->get("SELECT * FROM pcases ORDER BY id DESC");

                        foreach ($dbcase as $case) {

                            $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);

                            $dbstatus = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? ORDER BY id ASC", [$case["id"]]);
                            $statuses = simplexml_load_file('db/pstatuses.db');
                            $statustext = null;
                            $statuscolor = null;
                            $statusicon = null;
                            $statusid = null;
                            $statusdate = null;
                            foreach ($dbstatus as $status) {
                                foreach ($statuses->status as $xmlstatus) {
                                    if ($xmlstatus["id"] == $status["status"]) {
                                        $statusid = $status["status"];
                                        $statustext = $xmlstatus->hu;
                                        $statuscolor = $xmlstatus->color;
                                        $statusicon = $xmlstatus->icon;
                                        $statusdate = $status["date"];
                                    }
                                }
                            }

                            echo "<tr class='" . $statuscolor . "'>\n";
                            echo "                    <th data-order=\"" . $case["id"] . "\">" . $case["trackid"] . "</th>\n";
                            echo "                    <td>" . $case["etrackid"] . "</td>\n";
                            echo "                    <td>" . $case["cname"] . "</td>\n";
                            echo "                    <td>" . substr($case["device"], 0, 50) . "</td>\n";
                            echo "                    <td data-order=\"" . $statusid . "\">" . $statustext . "</td>\n";
                            echo "                    <td>" . date_format(date_create($statusdate),"Y-m-d") . "</td>\n";
                            echo "<td><a href='/dashboard/pcase/" . $case["trackid"] . "' class=\"btn btn-icon btn-sm btn-primary\"><i class='fas fa-eye'></i></a></td>";
                            echo "                    <td>" . $case["sn"] . "</td>\n";
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