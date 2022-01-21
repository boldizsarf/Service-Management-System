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
        $("#userstable").dataTable( {
            ordering: true,
            colReorder: false,
            "columnDefs": [
                { "sortable": false, "targets": [5, 1, 2] }
            ],
            initComplete: function () {
                this.api().columns([2]).every( function () {
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
        <h1>Partnerek</h1>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Partnerek</h4>
            </div>
            <div class="card-body">
                <table data-order='[[ 0, "desc" ]]' id="userstable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th></th>
                        <th>Partner neve</th>
                        <th>Üzlet neve</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbuser = $dbc->get("SELECT * FROM users WHERE role=? ORDER BY ID DESC", ["10"]);

                    foreach ($dbuser as $user) {
                        $firstlogin = $dbc->get("SELECT * FROM loginlog WHERE user=? ORDER BY id ASC", [$user["email"]]);
                        echo "<tr>\n";
                        echo "                    <th data-order=\"" . $user["id"] . "\">" . $user["id"] . "</th>\n";
                        echo "<td><figure class=\"avatar mr-2 avatar-sm\">\n";
                        echo "                      <img src='https://www.gravatar.com/avatar/" . hash("md5", $user['email']) . "?d=" . urlencode("https://dev.tracking.dupliglobal.com/assets/drone.jpg") . "' alt=\"...\">\n";
                        echo "                    </figure></td>\n";
                        echo "                    <td>" . $user["lastname"] . "</td>\n";
                        echo "                    <td>" . $user["firstname"] . "</td>\n";
                        echo "                    <td>" . $user["email"] . "</td>\n";
                        echo "<td><a href='/dashboard/puser/" . $user["id"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>