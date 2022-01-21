<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

if ($param[3] == "rm") {
    $dbc->set("DELETE FROM news WHERE id=?", [$param[4]]);
    $files = glob("db/newsimages/" . hash("sha256", $param[4]) . "/*");
    foreach($files as $file){
        if(is_file($file))
            unlink($file);
    }
    rmdir("db/newsimages/" . hash("sha256", $param[4]));
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/news">';
    return;
}

?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->news; ?></h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/writenews" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4><?php echo $lang->news; ?></h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><?php echo $lang->id; ?></th>
                    <th scope="col"><?php echo $lang->title; ?></th>
                    <th scope="col"><?php echo $lang->publisher; ?></th>
                    <th scope="col"><?php echo $lang->published; ?></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $dbnews = $dbc->get("SELECT * FROM news");

                foreach ($dbnews as $new) {
                    $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$new["uid"]]);
                    $roles = simplexml_load_file('db/roles.db');
                    $langc = $_COOKIE["sw_lang"];
                    echo "<tr>\n";
                    echo "                    <th scope=\"row\">" . $new["id"] . "</th>\n";
                    echo "                    <td>" . $new["title"] . "</td>\n";
                    echo "                    <td>" . $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . "</td>\n";
                    echo "                    <td>" . $new["date"] . "</td>\n";
                    echo "<td><a href=\"/dashboard/news/rm/" . $new["id"] . "\" class=\"btn btn-danger\">" . $lang->remove . "</a></td>";
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