<form id="asd" method="post" action="/backend/pcaseman.php?q=crediting">
    <div class="row">
        <div class="col-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Jóváírás</h4>
                </div>
                <div class="card-body">
                    <div class="form-group col-12">
                        <label>Jóváírási szám</label>
                        <input value="<?php echo $case["CreditingID"]; ?>" name="creditingid" id="creditingid" type="text" class="form-control" <?php if ($case["CreditingID"] != null) { echo "readonly"; }  ?>>
                    </div>
                </div>
            </div>

            <div class="form-group" <?php if ($case["CreditingID"] != null) { echo "hidden"; }  ?>>
                <input value="<?php echo $case["TrackingID"]; ?>" name="cid" id="cid" type="text" class="form-control" hidden required>
                <button type="submit" class="btn btn-icon icon-left btn-block btn-lg btn-primary">
                    <i class="fas fa-check-circle"></i> Jóváírás
                </button>
            </div>
        </div>
    </div>
</form>