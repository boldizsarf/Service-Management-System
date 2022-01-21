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
        <h1>B2B Profil</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>B2B Profil</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addcards.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Partner neve<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $dbuser[0]['lastname']; ?>" disabled required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Üzlet neve<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $dbuser[0]['firstname']; ?>" disabled required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>