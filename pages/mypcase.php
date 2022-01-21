<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);

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
        <h1><?php echo $case["TrackingID"]; ?> - <?php echo $case["Device"]["Name"]; ?></h1>
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
                        <ul class="nav nav-pills" id="CaseTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="status-casetabs" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="true"><?php echo $lang->status; ?></a>
                            </li>
                            <li class="nav-item" hidden>
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#calendar" role="tab" aria-controls="calendar" aria-selected="true">Naptár</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#caseinfo" role="tab" aria-controls="caseinfo" aria-selected="false"><?php echo $lang->caseinfo; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false"><?php echo $lang->messages; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false"><?php echo $lang->files; ?></a>
                            </li>

                            <?php
                            $dbinspection = $dbc->get("SELECT * FROM pinspections WHERE pcid=? ORDER BY id DESC", [$case["CaseID"]]);
                            if (isset($dbinspection[0]["id"])) {
                                echo "<li class=\"nav-item\">";
                                echo "<a class=\"nav-link\" id=\"viewinspection-casetabs\" data-toggle=\"tab\" href=\"#viewinspection\" role=\"tab\" aria-controls=\"viewinspection\" aria-selected=\"false\">" . $lang->inspection . "</a>";
                                echo "</li>";
                            }
                            ?>
                        </ul>
                        <div class="tab-content" id="CaseTabContents">
                            <?php
                            require 'mypcasemodules/status.php';
                            require 'mypcasemodules/calendar.php';
                            require 'mypcasemodules/caseinfo.php';
                            require 'mypcasemodules/devicedata.php';
                            require 'mypcasemodules/files.php';
                            require 'mypcasemodules/viewinspection.php';
                            require 'mypcasemodules/messages.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>