<?php
$did = $card[0]["did"];

$flight_log = $dbc->get("SELECT * FROM tmkflights WHERE did=?", [$did]);
$device_cases = $dbc->get("SELECT * FROM cases WHERE device=?", [$did]);
$tmk_repairs = $dbc->get("SELECT * FROM tmkrepairs WHERE did=?", [$did]);
$devices = $dbc->get("SELECT * FROM devices WHERE id=?", [$did]);
$device = $devices[0];

$flightTime = 0;
$flightDistance = 0;

foreach ($flight_log as $flight) {
    $flightTime += $flight["timeinmin"];
    $flightDistance += $flight["distanceinm"];
}

$flightCount = count($flight_log);
$caseCount = count($device_cases);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Duplitec Service Management System</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/assets/css/chocolat.css" type="text/css" media="screen" >
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fullcalendar/fullcalendar.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <a href="/"><img src="<?php echo $logoColor; ?>" alt="Duplitec" width="200"><br></a>
                        <h6><small class="text-muted">Service Management System</small></h6>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header"><h4><?php echo $device["name"]; ?> - <?php echo $device["serial"]; ?></h4></div>
                        <div class="card-body">
                            <div class="section-title mt-0">Repülés hozzáadása</div>

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
                                    <input id="did" name="did" type="text" class="form-control" value="<?php echo $device["id"]; ?>" hidden>
                            </form>
                            <a onclick="addClick()" href="#" class="btn btn-icon icon-left btn-primary btn-block"><i class="fas fa-plus"></i> Repülés hozzáadása</a>
                        </div>

                        <div class="section-title mt-0">Áttekintés</div>

                        <div class="col-12">
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

                        <div class="col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-paper-plane"></i>
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

                        <div class="col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-paper-plane"></i>
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

                        <div class="col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-paper-plane"></i>
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

                        <div class="section-title mt-0">Kötelező karbantartások</div>

                        <div class="form-group">
                            <div class="activities">
                                <div class="activity">
                                    <?php
                                    if ($tmk_repairs[0][1] == null) {
                                        $firstColor = "primary";
                                        $firstIcon = "fas fa-hourglass-half";
                                        $firstText = "6 hónap múlva";
                                    } else if (isset($tmk_repairs[0][1])) {
                                        $firstColor = "success";
                                        $firstIcon = "fas fa-check";
                                        $firstText = "Elvégezve";
                                        if ($tmk_repairs[0][1] == 0) {
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
                                    if ($tmk_repairs[0][2] == null) {
                                        $secondColor = "primary";
                                        $secondIcon = "fas fa-hourglass-half";
                                        $secondText = "6 hónap múlva";
                                    } else if (isset($tmk_repairs[0][2])) {
                                        $secondColor = "success";
                                        $secondIcon = "fas fa-check";
                                        $secondText = "Elvégezve";
                                        if ($tmk_repairs[0][2] == 0) {
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
                                            <a class="text-job" href="#">11 hónap múlva esedékes</a>
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
                                            <a class="text-job" href="#">11 hónap múlva esedékes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    <a href="/"><?php echo $lang->backtohome; ?></a>
                </div>
                <div class="simple-footer">
                    Copyright <a href="#"><i class="fas fa-copyright"></i></a> <?php echo date("Y"); ?> FlyMore Kft.
                </div>
            </div>
        </div>
</div>
</section>
</div>

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<!-- JS Libraies -->
<script src="/assets/js/jquery.chocolat.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/fullcalendar/fullcalendar.min.js"></script>


<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>
