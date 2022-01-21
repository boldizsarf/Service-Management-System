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
        $("#cardstable").dataTable( {
            ordering: true,
            colReorder: false
        } );
    } );
</script>
<section class="section">
    <div class="section-header">
        <h1>Kedvezmények</h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newcoupons" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Hozzáadás</a>
        </div>
    </div>
    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Kedvezmények</h4>
            </div>
            <div class="card-body">
                <table data-order='[[ 0, "desc" ]]' id="cardstable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Érték</th>
                        <th>Típus</th>
                        <th>Eszköz</th>
                        <th>Kezdés</th>
                        <th>Befejezés</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbcoupons = $dbc->get("SELECT * FROM coupons ORDER BY id DESC");

                    foreach ($dbcoupons as $coupon) {

                        switch ($coupon["type"]) {
                            case "final":
                                $type = "Végösszegre";
                                break;
                            case "parts":
                                $type = "Alkatrészek árára";
                                break;
                            case "hours":
                                $type = "Munkadíj árára";
                                break;
                        }

                        switch ($coupon["device"]) {
                            default:
                                $device = $coupon["device"];
                                break;
                            case "all":
                                $device = "Összes készülék";
                                break;
                        }


                        echo "<tr>\n";
                        echo "                    <th data-order=\"" . $coupon["id"] . "\">" . $coupon["id"] . "</th>\n";
                        echo "                    <td>" . $coupon["name"] . "</td>\n";
                        echo "                    <td>" . $coupon["value"] . "%</td>\n";
                        echo "                    <td>" . $type . "</td>\n";
                        echo "                    <td>" . $device . "</td>\n";
                        echo "                    <td>" . $coupon["start"] . "</td>\n";
                        echo "                    <td>" . $coupon["end"] . "</td>\n";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>