<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

$role = $dbuser[0]["role"];
if ($role != 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/cases">';
    return;
}

$dbccheck = $dbc->get("SELECT * FROM cases WHERE uid=?", [$uid]);
$hascase = true;
if (empty($dbccheck[0]["id"])) {
    $hascase = false;
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->mycases; ?></h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newcase" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->createnew; ?></a>
        </div>
    </div>
    <?php

    if (!(empty($param[2]))) {
        if ($param[3] == "1") {
            print "<div class=\"alert alert-success alert-has-icon\">\n";
            print "                        <div class=\"alert-icon\"><i class=\"fas fa-check\"></i></div>\n";
            print "                        <div class=\"alert-body\">\n";
            print "                            <div class=\"alert-title\">Ügy létrehozva!</div>\n";
            print "                            Az adminisztrátorok hamarosan jóváhagyják az ügyet.\n";
            print "                        </div>\n";
            print "                    </div>";
        }
    }

    ?>
    <div class="section-body">
        <div class="card card-warning" <?php if ($hascase == true) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->mycases; ?></h4>
            </div>
            <div class="card-body">
                <div class="empty-state" data-height="400" style="height: 400px;">
                    <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                    </div>
                    <h2><?php echo $lang->nocase; ?></h2>
                    <p class="lead">
                        <?php echo $lang->nocaselong; ?>
                    </p>
                    <a href="/dashboard/newcase" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> <?php echo $lang->createnew; ?></a>
                </div>
            </div>
        </div>
        <div class="card card-primary" <?php if ($hascase == false) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->mycases; ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><?php echo $lang->id; ?></th>
                        <th scope="col"></th>
                        <th scope="col"><?php echo $lang->device; ?></th>
                        <th scope="col"><?php echo $lang->serial; ?></th>
                        <th scope="col"><?php echo $lang->status; ?></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                    $dbcase = $dbc->get("SELECT * FROM cases WHERE uid=?", [$dbuser[0]["id"]]);

                    foreach ($dbcase as $case) {
                        $dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
                        $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id ASC", [$case["id"]]);

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

                        echo "<tr>\n";
                        echo "                    <th scope=\"row\">MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . "</th>\n";
                        echo "                    <td></td>\n";
                        echo "                    <td>" . $dbdevice[0]["name"] . "</td>\n";
                        echo "                    <td>" . $dbdevice[0]["serial"] . "</td>\n";
                        echo "                    <td><i class=\"" . $statusicon . "\"></i> " . $statustext . "</td>\n";
                        echo "<td><a href='/dashboard/mycase/" . $case["id"] . "' class=\"btn btn-primary\">" . $lang->show . "</a></td>";
                        echo "                </tr>";


                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>