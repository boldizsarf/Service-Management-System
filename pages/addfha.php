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
        <div class="section-header-breadcrumb">
            <a href="/dashboard/servicebook/<?php echo $device[0]["id"]; ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-angle-double-right"></i> Vissza a géphez</a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Repülés hozzáadása</h4>
            </div>
            <div class="card-body">

                <form id="addform" method="POST" action="/backend/tmkman.php?q=addflight">
                    <div class="form-group">
                        <label for="email">Repült percek</label>
                        <input id="timeinmin" name="timeinmin" type="number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Dátum</label>
                        <input id="date" name="date" value="<?php echo date("Y-m-d"); ?>" type="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <script type="text/javascript">
                            function addClick() {
                                swal({
                                    title: 'Biztos, hogy hozzáadod ezt a repülést?',
                                    icon: 'warning',
                                    buttons: true,
                                    dangerMode: true,
                                })
                                    .then((willAdd) => {
                                        if (willAdd) {
                                            document.getElementById("addform").submit();
                                        }
                                    });
                            }
                        </script>
                        <input id="did" name="did" type="text" class="form-control" value="<?php echo $device[0]["id"]; ?>" hidden>
                </form>
                <a onclick="addClick()" href="#" class="btn btn-icon icon-left btn-primary btn-block"><i class="fas fa-plus"></i> Repülés hozzáadása</a>
            </div>
        </div>
    </div>
</section>