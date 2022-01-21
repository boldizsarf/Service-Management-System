<?php
$dbnews = $dbc->get("SELECT * FROM news WHERE id=?", [$param[3]]);
$new = $dbnews[0];
?>
<section class="section">
    <div class="col-12 mb-4">
        <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('/db/newsimages/<?php echo hash("sha256", $new["id"]); ?>/tmb.jpg'); background-position: center center;">
            <div class="hero-inner">
                <h2><?php echo $new["title"]; ?></h2>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php echo $new["text"]; ?>
                </div>
            </div>
        </div>
    </div>
</section>