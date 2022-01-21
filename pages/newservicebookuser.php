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
        <h1>Online szervizkönyv felhasználó létrehozása</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Felhasználó létrehozása</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/tmkman.php?q=adduser" enctype="multipart/form-data">

                    <div class="row">
                        <div class="form-group col-12">
                            <h2 class="section-title">Alapadatok</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Felhasználó típusa<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="role" id="role" required>
                                <option value="20">Végfelhasználó</option>
                                <option value="21">Viszonteladó</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Partner neve<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Partner email címe<span class="text-primary mb-2">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Partner telefonszáma<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Jelszó<span class="text-primary mb-2">*</span></label>
                            <input type="text" value="Jelszó az első belépés előtti jelszó emlékeztetővel generálódik" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <h2 class="section-title">Cím</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label><?php echo $lang->country; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="country" id="country" required>
                                <option selected>Magyarország</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label><?php echo $lang->state; ?><span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="state" id="state" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Irányítószám<span class="text-primary mb-2">*</span></label>
                            <input type="number" class="form-control" name="postcode" id="postcode" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Település<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="city" id="city" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Közterület neve<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="addressname" id="addressname" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Közterület típusa<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="addresssuffix" id="addresssuffix" required>
                                <?php
                                $suffixes = file("https://ceginformaciosszolgalat.kormany.hu/download/b/46/11000/kozterulet_jelleg_2015_09_07.txt");
                                foreach ($suffixes as $suffix) {
                                    echo " <option>" . $suffix . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label>Házszám<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="housenumber" id="housenumber" required>
                        </div>
                        <div class="form-group col-4">
                            <label>Emelet</label>
                            <input type="text" class="form-control" name="floor" id="floor">
                        </div>
                        <div class="form-group col-4">
                            <label>Ajtó</label>
                            <input type="text" class="form-control" name="door" id="door">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Létrehozás
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>