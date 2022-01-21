<div class="tab-pane fade" id="viewinspection" role="tabpanel" aria-labelledby="viewinspection-casetabs">
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->inspection; ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo $lang->iswarranty; ?></th>
                            <td>
                                    <span class="<?php echo $case["Inspection"]["Branch"]["Color"]; ?> mb-2"><i class="<?php echo $case["Inspection"]["Branch"]["Icon"]; ?>"></i>
                                        <?php echo $case["Inspection"]["Branch"]["TextHU"]; ?>
                                    </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo $lang->inspectnote; ?></h4>
                </div>
                <div class="card-body">
                    <?php echo $case["Inspection"]["Text"]; ?>
                </div>
                <div class="card-footer">
                    <?php
                    echo "<div class=\"row\" style='margin-left: 1px;'>";
                    echo "                                                                <div class=\"font-weight-600\">" . $case["Inspection"]["Inspector"]["Name"] . "</div>\n";
                    echo "                                                                <div class=\"bullet\"></div>\n";
                    echo "                                                                <div class=\"font-weight-600 " . $case["Inspection"]["Inspector"]["Role"]["Color"] . "\"><i class=\"" . $case["Inspection"]["Inspector"]["Role"]["Icon"] . "\"></i> " . $case["Inspection"]["Inspector"]["Role"]["TextHU"] . "</div>\n";
                    echo "                                                                <div class=\"bullet\"></div>\n";
                    echo "                                                                <div class=\"font-weight-600\"> " . $dbinspection[0]["date"] . "</div>\n";
                    echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group col-12">
                <form id="printinspect" method="POST" action="/backend/b2bilap.php" target="_blank">
                    <input name="trackingid" type="text" class="form-control" value="<?php echo $case['TrackingID']; ?>" hidden>
                    <button type="submit" class="btn btn-icon icon-left btn-block btn-primary">
                        <i class="fas fa-print"></i> Nyomtatás
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>