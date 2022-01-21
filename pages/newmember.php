<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/">';
    return;
}
?>
<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->newmember; ?></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $lang->newmember; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addmember.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->user; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="user" id="user" required>
                                <?php
                                $dbuser = $dbc->get("SELECT * FROM users WHERE role=?", ["0"]);
                                foreach ($dbuser as $user) {
                                    echo " <option>" . $user["id"] . " - " . $user["lastname"] . " " . $user["firstname"] . " - " . $user["email"] . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->role; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="role" id="role" required>
                                <?php
                                $roles = simplexml_load_file('db/roles.db');
                                foreach ($roles->role as $role) {
                                    $langc = $_COOKIE["sw_lang"];
                                    echo " <option value='" . $role["id"] . "'>" . $role->$langc . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <?php echo $lang->addnew; ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>