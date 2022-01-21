<section class="section">
    <div class="section-header">
        <h1>Szervizkönyvek</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <?php
            $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);

            if ($dbuser[0]["role"] == 20) {
                $dbdevice = $dbc->get("SELECT * FROM devices WHERE uid=?", [$dbuser[0]["id"]]);

                foreach ($dbdevice as $device) {
                    echo "<div class=\"col-lg-6\">\n";
                    echo "                <div class=\"card card-large-icons\">\n";
                    echo "                    <div class=\"card-icon bg-primary text-white\">\n";
                    echo "                        <img src=\"/assets/tmkdevices/" . $device["name"] . ".png\" width=\"150px\">\n";
                    echo "                    </div>\n";
                    echo "                    <div class=\"card-body\">\n";
                    echo "                        <h4>" . $device["name"] . "</h4>\n";
                    echo "                        <p>" . $device["serial"] . "</p>\n";
                    echo "                        <a href=\"/dashboard/myservicebook/" . $device["id"] . "\" class=\"card-cta\">Megtekintés <i class=\"fas fa-chevron-right\"></i></a>\n";
                    echo "                    </div>\n";
                    echo "                </div>\n";
                    echo "            </div>";

                }
            } else if ($dbuser[0]["role"] == 21) {
                $dbtmkconnect = $dbc->get("SELECT * FROM tmkUserToReseller WHERE uidReseller=? GROUP BY uidUser", [$dbuser[0]["id"]]);

                foreach ($dbtmkconnect as $tmkconnection) {
                    $dbdevice = $dbc->get("SELECT * FROM devices WHERE uid=?", [$tmkconnection["uidUser"]]);

                    foreach ($dbdevice as $device) {
                        echo "<div class=\"col-lg-6\">\n";
                        echo "                <div class=\"card card-large-icons\">\n";
                        echo "                    <div class=\"card-icon bg-primary text-white\">\n";
                        echo "                        <img src=\"/assets/tmkdevices/" . $device["name"] . ".png\" width=\"150px\">\n";
                        echo "                    </div>\n";
                        echo "                    <div class=\"card-body\">\n";
                        echo "                        <h4>" . $device["name"] . "</h4>\n";
                        echo "                        <p>" . $device["serial"] . "</p>\n";
                        echo "                        <a href=\"/dashboard/myservicebook/" . $device["id"] . "\" class=\"card-cta\">Megtekintés <i class=\"fas fa-chevron-right\"></i></a>\n";
                        echo "                    </div>\n";
                        echo "                </div>\n";
                        echo "            </div>";

                    }
                }
            }

            ?>
        </div>
    </div>
</section>