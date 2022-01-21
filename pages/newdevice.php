<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->newdevice; ?></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $lang->newdevice; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/adddevice.php">
                    <div class="wizard-steps">
                        <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="wizard-step-label">
                                <?php echo $lang->newdevice; ?>
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-list"></i>
                            </div>
                            <div class="wizard-step-label">
                                <?php echo $lang->newaccessory; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Eszköz típusa -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->device; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="device" id="device" required>
                                <?php
                                $devices = simplexml_load_file('db/devices.db');
                                foreach ($devices->devicegroup as $devicegroup) {
                                    echo "<optgroup label='" . $devicegroup["name"] . " " . $lang->series . "'>";
                                    foreach ($devicegroup->device as $device) {
                                        echo " <option>" . $device["name"] . "</option>";
                                    }
                                    echo "</optgroup>";
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
                            <input type="text" class="form-control" name="serial" id="serial" required>
                            <small class="form-text text-muted">
                                <?php echo $lang->snhelp; ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <?php echo $lang->addnew; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>