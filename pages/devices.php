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
                { "sortable": false, "targets": [5] }
            ]
        } );
    } );
</script>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->devices; ?></h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newdevice" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4><?php echo $lang->devices; ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' id="casestable" class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo $lang->id; ?></th>
                            <th><?php echo $lang->user; ?></th>
                            <th><?php echo $lang->device; ?></th>
                            <th><?php echo $lang->serial; ?></th>
                            <th><?php echo $lang->distributor; ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbdevice = $dbc->get("SELECT * FROM devices ORDER BY id DESC");

                        foreach ($dbdevice as $device) {
                            $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$device["uid"]]);
                            echo "<tr>\n";
                            echo "                    <th data-order=\"" . $device["id"] . "\">D" . $device["id"] . "</th>\n";
                            echo "                    <th>" . $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . "</th>\n";
                            echo "                    <td>" . $device["name"] . "</td>\n";
                            echo "                    <td>" . $device["serial"] . "</td>\n";
                            echo "                    <td>";
                            if ($device["dupli"] == true) {
                                echo "<span class=\"badge badge-success\">" . $lang->duplitrue . "</span>";
                            } else {
                                echo "<span class=\"badge badge-danger\">" . $lang->duplifalse . "</span>";
                            }
                            echo "                    </td>";
                            echo "<td><a href='/dashboard/device/" . $device["id"] . "' class=\"btn btn-primary\">" . $lang->show . "</a></td>";
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