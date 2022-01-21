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
        <h1>Kapcsolattartó létrehozás</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Kapcsolattartó létrehozás</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addb2bc.php">

                    <!-- Név -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Név<span class="text-primary mb-2">*</span></label>
                            <input name="name" id="name" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Email cím<span class="text-primary mb-2">*</span></label>
                            <input name="email" id="email" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Telefon -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Telefon<span class="text-primary mb-2">*</span></label>
                            <input name="phone" id="phone" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Cím -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Cím<span class="text-primary mb-2">*</span></label>
                            <input name="address" id="address" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Létrehozás
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>