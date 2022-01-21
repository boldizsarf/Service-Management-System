<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$dbcase = $dbc->get("SELECT * FROM cases WHERE uid=?", [$dbuser[0]["id"]]);
$dbbanners0 = $dbc->get("SELECT * FROM banners");

?>

<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->home; ?></h1>
    </div>
    <script type="text/javascript">
        window.onload = $('#carouselExampleIndicators').carousel({
            interval: 3000,
            cycle: true
        });
    </script>
    <div class="section-body">
        <div class="col-12" style="margin-bottom: 30px;" <?php if (empty($dbbanners0[0]["id"])) { echo "hidden"; } ?>>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $dbbanners = $dbc->get("SELECT * FROM banners ORDER BY id DESC");
                    $bannernumber = 0;
                    foreach ($dbbanners as $banner) {
                        if ($bannernumber == 0) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"" . $bannernumber . "\" class=\"" . $active . "\"></li>";
                        $bannernumber++;
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $dbbanners = $dbc->get("SELECT * FROM banners ORDER BY id DESC");
                    $bannernumber = 0;
                    foreach ($dbbanners as $banner) {
                        if ($bannernumber == 0) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo "<div class=\"carousel-item " . $active . "\">\n";
                        echo "                        <img class=\"d-block w-100\" src=\"/db/bannerimages/" . hash("sha256", $banner["id"]) . "/banner.jpg\" alt=\"" . $banner["title"] . "\">\n";
                        echo "                        <div class=\"" . $banner["align"] . " " . $banner["color"] . " carousel-caption d-none d-md-block\">\n";
                        echo "                            <h5>" . $banner["title"] . "</h5>\n";
                        echo "                            <p>" . $banner["subtitle"] . "</p>\n";
                        echo "                            <a href=\"" . $banner["href"] . "\" target='" . $banner["target"] . "' class=\"btn btn-primary\" style=\"width: 110px;\">" . $banner["btntext"] . "</a>\n";
                        echo "                        </div>\n";
                        echo "                    </div>";
                        $bannernumber++;
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="row col-12">
            <?php
            $dbnews = $dbc->get("SELECT * FROM news ORDER BY id DESC");
            foreach ($dbnews as $new) {
                echo "<div class=\"col-12 col-md-4 col-lg-4\">";
                echo "<article class=\"article article-style-c\">\n";
                echo "                <div class=\"article-header\">\n";
                echo "                    <div class=\"article-image\" data-background=\"/db/newsimages/" . hash("sha256", $new["id"]) . "/tmb.jpg" . "\" style=\"background-image: url(\"/db/newsimages/" . hash("sha256", $new["id"]) . "/tmb.jpg" . "\");\">\n";
                echo "                    </div>\n";
                echo "                </div>\n";
                echo "                <div class=\"article-details\">\n";
                echo "                    <div class=\"article-category\"><a href=\"#\">Hír</a> <div class=\"bullet\"></div> <a href=\"#\">" . $new["date"] . "</a></div>\n";
                echo "                    <div class=\"article-title\">\n";
                echo "                        <h2><a href=\"/dashboard/post/" . $new["id"] . "\">" . $new["title"] . "</a></h2>\n";
                echo "                    </div>\n";
                echo "                    <p>\n";
                if (strlen($new["text"]) < 47) {
                    echo $new["text"];
                } else {
                    echo substr($new["text"], 0, 47) . "...";
                }
                echo "                    </p>\n";
                echo "                </div>\n";
                echo "            </article>";
                echo "</div>";

            }
            ?>
        </div>

        <div class="col-12">
            <?php
            if (empty($dbcase[0]["id"])) {
                require 'welcome.php';
            } else {
                require 'overview.php';
            }
            ?>
        </div>
    </div>
</section>
