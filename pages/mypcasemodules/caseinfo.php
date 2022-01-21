<div class="tab-pane fade active show" id="status" role="tabpanel" aria-labelledby="status-casetabs">
    <div class="row centered">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $lang->status; ?></h4>
                </div>
                <div class="card-body">
                    <center>
                        <h4 class="<?php echo $case["Status"]["Color"]; ?>"><?php echo $case["Status"]["TextHU"]; ?></h4>
                        <i class="<?php echo $case["Status"]["Icon"]; ?> <?php echo $case["Status"]["Color"]; ?>" style="font-size: 1000%;"></i></br></br>
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
</div>