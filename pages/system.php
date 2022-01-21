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
        <h1>Rendszer beállítások</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-body">
                        <h4>Csapat</h4>
                        <p>Csapattagok kezelése. Admin jog adása, és elvétele.</p>
                        <a href="/dashboard/team/" class="card-cta">Tovább <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="card-body">
                        <h4>Kedvezmények</h4>
                        <p>Kedvezmények kezelése.</p>
                        <a href="/dashboard/coupons/" class="card-cta">Tovább <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="card-body">
                        <h4>Hírek</h4>
                        <p>Hírek szerkesztése.</p>
                        <a href="/dashboard/news/" class="card-cta">Tovább <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-ad"></i>
                    </div>
                    <div class="card-body">
                        <h4>Bannerek</h4>
                        <p>Bannerek szerkesztése.</p>
                        <a href="/dashboard/banners/" class="card-cta">Tovább <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="card-body">
                        <h4>MyDroneSafety</h4>
                        <p>MyDroneSafety kulcsok.</p>
                        <a href="/dashboard/cards/" class="card-cta">Tovább <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" hidden>
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="card-body">
                        <h4>CronLog</h4>
                        <p>Cronejob log</p>
                        <a href="/dashboard/cronlog/" class="card-cta">Tovább <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" hidden>
                <div class="card card-large-icons">
                    <div class="card-icon bg-primary text-white">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="card-body">
                        <h4>Email küldés</h4>
                        <p>Emailek küldése.</p>
                        <a href="/dashboard/sendmail/" class="card-cta">Tovább <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>