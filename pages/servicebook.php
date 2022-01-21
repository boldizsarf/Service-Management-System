<?php
$device = $dbc->get("SELECT * FROM devices WHERE id=?", [$param[3]]);
$devicedata = $dbc->get("SELECT * FROM tmkdevicedata WHERE did=?", [$param[3]]);
$flight_log = $dbc->get("SELECT * FROM tmkflights WHERE did=?", [$param[3]]);
$device_cases = $dbc->get("SELECT * FROM cases WHERE device=?", [$param[3]]);
$tmk_repairs = $dbc->get("SELECT * FROM tmkrepairs WHERE did=?", [$param[3]]);

$tmk_qr = $dbc->get("SELECT * FROM tmkqr WHERE did=?", [$param[3]]);

$flightTime = 0;
$flightDistance = 0;

foreach ($flight_log as $flight) {
    $flightTime += $flight["timeinmin"];
    $flightDistance += $flight["distanceinm"];
}

$flightCount = count($flight_log);
$caseCount = count($device_cases);

$now = new DateTime();
$future_date = new DateTime($devicedata[0]["purchaseDate"] . " + 2 years");

$interval = $future_date->diff($now);

$remaining =  intval($interval->format("%m"));

$remaining += intval($interval->format("%y")*12);

if ($remaining != 0) {
    $remaining = $remaining . " hónap";
    $remainingColor = "success";
} else {
    $remaining = "Lejárt";
    $remainingColor = "danger";
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $device[0]["name"]; ?> - <?php echo $device[0]["serial"]; ?></h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Összes repülés</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            echo $flightCount;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Repülési idő</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            echo number_format($flightTime/60, 2);
                            ?>
                             óra
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Javítások</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $caseCount; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-<?php echo $remainingColor; ?>">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Garanciális idő</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $remaining; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" hidden>
            <div class="col-12">
                <div class="alert alert-warning">
                    This is a warning alert.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Eszköz adatai</h4>
            </div>
            <div class="card-body">
                <h6>Szériaszám: <span class="text-primary mb-2"><?php echo $device[0]["serial"]; ?></span></h6>
                <h6>Vásárlás dátuma: <span class="text-primary mb-2"><?php echo $devicedata[0]["purchaseDate"]; ?></span></h6>
                <h6>Kötelező oktatás: <span class="text-primary mb-2"><?php if (isset($devicedata[0]["lesson"])) { echo $devicedata[0]["lesson"]; } else { echo "Nincs elvégezve"; } ?></span></h6>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Eszköz ügyei</h4>
                <div class="card-header-action">
                    <a href="/dashboard/newcase" class="btn btn-primary">
                        Létrehozás
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php
                $dbcase = $dbc->get("SELECT * FROM cases WHERE device=?", [$param[3]]);

                if (empty($dbcase[0]["id"])) {
                    echo "<div class=\"empty-state\" data-height=\"400\" style=\"height: 400px;\">\n";
                    echo "                    <div class=\"empty-state-icon\">\n";
                    echo "                        <i class=\"fas fa-question\"></i>\n";
                    echo "                    </div>\n";
                    echo "                    <h2>Nem található ügy</h2>\n";
                    echo "                    <p class=\"lead\">\n";
                    echo "                        Még nem hoztak létre ügyet ehhez az eszközhöz.\n";
                    echo "                    </p>\n";
                    echo "                </div>";

                }
                ?>
                <div class="row">
                    <?php
                    $dbcase = $dbc->get("SELECT * FROM cases WHERE device=?", [$param[3]]);

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
        <div class="row">
            <div class="col-6">
                <div class="card" style="height: 465px;">
                    <div class="card-header">
                        <h4>Kötelező javítások</h4>
                    </div>
                    <div class="card-body">
                        <div class="activities">
                            <div class="activity">
                                <?php
                                if ($tmk_repairs[0]["first"] == null) {
                                    $firstColor = "primary";
                                    $firstIcon = "fas fa-hourglass-half";
                                    $firstText = "6 hónap múlva";
                                } else if (isset($tmk_repairs[0]["first"])) {
                                    $firstColor = "success";
                                    $firstIcon = "fas fa-check";
                                    $firstText = "Elvégezve";
                                    if ($tmk_repairs[0]["first"] == 0) {
                                        $firstColor = "danger";
                                        $firstIcon = "fas fa-times";
                                        $firstText = "Nincs elvégezve";
                                    }
                                }
                                ?>
                                <div class="activity-icon bg-<?php echo $firstColor; ?> text-white shadow-<?php echo $firstColor; ?>">
                                    <i class="<?php echo $firstIcon; ?>"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary">6 hónapos javítás</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#"><?php echo $firstText; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="activity">
                                <?php
                                if ($tmk_repairs[0]["second"] == null) {
                                    $secondColor = "primary";
                                    $secondIcon = "fas fa-hourglass-half";
                                    $secondText = "12 hónap múlva";
                                } else if (isset($tmk_repairs[0]["second"])) {
                                    $secondColor = "success";
                                    $secondIcon = "fas fa-check";
                                    $secondText = "Elvégezve";
                                    if ($tmk_repairs[0]["second"] == 0) {
                                        $secondColor = "danger";
                                        $secondIcon = "fas fa-times";
                                        $secondText = "Nincs elvégezve";
                                    }
                                }
                                ?>
                                <div class="activity-icon bg-<?php echo $secondColor; ?> text-white shadow-<?php echo $secondColor; ?>">
                                    <i class="<?php echo $secondIcon; ?>"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary">12 hónapos javítás</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#"><?php echo $secondText; ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-hourglass-half"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary">18 hónapos javítás</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">18 hónap múlva esedékes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-hourglass-half"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary">24 hónapos javítás</span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">24 hónap múlva esedékes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Repülési napló</h4>
                        <div class="card-header-action">
                            <a href="/dashboard/addfha/<?php echo $device[0]["id"]; ?>" class="btn btn-primary">
                                <?php echo $lang->addnew; ?>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <script type="text/javascript">
                            $(document).ready( function () {
                                $("#userstable").dataTable( {
                                    ordering: true,
                                    colReorder: false
                                } );
                            } );
                        </script>
                        <table data-order='[[ 0, "desc" ]]' id="userstable" class="table table-striped">
                            <thead>
                            <tr>
                                <th><i class="fas fa-calendar"></i></th>
                                <th><i class="far fa-clock"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($flight_log as $flight) {
                                echo "<tr>\n";
                                echo "                    <td>" . $flight["date"] . "</td>\n";
                                echo "                    <td>" . $flight["timeinmin"] . "perc</td>\n";
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
</section>