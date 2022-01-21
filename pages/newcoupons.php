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
        <h1>Kedvezmény létrehozás</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Kedvezmény létrehozás</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addcoupon.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kedvezmény neve<span class="text-primary mb-2">*</span></label>
                            <input name="name" id="name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kezdeti dátum<span class="text-primary mb-2">*</span></label>
                            <input name="startdate" id="startdate" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Befejezési dátum<span class="text-primary mb-2">*</span></label>
                            <input name="enddate" id="enddate" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kedvezmény (% -ban)<span class="text-primary mb-2">*</span></label>
                            <input name="cval" id="cval" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->device; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="device" id="device" required>
                                <option value="all" selected>Összes készülék</option>
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
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kedvezmény típusa<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="type" id="type" required>
                                <option value="final" selected>Végösszegre</option>
                                <option value="parts">Alkatrészek árára</option>
                                <option value="hours">Munkadíj árára</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Létrehozás
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>