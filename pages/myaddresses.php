<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

$dbdcheck = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type=?", [$uid, "home"]);
$hasdaddress = true;
if (empty($dbdcheck[0]["id"])) {
    $hasdaddress = false;
}

$dbbcheck = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type=?", [$uid, "billing"]);
$hasbaddress = true;
if (empty($dbbcheck[0]["id"])) {
    $hasbaddress = false;
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->myaddresses; ?></h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newaddress" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card card-warning" <?php if ($hasdaddress == true) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->deliveryaddresses; ?></h4>
            </div>
            <div class="card-body">
                <div class="empty-state" data-height="400" style="height: 400px;">
                    <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                    </div>
                    <h2><?php echo $lang->nodaddress; ?></h2>
                    <p class="lead">
                        <?php echo $lang->nodaddresslong; ?>
                    </p>
                    <a href="/dashboard/newaddress" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
                </div>
            </div>
        </div>
        <div class="card card-primary" <?php if ($hasdaddress == false) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->deliveryaddresses; ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><?php echo $lang->name; ?></th>
                        <th scope="col"><?php echo $lang->country; ?></th>
                        <th scope="col"><?php echo $lang->state; ?></th>
                        <th scope="col"><?php echo $lang->postcode; ?></th>
                        <th scope="col"><?php echo $lang->city; ?></th>
                        <th scope="col"><?php echo $lang->address; ?></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                    $dbaddress = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type='home'", [$dbuser[0]["id"]]);

                    foreach ($dbaddress as $address) {
                        echo "<tr>\n";
                        echo "<td scope=\"col\">" . $address["name"] . "</td>\n";
                        echo "<td scope=\"col\">" . $address["country"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["state"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["postcode"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["city"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["address"] . "</td>\n";
                        echo "                    <td scope=\"col\"><a href='/backend/removeaddress.php?id=" . $address["id"] . "' class=\"btn btn-danger\">" . $lang->delete . "</a></td>";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-warning" <?php if ($hasbaddress == true) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->billingaddresses; ?></h4>
            </div>
            <div class="card-body">
                <div class="empty-state" data-height="400" style="height: 400px;">
                    <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                    </div>
                    <h2><?php echo $lang->nobaddress; ?></h2>
                    <p class="lead">
                        <?php echo $lang->nobaddresslong; ?>
                    </p>
                    <a href="/dashboard/newaddress" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
                </div>
            </div>
        </div>
        <div class="card card-primary" <?php if ($hasbaddress == false) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->billingaddresses; ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><?php echo $lang->name; ?></th>
                        <th scope="col"><?php echo $lang->taxnumber; ?></th>
                        <th scope="col"><?php echo $lang->country; ?></th>
                        <th scope="col"><?php echo $lang->state; ?></th>
                        <th scope="col"><?php echo $lang->postcode; ?></th>
                        <th scope="col"><?php echo $lang->city; ?></th>
                        <th scope="col"><?php echo $lang->address; ?></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
                    $dbaddress = $dbc->get("SELECT * FROM addresses WHERE uid=? AND type='billing'", [$dbuser[0]["id"]]);

                    foreach ($dbaddress as $address) {
                        echo "<tr>\n";
                        echo "<td scope=\"col\">" . $address["name"] . "</td>\n";
                        echo "<td scope=\"col\">" . $address["taxnumber"] . "</td>\n";
                        echo "<td scope=\"col\">" . $address["country"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["state"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["postcode"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["city"] . "</td>\n";
                        echo "                    <td scope=\"col\">" . $address["address"] . "</td>\n";
                        echo "                    <td scope=\"col\"><a href='/backend/removeaddress.php?id=" . $address["id"] . "' class=\"btn btn-danger\">" . $lang->delete . "</a></td>";
                        echo "                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>