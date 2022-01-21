<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$dbdcheck = $dbc->get("SELECT * FROM devices WHERE uid=?", [$uid]);
$hasdevice = true;
if (empty($dbdcheck[0]["id"])) {
    $hasdevice = false;
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->mydevices; ?></h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newdevice" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card card-warning" <?php if ($hasdevice == true) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->mydevices; ?></h4>
            </div>
            <div class="card-body">
                <div class="empty-state" data-height="400" style="height: 400px;">
                    <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                    </div>
                    <h2><?php echo $lang->nodevice; ?></h2>
                    <p class="lead">
                        <?php echo $lang->nodevicelong; ?>
                    </p>
                    <a href="/dashboard/newdevice" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
                </div>
            </div>
        </div>

        <div class="card card-primary" <?php if ($hasdevice == false) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->mydevices; ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><?php echo $lang->id; ?></th>
                        <!--<th scope="col"></th>-->
                        <th scope="col"><?php echo $lang->device; ?></th>
                        <th scope="col"><?php echo $lang->serial; ?></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                    $dbdevice = $dbc->get("SELECT * FROM devices WHERE uid=?", [$dbuser[0]["id"]]);

                    foreach ($dbdevice as $device) {
                        echo "<tr>\n";
                        echo "                    <th scope=\"row\">D" . $device["id"] . "</th>\n";
                        echo "                    <td hidden>";
                        if ($device["dupli"] == true) {
                            echo "<span class=\"badge badge-success\">" . $lang->duplitrue . "</span>";
                        } else {
                            echo "<span class=\"badge badge-danger\">" . $lang->duplifalse . "</span>";
                        }
                        echo "                    </td>";
                        echo "                    <td>" . $device["name"] . "</td>\n";
                        echo "                    <td>" . $device["serial"] . "</td>\n";
                        echo "<td><a href='/dashboard/mydevice/" . $device["id"] . "' class=\"btn btn-primary\">" . $lang->show . "</a></td>";
                        echo "                </tr>";


                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>