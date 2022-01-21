<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Duplitec Service Management System</title>
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>

<body class="layout-3">
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <a href="/" class="navbar-brand sidebar-gone-hide"><img src="https://irp-cdn.multiscreensite.com/d055e20a/dms3rep/multi/dd-logo-white-9fc3b236.svg" width="300"></a>

            <div class="nav-collapse">
            </div>
            <form class="form-inline ml-auto">

            </form>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item"><a href="/login" class="nav-link"><?php echo $lang->login; ?></a></li>
                <li class="nav-item"><a href="/register" class="nav-link"><?php echo $lang->register; ?></a></li>

                <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="https://www.countryflags.io/<?php if (isset($_COOKIE["sw_lang"])) { echo $_COOKIE["sw_lang"]; } else { echo "hu"; } ?>/flat/64.png" class="mr-1">
                        <?php
                            if (isset($_COOKIE["sw_lang"])) {
                                echo $lang["name"];
                            } else {
                                echo "Magyar";
                            }
                        ?>
                        </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title"><?php echo $lang->chooselang; ?></div>
                        <?php
                        $langs = array_diff(scandir("lang", 1), array('..', '.'));

                        foreach ($langs as $language) {
                            $langfile = simplexml_load_file('lang/' . $language);
                            echo "<a href=\"/setlang/". $langfile["short"] . "\" class=\"dropdown-item has-icon\">\n";
                            echo "<img alt=\"image\" src=\"https://www.countryflags.io/". $langfile["short"] . "/flat/64.png\" width=\"20\" class=\"mr-1\">" . $langfile["name"] . "\n";
                            echo "</a>";

                        }

                        ?>
                    </div>
                </li>
            </ul>
        </nav>


        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1><?php echo $lang->news; ?></h1>
                </div>
                <div class="section-body">

                <?php
                $dbnews = $dbc->get("SELECT * FROM news ORDER BY date DESC");

                foreach ($dbnews as $new) {
                    $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$new["uid"]]);
                    $roles = simplexml_load_file('db/roles.db');
                    $langc = $_COOKIE["sw_lang"];
                    foreach ($roles->role as $role) {
                        if ($role["id"] == $dbuser[0]["role"]) {
                            $roletext = $role->$langc;
                            $roleicon = $role->icon;
                            $rolecolor = $role->color;
                        }
                    }
                    echo "<div class=\"card\">\n";
                    echo "                        <div class=\"card-header\">\n";
                    echo "                            <h4>" . $new["title"] . "</h4>\n";
                    echo "                        </div>\n";
                    echo "                        <div class=\"card-body\">\n";
                    echo "                            <p>" . $new["text"] . "</p>\n";
                    echo "                        </div>\n";
                    echo "                        <div class=\"card-footer bg-whitesmoke\">\n";
                    echo $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . " - <span class=\"font-weight-600 " . $rolecolor . "\"><i class=\"" . $roleicon . "\"></i> " . $roletext . "</span><div class=\"bullet\"></div>" . $new["date"] . "";
                    echo "                        </div>\n";
                    echo "                    </div>";

                }

                ?>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright <a href="#"><i class="fas fa-copyright"></i></a> <?php echo date("Y"); ?> FlyMore Kft.
            </div>
            <div class="footer-right">
                Open Beta v1.0.0 - <a href="https://swpro.typeform.com/to/Kjw2mZLC" target="_blank"><?php echo $lang->bugreport; ?></a> - <a href="#"><i class="fas fa-code"></i></a> by Boldizsar Fodor.
            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>
</body>
</html>
