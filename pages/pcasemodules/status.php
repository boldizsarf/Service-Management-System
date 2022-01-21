<div class="row centered">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $lang->status; ?></h4>
            </div>
            <div class="card-body">
                <center>
                    <h4 class="<?php echo $case["Status"]["Color"]; ?>"><?php echo $case["Status"]["TextHU"]; ?></h4>
                    <i class="<?php echo $case["Status"]["Icon"]; ?> <?php echo $case["Status"]["Color"]; ?>" style="font-size: 1000%;"></i>
                    <br/><br/>
                    <div class="row" <?php if ($case["Status"]["Responsible"]["Name"] == null && $case["Status"]["Responsible"]["Text"] == null) { echo "hidden"; }  ?>>
                        <div class="col-12">
                            <h6 class="<?php echo $case["Status"]["Task"]["Color"]; ?>">Határidő: <?php echo $case["Status"]["Task"]["TaskNoteHU"]; ?></h6>
                        </div>
                    </div>
                    <div class="row" <?php if ($case["Status"]["Responsible"]["Name"] == null && $case["Status"]["Responsible"]["Text"] == null) { echo "hidden"; }  ?>>
                        <div class="col-12">
                            <h6 class="<?php echo $case["Status"]["Task"]["Color"]; ?>">Felelős: <?php echo $case["Status"]["Responsible"]["Name"]; ?></h6>
                        </div>
                    </div>
                    <div class="row" <?php if ($case["Status"]["Responsible"]["Name"] == null && $case["Status"]["Responsible"]["Text"] == null) { echo "hidden"; }  ?>>
                        <div class="col-12">
                            <h6 class="<?php echo $case["Status"]["Task"]["Color"]; ?>">Teendő: <?php echo $case["Status"]["Responsible"]["Text"]; ?></h6>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function refreshClick() {
                            swal({
                                title: 'Biztos, hogy frissíted az ügy állapotát?',
                                icon: 'warning',
                                buttons: true,
                                dangerMode: true,
                            })
                                .then((willAdd) => {
                                    if (willAdd) {
                                        document.getElementById("refreshform").submit();
                                    }
                                });
                        }
                    </script>
                    <form id="refreshform" method="POST" action="/backend/pcaseman.php?q=updatestatus">
                        <input type="text" class="form-control" name="cid" id="cid" value="<?php echo $case["TrackingID"]; ?>" hidden>
                        <div class="form-group col-12 text-left">
                            <label class="form-label"><?php echo $lang->status; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="status" id="status" required>
                                <?php
                                $statuses = simplexml_load_file('db/pstatuses.db');
                                $lngcd = strval($_COOKIE["sw_lang"]);
                                foreach ($statuses->status as $status) {
                                    echo " <option value='" . $status["id"] . "'>" . $status->$lngcd . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                        <div class="form-group col-12 text-left">
                            <a onclick="refreshClick()" href="#" type="submit" class="btn btn-primary btn-lg btn-block">
                                <?php echo $lang->refresh; ?>
                            </a>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="activities">
            <?php
            $dbstatus = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? ORDER BY id ASC", [$case["CaseID"]]);
            $statuses = simplexml_load_file('db/pstatuses.db');
            $lngcd = strval($_COOKIE["sw_lang"]);
            foreach ($dbstatus as $status) {
                foreach ($statuses->status as $xmlstatus) {
                    if ($xmlstatus["id"] == $status["status"]) {
                        $statustext = $xmlstatus->$lngcd;
                        $statuscolor = $xmlstatus->color;
                        $statusicon = $xmlstatus->icon;
                    }
                }
                echo "                                            <div class=\"activity\">\n";
                echo "                                                <div class=\"activity-icon bg-primary text-white shadow-primary\">\n";
                echo "                                                    <i class=\"" . $statusicon . "\"></i>\n";
                echo "                                                </div>\n";
                echo "                                                <div class=\"activity-detail\">\n";
                echo "                                                    <div class=\"mb-2\">\n";
                echo "                                                        <span class=\"text-job\">" . $status["date"] . "</span>\n";
                echo "                                                    </div>\n";
                echo "                                                    <p>" . $statustext . "</p>\n";
                echo "                                                </div>\n";
                echo "                                            </div>\n";

            }
            ?>
        </div>
    </div>
</div>