<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

$dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$param[3]]);
$device = $dbdevice[0];

?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $device["name"] . " - " . $device["serial"]; ?></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Szériaszám megváltoztatása (<?php echo $device["name"] . " - " . $device["serial"]; ?> főegységnek)</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/modifydevice.php?q=serialchange">

                    <input type="text" class="form-control" name="did" id="did" value="<?php echo $param[3]; ?>" hidden>

                    <input type="text" class="form-control" name="oldsn" id="oldsn" value="<?php echo $device["serial"]; ?>" hidden>

                    <!-- Szériaszám -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Új szériaszám<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="serial" id="serial" required>
                            <small class="form-text text-muted">
                                <?php echo $lang->snhelp; ?>
                            </small>
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Megváltoztatás
                        </button>
                </form>
            </div>
        </div>
    </div>
</section>