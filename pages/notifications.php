<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->notifications; ?></h1>
    </div>
    <div class="section-body">

        <div class="card card-primary">
            <div class="card-header">
                <h4><?php echo $lang->notifications; ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                    <?php
                    $dbnot = $dbc->get("SELECT * FROM notifications WHERE uid=? ORDER BY id DESC", [$uid]);

                    foreach ($dbnot as $not) {
                        $read = " style='background-color: #e6f3ff;'";
                        if ($not["viewed"] == "1") {
                            $read = "";
                        }
                        echo "<tr" . $read . ">\n";
                        echo "                    <th scope=\"row\">" . $not["shorttext"] . "</th>\n";
                        echo "                    <th scope=\"row\">" . $not["date"] . "</th>\n";
                        echo "                    <th scope=\"row\"></th>\n";
                        echo "<td><a href='/dashboard/notify/" . $not["id"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>