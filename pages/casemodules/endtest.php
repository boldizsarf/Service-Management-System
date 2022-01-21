<div class="tab-pane fade" id="endtest" role="tabpanel" aria-labelledby="endtest-casetabs">
    <div class="card">
        <div class="card-header">
            <h4>Végtesztelés</h4>
        </div>
        <div class="card-body">
            <form id="endtestform" method="POST" action="/backend/addendtest.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Külső állapot ellenőrzése</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="external" id="external1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["external"])) { if ($dbendtest[0]["external"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="external" id="external2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["external"])) { if ($dbendtest[0]["external"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Szoftveres állapot ellenőrzése</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="internal" id="internal1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["internal"])) { if ($dbendtest[0]["internal"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="internal" id="internal2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["internal"])) { if ($dbendtest[0]["internal"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Pozíció tartás</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="position" id="position1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["position"])) { if ($dbendtest[0]["position"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="position" id="position2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["position"])) { if ($dbendtest[0]["position"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Repülési dinamika</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="flightdynamics" id="flightdynamics1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["flightdynamics"])) { if ($dbendtest[0]["flightdynamics"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="flightdynamics" id="flightdynamics2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["flightdynamics"])) { if ($dbendtest[0]["flightdynamics"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Gimbal stabilitás</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="gimbal" id="gimbal1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["gimbal"])) { if ($dbendtest[0]["gimbal"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="gimbal" id="gimbal2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["gimbal"])) { if ($dbendtest[0]["gimbal"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Akadály érzékelés</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="obstacle" id="obstacle1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["obstacle"])) { if ($dbendtest[0]["obstacle"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="obstacle" id="obstacle2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["obstacle"])) { if ($dbendtest[0]["obstacle"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Jelátvitel</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="rc" id="rc1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["rc"])) { if ($dbendtest[0]["rc"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="rc" id="rc2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["rc"])) { if ($dbendtest[0]["rc"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Adatrögzítés</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="recording" id="recording1" value="1" class="selectgroup-input" <?php if (isset($dbendtest[0]["recording"])) { if ($dbendtest[0]["recording"] == "1") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelt</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="recording" id="recording2" value="0" class="selectgroup-input" <?php if (isset($dbendtest[0]["recording"])) { if ($dbendtest[0]["recording"] == "0") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem felelt meg</span>
                            </label>
                        </div>
                    </div>
                </div>

                <input name="cid" id="cid" value="<?php echo $param[3]?>" type="number" class="form-control" hidden>

                <script type="text/javascript">
                    function endtestClick() {
                        swal({
                            title: 'Biztos, hogy lezárod a tesztelést?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willAdd) => {
                                if (willAdd) {
                                    document.getElementById("endtestform").submit();
                                }
                            });
                    }
                </script>
                <div class="form-group" <?php if (isset($dbendtest[0]["id"])) { echo "hidden"; } ?>>
                    <a onclick="endtestClick()" href="#" class="btn btn-primary btn-lg btn-block">
                        Végtesztelés lezárása
                    </a>
                </div>

                <script type="text/javascript">
                    function endtestConfirm() {
                        swal({
                            title: 'Biztos, hogy jóváhagyod a tesztelést?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willAdd) => {
                                if (willAdd) {
                                    document.getElementById("endtestconfirmform").submit();
                                }
                            });
                    }
                </script>
                <?php
                $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                $uid = $dbuser[0]["id"];
                $role = $dbuser[0]["role"];
                ?>
                <div class="form-group" <?php
                if (!(isset($dbendtest[0]["id"]))) {
                    if ($role != 4 || $role != 8 || $role != 5) {
                        echo "hidden";
                    }
                }
                if (isset($dbendtest[0]["confirmUser"])) {
                    echo "hidden";
                }
                ?>
                >
                    <a onclick="endtestConfirm()" href="#" class="btn btn-primary btn-lg btn-block">
                        Végtesztelés jóváhagyása
                    </a>
                </div>
            </form>
            <form id="endtestconfirmform" method="POST" action="/backend/confirmendtest.php" enctype="multipart/form-data">
                <input name="etid" id="etid" value="<?php echo $dbendtest[0]["id"]; ?>" type="number" class="form-control" hidden>
                <input name="cid" id="cid" value="<?php echo $param[3]?>" type="number" class="form-control" hidden>
            </form>
        </div>
    </div>
</div>