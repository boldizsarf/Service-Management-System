<div class="tab-pane fade" id="inspection" role="tabpanel" aria-labelledby="inspection-casetabs">
    <div class="card">
        <div class="card-header">
            <h4><?php echo $lang->addinspection; ?></h4>
        </div>
        <div class="card-body">
            <form id="inspectform" method="POST" action="/backend/addinspection.php" enctype="multipart/form-data">
                <?php
                $dbtmk = $dbc->get("SELECT * FROM tmkrepairs WHERE did=? ORDER BY id ASC", [$dbcase[0]["device"]]);
                if (isset($dbtmk[0]["id"])) {
                    $tmks = "";
                } else {
                    $tmks = "hidden";
                }
                ?>
                <div class="row" <?php echo $tmks; ?>>
                    <div class="form-group col-12">
                        <label>Kötelező karbantartás</label>
                        <select class="form-control select2" style="width: 100% !important;" name="tmkselector" id="tmkselector">
                            <option value="1">6. havi</option>
                            <option value="2">12. havi</option>
                            <option value="3">18. havi</option>
                            <option value="4">24. havi</option>
                            <option selected disabled hidden></option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
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
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function imuUnlick() {
                                document.getElementById('imu1').checked = false;
                                document.getElementById('imu2').checked = false;
                                document.getElementById('imu3').checked = false;
                            }
                        </script>
                        <label class="form-label">IMU</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="imu" id="imu1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["imu"])) { if ($dbinspection[0]["imu"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="imu" id="imu2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["imu"])) { if ($dbinspection[0]["imu"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="imuUnlick()" type="radio" id="imu3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function compassUnlick() {
                                document.getElementById('compass1').checked = false;
                                document.getElementById('compass2').checked = false;
                                document.getElementById('compass3').checked = false;
                            }
                        </script>
                        <label class="form-label">Iránytű</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="compass" id="compass1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["compass"])) { if ($dbinspection[0]["compass"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="compass" id="compass2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["compass"])) { if ($dbinspection[0]["compass"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="compassUnlick()" type="radio" id="compass3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function gpsUnlick() {
                                document.getElementById('gps1').checked = false;
                                document.getElementById('gps2').checked = false;
                                document.getElementById('gps3').checked = false;
                            }
                        </script>
                        <label class="form-label">GPS</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="gps" id="gps1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["gps"])) { if ($dbinspection[0]["gps"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="gps" id="gps2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["gps"])) { if ($dbinspection[0]["gps"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="gpsUnlick()" type="radio" id="gps3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function gimbalUnlick() {
                                document.getElementById('gimbal1').checked = false;
                                document.getElementById('gimbal2').checked = false;
                                document.getElementById('gimbal3').checked = false;
                            }
                        </script>
                        <label class="form-label">Gimbal stabilizálás</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="gimbal" id="gimbal1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["gimbal"])) { if ($dbinspection[0]["gimbal"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="gimbal" id="gimbal2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["gimbal"])) { if ($dbinspection[0]["gimbal"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="gimbalUnlick()" type="radio" id="gimbal3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function videoUnlick() {
                                document.getElementById('video1').checked = false;
                                document.getElementById('video2').checked = false;
                                document.getElementById('video3').checked = false;
                            }
                        </script>
                        <label class="form-label">Képátviteli minőség</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="video" id="video1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["video"])) { if ($dbinspection[0]["video"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="video" id="video2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["video"])) { if ($dbinspection[0]["video"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="videoUnlick()" type="radio" id="video3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function flyingUnlick() {
                                document.getElementById('flying1').checked = false;
                                document.getElementById('flying2').checked = false;
                                document.getElementById('flying3').checked = false;
                            }
                        </script>
                        <label class="form-label">Irányíthatóság</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="flying" id="flying1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["flying"])) { if ($dbinspection[0]["flying"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="flying" id="flying2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["flying"])) { if ($dbinspection[0]["flying"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="flyingUnlick()" type="radio" id="flying3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function positionUnlick() {
                                document.getElementById('position1').checked = false;
                                document.getElementById('position2').checked = false;
                                document.getElementById('position3').checked = false;
                            }
                        </script>
                        <label class="form-label">Pozíció tartás</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="position" id="position1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["position"])) { if ($dbinspection[0]["position"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="position" id="position2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["position"])) { if ($dbinspection[0]["position"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="positionUnlick()" type="radio" id="position3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function stableUnlick() {
                                document.getElementById('stable1').checked = false;
                                document.getElementById('stable2').checked = false;
                                document.getElementById('stable3').checked = false;
                            }
                        </script>
                        <label class="form-label">Stabilitás</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="stable" id="stable1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["stable"])) { if ($dbinspection[0]["stable"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="stable" id="stable2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["stable"])) { if ($dbinspection[0]["stable"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="stableUnlick()" type="radio" id="stable3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function collisionUnlick() {
                                document.getElementById('collision1').checked = false;
                                document.getElementById('collision2').checked = false;
                                document.getElementById('collision3').checked = false;
                            }
                        </script>
                        <label class="form-label">Akadály érzékelés</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="collision" id="collision1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["collision"])) { if ($dbinspection[0]["collision"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="collision" id="collision2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["collision"])) { if ($dbinspection[0]["collision"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem megfelelő</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="collisionUnlick()" type="radio" id="collision3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <script type="text/javascript">
                            function testvideoUnlick() {
                                document.getElementById('testvideo1').checked = false;
                                document.getElementById('testvideo2').checked = false;
                                document.getElementById('testvideo3').checked = false;
                            }
                        </script>
                        <label class="form-label">Repülési tesztvideó</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="radio" name="testvideo" id="testvideo1" value="true" class="selectgroup-input" <?php if (isset($dbinspection[0]["testvideo"])) { if ($dbinspection[0]["testvideo"] == "true") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-check"></i> Készült</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="testvideo" id="testvideo2" value="false" class="selectgroup-input" <?php if (isset($dbinspection[0]["testvideo"])) { if ($dbinspection[0]["testvideo"] == "false") { echo "checked=\"\""; } } ?>>
                                <span class="selectgroup-button"><i class="fas fa-times"></i> Nem készült</span>
                            </label>
                            <label class="selectgroup-item">
                                <input onclick="testvideoUnlick()" type="radio" id="testvideo3" class="selectgroup-input">
                                <span class="selectgroup-button"><i class="fas fa-bomb"></i> Mégse</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Jegyzőkönyv<span class="text-primary mb-2">*</span></label>
                        <textarea name="text" id="text" rows="10" cols="80"><?php if (isset($dbinspection[0]["text"])) { echo $dbinspection[0]["text"]; } ?></textarea>
                        <script>
                            CKEDITOR.replace( 'text' );
                        </script>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Képek</label>
                        <input name="images[]" id="images[]" type="file" class="form-control" multiple>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Munkaóra</label>
                        <script type="text/javascript">
                            window.onload = function disableWhScroll() {
                                document.getElementById('workhours').addEventListener("mousewheel",
                                    function(event){
                                        this.blur()
                                    });
                                document.getElementById('discount').addEventListener("mousewheel",
                                    function(event){
                                        this.blur()
                                    });
                            }
                        </script>
                        <input name="workhours" id="workhours" type="number" class="form-control" value="<?php if (isset($dbinspection[0]["workhours"])) { echo $dbinspection[0]["workhours"]; } ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Kedvezmény (% -ban)</label>
                        <input name="discount" id="discount" type="number" class="form-control" value="<?php if (isset($dbinspection[0]["discount"])) { echo $dbinspection[0]["discount"]; } ?>">
                    </div>
                </div>
                <input id="whtype" value="<?php echo $dbcase[0]["price"]; ?>" hidden>
                <script type="text/javascript">
                    var pricent = 0;
                    function removePart(e) {
                        e.parentElement.parentElement.remove();
                    }
                    function addPart() {
                        var table = document.getElementById("partlistTable");

                        var row = table.insertRow(1);

                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        var cell6 = row.insertCell(5);

                        var part = document.getElementById("partselector").value;
                        var partelements = part.split(" - ");


                        cell1.innerHTML = "<input name=\"sku[]\" type=\"text\" class=\"form-control\" value='" + partelements[0] + "'>";
                        cell2.innerHTML = "<input name=\"name[]\" type=\"text\" class=\"form-control\" value='" + partelements[1] + "'>";
                        cell3.innerHTML = "<input name=\"longname[]\" type=\"text\" class=\"form-control\" value='" + partelements[2] + "'>";
                        cell4.innerHTML = "<input name=\"ar[]\" id='ar' type=\"text\" class=\"form-control\" value='" + partelements[3].replace(/[^0-9.]/g, "").replace(/\./g,"") + "'>";
                        cell5.innerHTML = "<input name=\"quantity[]\" type=\"text\" class=\"form-control\" value='1'>";
                        cell6.innerHTML = "<button onclick='removePart(this)' class=\"btn btn-sm btn-icon icon-center btn-danger align-bottom\"><i class=\"fas fa-trash\"></i></button>";
                    }

                    var loop = setInterval(function(){
                        var ptb = document.getElementById("partlistTable");
                        var i = 1;
                        var sum = 0;
                        while (i < ptb.rows.length) {
                            sum += parseFloat(ptb.rows[i].cells[3].firstChild.value*ptb.rows[i].cells[4].firstChild.value)
                            i++;
                        }

                        <?php
                        $devicedata = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
                        $devicexml = simplexml_load_file("db/devices.db");
                        foreach ($devicexml->devicegroup as $devicegroup) {
                            foreach ($devicegroup->device as $device) {
                                if ($device["name"] == $devicedata[0]["name"]) {
                                    $nworkhnt = $device["nworkhnt"];
                                    $fworkhnt = $device["fworkhnt"];
                                }
                            }
                        }

                        switch ($case["price"]) {
                            case "normal":
                                $workhoursbr = $nworkhnt*$workhours;
                                $workhourbr = $nworkhnt;
                                $workhourstype = "Normál";
                                break;
                            case "express":
                                $workhoursbr = $fworkhnt*$workhours;
                                $workhourbr = $fworkhnt;
                                $workhourstype = "Sürgősségi";
                                break;
                        }
                        ?>

                        // Munkaóra kalkulálása
                        var whnt = 0;
                        if (document.getElementById("whtype").value === "normal") {
                            whnt = document.getElementById("workhours").value*<?php echo $workhourbr; ?>;
                        } else {
                            whnt = document.getElementById("workhours").value*<?php echo $workhourbr; ?>;
                        }
                        pricent = whnt + sum;

                        // Kedvezmény kalkulálása
                        pricent *= (100-document.getElementById("discount").value)/100;

                        // Végső árak megjelenítése
                        document.getElementById("pricent").innerHTML = Math.round(pricent);
                        document.getElementById("pricebr").innerHTML = Math.round(pricent*1.27);
                    }, 100);
                </script>

                <div class="row">
                    <div class="form-group col-10">
                        <label><?php echo $lang->parts; ?></label>
                        <select class="form-control select2" style="width: 100% !important;" name="partselector" id="partselector">
                            <?php
                            $datas = simplexml_load_file("db/320_szerviz.xml");
                            setlocale(LC_MONETARY, 'hu_HU');
                            foreach ($datas->data as $data) {
                                echo " <option>" . $data->SKU . " - " . $data->name . " - " . $data->LongName . " - " . money_format('%.0n', intval($data->ar)) . " - " . $data->stock . "db raktáron</option>";
                            }
                            ?>
                            <option disabled selected hidden></option>
                        </select>
                    </div>
                    <div class="form-group col-2">
                        <label><?php echo $lang->addpart; ?></label>
                        <a href="javascript:addPart();" class="btn btn-icon icon-left btn-primary align-bottom"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label class="form-label">Szükséges alkatrészek<span class="text-primary mb-2">*</span></label>
                        <table class="table" id="partlistTable">
                            <thead>
                            <tr>
                                <th scope="col">Cikkszám</th>
                                <th scope="col">Név</th>
                                <th scope="col">Hosszú név</th>
                                <th scope="col">Ár (Nettó)</th>
                                <th scope="col">Darabszám</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($dbinspection[0]["id"])) {
                                $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$dbinspection[0]["id"]]);
                                if (isset($dbparts[0]["id"])) {
                                    foreach ($dbparts as $part) {
                                        echo "<tr>";
                                        echo "<th scope=\"row\"><input name=\"sku[]\" type=\"text\" class=\"form-control\" value='" . $part["sku"] . "'></th>";
                                        echo "<td><input name=\"name[]\" type=\"text\" class=\"form-control\" value='" . $part["name"] . "'></td>";
                                        echo "<td><input name=\"longname[]\" type=\"text\" class=\"form-control\" value='" . $part["longname"] . "'></td>";
                                        echo "<td><input name=\"ar[]\" id='ar' type=\"text\" class=\"form-control\" value='" . $part["pricebr"] . "'></td>";
                                        echo "<td><input name=\"quantity[]\" type=\"text\" class=\"form-control\" value='" . $part["quantity"] . "'></td>";
                                        echo "<td><button onclick='removePart(this)' class=\"btn btn-sm btn-icon icon-center btn-danger align-bottom\"><i class=\"fas fa-trash\"></i></button></td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script type="text/javascript">
                    function crtClick() {
                        swal({
                            title: 'Biztos, hogy hozzáadod a bevizsgálást?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willAdd) => {
                                if (willAdd) {
                                    document.getElementById("inspectform").submit();
                                }
                            });
                    }
                </script>
                <input name="cid" id="cid" value="<?php echo $param[3]?>" type="number" class="form-control" hidden>
                <div class="form-group">
                    <a onclick="crtClick()" href="#" class="btn btn-primary btn-lg btn-block">
                        Bevizsgálás hozzáadása
                    </a>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="form-label">Végösszeg (Globális kedvezmények nélkül)</label>
                        <table class="table" id="finalpricetable">
                            <thead>
                            <tr>
                                <th scope="col">Nettó</th>
                                <th scope="col">Bruttó</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td scope="col"><span id="pricent">0</span> Ft</td>
                                <td scope="col"><span id="pricebr">0</span> Ft</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>