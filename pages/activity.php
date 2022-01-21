<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

$uid2 = $param[3];
$dbuser2 = $dbc->get("SELECT * FROM users WHERE id=?", [$uid2]);

if ($param[3] === "all") {
    $hh = "Összes";
} else {
    $hh = "UID". $dbuser2[0]["id"] . " - " . $dbuser2[0]["lastname"] . " " . $dbuser2[0]["firstname"];
}
?>
<section class="section">
    <div class="section-header">
        <h1>Activity log - <?php echo $hh; ?></h1>
    </div>
    <div class="section-body">
        <div class="row">
            <script type="text/javascript">
                $(document).ready( function () {
                    $("#logins").dataTable( {
                        ordering: true
                    } );
                } );
            </script>
            <div class="col-12">
            <div class="card card-primary">
            <div class="card-header">
                <h4>Activity log</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' id="logins" class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>UID</th>
                            <th>Megnyitott oldal</th>
                            <th>Honnan</th>
                            <th>Mikor</th>
                            <th>Ip</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($param[3] === "all") {
                            $dbactivity = $dbc->get("SELECT * FROM activity");
                            $dbactivity2 = $dbactivity;
                        } else {
                            $dbactivity = $dbc->get("SELECT * FROM activity WHERE uid=? ORDER BY id DESC", [$param[3]]);
                            $dbactivity2 = $dbactivity;
                        }

                        foreach ($dbactivity2 as $activity) {
                            echo "<tr>\n";
                            echo "                    <td>" . $activity["id"] . "</td>";
                            echo "                    <td>" . $activity["uid"] . "</td>";
                            echo "                    <td>" . $activity["page"] . "</td>";
                            echo "                    <td>" . $activity["referer"] . "</td>";
                            echo "                    <td>" . $activity["date"] . "</td>";
                            echo "                    <td>" . $activity["ip"] . "</td>";
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
    </div>
</section>