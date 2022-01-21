<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->newaccessory; ?></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $lang->newaccessory; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addaccessory.php">
                    <?php
                    if ($param[3] == "0") {
                        echo "<div class=\"wizard-steps\">\n";
                        echo "                        <div class=\"wizard-step\">\n";
                        echo "                            <div class=\"wizard-step-icon\">\n";
                        echo "                                <i class=\"fas fa-rocket\"></i>\n";
                        echo "                            </div>\n";
                        echo "                            <div class=\"wizard-step-label\">\n";
                        echo $lang->newdevice;
                        echo "                            </div>\n";
                        echo "                        </div>\n";
                        echo "                        <div class=\"wizard-step wizard-step-active\">\n";
                        echo "                            <div class=\"wizard-step-icon\">\n";
                        echo "                                <i class=\"fas fa-list\"></i>\n";
                        echo "                            </div>\n";
                        echo "                            <div class=\"wizard-step-label\">\n";
                        echo $lang->newaccessory;
                        echo "                            </div>\n";
                        echo "                        </div>\n";
                        echo "                    </div>";

                    }
                    ?>
                    <!-- Eszköz típusa -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->accessory; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="device" id="device" required>
                                <?php
                                $accessories = simplexml_load_file('db/accessories.db');
                                foreach ($accessories->accessory as $accessory) {
                                    echo " <option>" . $accessory["name"] . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <input type="text" class="form-control" name="did" id="did" value="<?php if ($param[3] == "0") { echo $param[4]; } else { echo $param[3]; } ?>" hidden>

                    <!-- Szériaszám -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->serial; ?><span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="serial" id="serial" required>
                            <small class="form-text text-muted">
                                <?php echo $lang->snhelp; ?>
                            </small>
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <?php echo $lang->addnew; ?>
                        </button>
                    </div>
                        <div class="form-group col-6">
                            <a href="/dashboard/mydevice/<?php if ($param[3] == "0") { echo $param[4]; } else { echo $param[3]; } ?>" class="btn btn-primary btn-lg btn-block"><?php echo $lang->backtodevice; ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>