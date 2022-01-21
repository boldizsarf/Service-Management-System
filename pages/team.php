<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/error">';
    return;
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->team; ?></h1>
        <div class="section-header-breadcrumb">
            <a href="/dashboard/newmember" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> <?php echo $lang->addnew; ?></a>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4><?php echo $lang->teammembers; ?></h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">UID</th>
                    <th scope="col"><?php echo $lang->lastname; ?></th>
                    <th scope="col"><?php echo $lang->firstname; ?></th>
                    <th scope="col"><?php echo $lang->email; ?></th>
                    <th scope="col"><?php echo $lang->role; ?></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $dbuser = $dbc->get("SELECT * FROM users WHERE role <> ? AND role <> ?", ["0", "10"]);

                foreach ($dbuser as $user) {
                    $roles = simplexml_load_file('db/roles.db');
                    $langc = $_COOKIE["sw_lang"];
                    foreach ($roles->role as $role) {
                        if ($role["id"] == $user["role"]) {
                            $roletext = $role->$langc;
                            $roleicon = $role->icon;
                            $rolecolor = $role->color;
                        }
                    }
                    if ($user["banned"] == 1) {
                        $bannedprefix = "<del><font color='red'>";
                        $bannedsuffix = "</font></del>";
                    } else {
                        $bannedprefix = "";
                        $bannedsuffix = "";
                    }

                    $lastlogin = $dbc->get("SELECT * FROM loginlog WHERE user=? ORDER BY id DESC", [$user["email"]]);
                    echo "<tr>\n";
                    echo "                    <th scope=\"row\">" . $bannedprefix . $user["id"] . $bannedsuffix . "</th>\n";
                    echo "                    <td>" . $bannedprefix . $user["lastname"] . $bannedsuffix . "</td>\n";
                    echo "                    <td>" . $bannedprefix  . $user["firstname"] . $bannedsuffix . "</td>\n";
                    echo "                    <td>" . $bannedprefix  . $user["email"] . $bannedsuffix . "</td>\n";
                    echo "                    <td class='" . $rolecolor . "'><i class=\"" . $roleicon . "\"></i> " . $bannedprefix  . $roletext . $bannedsuffix . "</td>\n";
                    echo "<form method=\"POST\" action=\"/backend/addmember.php\">";
                    echo "<input type=\"text\" class=\"form-control\" name=\"user\" id=\"user\" value=\"" . $user["id"] . "\" hidden>";
                    echo "<input type=\"text\" class=\"form-control\" name=\"role\" id=\"role\" value=\"0\" hidden>";
                    echo "<td><a href='/dashboard/user/" . $user["id"] . "' class=\"btn btn-primary\">Megtekintés</a></td>";
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