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
        <h1>Email küldése</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Email küldése</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addnews.php" enctype="multipart/form-data">
                    <input type="text" class="form-control" name="did" id="did" value="<?php if ($param[3] == "0") { echo $param[4]; } else { echo $param[3]; } ?>" hidden>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Címzett csoport<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="user" id="user" required>
                                <option>Adott ügyfél</option>
                                <option>Adott státusz csoport</option>
                                <option>Adott eszköz csoport</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Címzett meghatározása<span class="text-primary mb-2">*</span></label>
                            <input type="file" class="form-control" name="upload[]" id="upload[]" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->content; ?><span class="text-primary mb-2">*</span></label>
                            <textarea name="content" id="content" rows="10" cols="80" required></textarea>
                            <script>
                                CKEDITOR.replace( 'content' );
                            </script>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <?php echo $lang->publish; ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>