<div class="tab-pane fade" id="caseinfo" role="tabpanel" aria-labelledby="caseinfo-casetabs">
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Kapcsolattartási adatok</h4>
                </div>

                <div class="card-body">
                    <!-- Kapcsolattartó -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kapcsolattartó<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Name"]; ?>" name="nameCell" id="nameCell" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Név -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Név<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Name"]; ?>" name="nameCell" id="nameCell" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Email cím -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Email cím<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Email"]; ?>" name="emailCell" id="emailCell" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Telefon -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Telefon<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Phone"]; ?>" name="phoneCell" id="phoneCell" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Cím -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Cím<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Address"]; ?>" name="addressCell" id="addressCell" type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Ügyintézési adatok</h4>
                </div>

                <div class="card-body">
                    <!-- Külsős esetszám -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Hivatkozási szám</label>
                            <input value="<?php echo $case["ExternalID"]; ?>" name="etrackid" id="etrackid" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Vásárlás dátuma-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Vásárlás időpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Device"]["PurchaseDate"]; ?>" name="purchasedate" id="purchasedate" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Átvétel dátuma-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Átvétel időpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["SubmitDate"]; ?>" name="submitdate" id="submitdate" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Rendezés módja -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Rendezés módja<span class="text-primary mb-2">*</span></label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="1" class="selectgroup-input" <?php if ($case["HandlingWay"] == "1") { echo 'checked=""'; } ?> disabled>
                                    <span class="selectgroup-button"><i class="fas fa-exchange-alt"></i> G. csere</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="2" class="selectgroup-input" <?php if ($case["HandlingWay"] == "2") { echo 'checked=""'; } ?> disabled>
                                    <span class="selectgroup-button"><i class="fas fa-tools"></i> G. javítás</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="3" class="selectgroup-input" <?php if ($case["HandlingWay"] == "3") { echo 'checked=""'; } ?> disabled>
                                    <span class="selectgroup-button"><i class="fas fa-money-bill-wave"></i> F. javítás</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="4" class="selectgroup-input" <?php if ($case["HandlingWay"] == "4") { echo 'checked=""'; } ?> disabled>
                                    <span class="selectgroup-button"><i class="fas fa-history"></i> Elállás</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        function courierCheck() {
                            if (document.getElementById('courier-1').checked) {
                                document.getElementById('senddatediv').hidden = true;
                            } else {
                                document.getElementById('senddatediv').hidden = false;
                            }
                        }
                    </script>

                    <!-- Felvételi igény -->
                    <div class="row">
                        <div class="form-group col-5">
                            <label class="form-label">Felvételi igény<span class="text-primary mb-2">*</span></label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input onclick="courierCheck()" type="radio" name="courier" id="courier-1" value="1" class="selectgroup-input" <?php if ($case["Courier"] == "1") { echo 'checked=""'; } ?> disabled>
                                    <span class="selectgroup-button"><i class="fas fa-check"></i> Van</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input onclick="courierCheck()" type="radio" name="courier" value="0" class="selectgroup-input" <?php if ($case["Courier"] == "0") { echo 'checked=""'; } ?> disabled>
                                    <span class="selectgroup-button"><i class="fas fa-times"></i> Nincs</span>
                                </label>
                            </div>
                        </div>
                        <div id="senddatediv" class="form-group col-7" <?php if ($case["Courier"] == "1") { echo 'hidden'; } ?>>
                            <label class="form-label">Leadás időpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["SendDate"]; ?>" name="senddate" id="senddate" type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Készülék adatai</h4>
                </div>

                <div class="card-body">
                    <!-- Eszköz típusa -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->device; ?><span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Device"]["Name"]; ?>" name="device" id="device" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Szériaszám -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->serial; ?><span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Device"]["SerialNumber"]; ?>" name="sn" id="sn" type="text" class="form-control" readonly>
                            <small class="form-text text-muted">
                                <?php echo $lang->snhelp; ?>
                            </small>
                        </div>
                    </div>

                    <!-- Forgalmazó -->
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="text" class="form-control" name="dist" id="dist" value="<?php echo $param[3]; ?>" required hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Hiba meghatározása</h4>
                </div>

                <div class="card-body">
                    <!-- Hiba dátuma-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>A hiba jelentkezésének időpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Problem"]["Date"]; ?>" name="problemdate" id="problemdate" type="text" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Hiba leírása -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>A hiba leírása<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Problem"]["Description"]; ?>" name="problemdesc" id="problemdesc" type="text" class="form-control" readonly>
                            <small class="form-text text-muted">
                                A hiba rövid leírása. Maximum 500 karakter.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Megjegyzés</h4>
                </div>

                <div class="card-body">
                    <!-- Megjegyzés -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Megjegyzés</label>
                            <textarea name="note" id="note" rows="10" cols="60" readonly><?php echo $case["Note"]; ?></textarea>
                            <script>
                                CKEDITOR.replace( 'note' );
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group" hidden>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Ügy létrehozása
        </button>
    </div>
</div>