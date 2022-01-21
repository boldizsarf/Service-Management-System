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
        $("#cardstable").dataTable( {
            ordering: true,
            colReorder: false,
            "columnDefs": [
                { "sortable": false, "targets": [1, 3, 4] }
            ],
            initComplete: function () {
                this.api().columns([1, 2, 3]).every( function () {
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
        <h1>MyDroneSafety</h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newcards" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Kártyák generálása</a>
        </div>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Kódok</h4>
            </div>
            <div class="card-body">
                <table data-order='[[ 0, "desc" ]]' id="cardstable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Állapot</th>
                        <th>Termék</th>
                        <th>Eszköz</th>
                        <th>Kód</th>
                        <th>Aktiválva</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbcards = $dbc->get("SELECT * FROM cards ORDER BY id DESC");

                    foreach ($dbcards as $card) {
                        $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$card["generatedby"]]);

                        if ($card["used"] == null) {
                            $used = "Nincs felhasználva";
                        } else {
                            $used = "Felhasználva";
                        }

                        switch ($card["type"]) {
                            case "mdsafety-1":
                                $product = "MyDroneSafety +1 év";
                                break;
                            case "mdsafety-2":
                                $product = "MyDroneSafety +2 év";
                                break;
                        }

                        if ($card["used"] == null) {
                            $activated = "Nincs felhasználva";
                        } else {
                            $dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$card["usedfor"]]);
                            $activated = "<a href='/dashboard/device/" . $dbdevice[0]["id"] . "'>" . $dbdevice[0]["name"] . "</a>, " . $card["used"];
                        }

                        echo "<tr>\n";
                        echo "                    <th data-order=\"" . $card["id"] . "\">" . $card["id"] . "</th>\n";
                        echo "                    <td>" . $used . "</td>\n";
                        echo "                    <td>" . $product . "</td>\n";
                        echo "                    <td>" . $card["device"] . "</td>\n";
                        echo "                    <td>" . $card["code1"] . "-" . $card["code2"] . "-" . $card["code3"] . "</td>\n";
                        echo "                    <td>" . $activated . "</td>\n";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>