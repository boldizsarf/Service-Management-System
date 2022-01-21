<section class="section">
    <div class="section-header">
        <h1>Ügy létrehozása</h1>
    </div>
    <div class="section-body">
        <form method="post" action="/backend/addpcase.php">
            <div class="card">
                <div class="card-header">
                    <h4>Ügy létrehozása - Duplitec</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Kapcsolattartási adatok</h4>
                                </div>

                                <div class="card-body">
                                        <!-- Kapcsolattartó választó -->

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

                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Kapcsolattartó</label>
                                                <select onchange="setContact()" class="form-control select2" name="contactSelector" id="contactSelector" required>
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

                                        <!-- Név -->
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Név<span class="text-primary mb-2">*</span></label>
                                                <input name="nameCell" id="nameCell" type="text" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <!-- Email cím -->
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Email cím<span class="text-primary mb-2">*</span></label>
                                                <input name="emailCell" id="emailCell" type="text" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <!-- Telefon -->
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Telefon<span class="text-primary mb-2">*</span></label>
                                                <input name="phoneCell" id="phoneCell" type="text" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <!-- Cím -->
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Cím<span class="text-primary mb-2">*</span></label>
                                                <input name="addressCell" id="addressCell" type="text" class="form-control" readonly>
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
                                                <input name="etrackid" id="etrackid" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Vásárlás dátuma-->
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Vásárlás időpontja<span class="text-primary mb-2">*</span></label>
                                                <input name="purchasedate" id="purchasedate" type="date" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Átvétel dátuma-->
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Átvétel időpontja<span class="text-primary mb-2">*</span></label>
                                                <input name="submitdate" id="submitdate" type="date" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Rendezés módja -->
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label class="form-label">Rendezés módja<span class="text-primary mb-2">*</span></label>
                                            <select class="form-control select2" name="handlingway" id="handlingway" required>
                                                <option value="1">Garanciális csere</option>
                                                <option value="2">Garanciális javítás</option>
                                                <option value="3">Fizetős javítás</option>
                                                <option value="4">Elállás</option>
                                            </select>
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
                                                        <input onclick="courierCheck()" type="radio" name="courier" id="courier-1" value="1" class="selectgroup-input" checked>
                                                        <span class="selectgroup-button"><i class="fas fa-check"></i> Van</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input onclick="courierCheck()" type="radio" name="courier" value="0" class="selectgroup-input">
                                                        <span class="selectgroup-button"><i class="fas fa-times"></i> Nincs</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="senddatediv" class="form-group col-7" hidden>
                                                <label class="form-label">Leadás időpontja<span class="text-primary mb-2">*</span></label>
                                                <input name="senddate" id="senddate" type="date" class="form-control">
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
                                            <label>Termék típusa<span class="text-primary mb-2">*</span></label>
                                            <select class="form-control select2" name="device" id="device" required>
                                                <?php
                                                $products = simplexml_load_file('db/Products.xml');
                                                foreach ($products->Product as $product) {
                                                    if ($product->forg == "DP") {
                                                        echo " <option value='" . $product->name . "'>" . $product->name . " (" . $product->sku . ")</option>";
                                                    }
                                                }
                                                ?>
                                                <option disabled selected hidden></option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Szériaszám -->
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label><?php echo $lang->serial; ?><span class="text-primary mb-2">*</span></label>
                                            <input type="text" class="form-control" name="sn" id="sn" required>
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
                                                <input name="problemdate" id="problemdate" type="date" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Hiba leírása -->
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>A hiba leírása<span class="text-primary mb-2">*</span></label>
                                                <textarea name="problemdesc" id="problemdesc" class="form-control" spellcheck="false" rows="5" maxlength="500" required></textarea>
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
                                                <textarea name="note" id="note" rows="10" cols="60"></textarea>
                                                <script>
                                                    CKEDITOR.replace( 'note' );
                                                </script>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Ügy létrehozása
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>