<?php
error_reporting(-1);
ini_set('display_errors', 'On');


if (!(isset($_SESSION["email"]))) {
    header("Location: /login");
    return;
}

if (empty($param[2])) {
    header("Location: /dashboard/home");
    return;
}

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);

if ($param[2] == "readall") {
    $dbnotis = $dbc->get("SELECT * FROM notifications WHERE uid=?", [$dbuser[0]["id"]]);

    foreach ($dbnotis as $notis) {
        $dbc->set("UPDATE notifications SET viewed=? WHERE id=?",
            ["1", $notis["id"]]);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>MyDroneService Service Management System</title>
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/assets/css/chocolat.css" type="text/css" media="screen" >
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fullcalendar/fullcalendar.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
        var pingIntervalID = setInterval(function(){
            if (!(document.hidden)) {
                $.post("/ping");
            }
        }, 60000);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojione/4.5.0/lib/js/emojione.min.js" integrity="sha512-E2Ai/A9+KcoBm0lvfnd5krbr7TWUigQGWTfcoMToNpfmCvQKkZdTbpwyIM4PFbCGMtSmMjE/DAXGjVXpWGdFaQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA==" crossorigin="anonymous" />
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form method="POST" action="/dashboard/search/" class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <?php
                $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                $dbnotify = $dbc->get("SELECT * FROM notifications WHERE uid=? AND icon<>? ORDER BY id DESC LIMIT 5", [$dbuser[0]["id"], "far fa-paper-plane"]);
                $beep = "";
                foreach ($dbnotify as $notify) {
                    if ($notify["viewed"] == "0") {
                        $beep = " beep";
                    }
                }
                ?>
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg<?php echo $beep; ?>" aria-expanded="false"><i class="far fa-bell"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header"><?php echo $lang->notifications; ?>
                            <div class="float-right">
                                <a href="/dashboard/readall/"><?php echo $lang->markallasread; ?></a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons" tabindex="2" style="overflow: hidden; outline: none;">
                            <?php
                            $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                            $dbnotify = $dbc->get("SELECT * FROM notifications WHERE uid=? AND icon<>? ORDER BY id DESC LIMIT 5", [$dbuser[0]["id"], "far fa-paper-plane"]);

                            foreach ($dbnotify as $notify) {
                                $read = " dropdown-item-unread";
                                if ($notify["viewed"] == "1") {
                                    $read = "";
                                }
                                echo "<a href=\"/dashboard/notify/" . $notify["id"] . "\" class=\"dropdown-item" . $read . "\">\n";
                                echo "                                <div class=\"dropdown-item-icon bg-primary text-white\">\n";
                                echo "                                    <i class=\"" . $notify["icon"] . "\"></i>\n";
                                echo "                                </div>\n";
                                echo "                                <div class=\"dropdown-item-desc\">\n";
                                echo $notify["shorttext"];
                                echo "                                    <div class=\"time text-primary\">" . $notify["date"] . "</div>\n";
                                echo "                                </div>\n";
                                echo "                            </a>";


                            }

                            if (empty($dbnotify[0]["id"])) {
                                echo "<a class=\"dropdown-item\">\n";
                                echo "                                <div class=\"dropdown-item-icon bg-warning text-white\">\n";
                                echo "                                    <i class=\"fas fa-question\"></i>\n";
                                echo "                                </div>\n";
                                echo "                                <div class=\"dropdown-item-desc\">\n";
                                echo $lang->nonoti;
                                echo "                                    <div class=\"time text-primary\"></div>\n";
                                echo "                                </div>\n";
                                echo "                            </a>";
                            }
                            ?>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="/dashboard/notifications"><?php echo $lang->showall; ?> <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div id="ascrail2001" class="nicescroll-rails nicescroll-rails-vr" style="width: 9px; z-index: 1000; cursor: default; position: absolute; top: 58px; left: 341px; height: 350px; opacity: 0.3; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 7px; height: 306px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2001-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 9px; z-index: 1000; top: 399px; left: 0px; position: absolute; cursor: default; display: none; width: 341px; opacity: 0.3;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 7px; width: 350px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"></div></div></div>
                </li>
                <?php
                $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                $dbnotify = $dbc->get("SELECT * FROM notifications WHERE uid=? AND icon=? ORDER BY id DESC LIMIT 5", [$dbuser[0]["id"], "far fa-paper-plane"]);
                $beep = "";
                foreach ($dbnotify as $notify) {
                    if ($notify["viewed"] == "0") {
                        $beep = " beep";
                    }
                }
                ?>
                <li class="dropdown dropdown-list-toggle" <?php if ($dbuser[0]['role'] == 0) { echo "hidden"; } ?>><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg<?php echo $beep; ?>" aria-expanded="false"><i class="far fa-paper-plane"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Üzenetek
                            <div class="float-right">
                                <a href="/dashboard/readall/"><?php echo $lang->markallasread; ?></a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons" tabindex="2" style="overflow: hidden; outline: none;">
                            <?php
                            $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                            $dbnotify = $dbc->get("SELECT * FROM notifications WHERE uid=? AND icon=? ORDER BY id DESC LIMIT 5", [$dbuser[0]["id"], "far fa-paper-plane"]);

                            foreach ($dbnotify as $notify) {
                                $read = " dropdown-item-unread";
                                if ($notify["viewed"] == "1") {
                                    $read = "";
                                }
                                echo "<a href=\"/dashboard/notify/" . $notify["id"] . "\" class=\"dropdown-item" . $read . "\">\n";
                                echo "                                <div class=\"dropdown-item-icon bg-primary text-white\">\n";
                                echo "                                    <i class=\"" . $notify["icon"] . "\"></i>\n";
                                echo "                                </div>\n";
                                echo "                                <div class=\"dropdown-item-desc\">\n";
                                echo $notify["shorttext"];
                                echo "                                    <div class=\"time text-primary\">" . $notify["date"] . "</div>\n";
                                echo "                                </div>\n";
                                echo "                            </a>";


                            }

                            if (empty($dbnotify[0]["id"])) {
                                echo "<a class=\"dropdown-item\">\n";
                                echo "                                <div class=\"dropdown-item-icon bg-warning text-white\">\n";
                                echo "                                    <i class=\"fas fa-question\"></i>\n";
                                echo "                                </div>\n";
                                echo "                                <div class=\"dropdown-item-desc\">\n";
                                echo $lang->nonoti;
                                echo "                                    <div class=\"time text-primary\"></div>\n";
                                echo "                                </div>\n";
                                echo "                            </a>";
                            }
                            ?>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="/dashboard/notifications"><?php echo $lang->showall; ?> <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div id="ascrail2001" class="nicescroll-rails nicescroll-rails-vr" style="width: 9px; z-index: 1000; cursor: default; position: absolute; top: 58px; left: 341px; height: 350px; opacity: 0.3; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 7px; height: 306px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2001-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 9px; z-index: 1000; top: 399px; left: 0px; position: absolute; cursor: default; display: none; width: 341px; opacity: 0.3;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 7px; width: 350px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"></div></div></div>
                </li>
                <a target="_blank" href="https://dealersystem.dji.com/en" class="nav-link nav-link-lg" <?php if ($dbuser[0]['role'] == 0) { echo "hidden"; } ?>><img width="37px" style="margin-top: 6px;" src="https://www1.djicdn.com/dps/e5f926c322d7fdf80eafe38a0d12000c.svg"></a>
                <a target="_blank" href="https://ticket.swlabs.hu/" class="nav-link nav-link-lg" <?php if ($dbuser[0]['role'] == 0) { echo "hidden"; } ?>><img height="30px" style="margin-top: 6px;" src="https://tracking.mydroneservice.hu/assets/help.png"></a>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <?php
                        if ($dbuser[0]['role'] == 10) {
                            if (file_exists('db/ppfp/' . $dbuser[0]['lastname'] . '.jpg')) {
                                echo '<img class="rounded-circle mr-1" src="/db/ppfp/' . $dbuser[0]['lastname'] . '.jpg">';
                            } else {
                                echo '<img class="rounded-circle mr-1" mr-1" src="https://www.gravatar.com/avatar/' . hash("md5", $dbuser[0]['email']) . "?d=" . urlencode("https://dev.tracking.dupliglobal.com/assets/drone.jpg") . '">';
                            }
                        } else {
                            echo '<img class="rounded-circle mr-1" src="https://www.gravatar.com/avatar/' . hash("md5", $dbuser[0]['email']) . '?d=' . urlencode("https://dev.tracking.dupliglobal.com/assets/drone.jpg") . '">';
                        }
                        ?>
                        <div class="d-sm-none d-lg-inline-block"><?php echo $lang->welcome; ?>, <?php echo $dbuser[0]['firstname']; ?>!</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">
                            <?php
                            if ($dbuser[0]['role'] == 10 || $dbuser[0]["role"] == "20") {
                                echo $dbuser[0]['firstname'];
                            } else {
                                echo $dbuser[0]['lastname'] . " " . $dbuser[0]['firstname'];
                            }
                            ?>
                        </div>
                        <a href="/dashboard/settings" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> <?php echo $lang->settings; ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/backend/logout.php" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> <?php echo $lang->logout; ?>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand" style="margin-bottom: 10px;">
                    <img src="<?php echo $logoColor; ?>" alt="Duplitec" width="150">
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="/">D</a>
                </div>
                <ul class="sidebar-menu">

                    <?php

                    $menu = simplexml_load_file('db/menu.db');
                    $lngcode = $_COOKIE["sw_lang"];
                    $apg = null;

                    foreach ($menu->group as $menugroup) {
                        foreach ($menugroup->pages->page as $page) {
                            foreach ($page->access->role as $pagerole) {
                                if ($pagerole == $dbuser[0]["role"]) {
                                    if (isset($pagerole["defaultpage"])) {
                                        if ($pagerole["defaultpage"] == "true") {
                                            $dpage = $page->link;
                                        }
                                    }
                                }
                            }
                        }
                    }

                    foreach ($menu->group as $menugroup) {

                        // Permission check
                        foreach ($menugroup->pages->page as $page) {
                            if ($page->link == $param[2]) {
                                $ri = 0;
                                foreach ($page->access->role as $pagerole) {
                                    if ($dbuser[0]["role"] == $pagerole) {
                                        $ri++;
                                    }
                                }
                                if ($ri == 0) {
                                    if (isset($dpage)) {
                                        echo '<meta http-equiv="refresh" content="0; URL=/dashboard/' . $dpage . '">';
                                    } else {
                                        echo '<meta http-equiv="refresh" content="0; URL=/dashboard/home">';
                                    }
                                    return;
                                }
                            }
                        }

                        foreach ($menugroup->access->role as $grouprole) {
                            if ($dbuser[0]["role"] == $grouprole) {
                                echo '<li class="menu-header">' . $menugroup->names->$lngcode . '</li>';
                            }
                        }

                        foreach ($menugroup->pages->page as $page) {
                            foreach ($page->access->role as $pagerole) {
                                if ($dbuser[0]["role"] == $pagerole) {
                                    if ($param[2] == $page->link) {
                                        $active = "active";
                                        $apg = $page->link;
                                    } else {
                                        $active = "";
                                    }

                                    if (isset($page->sublinks)) {
                                        foreach ($page->sublinks->link as $sublink) {
                                            if ($param[2] == $sublink) {
                                                $active = "active";
                                                $apg = $sublink;
                                            }
                                        }
                                    }

                                    echo '<li class="nav-item ' . $active . '"><a href="/dashboard/' . $page->link . '" class="nav-link"><i class="fas fa-' . $page->icon . '"></i> <span>' . $page->names->$lngcode . '</span></a></li>';
                                }
                            }
                        }
                    }



                    ?>
                </ul>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <?php
                if (file_exists('pages/' . $param[2] . '.php')) {
                    require 'pages/' . $param[2] . '.php';
                } else {
                    echo "<div class=\"card\">\n";
                    echo "                  <div class=\"card-header\">\n";
                    echo "                    <h4>" . $lang->error . "</h4>\n";
                    echo "                  </div>\n";
                    echo "                  <div class=\"card-body\">\n";
                    echo "                    <div class=\"empty-state\" data-height=\"400\" style=\"height: 400px;\">\n";
                    echo "                      <div class=\"empty-state-icon\">\n";
                    echo "                        <i class=\"fas fa-question\"></i>\n";
                    echo "                      </div>\n";
                    echo "                      <h2>404</h2>\n";
                    echo "                      <p class=\"lead\">\n";
                    echo $lang->pagenotfound;
                    echo "                      </p>\n";
                    echo "                      <a href=\"/dahsboard\" class=\"btn btn-primary mt-4\">" . $lang->backtohome . "</a>\n";
                    echo "                    </div>\n";
                    echo "                  </div>\n";
                    echo "                </div>";

                }

            ?>
        </div>


        <footer class="main-footer">
            <div class="footer-left">
                Copyright <a href="#"><i class="fas fa-copyright"></i></a> <?php echo date("Y"); ?> FlyMore Kft.
            </div>
            <div class="footer-right"><a href="https://swpro.typeform.com/to/Kjw2mZLC" target="_blank"><?php echo $lang->bugreport; ?></a>
            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<!-- JS Libraies -->
<script src="/assets/js/jquery.chocolat.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/fullcalendar/fullcalendar.min.js"></script>


<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>