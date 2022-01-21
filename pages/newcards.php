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
        <h1>MyDroneSafety</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Kártyák generálása</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addcards.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Mennyiség<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="qty" id="qty" required>
                                <option value="1">1db</option>
                                <option value="5">5db</option>
                                <option value="10">10db</option>
                                <option value="20">20db</option>
                                <option value="30">30db</option>
                                <option value="40">40db</option>
                                <option value="50">50db</option>
                                <option value="100">100db</option>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Termék<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="product" id="product" required>
                                <option value="mdsafety-1">MyDroneSafety +1év</option>
                                <option value="mdsafety-2">MyDroneSafety +2év</option>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->device; ?><span class="text-primary mb-2">*</span></label>
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Generálás
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>