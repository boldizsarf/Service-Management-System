<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);

if (empty($param[4])) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/pcase/' . $param[3] . '/status">';
    return;
}

$url = $serverurl . '/api/';
$data = array('username' => $apiuser, 'token' => $apitoken, 'query' => $param[3]);

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

if (isset($param[4])) {
    if ($param[4] == "s") {
        if (isset($param[5])) {
            if ($param[5] == 1) {
                echo '<script type="text/javascript">';
                echo 'window.onload = function(){';
                echo "document.forms['printpaper'].submit();";
                echo '}';
                echo '</script>';
            }
        }
    }
}

$dbmsgcheck = $dbc->get("SELECT * FROM pmessages WHERE cid=?", [$case["CaseID"]]);
$hasmsg = true;
if (empty($dbmsgcheck[0]["id"])) {
    $hasmsg = false;
}

?>
<section class="section">
    <div class="section-header">
        <h5 class="text-primary"><?php echo $case["TrackingID"]; ?> -
            <?php
            echo $case["Device"]["Name"];
            $products = simplexml_load_file('db/Products.xml');
            foreach ($products->Product as $product) {
                if ($case["Dist"] == "duplitec") {
                    if ($product->forg == "DP") {
                        if ($product->name == $case["Device"]["Name"]) {
                            echo " (SKU " . $product->sku . ")";
                        }
                    }
                } else if ($case["Dist"] == "magnew") {
                    if ($product->forg == "MG") {
                        if ($product->name == $case["Device"]["Name"]) {
                            echo " (SKU " . $product->sku . ")";
                        }
                    }
                }
            }
            ?>
        </h5>
        <div class="section-header-breadcrumb">
            <form id="printpaper" method="POST" action="/backend/b2blap.php" target="_blank">
                <input name="trackingid" type="text" class="form-control" value="<?php echo $case["TrackingID"]; ?>" hidden>
                <button type="submit" class="btn btn-icon icon-left btn-block btn-primary">
                    <i class="fas fa-print"></i> Szervizlap
                </button>
            </form>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <ul class="nav nav-pills" id="CaseTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "status") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/status">Állapot</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "chat") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/chat">Chat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "calendar") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/calendar">Naptár</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "caseinfo") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/caseinfo">Ügy részletei</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "messages") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/messages">Üzenetek</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "files") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/files">Fájlok</a>
                                </li>
                                <li class="nav-item" <?php $dbinspection = $dbc->get("SELECT * FROM pinspections WHERE pcid=? ORDER BY id DESC", [$case["CaseID"]]); if (empty($dbinspection[0]["id"])) { echo "hidden"; } ?>>
                                    <a class="nav-link <?php if ($param[4] == "viewinspection") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/viewinspection">Bevizsgálás eredménye</a>
                                </li>
                                <?php
                                if ($case["Branch"] == "doa" || $case["Status"]["Id"] == 15 || $case["CreditingID"] != null) {
                                    echo "<li class=\"nav-item\">";
                                    if ($param[4] == "crediting") { $active =  "active"; } else { $active =  ""; }
                                    echo "<a class=\"nav-link " . $active . "\" href=\"/dashboard/pcase/" . $case["TrackingID"] . "/crediting\">Jóváírás</a>";
                                    echo "</li>";
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "snchange") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/snchange">SN csere</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "inspection") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/inspection">Bevizsgálás</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($param[4] == "quote") { echo "active"; } ?>" href="/dashboard/pcase/<?php echo $case["TrackingID"]; ?>/quote">Árajánlat</a>
                                </li>
                            </ul>
                        </div>

                        <?php
                        if (file_exists('pages/pcasemodules/' . $param[4] . '.php')) {
                            require 'pages/pcasemodules/' . $param[4] . '.php';
                        } else {
                            echo "<div class=\"card\">\n";
                            echo "                  <div class=\"card-header\">\n";
                            echo "                    <h4>" . $lang->error . "</h4>\n";
                            echo "                  </div>\n";
                            echo "                  <div class=\"card-body\">\n";
                            echo "                    <div class=\"empty-state\" data-height=\"400\" style=\"height: 400px;\">\n";
                            echo "                      <div class=\"empty-state-icon\">\n";
                            echo "                        <i class=\"fas fa-question\"></i>\n";
                            echo "                      </div>\n";
                            echo "                      <h2>404</h2>\n";
                            echo "                      <p class=\"lead\">\n";
                            echo $lang->pagenotfound;
                            echo "                      </p>\n";
                            echo "                      <a href=\"/dahsboard\" class=\"btn btn-primary mt-4\">" . $lang->backtohome . "</a>\n";
                            echo "                    </div>\n";
                            echo "                  </div>\n";
                            echo "                </div>";

                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>