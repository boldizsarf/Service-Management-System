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
                { "sortable": false, "targets": [6] }
            ]
        } );
    } );
</script>
<section class="section">
    <div class="section-header">
        <h1>Ügyfelek</h1>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Ügyfelek</h4>
            </div>
            <div class="card-body">
                <table data-order='[[ 0, "desc" ]]' id="userstable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th></th>
                        <th>Vezetéknév</th>
                        <th>Keresztnév</th>
                        <th>Email</th>
                        <th>Regisztráció</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbuser = $dbc->get("SELECT * FROM users WHERE role=? ORDER BY ID DESC", ["0"]);

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
                        if (isset($firstlogin[0]["date"])) {
                            echo "                    <td>" . $firstlogin[0]["date"] . "</td>\n";
                        } else {
                            echo "                    <td data-order='0'>Még nem lépett be</td>\n";
                        }
                        echo "<td><a href='/dashboard/user/" . $user["id"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>