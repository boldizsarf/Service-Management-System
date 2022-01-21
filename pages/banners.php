<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

if ($param[3] == "rm") {
    $dbc->set("DELETE FROM banners WHERE id=?", [$param[4]]);
    $files = glob("db/bannerimages/" . hash("sha256", $param[4]) . "/*");
    foreach($files as $file){
        if(is_file($file))
            unlink($file);
    }
    rmdir("db/bannerimages/" . hash("sha256", $param[4]));
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/banners">';
    return;
}

?>
<section class="section">
    <div class="section-header">
        <h1>Bannerek</h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newbanner" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Bannerek</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cím</th>
                    <th scope="col">Alcím</th>
                    <th scope="col">Közzétette</th>
                    <th scope="col">Dátum</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $dbbanners = $dbc->get("SELECT * FROM banners ORDER BY id DESC");

                foreach ($dbbanners as $banner) {
                    $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$banner["uid"]]);
                    echo "<tr>\n";
                    echo "                    <th scope=\"row\">" . $banner["id"] . "</th>\n";
                    echo "                    <td>" . $banner["title"] . "</td>\n";
                    echo "                    <td>" . $banner["subtitle"] . "</td>\n";
                    echo "                    <td>" . $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . "</td>\n";
                    echo "                    <td>" . $banner["date"] . "</td>\n";
                    echo "<td><a href=\"/dashboard/banners/rm/" . $banner["id"] . "\" class=\"btn btn-danger\">" . $lang->remove . "</a></td>";
                    echo "                </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="section-body">
    </div>
</section>