<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Duplitec Service Management System</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <a href="/"><img src="<?php echo $logoColor; ?>" alt="Duplitec" width="200"><br></a>
                        <h6><small class="text-muted">Service Management System</small></h6>
                    </div>

                    <?php

                    if (!(empty($param[2]))) {
                        if ($param[2] == "1") {
                            print "<div class=\"alert alert-success alert-has-icon\">\n";
                            print "                        <div class=\"alert-icon\"><i class=\"fas fa-check\"></i></div>\n";
                            print "                        <div class=\"alert-body\">\n";
                            print "                            <div class=\"alert-title\">Sikeres regisztráció!</div>\n";
                            print "                            Felhasználó létrehozva.\n";
                            print "                        </div>\n";
                            print "                    </div>";
                        } else {
                            print "<div class=\"alert alert-danger alert-has-icon\">\n";
                            print "                        <div class=\"alert-icon\"><i class=\"fas fa-times\"></i></div>\n";
                            print "                        <div class=\"alert-body\">\n";
                            print "                            <div class=\"alert-title\">Hiba!</div>\n";
                            switch ($param[2]) {
                                default:
                                    $errormsg = "Ismeretlen hiba.";
                                    break;
                                case "2":
                                    $errormsg = "A két jelszó nem egyezik.";
                                    break;
                                case "3":
                                    $errormsg = "Ez az email cím már használatban van.";
                                    break;
                            }
                            print $errormsg;
                            print "                        </div>\n";
                            print "                    </div>";
                        }
                    }

                    ?>

                    <div class="card card-primary">
                        <div class="card-header"><h4><?php echo $lang->register; ?></h4></div>

                        <div class="card-body">
                            <form method="POST" action="/backend/register.php">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="lastname"><?php echo $lang->lastname; ?><span class="text-primary mb-2">*</span></label>
                                        <input type="text" class="form-control" autofocus="" name="lastname" id="lastname" required>
                                        <small class="form-text text-muted">
                                            Kérjük a saját nevét adja meg. Amennyiben cég nevében regisztrál, később lesz lehetősége hozzáadni a cég adatait.
                                        </small>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="firstname"><?php echo $lang->firstname; ?><span class="text-primary mb-2">*</span></label>
                                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email"><?php echo $lang->email; ?><span class="text-primary mb-2">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone"><?php echo $lang->phone; ?><span class="text-primary mb-2">*</span></label>
                                    <input type="tel" class="form-control" name="phone" id="phone" required>
                                    <small class="form-text text-muted">
                                        Például: +36123456789, vagy 06123456789.
                                    </small>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="passwd" class="d-block"><?php echo $lang->password; ?><span class="text-primary mb-2">*</span></label>
                                        <input name="passwd" id="passwd"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control pwstrength" data-indicator="pwindicator" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <small class="form-text text-muted">
                                            Minimum 8 karakter, kis, illetve nagy betűk, és számok.
                                        </small>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="passwd2" class="d-block"><?php echo $lang->password2; ?><span class="text-primary mb-2">*</span></label>
                                        <input name="passwd2" id="passwd2"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-divider">
                                    <?php echo $lang->address; ?>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label><?php echo $lang->country; ?><span class="text-primary mb-2">*</span></label>
                                        <select class="form-control select2" name="country" id="country" required>
                                            <option value="Albánia">Albánia</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Ausztria">Ausztria</option>
                                            <option value="Azerbajdzsán">Azerbajdzsán</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Bosznia és Hercegovina">Bosznia és Hercegovina</option>
                                            <option value="Bulgária">Bulgária</option>
                                            <option value="Ciprus">Ciprus</option>
                                            <option value="Cseh Köztársaság">Cseh Köztársaság</option>
                                            <option value="Dánia">Dánia</option>
                                            <option value="Egyesült Királyság">Egyesült Királyság</option>
                                            <option value="Finnország">Finnország</option>
                                            <option value="Franciaország">Franciaország</option>
                                            <option value="Grúzia">Grúzia</option>
                                            <option value="Görögország">Görögország</option>
                                            <option value="Hollandia">Hollandia</option>
                                            <option value="Horvátország">Horvátország</option>
                                            <option value="Izland">Izland</option>
                                            <option value="Lengyelország">Lengyelország</option>
                                            <option value="Lettország">Lettország</option>
                                            <option value="Liechtensteini">Liechtensteini</option>
                                            <option value="Litvánia">Litvánia</option>
                                            <option value="Luxemburg">Luxemburg</option>
                                            <option value="Magyarország">Magyarország</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Montenegró">Montenegró</option>
                                            <option value="Málta">Málta</option>
                                            <option value="Norvégia">Norvégia</option>
                                            <option value="Németország">Németország</option>
                                            <option value="Olaszország">Olaszország</option>
                                            <option value="Oroszországi Föderáció">Oroszországi Föderáció</option>
                                            <option value="Portugália">Portugália</option>
                                            <option value="Románia">Románia</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Spanyolország">Spanyolország</option>
                                            <option value="Svájc">Svájc</option>
                                            <option value="Svédország">Svédország</option>
                                            <option value="Szerbia">Szerbia</option>
                                            <option value="Szlovák Köztársaság">Szlovák Köztársaság</option>
                                            <option value="Szlovénia">Szlovénia</option>
                                            <option value="Törökország">Törökország</option>
                                            <option value="Ukrajna">Ukrajna</option>
                                            <option value="Észak-Macedónia">Észak-Macedónia</option>
                                            <option value="Észtország">Észtország</option>
                                            <option value="Írország">Írország</option>
                                            <option value="Örményország">Örményország</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label><?php echo $lang->state; ?><span class="text-primary mb-2">*</span></label>
                                        <input type="text" class="form-control" name="state" id="state" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label><?php echo $lang->postcode; ?><span class="text-primary mb-2">*</span></label>
                                        <input type="number" class="form-control" name="postcode" id="postcode" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label><?php echo $lang->city; ?><span class="text-primary mb-2">*</span></label>
                                        <input type="text" class="form-control" name="city" id="city" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label><?php echo $lang->addressname; ?><span class="text-primary mb-2">*</span></label>
                                        <input type="text" class="form-control" name="addressname" id="addressname" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label><?php echo $lang->addresstype; ?><span class="text-primary mb-2">*</span></label>
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
                                        <label><?php echo $lang->housenumber; ?><span class="text-primary mb-2">*</span></label>
                                        <input type="text" class="form-control" name="housenumber" id="housenumber" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <label><?php echo $lang->floor; ?></label>
                                        <input type="text" class="form-control" name="floor" id="floor">
                                    </div>
                                    <div class="form-group col-4">
                                        <label><?php echo $lang->door; ?></label>
                                        <input type="text" class="form-control" name="door" id="door">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                                        <label class="custom-control-label" for="agree"><?php echo $lang->accept; ?> <a href="/contract" target="_blank"><?php echo $lang->tof; ?></a> <?php echo $lang->and; ?> <a href="/contract" target="_blank"><?php echo $lang->privacy; ?></a></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        <?php echo $lang->register; ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <?php echo $lang->haveaccount; ?> <a href="/login"><?php echo $lang->login; ?></a>
                    </div>
                    <div class="simple-footer">
                        Copyright <a href="#"><i class="fas fa-copyright"></i></a> <?php echo date("Y"); ?> FlyMore Kft.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>
