<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}

if (isset($param[3])) {
    if ($param[3] == "remove") {
        if (isset($_POST["contactid"])) {
            $dbc->set("DELETE FROM pcontacts WHERE id=?", [$_POST["contactid"]]);
        }
        echo '<meta http-equiv="refresh" content="0; URL=/dashboard/b2bcontacts/">';
        return;
    }
}
?>
<section class="section">
    <div class="section-header">
        <h1>Kapcsolattartók</h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newb2bcontact" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Kapcsolattartók</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Név</th>
                    <th scope="col">Email cím</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Cím</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $dbcontacts = $dbc->get("SELECT * FROM pcontacts WHERE uid=?", [$uid]);

                foreach ($dbcontacts as $contact) {
                    echo "<tr>\n";
                    echo "                    <td>" . $contact["name"] . "</td>\n";
                    echo "                    <td>" . $contact["email"] . "</td>\n";
                    echo "                    <td>" . $contact["phone"] . "</td>\n";
                    echo "                    <td>" . $contact["address"] . "</td>\n";
                    echo "<form method=\"POST\" action=\"/dashboard/b2bcontacts/remove\">";
                    echo "<input type=\"text\" class=\"form-control\" name=\"contactid\" id=\"contactid\" value=\"" . $contact["id"] . "\" hidden>";
                    echo "<td><button type=\"submit\" class=\"btn btn-danger\">" . $lang->remove . "</button></td>";
                    echo "</form>";
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