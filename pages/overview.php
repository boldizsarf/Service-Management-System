<div class="card">
    <div class="card-header">
        <h4><?php echo $lang->mydevices; ?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <?php
            $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
            $dbdevice = $dbc->get("SELECT * FROM devices WHERE uid=?", [$dbuser[0]["id"]]);

            foreach ($dbdevice as $device) {
                $dicon = "http://stormsend1.djicdn.com/stormsend/uploads/a4821b70-997e-0136-ac81-1237445f15bc/industrial.svg";
                if (strpos($device["name"], "Phantom") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/769872f0-9980-0136-ac89-1237445f15bc/phantom.svg";
                } else if (strpos($device["name"], "Mavic") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/48c26180-9980-0136-3e40-12528100fbe3/mavic2.svg";
                } else if (strpos($device["name"], "Osmo") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/c55279e0-d39c-0136-af8a-1237445f15bc/ic-Tiny-70x56.svg";
                } else if (strpos($device["name"], "Ronin") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/de75be6aa8725b0d70b9f367a36381e6.svg";
                } else if (strpos($device["name"], "Robomaster") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/53e4f4dd7d74f6ee7bff1ccd8b54cc86.svg";
                } else if (strpos($device["name"], "FPV") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/aefb3853a22bc89a0726cdc0b83b8ba2.svg";
                } else if (strpos($device["name"], "Goggles") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/aefb3853a22bc89a0726cdc0b83b8ba2.svg";
                } else if (strpos($device["name"], "Inspire") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/829c31f0-9980-0136-3e42-12528100fbe3/inspire.svg";
                } else if (strpos($device["name"], "Tello") !== false) {
                    $dicon = "https://stormsend1.djicdn.com/stormsend/uploads/b22b91d0-997e-0136-ac83-1237445f15bc/tello.svg";
                }

                echo "<div class=\"col-2 text-center\">\n";
                echo "                        <img class=\"browser\" src='" . $dicon . "'>\n";
                echo "                        <div class=\"mt-2 font-weight-bold\">" . $device["name"] . "</div>\n";
                echo "                        <div class=\"text-muted text-small\"><a href='/dashboard/mydevice/" . $device["id"] . "'>" . $lang->show . "</a></div>\n";
                echo "                    </div>";

            }
            ?>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4><?php echo $lang->mycases; ?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <?php
            $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
            $dbcase = $dbc->get("SELECT * FROM cases WHERE uid=?", [$dbuser[0]["id"]]);

            foreach ($dbcase as $case) {
                echo "<div class=\"col-2 text-center\">\n";
                echo "                        <img class=\"browser\" src='https://stormsend1.djicdn.com/stormsend/uploads/eb9a9c90-e0da-0136-4342-12528100fbe3/7.%E6%89%B3%E6%89%8Bsvg.svg'>\n";
                echo "                        <div class=\"mt-2 font-weight-bold\">MDS-" . date("Y",strtotime($dbcase[0]["created"])) . "/ C" . $case["id"] . "</div>\n";
                echo "                        <div class=\"text-muted text-small\"><a href='/dashboard/mycase/" . $case["id"] . "'>" . $lang->show . "</a></div>\n";
                echo "                    </div>";

            }
            ?>
        </div>
    </div>
</div>