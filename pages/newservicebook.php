<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/">';
    return;
}
?>
<section class="section">
    <div class="section-header">
        <h1>Szervizkönyv létrehozása</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Szervizkönyv létrehozása</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/tmkman.php?q=adddevice" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Eszköz típusa<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="device" id="device" required>
                                <?php
                                $devices = simplexml_load_file('db/devices.db');
                                foreach ($devices->devicegroup as $devicegroup) {
                                    echo "<optgroup label='" . $devicegroup["name"] . " " . $lang->series . "'>";
                                    foreach ($devicegroup->device as $device) {
                                        echo " <option>" . $device["name"] . "</option>";
                                    }
                                    echo "</optgroup>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Eszköz sorozatszáma<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="serial" id="serial" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Viszonteladó<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="reseller" id="reseller" required>
                                <?php
                                $dbresellerusers = $dbc->get("SELECT * FROM users WHERE role=? ORDER BY id DESC", ["21"]);
                                foreach ($dbresellerusers as $reselleruser) {
                                    echo " <option value='" . $reselleruser["id"] . "'>" . $reselleruser["firstname"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Végfelhasználó<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="enduser" id="enduser" required>
                                <?php
                                $dbendusers = $dbc->get("SELECT * FROM users WHERE role=? ORDER BY id DESC", ["20"]);
                                foreach ($dbendusers as $enduser) {
                                    echo " <option value='" . $enduser["id"] . "'>" . $enduser["firstname"] . " - " . $enduser["email"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Eladás dátuma<span class="text-primary mb-2">*</span></label>
                            <input type="date" class="form-control" name="purchasedate" id="purchasedate" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Hozzáadás
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>