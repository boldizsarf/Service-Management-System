<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

$dbaccessory = $dbc->get("SELECT * FROM accessories WHERE id=?", [$param[3]]);
$accessory = $dbaccessory[0];
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $accessory["type"] . " - " . $accessory["serial"]; ?></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Szériaszám megváltoztatása (<?php echo $accessory["type"] . " - " . $accessory["serial"]; ?> tartozéknak)</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/modifyacc.php?q=serialchange">

                    <input type="text" class="form-control" name="aid" id="aid" value="<?php echo $param[3]; ?>" hidden>

                    <input type="text" class="form-control" name="did" id="did" value="<?php echo $accessory["did"]; ?>" hidden>
                    <input type="text" class="form-control" name="oldsn" id="oldsn" value="<?php echo $accessory["serial"]; ?>" hidden>

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