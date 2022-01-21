<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$param[3]]);
$case = $dbcase[0];

$dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$dbcase[0]["device"]]);
$device = $dbdevice[0];

$dbmsgcheck = $dbc->get("SELECT * FROM messages WHERE cid=?", [$case["id"]]);
$hasmsg = true;
if (empty($dbmsgcheck[0]["id"])) {
    $hasmsg = false;
}

if ($param[4] == "billaction") {
    $iid = $_POST["iid"];
    $accepted = $_POST["accepted"];
    $acceptnote = $_POST["acceptnote"];
    $date = date("Y-m-d H:i:s");
    $dbc->set("UPDATE inspections SET accepted=? WHERE id=?",
        [$accepted, $iid]);
    $dbc->set("UPDATE inspections SET accepteddate=? WHERE id=?",
        [$date, $iid]);
    $dbc->set("UPDATE inspections SET acceptnote=? WHERE id=?",
        [$acceptnote, $iid]);

    if ($accepted == 1) {
        $status = 8;
        $notify = new notify();
        $dbadmins = $dbc->get("SELECT * FROM users WHERE role=? OR role=?", ["1", "4"]);
        $ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " elfogadta az ajánlatot";
        foreach ($dbadmins as $admin) {
            $notify->add($admin["id"], $ntxt, null, null, $serverurl . "/dashboard/case/" . $param[3], null, "fas fa-vote-yea");
        }
    } else {
        $status = 16;
        $notify = new notify();
        $dbadmins = $dbc->get("SELECT * FROM users WHERE role=? OR role=?", ["1", "4"]);
        $ntxt = $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " elutasította az ajánlatot";
        foreach ($dbadmins as $admin) {
            $notify->add($admin["id"], $ntxt, null, null, $serverurl . "/dashboard/case/" . $param[3], null, "fas fa-times");
        }
    }

    $dbstatus = $dbc->get("SELECT * FROM casestatuses ORDER BY id DESC");
    $sid = $dbstatus[0]["id"] + 1;
    $dbc->set("INSERT INTO casestatuses (id, cid, status, date) VALUES (?, ?, ?, ?)",
        [$sid, $param[3], $status, date("Y-m-d H:i:s")]);

    $statuses = simplexml_load_file('./../db/statuses.db');
    $lngcd = strval($_COOKIE["sw_lang"]);
    $statustext = null;
    $statuscolor = null;
    $statusicon = null;
    foreach ($statuses->status as $xmlstatus) {
        if ($xmlstatus["id"] == $status) {
            $statustext = $xmlstatus->$lngcd;
            $statuscolor = $xmlstatus->color;
            $statusicon = $xmlstatus->icon;
        }
    }

    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/mycase/' . $param[3] . '">';
    return;
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
?>
<section class="section">
    <div class="section-header">
        <h1>MDS-<?php echo date("Y",strtotime($dbcase[0]["created"]))?>/ C<?php echo $dbcase[0]["id"]?> - <?php echo $dbdevice[0]["name"]?></h1>
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
                        </ul>
                        <div class="tab-content" id="CaseTabContents">
                            <?php
                            require 'mycasemodules/status.php';
                            require 'mycasemodules/caseinfo.php';
                            require 'mycasemodules/devicedata.php';
                            require 'mycasemodules/files.php';
                            require 'mycasemodules/viewinspection.php';
                            require 'mycasemodules/messages.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>