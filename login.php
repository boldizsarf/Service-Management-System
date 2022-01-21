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

                    if (!(empty($param[2]))) {
                        if ($param[2] == "1") {
                            print "<div class=\"alert alert-success alert-has-icon\">\n";
                            print "                        <div class=\"alert-icon\"><i class=\"fas fa-check\"></i></div>\n";
                            print "                        <div class=\"alert-body\">\n";
                            print "                            <div class=\"alert-title\">Felhasználó létrehozva</div>\n";
                            print "                            A regisztráció befejezéséhez kérjük erősítse meg email címét.\n";
                            print "                        </div>\n";
                            print "                    </div>";
                        } else if ($param[2] == "4") {
                            print "<div class=\"alert alert-success alert-has-icon\">\n";
                            print "                        <div class=\"alert-icon\"><i class=\"fas fa-check\"></i></div>\n";
                            print "                        <div class=\"alert-body\">\n";
                            print "                            <div class=\"alert-title\">Új jelszó létrehozása..</div>\n";
                            print "                            Az új jelszó létrehozásához szükséges információ elküldve emailben.\n";
                            print "                        </div>\n";
                            print "                    </div>";
                        } else if ($param[2] == "5") {
                            print "<div class=\"alert alert-success alert-has-icon\">\n";
                            print "                        <div class=\"alert-icon\"><i class=\"fas fa-check\"></i></div>\n";
                            print "                        <div class=\"alert-body\">\n";
                            print "                            <div class=\"alert-title\">Új jelszó létrehozása..</div>\n";
                            print "                            Jelszó sikeresen beállítva!\n";
                            print "                        </div>\n";
                            print "                    </div>";
                        } else if ($param[2] == "7") {
                            print "<div class=\"alert alert-success alert-has-icon\">\n";
                            print "                        <div class=\"alert-icon\"><i class=\"fas fa-check\"></i></div>\n";
                            print "                        <div class=\"alert-body\">\n";
                            print "                            <div class=\"alert-title\">Sikeres regisztráció!</div>\n";
                            print "                            Email cím sikeresen megerősítve.\n";
                            print "                        </div>\n";
                            print "                    </div>";
                        } else if ($param[2] == "2" || $param[2] == "3" || $param[2] == "6" || $param[2] == "8" || $param[2] == "9") {
                            print "<div class=\"alert alert-danger alert-has-icon\">\n";
                            print "                        <div class=\"alert-icon\"><i class=\"fas fa-times\"></i></div>\n";
                            print "                        <div class=\"alert-body\">\n";
                            print "                            <div class=\"alert-title\">Hiba!</div>\n";
                            switch ($param[2]) {
                                default:
                                    $errormsg = "Ismeretlen hiba.";
                                    break;
                                case "2":
                                    $errormsg = "Hibás email cím.";
                                    break;
                                case "3":
                                    $errormsg = "Hibás jelszó.";
                                    break;
                                case "6":
                                    $errormsg = "A link már nem érvényes.";
                                    break;
                                case "8":
                                    $errormsg = "Az email cím nincs megerősítve.";
                                    break;
                                case "9":
                                    $errormsg = "Sajnos kitiltásra kerültél a rendszerből.";
                                    break;
                            }
                            print $errormsg;
                            print "                        </div>\n";
                            print "                    </div>";
                        }
                    }

                    ?>

                    <div class="card card-primary">
                        <div class="card-header"><h4><?php echo $lang->login; ?></h4></div>
                        <div class="card-body">
                            <form method="POST" action="/backend/login.php">
                                <div class="form-group">
                                    <label for="email"><?php echo $lang->email; ?></label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label"><?php echo $lang->password; ?></label>
                                        <div class="float-right">
                                            <a href="/lostpass" class="text-small">
                                                <?php echo $lang->lostpasswd; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <input id="passwd" type="password" class="form-control" name="passwd" tabindex="2" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        <?php echo $lang->login; ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <?php echo $lang->donthaveaccount; ?> <a href="/register"><?php echo $lang->register; ?></a>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <a href="/setlang/hu">Magyar</a> - <a href="/setlang/gb">English</a>
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
