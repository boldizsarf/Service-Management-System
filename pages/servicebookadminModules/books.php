<script type="text/javascript">
    $(document).ready( function () {
        $("#casestable").dataTable( {
            ordering: true,
            colReorder: false
        } );
    } );
</script>
<form id="setting-form">
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Szervizkönyvek</h4>
            <div class="card-header-action">
                <a href="/dashboard/newservicebook" class="btn btn-primary">
                    <?php echo $lang->addnew; ?>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table data-order='[[ 0, "desc" ]]' id="casestable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Végfelhasználó</th>
                        <th>Eszköz</th>
                        <th>S/N</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbdevice = $dbc->get("SELECT * FROM devices ORDER BY id DESC");

                    foreach ($dbdevice as $device) {

                        $dbdeviceuser = $dbc->get("SELECT * FROM users WHERE id=? ORDER BY id DESC", [$device["uid"]]);

                        if (isset($dbdeviceuser[0]["role"])) {
                            if ($dbdeviceuser[0]["role"] == 20) {
                                echo "<tr>\n";
                                echo "                    <td>" . $dbdeviceuser[0]["firstname"] . "</td>\n";
                                echo "                    <td>" . $device["name"] . "</td>\n";
                                echo "                    <td>" . $device["serial"] . "</td>\n";
                                echo "<td><a href='/dashboard/servicebook/" . $device["id"] . "' class=\"btn btn-icon btn-sm btn-primary\"><i class='fas fa-eye'></i></a></td>";
                                echo "                </tr>";
                            }
                        }

                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>