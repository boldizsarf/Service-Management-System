<?php
$url = $serverurl . '/api/';
$data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $param[2]);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$case = json_decode($result, true);

if (isset($_POST["nextsid"])) {
    if ($_POST["nextsid"] == $case["Status"]["Responsible"]["NextSID"]) {
        $dbstatus = $dbc->get("SELECT * FROM pcasestatuses ORDER BY id DESC");
        $sid = $dbstatus[0]["id"] + 1;

        $dbc->set("INSERT INTO pcasestatuses (id, pcid, status, date) VALUES (?, ?, ?, ?)",
            [$sid, $case["CaseID"], $_POST["nextsid"], date("Y-m-d H:i:s")]);

        echo '<meta http-equiv="refresh" content="0; URL=/quicktrack/' . $case["TrackingID"] . '/">';
        return;
    }
}
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
                        <div class="card-header"><h4><?php echo $case["TrackingID"]; ?></h4></div>
                        <div class="card-body">
                            <div class="form-group">
                                <center>
                                    <h4 class="<?php echo $case["Status"]["Color"]; ?>"><?php echo $case["Status"]["TextHU"]; ?></h4>
                                    <i class="<?php echo $case["Status"]["Icon"]; ?> <?php echo $case["Status"]["Color"]; ?>" style="font-size: 1000%;"></i>
                                </center>
                            </div>

                            <div class="form-group">
                                <div class="activities">
                                    <?php
                                    $dbstatus = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? ORDER BY id ASC", [$case["CaseID"]]);
                                    $statuses = simplexml_load_file('db/pstatuses.db');
                                    $lngcd = strval($_COOKIE["sw_lang"]);
                                    foreach ($dbstatus as $status) {
                                        foreach ($statuses->status as $xmlstatus) {
                                            if ($xmlstatus["id"] == $status["status"]) {
                                                $statustext = $xmlstatus->$lngcd;
                                                $statuscolor = $xmlstatus->color;
                                                $statusicon = $xmlstatus->icon;
                                            }
                                        }
                                        echo "                                            <div class=\"activity\">\n";
                                        echo "                                                <div class=\"activity-icon bg-primary text-white shadow-primary\">\n";
                                        echo "                                                    <i class=\"" . $statusicon . "\"></i>\n";
                                        echo "                                                </div>\n";
                                        echo "                                                <div class=\"activity-detail\">\n";
                                        echo "                                                    <div class=\"mb-2\">\n";
                                        echo "                                                        <span class=\"text-job\">" . $status["date"] . "</span>\n";
                                        echo "                                                    </div>\n";
                                        echo "                                                    <p>" . $statustext . "</p>\n";
                                        if ($status["status"] == "5") {
                                            if ($case["casnumber"] != null) {
                                                echo "<p>Nemzetközi nyomonkövetési szám: " . $case["casnumber"] . "</p>\n";
                                                echo "<p><a href='https://repair.dji.com/en/support/RepairTrace' target='_blank'>Nyomonkövetés az alábbi linken</a></p>\n";
                                            }
                                        }
                                        echo "                                                </div>\n";
                                        echo "                                            </div>\n";

                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="section-title mt-0">Teendő</div>

                            <div class="form-group">
                                <label for="email">Következő lépés</label>
                                <input value="<?php echo $case["Status"]["Responsible"]["Text"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Esedékes</label>
                                <input value="<?php echo $case["Status"]["Task"]["TaskNoteHU"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Felelős neve</label>
                                <input value="<?php echo $case["Status"]["Responsible"]["Name"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Felelős email</label>
                                <input value="<?php echo $case["Status"]["Responsible"]["Email"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <script type="text/javascript">
                                    function doneClick() {
                                        swal({
                                            title: 'Biztos, hogy ez a te feladatod, és el is végezted azt?',
                                            icon: 'warning',
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                            .then((willAdd) => {
                                                if (willAdd) {
                                                    document.getElementById("doneform").submit();
                                                }
                                            });
                                    }
                                </script>
                                <a onclick="doneClick()" href="#" class="btn btn-icon icon-left btn-primary btn-block" <?php if ($case["Status"]["Responsible"]["NextSID"] == 0) { echo "hidden"; } ?>><i class="fas fa-check"></i> Feladat kipipálása</a>
                                <form id="doneform" method="POST" action="/quicktrack/<?php echo $case["TrackingID"]; ?>/">
                                    <input name="nextsid" type="text" class="form-control" value="<?php echo $case["Status"]["Responsible"]["NextSID"]; ?>" hidden>
                                </form>
                            </div>


                            <div class="section-title mt-0">Azonosítók</div>

                            <div class="form-group">
                                <label for="email">Tracking ID</label>
                                <input value="<?php echo $case["TrackingID"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Hivatkozási szám</label>
                                <input value="<?php echo $case["ExternalID"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">CAS</label>
                                <input value="<?php echo $case["CAS"]; ?>" type="text" class="form-control" readonly>
                            </div>

                            <div class="section-title mt-0">Partner adatok</div>

                            <div class="form-group">
                                <label for="email">Parnter neve</label>
                                <input value="<?php echo $case["Partner"]["Name"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Üzlet neve</label>
                                <input value="<?php echo $case["Partner"]["Store"]; ?>" type="text" class="form-control" readonly>
                            </div>

                            <div class="section-title mt-0">Kapcsolattartási adatok</div>

                            <div class="form-group">
                                <label for="email">Kapcsolattartó neve</label>
                                <input value="<?php echo $case["Partner"]["Contact"]["Name"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Kapcsolattartó email</label>
                                <input value="<?php echo $case["Partner"]["Contact"]["Email"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Kapcsolattartó telefon</label>
                                <input value="<?php echo $case["Partner"]["Contact"]["Phone"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Kapcsolattartó cím</label>
                                <input value="<?php echo $case["Partner"]["Contact"]["Address"]; ?>" type="text" class="form-control" readonly>
                            </div>

                            <div class="section-title mt-0">Készülék adatok</div>

                            <div class="form-group">
                                <label for="email">Típus</label>
                                <input value="<?php echo $case["Device"]["Name"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">SN</label>
                                <input value="<?php echo $case["Device"]["SerialNumber"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Vásárlás időpontja</label>
                                <input value="<?php echo $case["Device"]["PurchaseDate"]; ?>" type="text" class="form-control" readonly>
                            </div>

                            <div class="section-title mt-0">Probléma</div>

                            <div class="form-group">
                                <label for="email">Leírás</label>
                                <input value="<?php echo $case["Problem"]["Description"]; ?>" type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Jelentkezés időpontja</label>
                                <input value="<?php echo $case["Problem"]["Date"]; ?>" type="text" class="form-control" readonly>
                            </div>

                            <div <?php if (is_dir("puploads/" . hash("sha256", $param[2])) == false) { echo "hidden"; } ?>>
                                <div class="section-title mt-0">Fájlok</div>

                                <?php
                                $files = scandir("puploads/" . hash("sha256", $param[2]));
                                $i2 = null;
                                foreach($files as $file) {
                                    $i2++;
                                    if ($i2 > 2)
                                        echo "<p><a href='" . "/puploads/" . hash("sha256", $param[2]) . "/" . $file . "' target='_blank'>" . $file . " (" . date ("Y.m.d H:i:s", filemtime("puploads/" . hash("sha256", $param[2]) . "/" . $file)) . ")</a></p>";
                                }
                                ?>
                            </div>


                            <!-- Megjegyzés -->

                            <div class="section-title mt-0">Megjegyzés</div>

                            <div class="form-group">
                                <label>Megjegyzés</label>
                                <textarea name="note" id="note" rows="10" cols="60" readonly><?php echo $case["Note"]; ?></textarea>
                                <script>
                                    CKEDITOR.replace( 'note' );
                                </script>
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
