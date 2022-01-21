<div class="card">
    <div class="card-header">
        <h4><?php echo $lang->addinspection; ?></h4>
    </div>
    <div class="card-body">
        <form id="inspectform" method="POST" action="/backend/pcaseman.php?q=addinspection" enctype="multipart/form-data">
            <script type="text/javascript">
                function branchClick() {
                    if (document.getElementById('warranty').checked) {
                        var note = "Bevizsgálás során a hibát tapasztaltuk. A termék vételárát jóváírjuk a jegyzőkönyv alapján az ügyfél kártalanítható.";
                    }
                    if (document.getElementById('rejected').checked) {
                        var note = "A terméken garanciát kizáró sérülések találhatóak. A termék garanciális ügyintézésre nem jogosult.";
                    }
                    if (document.getElementById('nff').checked) {
                        var note = "Bevizsgálás során a hibát nem tapasztaltuk.";
                    }
                    if (document.getElementById('doa').checked) {
                        var note = "A termék vétálárát jóváírjuk.";
                    }

                    CKEDITOR.instances[ 'text' ].setData(note);
                }
            </script>
            <div class="row">
                <div class="form-group col-12">
                    <label class="form-label">Megállapított ügymenet<span class="text-primary mb-2">*</span></label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input onclick="branchClick()" type="radio" name="branch" id="warranty" value="warranty" class="selectgroup-input" <?php if ($case["Branch"] == "warranty") { echo "checked"; }  ?>>
                            <span class="selectgroup-button"><i class="fas fa-check"></i> Garanciális</span>
                        </label>
                        <label class="selectgroup-item">
                            <input onclick="branchClick()" type="radio" name="branch" id="rejected" value="rejected" class="selectgroup-input" <?php if ($case["Branch"] == "rejected") { echo "checked"; }  ?>>
                            <span class="selectgroup-button"><i class="fas fa-gavel"></i> Elutasítva</span>
                        </label>
                        <label class="selectgroup-item">
                            <input onclick="branchClick()" type="radio" name="branch" id="nff" value="nff" class="selectgroup-input" <?php if ($case["Branch"] == "nff") { echo "checked"; }  ?>>
                            <span class="selectgroup-button"><i class="fas fa-times"></i> NFF</span>
                        </label>
                        <label class="selectgroup-item">
                            <input onclick="branchClick()" type="radio" name="branch" id="doa" value="doa" class="selectgroup-input" <?php if ($case["Branch"] == "doa") { echo "checked"; }  ?>>
                            <span class="selectgroup-button"><i class="fas fa-history"></i> DOA</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label class="form-label">Jóvá kell majd írni?<span class="text-primary mb-2">*</span></label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="radio" name="forcecrediting" id="yes" value="1" class="selectgroup-input">
                            <span class="selectgroup-button"><i class="fas fa-check"></i> Igen</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="forcecrediting" id="no" value="0" class="selectgroup-input" checked>
                            <span class="selectgroup-button"><i class="fas fa-times"></i> Nem</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label>Raktár<span class="text-primary mb-2">*</span></label>
                    <select class="form-control select2" name="warehouse" id="warehouse">
                        <option>Nincs</option>
                        <option>Központi raktár</option>
                        <option>Mozgó szervizes raktár</option>
                        <option>Értékcsökkentett raktár</option>
                        <option>Selejt raktár</option>
                        <option>Cserejog raktár</option>
                    </select>
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

            <div class="row" hidden>
                <div class="form-group col-12">
                    <label>Képek</label>
                    <input name="images[]" id="images[]" type="file" class="form-control" multiple>
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
            <input name="cid" id="cid" value="<?php echo $param[3]?>" type="text" class="form-control" hidden>
            <div class="form-group">
                <a onclick="crtClick()" href="#" class="btn btn-primary btn-lg btn-block">
                    Bevizsgálás hozzáadása
                </a>
            </div>
        </form>
    </div>
</div>