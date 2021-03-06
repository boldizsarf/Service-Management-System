<form method="post" action="/backend/pcaseman.php?q=modify">
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Kapcsolattart√°si adatok</h4>
                </div>

                <div class="card-body">

                    <script type="text/javascript">
                        function setContact() {
                            var namecell = document.getElementById("nameCell");
                            var emailcell = document.getElementById("emailCell");
                            var phonecell = document.getElementById("phoneCell");
                            var addresscell = document.getElementById("addressCell");

                            var selectedcontact = document.getElementById("contactSelector").value;
                            var contactelements = selectedcontact.split(" -: ");

                            namecell.value = contactelements[0];
                            emailcell.value = contactelements[1];
                            phonecell.value = contactelements[2];
                            addresscell.value = contactelements[3];
                        }
                    </script>

                    <!-- Kapcsolattart√≥ -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kapcsolattart√≥<span class="text-primary mb-2">*</span></label>
                            <select onchange="setContact()" class="form-control select2" style="width: 100% !important;" name="contactSelector" id="contactSelector" required>
                                <?php
                                $dbcontacts = $dbc->get("SELECT * FROM pcontacts");
                                foreach ($dbcontacts as $contact) {
                                    echo " <option value='" . $contact["name"] . " -: " . $contact["email"] . " -: " . $contact["phone"] . " -: " . $contact["address"] . "'>" . $contact["name"] . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <!-- N√©v -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>N√©v<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Name"]; ?>" name="nameCell" id="nameCell" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Email c√≠m -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Email c√≠m<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Email"]; ?>" name="emailCell" id="emailCell" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Telefon -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Telefon<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Phone"]; ?>" name="phoneCell" id="phoneCell" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- C√≠m -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>C√≠m<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Partner"]["Contact"]["Address"]; ?>" name="addressCell" id="addressCell" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>√úgyint√©z√©si adatok</h4>
                </div>

                <div class="card-body">
                    <!-- K√ľlsŇĎs esetsz√°m -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Hivatkoz√°si sz√°m</label>
                            <input value="<?php echo $case["ExternalID"]; ?>" name="etrackid" id="etrackid" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- V√°s√°rl√°s d√°tuma-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>V√°s√°rl√°s idŇĎpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Device"]["PurchaseDate"]; ?>" name="purchasedate" id="purchasedate" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- √Ātv√©tel d√°tuma-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>√Ātv√©tel idŇĎpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["SubmitDate"]; ?>" name="submitdate" id="submitdate" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Rendez√©s m√≥dja -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Rendez√©s m√≥dja<span class="text-primary mb-2">*</span></label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="1" class="selectgroup-input" <?php if ($case["HandlingWay"] == "1") { echo 'checked=""'; } ?>>
                                    <span class="selectgroup-button"><i class="fas fa-exchange-alt"></i> G. csere</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="2" class="selectgroup-input" <?php if ($case["HandlingWay"] == "2") { echo 'checked=""'; } ?>>
                                    <span class="selectgroup-button"><i class="fas fa-tools"></i> G. jav√≠t√°s</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="3" class="selectgroup-input" <?php if ($case["HandlingWay"] == "3") { echo 'checked=""'; } ?>>
                                    <span class="selectgroup-button"><i class="fas fa-money-bill-wave"></i> F. jav√≠t√°s</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="handlingway" value="4" class="selectgroup-input" <?php if ($case["HandlingWay"] == "4") { echo 'checked=""'; } ?>>
                                    <span class="selectgroup-button"><i class="fas fa-history"></i> El√°ll√°s</span>
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

                    <!-- Felv√©teli ig√©ny -->
                    <div class="row">
                        <div class="form-group col-5">
                            <label class="form-label">Felv√©teli ig√©ny<span class="text-primary mb-2">*</span></label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input onclick="courierCheck()" type="radio" name="courier" id="courier-1" value="1" class="selectgroup-input" <?php if ($case["Courier"] == "1") { echo 'checked=""'; } ?>>
                                    <span class="selectgroup-button"><i class="fas fa-check"></i> Van</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input onclick="courierCheck()" type="radio" name="courier" value="0" class="selectgroup-input" <?php if ($case["Courier"] == "0") { echo 'checked=""'; } ?>>
                                    <span class="selectgroup-button"><i class="fas fa-times"></i> Nincs</span>
                                </label>
                            </div>
                        </div>
                        <div id="senddatediv" class="form-group col-7" <?php if ($case["Courier"] == "1") { echo 'hidden'; } ?>>
                            <label class="form-label">Lead√°s idŇĎpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["SendDate"]; ?>" name="senddate" id="senddate" type="text" class="form-control">
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
                    <h4>K√©sz√ľl√©k adatai</h4>
                </div>

                <div class="card-body">
                    <!-- Eszk√∂z t√≠pusa -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->device; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" style="width: 100% !important;" name="device" id="device" required>
                                <option selected><?php echo $case["Device"]["Name"]; ?></option>
                                <?php
                                $products = simplexml_load_file('db/Products.xml');
                                foreach ($products->Product as $product) {
                                    echo " <option value='" . $product->name . "'>" . $product->name . " (" . $product->sku . ")</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Sz√©riasz√°m -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->serial; ?><span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Device"]["SerialNumber"]; ?>" name="sn" id="sn" type="text" class="form-control">
                            <small class="form-text text-muted">
                                <?php echo $lang->snhelp; ?>
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
                    <h4>Hiba meghat√°roz√°sa</h4>
                </div>

                <div class="card-body">
                    <!-- Hiba d√°tuma-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>A hiba jelentkez√©s√©nek idŇĎpontja<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Problem"]["Date"]; ?>" name="problemdate" id="problemdate" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Hiba le√≠r√°sa -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>A hiba le√≠r√°sa<span class="text-primary mb-2">*</span></label>
                            <input value="<?php echo $case["Problem"]["Description"]; ?>" name="problemdesc" id="problemdesc" type="text" class="form-control">
                            <small class="form-text text-muted">
                                A hiba r√∂vid le√≠r√°sa. Maximum 500 karakter.
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
                    <h4>Megjegyz√©s</h4>
                </div>

                <div class="card-body">
                    <!-- Megjegyz√©s -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Megjegyz√©s</label>
                            <textarea name="note" id="note" rows="10" cols="60"><?php echo $case["Note"]; ?></textarea>
                            <script>
                                CKEDITOR.replace( 'note' );
                            </script>
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
                    <h4>Admin mezŇĎk</h4>
                </div>

                <div class="card-body">
                    <!-- Hiba le√≠r√°sa -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>CAS sz√°m</label>
                            <input value="<?php echo $case["CAS"]; ?>" name="casnumber" id="casnumber" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <input value="<?php echo $case["TrackingID"]; ?>" name="cid" id="cid" type="text" class="form-control" hidden required>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            √úgy m√≥dos√≠t√°sa
        </button>
    </div>
</form>