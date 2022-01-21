<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/">';
    return;
}
?>
<section class="section">
    <div class="section-header">
        <h1>Banner létrehozása</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Banner létrehozása</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addbanner.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Cím<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Alcím<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Gomb szövege<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="btntext" id="btntext" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Gomb hivatkozása<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="href" id="href" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Hivatkozás megnyitása<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="target" id="target" required>
                                <option value="_blank">Új lapon</option>
                                <option value="_self">Azonos lapon</option>
                                <option value="_top">Új ablakban</option>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Szöveg színe<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="color" id="color" required>
                                <option value="text-dark">Sötét</option>
                                <option value="text-white">Világos</option>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Szöveg igazítása<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="align" id="align" required>
                                <option value="text-left">Balra</option>
                                <option value="text-center">Középre</option>
                                <option value="text-right">Jobbra</option>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kép<span class="text-primary mb-2">*</span></label>
                            <input type="file" class="form-control" name="upload[]" id="upload[]" required>
                            <small class="form-text text-danger">
                                A kép formátuma csak .jpg lehet. A kép pontos mérete legyen: 3838x999px (DJI banner méret).
                            </small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <?php echo $lang->publish; ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>