<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->addinspection; ?></h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $lang->addinspection; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addaddress.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->case; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="device" id="device" required>
                                <?php
                                $dbcase = $dbc->get("SELECT * FROM cases");
                                foreach ($dbcase as $case) {
                                    $dbdevice = $dbc->get("SELECT * FROM devices WHERE id=?", [$case["device"]]);
                                    $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$case["uid"]]);

                                    echo "<option value='" . $case["id"] . "'>MDS-" . date("Y",strtotime($case["created"])) . "/ C" . $case["id"] . " - " . $dbuser[0]["lastname"] .  " " . $dbuser[0]["firstname"] . " - " . $dbdevice[0]["name"] . " - " . $dbcase[0]["problem"] .  "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
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
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Jegyzőkönyv<span class="text-primary mb-2">*</span></label>
                            <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Szükséges alkatrészek<span class="text-primary mb-2">*</span></label>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Cikk</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control select2" name="repair" id="repair" required>
                                            <?php
                                            $datas = simplexml_load_file('db/320_szerviz.xml');
                                            setlocale(LC_MONETARY, 'hu_HU');
                                            foreach ($datas->data as $data) {
                                                echo "<option value='" . $data->SKU . "'>" . $data->SKU . " - " . $data->name . " - " . money_format('%.0n', intval($data->ar)) . " - " . $data->stock . "db</option>";
                                            }
                                            ?>
                                            <option disabled selected hidden></option>
                                        </select>
                                    </td>
                                    <td><a href="#" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Hozzáadás
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>