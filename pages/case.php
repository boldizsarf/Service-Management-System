<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}
$dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$param[3]]);
$case = $dbcase[0];

$dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$dbcase[0]["device"]]);
$device = $dbdevice[0];

$dbduser = $dbc->get("SELECT * FROM users WHERE id=?", [$device["uid"]]);
$duser = $dbduser[0];

$dbmsgcheck = $dbc->get("SELECT * FROM messages WHERE cid=?", [$case["id"]]);
$hasmsg = true;
if (empty($dbmsgcheck[0]["id"])) {
    $hasmsg = false;
}


if ($param[4] == "toobig") {
    echo "<script type=\"text/javascript\">\n";
    echo "    window.onload = swal({\n";
    echo "        title: 'A fájl meghaladja a maximális méretet!',\n";
    echo "        icon: 'error',\n";
    echo "        dangerMode: true,\n";
    echo "    })
                            .then((willRedirect) => {
                                if (willRedirect) {
                                    window.location.replace(\"/dashboard/" . $param[2] . "/" . $param[3] . "\");
                                }
                            });;\n";
    echo "</script>";
}

if ($param[4] == "carrie") {
    $dbc->set("UPDATE cases SET carriedby=? WHERE id=?",
        [$uid, $param[3]]);
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/case/' . $param[3] . '">';
    return;
}

$dbendtest = $dbc->get("SELECT * FROM endtest WHERE cid=? ORDER BY id DESC", [$param[3]]);

?>
<section class="section">
    <div class="section-header">
        <?php
        if (isset($case["daddress"])) {
            if ($case["daddress"] != 0) {
                $dbdaddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["daddress"]]);
                if (isset($dbdaddress[0])) {
                    $daddress = $dbdaddress[0];
                } else {
                    $daddress["country"] = "Nincs megadott cím";
                    $daddress["postcode"] = "Nincs megadott cím";
                    $daddress["city"] = "Nincs megadott cím";
                    $daddress["address"] = "Nincs megadott cím";
                }
            }
        } else {
            $daddress = "Nincs megadott cím";
        }

        ?>
        <h1 data-toggle="tooltip" title="SN: <?php echo $device["serial"]; ?>, <?php echo $duser["lastname"] . " " . $duser["firstname"]; ?> (<?php echo $duser["email"] . "; " . $duser["phone"] . "; " . $daddress["country"] . ", " . $daddress["postcode"] . " " . $daddress["city"] . ", " . $daddress["address"]; ?>)">MDS-<?php echo date("Y",strtotime($dbcase[0]["created"]))?>/ C<?php echo $dbcase[0]["id"]?> - <?php echo $dbdevice[0]["name"]?></h1>

        <div class="section-header-breadcrumb">
            <div class="btn-group mb-3" role="group">
                <a href="/dashboard/mycase/<?php echo $dbcase[0]["id"]; ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-eye"></i> Ügyfél nézet</a>
                <a href="/dashboard/case/<?php echo $dbcase[0]["id"]; ?>/carrie" class="btn btn-icon icon-left btn-primary"><i class="fas fa-user-plus"></i> Ügy felvétele</a>
            </div>
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
                            <li class="nav-item">
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#caseinfo" role="tab" aria-controls="caseinfo" aria-selected="false"><?php echo $lang->caseinfo; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#devicedata" role="tab" aria-controls="devicedata" aria-selected="false"><?php echo $lang->devicedata; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false"><?php echo $lang->messages; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="status-casetabs" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false"><?php echo $lang->files; ?></a>
                            </li>

                            <?php
                            $dbinspection = $dbc->get("SELECT * FROM inspections WHERE cid=? ORDER BY id DESC", [$param[3]]);
                            if (isset($dbinspection[0]["id"])) {
                                echo "<li class=\"nav-item\">";
                                echo "<a class=\"nav-link\" id=\"viewinspection-casetabs\" data-toggle=\"tab\" href=\"#viewinspection\" role=\"tab\" aria-controls=\"viewinspection\" aria-selected=\"false\">" . $lang->inspection . "</a>";
                                echo "</li>";
                            }
                            ?>

                            <li class="nav-item">
                                <a class="nav-link" id="inspection-casetabs" data-toggle="tab" href="#inspection" role="tab" aria-controls="inspection" aria-selected="false"><?php echo $lang->inspect; ?></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="endtest-casetabs" data-toggle="tab" href="#endtest" role="tab" aria-controls="endtest" aria-selected="false">Végtesztelés</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="CaseTabContents">
                            <?php
                            require 'casemodules/status.php';
                            require 'casemodules/caseinfo.php';
                            require 'casemodules/devicedata.php';
                            require 'casemodules/messages.php';
                            require 'casemodules/files.php';
                            require 'casemodules/viewinspection.php';
                            require 'casemodules/inspection.php';
                            require 'casemodules/endtest.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>