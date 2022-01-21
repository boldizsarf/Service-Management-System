<?php

$email = $param[2];
$key1 = $param[3];
$key2 = $param[4];

$dbpasswdgen = $dbc->get("SELECT * FROM passwdgen WHERE email=?", [$email]);

if (empty($param[2])) {
    header("Location: /login/6");
    return;
}

if (empty($param[3])) {
    header("Location: /login/6");
    return;
}

if (empty($param[4])) {
    header("Location: /login/6");
    return;
}

if ($dbpasswdgen[0]["email"] != $email) {
    header("Location: /login/6");
    return;
}

if ($dbpasswdgen[0]["key1"] != $key1) {
    header("Location: /login/6");
    return;
}

if ($dbpasswdgen[0]["key2"] != $key2) {
    header("Location: /login/6");
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Duplitec Service Management System</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <a href="/"><img src="<?php echo $logoColor; ?>" alt="Duplitec" width="200"><br></a>
                        <h6><small class="text-muted">Service Management System</small></h6>
                    </div>
                    <?php

                    if (!(empty($param[5]))) {
                        if ($param[5] == "1") {
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
                            switch ($param[5]) {
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
                        <div class="card-header"><h4><?php echo $lang->setnewpasswd; ?></h4></div>
                        <div class="card-body">
                            <form method="POST" action="/backend/rstpasswd.php">
                                <div class="form-group">
                                    <label for="email"><?php echo $lang->newpasswd; ?></label>
                                    <input id="passwd" type="password" class="form-control" name="passwd" tabindex="1" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="email"><?php echo $lang->newpasswd2; ?></label>
                                    <input id="passwd2" type="password" class="form-control" name="passwd2" tabindex="1" required>
                                </div>

                                <input value="<?php echo $param[2]; ?>" id="email" type="password" class="form-control" name="email" tabindex="1" hidden>
                                <input value="<?php echo $param[3]; ?>" id="key1" type="password" class="form-control" name="key1" tabindex="1" hidden>
                                <input value="<?php echo $param[4]; ?>" id="key2" type="password" class="form-control" name="key2" tabindex="1" hidden>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        <?php echo $lang->setnewpasswd; ?>
                                    </button>
                                </div>
                            </form>
                        </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>
