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
            <h4>Végfelhasználók</h4>
            <div class="card-header-action">
                <a href="/dashboard/newservicebookuser" class="btn btn-primary">
                    <?php echo $lang->addnew; ?>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table data-order='[[ 0, "desc" ]]' id="casestable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Név</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbendusers = $dbc->get("SELECT * FROM users WHERE role=? ORDER BY id DESC", ["20"]);

                    foreach ($dbendusers as $enduser) {

                        echo "<tr>\n";
                        echo "                    <td>" . $enduser["firstname"] . "</td>\n";
                        echo "<td><a href='/dashboard/user/" . $enduser["id"] . "' class=\"btn btn-icon btn-sm btn-primary\"><i class='fas fa-eye'></i></a></td>";
                        echo "                </tr>";

                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>