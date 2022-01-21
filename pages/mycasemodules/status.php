<div class="tab-pane fade" id="caseinfo" role="tabpanel" aria-labelledby="caseinfo-casetabs">
    <div class="card">
        <div class="card-header">
            <h4><?php echo $lang->caseinfo; ?></h4>
        </div>
        <div class="card-body">
            <form>
                <!-- Meghibásodás eredete és care -->
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Ön szerint a meghibásodás garanciális eredetű?<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="type" id="type" value="warranty" class="selectgroup-input" <?php if ($case["type"] == "warranty") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> <?php echo $lang->yes; ?></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="type" id="type" value="paid" class="selectgroup-input" <?php if ($case["type"] == "paid") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> <?php echo $lang->no; ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Rendelkezik érvényes DJI Care, vagy Shield szolgáltatással?<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="care" value="1" class="selectgroup-input" checked="" <?php if ($case["care"] == "1") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> <?php echo $lang->yes; ?></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="care" value="2" class="selectgroup-input" <?php if ($case["care"] == "2") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> <?php echo $lang->no; ?></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Szinkronizáció és felhasználónév-->
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">A repülési napló szinkronizálása megtörtént?<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="sync" id="sync" value="1" class="selectgroup-input" <?php if ($case["sync"] == "1") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> <?php echo $lang->yes; ?></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="sync" id="sync" value="0" class="selectgroup-input" <?php if ($case["sync"] == "0") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> <?php echo $lang->no; ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label>DJI GO felhasználónév (email)<span class="text-primary mb-2">*</span></label>
                        <input type="email" name="djiuser" id="djiuser" class="form-control" value="<?php echo $case["djiuser"]; ?>" disabled>
                    </div>
                </div>

                <!-- Hiba leírása -->
                <div class="row">
                    <div class="form-group col-12">
                        <label>A hiba leírása<span class="text-primary mb-2">*</span></label>
                        <textarea name="problem" id="problem" class="form-control" spellcheck="false" rows="5" maxlength="500" required disabled><?php echo $case["problem"]; ?></textarea>
                        <small class="form-text text-muted">
                            Maximum 500 karakter.
                        </small>
                    </div>
                </div>

                <!-- Hiba dátuma-->
                <div class="row">
                    <div class="form-group col-12">
                        <label>A hiba jelentkezésének időpontja<span class="text-primary mb-2">*</span></label>
                        <input name="date" id="date" type="date" class="form-control" value="<?php echo $case["date"]; ?>" required disabled>
                    </div>
                </div>

                <!-- Hiba helyszíne-->
                <div class="row">
                    <div class="form-group col-12">
                        <label>A hiba jelentkezésének helyszíne<span class="text-primary mb-2">*</span></label>
                        <input name="location" id="location" type="text" class="form-control" value="<?php echo $case["location"]; ?>" required disabled>
                    </div>
                </div>

                <!-- Visszaküldés és óradíj -->
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Amennyiben szükséges, a termék visszaküldhető a külföldi DJI szervizbe?<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="sendback" id="sendback" value="1" class="selectgroup-input" <?php if ($case["sendback"] == "1") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> <?php echo $lang->yes; ?></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="sendback" id="sendback" value="0" class="selectgroup-input" <?php if ($case["sendback"] == "0") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> <?php echo $lang->no; ?></span>
                            </label>
                        </div>
                        <small class="form-text text-muted">
                            A szállítási díj az ügyfelet terheli.
                        </small>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Javítási óradíj<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="price" id="price" value="normal" class="selectgroup-input" <?php if ($case["price"] == "normal") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-truck"></i> Normál</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="price" id="price" value="express" class="selectgroup-input" <?php if ($case["price"] == "express") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-shipping-fast"></i> Sürgősségi</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Fizetés és átvétel -->
                <div class="row">
                    <div class="form-group col-12">
                        <label class="form-label">Kész termék átvételi módja<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="takeover" id="takeover" value="courier" class="selectgroup-input" <?php if ($case["takeover"] == "courier") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-truck"></i> Door-to-Door</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="takeover" id="takeover" value="duplitec" class="selectgroup-input" <?php if ($case["takeover"] == "duplitec") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-warehouse"></i> Személyesen a Duplitecnél</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="takeover" id="takeover" value="ars" class="selectgroup-input" <?php if ($case["takeover"] == "ars") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-store"></i> Személyesen a DJI ARSnél</span>
                            </label>
                        </div>
                    </div>
                    <?php
                    if ($case["daddress"] != 0) {
                        $dbdaddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["daddress"]]);
                        $daddress = $dbdaddress[0];

                        echo "<div class=\"form-group col-12\">\n";
                        echo "                                                    <label>Szállítási cím<span class=\"text-primary mb-2\">*</span></label>\n";
                        echo "                                                    <input name=\"daddress\" id=\"daddress\" type=\"text\" class=\"form-control\" value=\"" . $daddress["name"] . " - " . $daddress["country"] . ", " . $daddress["postcode"] . " " . $daddress["city"] . ", " . $daddress["address"] . "\" required disabled>\n";
                        echo "                                                </div>";

                    }
                    ?>
                    <div class="form-group col-12">
                        <label class="form-label">Fizetés módja<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="payment" id="payment" value="banktransfer" class="selectgroup-input" <?php if ($case["payment"] == "banktransfer") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-money-check-alt"></i> Banki előreutalás</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="payment" id="payment" value="cash" class="selectgroup-input" <?php if ($case["payment"] == "cash") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-coins"></i> Készpénzes fizetés</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="payment" id="payment" value="creditcard" class="selectgroup-input" <?php if ($case["payment"] == "creditcard") { echo "checked=\"\""; } ?> disabled>
                                <span class="selectgroup-button"><i class="fas fa-credit-card"></i> Bankkártyás fizetés</span>
                            </label>
                        </div>
                    </div>
                    <?php
                    $dbbaddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["baddress"]]);
                    $baddress = $dbbaddress[0];
                    ?>
                    <div class="form-group col-12">
                        <label>Számlázási cím<span class="text-primary mb-2">*</span></label>
                        <input name="daddress" id="daddress" type="text" class="form-control" value="<?php echo $baddress["name"] . " - " . $baddress["country"] . ", " . $baddress["postcode"] . " " . $baddress["city"] . ", " . $baddress["address"]; ?>" required disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>