<div class="tab-pane fade" id="caseinfo" role="tabpanel" aria-labelledby="caseinfo-casetabs">
    <div class="card">
        <div class="card-header">
            <h4><?php echo $lang->caseinfo; ?></h4>
        </div>
        <div class="card-body">
            <form id="modifyform" method="POST" action="/backend/mdcs.php?q=modify&cid=<?php echo $case["id"]; ?>">

                <!-- Meghibásodás eredete és care -->
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Ön szerint a meghibásodás garanciális eredetű?<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="type" id="type" value="warranty" class="selectgroup-input" <?php if ($case["type"] == "warranty") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="type" id="type" value="paid" class="selectgroup-input" <?php if ($case["type"] == "paid") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Rendelkezik érvényes DJI Care, vagy Shield szolgáltatással?<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="care" value="1" class="selectgroup-input" <?php if ($case["care"] == "1") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="care" value="2" class="selectgroup-input" <?php if ($case["care"] == "2") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem</span>
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
                                <input type="radio" name="sync" id="sync" value="1" class="selectgroup-input" <?php if ($case["sync"] == "1") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="sync" id="sync" value="0" class="selectgroup-input" <?php if ($case["sync"] == "0") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label>DJI GO felhasználónév (email)<span class="text-primary mb-2">*</span></label>
                        <input type="email" name="djiuser" id="djiuser" class="form-control" value="<?php echo $case["djiuser"]; ?>" required>
                        <small class="form-text text-muted">
                            Az email cím, mellyel a DJI rendszerébe való regisztrálás megtörtént.
                        </small>
                    </div>
                </div>

                <!-- Hiba leírása -->
                <div class="row">
                    <div class="form-group col-12">
                        <label>A hiba leírása<span class="text-primary mb-2">*</span></label>
                        <textarea name="problem" id="problem" class="form-control" spellcheck="false" rows="5" maxlength="500" required><?php echo $case["problem"]; ?></textarea>
                        <small class="form-text text-muted">
                            A hiba rövid leírása. Maximum 500 karakter.
                        </small>
                    </div>
                </div>

                <!-- Hiba dátuma-->
                <div class="row">
                    <div class="form-group col-12">
                        <label>A hiba jelentkezésének időpontja<span class="text-primary mb-2">*</span></label>
                        <input name="date" id="date" type="date" class="form-control" value="<?php echo $case["date"]; ?>" required>
                    </div>
                </div>

                <!-- Hiba helyszíne-->
                <div class="row">
                    <div class="form-group col-12">
                        <label>A hiba jelentkezésének helyszíne<span class="text-primary mb-2">*</span></label>
                        <input name="location" id="location" type="text" class="form-control" value="<?php echo $case["location"]; ?>" required>
                        <small class="form-text text-muted">
                            (pl. város/szántóföld/hegyvidék/tó/folyó/sivatag)
                        </small>
                    </div>
                </div>

                <!-- Visszaküldés és óradíj -->
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Amennyiben szükséges, a termék visszaküldhető a külföldi DJI szervizbe?<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="sendback" id="sendback" value="1" class="selectgroup-input" <?php if ($case["sendback"] == "1") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="sendback" id="sendback" value="0" class="selectgroup-input" <?php if ($case["sendback"] == "0") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem</span>
                            </label>
                        </div>
                        <small class="form-text text-muted">
                            Amennyiben a termék nem a Duplitec Kft. beszerzéséből származik, és/vagy garanciális hiba nem nyert megállapítást, abban az esetben a költség az ügyfelet terheli.
                        </small>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Javítási óradíj<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="price" id="price" value="normal" class="selectgroup-input" <?php if ($case["price"] == "normal") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-truck"></i> Normál</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="price" id="price" value="express" class="selectgroup-input" <?php if ($case["price"] == "express") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-shipping-fast"></i> Sürgősségi</span>
                            </label>
                        </div>
                        <small class="form-text text-muted">
                            Normál szervizóradíj: bruttó 9.900Ft /óra. Sürgősségi szervizóradíj: bruttó 14.850Ft /óra.
                        </small>
                    </div>
                </div>
                <script type="text/javascript">
                    function dmodeCheck() {
                        if (document.getElementById('courier').checked) {
                            document.getElementById('p-cash').hidden = true;
                            document.getElementById('p-card').hidden = true;
                        } else {
                            document.getElementById('p-cash').hidden = false;
                            document.getElementById('p-card').hidden = false;
                        }
                    }
                </script>
                <!-- Fizetés és átvétel -->
                <div class="row">
                    <div class="form-group col-12">
                        <label class="form-label">Termék ügyintézési módja<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input onclick="dmodeCheck()" type="radio" name="takeover" id="courier" value="courier" class="selectgroup-input" <?php if ($case["takeover"] == "courier") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-truck"></i> Door-to-Door</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="dmodeCheck()" type="radio" name="takeover" id="duplitec" value="duplitec" class="selectgroup-input" <?php if ($case["takeover"] == "duplitec") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-warehouse"></i> Személyesen a Duplitecnél</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="dmodeCheck()" type="radio" name="takeover" id="ars" value="ars" class="selectgroup-input" <?php if ($case["takeover"] == "ars") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-store"></i> Személyesen a DJI ARSnél</span>
                            </label>
                        </div>
                    </div>
                    <div id="haddress" class="form-group col-12">
                        <?php
                        if ($case["daddress"] != 0) {
                            $dbdaddress = $dbc->get("SELECT * FROM addresses WHERE id=?", [$case["daddress"]]);
                            $daddress = $dbdaddress[0];
                            echo "                                                    <label>Szállítási cím<span class=\"text-primary mb-2\">*</span></label>\n";
                            echo "                                                    <input name=\"daddress\" id=\"daddress\" type=\"text\" class=\"form-control\" value=\"" . $daddress["name"] . " - " . $daddress["country"] . ", " . $daddress["postcode"] . " " . $daddress["city"] . ", " . $daddress["address"] . "\" required disabled>\n";

                        }
                        ?>
                        <small class="form-text text-muted">
                            Amennyiben hibás termékének javítását a Duplitec Szerviz Központ előzetes felmérésének alapján megrendeli, abban az esetben a Door to Door szolgáltatásunk INGYENES.﻿ Egyéb esetekben ára: bruttó 3.990 Ft-tól
                        </small>
                    </div>
                    <div class="form-group col-12">
                        <label class="form-label">Fizetés módja<span class="text-primary mb-2">*</span></label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="payment" id="banktransfer" value="banktransfer" class="selectgroup-input" <?php if ($case["payment"] == "banktransfer") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-money-check-alt"></i> Banki előreutalás</span>
                            </label>
                            <label id="p-cash" class="selectgroup-item">
                                <input type="radio" name="payment" id="cash" value="cash" class="selectgroup-input" <?php if ($case["payment"] == "cash") { echo "checked=\"\""; } ?>>
                                <span class="selectgroup-button"><i class="fas fa-coins"></i> Készpénzes fizetés</span>
                            </label>
                            <label id="p-card" class="selectgroup-item">
                                <input type="radio" name="payment" id="creditcard" value="creditcard" class="selectgroup-input" <?php if ($case["payment"] == "creditcard") { echo "checked=\"\""; } ?>>
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
                <script type="text/javascript">
                    function modifyClick() {
                        swal({
                            title: 'Biztos, hogy módosítod az ügyet?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willAdd) => {
                                if (willAdd) {
                                    document.getElementById("modifyform").submit();
                                }
                            });
                    }
                    function deleteClick() {
                        swal({
                            title: 'Biztos, hogy törlöd az ügyet?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willAdd) => {
                                if (willAdd) {
                                    window.location.replace("/backend/mdcs.php?q=delete&cid=<?php echo $case["id"]; ?>");
                                }
                            });
                    }
                </script>
                <div class="section-title mt-0">Csak admin által megadható adatok</div>
                <div class="form-group col-12">
                    <label>CAS szám</label>
                    <input name="casnumber" id="casnumber" type="text" value="<?php echo $case["casnumber"]; ?>" class="form-control">
                </div>

                <div class="form-group col-12">
                    <label>DHL csomagszám (<a href="https://www.dhl.com/hu-en/home/tracking.html?tracking-id=<?php echo $case["dhlnumber"]; ?>" target="_blank">tracking</a>)</label>
                    <input name="dhlnumber" id="dhlnumber" type="text" value="<?php echo $case["dhlnumber"]; ?>" class="form-control">
                </div>

                <div class="form-group col-12">
                    <label>GLS csomagszám (<a href="https://gls-group.eu/HU/hu/csomagkovetes?match=<?php echo $case["glsnumber"]; ?>" target="_blank">tracking</a>)</label>
                    <input name="glsnumber" id="glsnumber" type="text" value="<?php echo $case["glsnumber"]; ?>" class="form-control">
                </div>

                <div class="form-group">
                    <a onclick="modifyClick()" href="#" class="btn btn-primary btn-lg btn-block">
                        Adatok módosítása
                    </a>
                </div>
                <div class="form-group">
                    <a onclick="deleteClick()" href="#" class="btn btn-danger btn-lg btn-block">
                        Ügy törlése
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>