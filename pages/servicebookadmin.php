<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

if (empty($param[3])) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/servicebookadmin/books">';
    return;
}

?>
<section class="section">
    <div class="section-header">
        <h1>Online Szervizkönyv</h1>

    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="/dashboard/servicebookadmin/books" class="nav-link <?php if ($param[3] == "books") { echo "active"; } ?>">Szervizkönyvek</a></li>
                            <li class="nav-item"><a href="/dashboard/servicebookadmin/endusers" class="nav-link <?php if ($param[3] == "endusers") { echo "active"; } ?>">Végfelhasználók</a></li>
                            <li class="nav-item"><a href="/dashboard/servicebookadmin/resellers" class="nav-link <?php if ($param[3] == "resellers") { echo "active"; } ?>">Viszonteladók</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-9">
                <?php
                if (file_exists('pages/servicebookadminModules/' . $param[3] . '.php')) {
                    require 'pages/servicebookadminModules/' . $param[3] . '.php';
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
        </div>
    </div>
</section>