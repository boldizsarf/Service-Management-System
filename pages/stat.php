<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

$year = $param[3];
if (empty($year)) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/stat/' . date("Y") . '">';
    return;
}
?>
<script>
    $(document).ready(function () {
        showGraph();
    });

    function showGraph() {
        // Cases by type
        <?php
        require 'statmodules/casesbytype/data.php';
        require 'statmodules/casesbytype/graph.php';
        ?>

        // Cases by status
        <?php
        require 'statmodules/casesbystatus/data.php';
        require 'statmodules/casesbystatus/graph.php';
        ?>

        // B2B by status
        <?php
        require 'statmodules/b2bbystatus/data.php';
        require 'statmodules/b2bbystatus/graph.php';
        ?>

        // B2B by type
        <?php
        require 'statmodules/b2bbytype/data.php';
        require 'statmodules/b2bbytype/graph.php';
        ?>

        // B2B by type
        <?php
        require 'statmodules/b2bbydist/data.php';
        require 'statmodules/b2bbydist/graph.php';
        ?>

        // Cases by status WARRANTY
        <?php
        require 'statmodules/casesbystatusw/data.php';
        require 'statmodules/casesbystatusw/graph.php';
        ?>

        // Cases by status PAID
        <?php
        require 'statmodules/casesbystatusp/data.php';
        require 'statmodules/casesbystatusp/graph.php';
        ?>

        // Drones added by date
        <?php
        require 'statmodules/drones/data.php';
        require 'statmodules/drones/graph.php';
        ?>

        // Drones added by date WARRANTY
        <?php
        require 'statmodules/wdrones/data.php';
        require 'statmodules/wdrones/graph.php';
        ?>

        // Drones added by date PAID
        <?php
        require 'statmodules/pdrones/data.php';
        require 'statmodules/pdrones/graph.php';
        ?>

        // Top 5 drones
        <?php
        require 'statmodules/top5drones/data.php';
        require 'statmodules/top5drones/graph.php';
        ?>

        // Cases by dist
        <?php
        require 'statmodules/casesbydist/data.php';
        require 'statmodules/casesbydist/graph.php';
        ?>

        // Average time Warranty
        <?php
        require 'statmodules/averagew/data.php';
        require 'statmodules/averagew/graph.php';
        ?>

        // Average time Paid
        <?php
        require 'statmodules/averagep/data.php';
        require 'statmodules/averagep/graph.php';
        ?>
    }
</script>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->stat; ?> (<?php echo $year; ?>)</h1>
        <div class="section-header-breadcrumb">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/dashboard/stat/2020" class="btn btn-primary">2020</a>
                <a href="/dashboard/stat/2021" class="btn btn-primary">2021</a>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="casesbytype"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="casesbystatus"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="wcasesbystatus"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="pcasesbystatus"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="b2bbytype"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="b2bbystatus"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="b2bbydist"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="drones"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="top5drones"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="wdrones"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="pdrones"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="averagew"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="averagep"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" hidden>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="b2bavgtime"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>