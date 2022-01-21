<section class="section">
    <div class="section-header">
        <h1>Ügy létrehozása</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Ügy létrehozása</h4><label class="text-dark small">(<span class="text-primary mb-2">*</span> kötelező)</label>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addcase.php">

                    <!-- Eszköz -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Eszköz<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="device" id="device" required>
                                <?php
                                $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                                $uid = $dbuser[0]["id"];
                                if ($dbuser[0]["role"] == "0") {
                                    $dbdevice = $dbc->get("SELECT * FROM devices WHERE uid=?", [$uid]);
                                } else {
                                    $dbdevice = $dbc->get("SELECT * FROM devices");
                                }

                                foreach ($dbdevice as $device) {
                                    echo "<option value='" . $device["id"] . "'>" . $device["name"] . " - " . $device["serial"] . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <!-- Meghibásodás eredete és care -->
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Ön szerint a meghibásodás garanciális eredetű?<span class="text-primary mb-2">*</span></label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="type" id="type" value="warranty" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="type" id="type" value="paid" class="selectgroup-input">
                                    <span class="selectgroup-button"><i class="fas fa-times"></i> Nem</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Rendelkezik érvényes DJI Care, vagy Shield szolgáltatással?<span class="text-primary mb-2">*</span></label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="care" value="1" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="care" value="2" class="selectgroup-input">
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
                                    <input type="radio" name="sync" id="sync" value="1" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="sync" id="sync" value="0" class="selectgroup-input">
                                    <span class="selectgroup-button"><i class="fas fa-times"></i> Nem</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>DJI GO felhasználónév (email)</label>
                            <input type="email" name="djiuser" id="djiuser" class="form-control">
                            <small class="form-text text-muted">
                                Az email cím, mellyel a DJI rendszerébe való regisztrálás megtörtént.
                            </small>
                        </div>
                    </div>

                    <!-- Hiba leírása -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>A hiba leírása<span class="text-primary mb-2">*</span></label>
                            <textarea name="problem" id="problem" class="form-control" spellcheck="false" rows="5" maxlength="500" required></textarea>
                            <small class="form-text text-muted">
                                A hiba rövid leírása. Maximum 500 karakter.
                            </small>
                        </div>
                    </div>

                    <!-- Hiba dátuma-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>A hiba jelentkezésének időpontja</label>
                            <input name="date" id="date" type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Hiba helyszíne-->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>A hiba jelentkezésének helyszíne</label>
                            <input name="location" id="location" type="text" class="form-control">
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
                                    <input type="radio" name="sendback" id="sendback" value="1" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="sendback" id="sendback" value="0" class="selectgroup-input">
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
                                    <input type="radio" name="price" id="price" value="normal" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button"><i class="fas fa-truck"></i> Normál</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="price" id="price" value="express" class="selectgroup-input">
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
                                    <input onclick="" type="radio" name="takeover" id="courier" value="courier" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button"><i class="fas fa-truck"></i> Door-to-Door</span>
                                </label>
                            </div>
                        </div>
                        <div id="haddress" class="form-group col-12">
                            <label>Szállítási cím<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="daddress" id="daddress" required>
                                <?php
                                $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                                $uid = $dbuser[0]["id"];

                                if ($dbuser[0]["role"] == "0") {
                                    $dbdaddress = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type=?", [$uid, "home"]);
                                } else {
                                    $dbdaddress = $dbc->get("SELECT * FROM addresses");
                                }

                                foreach ($dbdaddress as $daddress) {
                                    echo "<option value='" . $daddress["id"] . "'>" . $daddress["name"] . " - " . $daddress["country"] . ", " . $daddress["postcode"] . " " . $daddress["city"] . ", " . $daddress["address"] . "</option>";
                                }
                                ?>
                            </select>
                            <small class="form-text text-muted">
                                Amennyiben hibás termékének javítását a MyDroneService előzetes felmérésének alapján megrendeli, abban az esetben Door to Door szolgáltatásunk INGYENES.﻿ Egyéb esetekben ára: bruttó 3.990 Ft-tól, a csomag térfogatsúlyától függően
                            </small>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Fizetés módja<span class="text-primary mb-2">*</span></label>
                            <div class="selectgroup selectgroup-pills">
                                <label class="selectgroup-item">
                                    <input type="radio" name="payment" id="banktransfer" value="banktransfer" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button"><i class="fas fa-money-check-alt"></i> Banki előreutalás</span>
                                </label>
                                <label id="p-cash" class="selectgroup-item" hidden>
                                    <input type="radio" name="payment" id="cash" value="cash" class="selectgroup-input">
                                    <span class="selectgroup-button"><i class="fas fa-coins"></i> Készpénzes fizetés</span>
                                </label>
                                <label id="p-card" class="selectgroup-item" hidden>
                                    <input type="radio" name="payment" id="creditcard" value="creditcard" class="selectgroup-input">
                                    <span class="selectgroup-button"><i class="fas fa-credit-card"></i> Bankkártyás fizetés</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label>Számlázási cím<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="baddress" id="baddress" required>
                                <?php
                                $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                                $uid = $dbuser[0]["id"];

                                if ($dbuser[0]["role"] == "0") {
                                    $dbbaddress = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type=?", [$uid, "billing"]);
                                } else {
                                    $dbbaddress = $dbc->get("SELECT * FROM addresses");
                                }


                                foreach ($dbbaddress as $baddress) {
                                    echo "<option value='" . $baddress["id"] . "'>" . $baddress["name"] . " - " . $baddress["country"] . ", " . $baddress["postcode"] . " " . $baddress["city"] . ", " . $baddress["address"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Ügy létrehozása
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>