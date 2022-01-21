<div class="col-md-12">
    <div class="card card-warning" <?php if (is_dir("puploads/" . hash("sha256", $param[3])) == true) { echo "hidden"; } ?>>
        <div class="card-header">
            <h4><?php echo $lang->files; ?></h4>
        </div>
        <div class="card-body">
            <div class="empty-state" data-height="400" style="height: 400px;">
                <div class="empty-state-icon">
                    <i class="fas fa-question"></i>
                </div>
                <h2><?php echo $lang->nofile; ?></h2>
                <p class="lead">
                    <?php echo $lang->nofilelong; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="card card-warning" <?php if (is_dir("puploads/" . hash("sha256", $param[3])) == false) { echo "hidden"; } ?>>
        <div class="card-header">
            <h4><?php echo $lang->files; ?></h4>
        </div>
        <div class="card-body">
            <?php
            $files = scandir("puploads/" . hash("sha256", $param[3]));
            $i2 = null;
            foreach($files as $file) {
                $i2++;
                if ($i2 > 2)
                    echo "<p><a href='" . "/puploads/" . hash("sha256", $param[3]) . "/" . $file . "' target='_blank'>" . $file . " (" . date ("Y.m.d H:i:s", filemtime("puploads/" . hash("sha256", $param[3]) . "/" . $file)) . ")</a></p>";
            }
            ?>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h4><?php echo $lang->uploadfile; ?></h4>
        </div>
        <div class="card-body">
            <form id="uploadform" method="POST" action="/backend/pcaseman.php?q=sendfile" enctype="multipart/form-data">
                <div class="form-group">
                    <input name="upload[]" id="upload[]" type="file" accept=".jpg,.png,.pdf,.JPG,.PNG,.PDF,.hevc,.heif,.HEVC,.HEIF" class="form-control" multiple>
                    <small class="form-text text-muted">
                        <?php echo $lang->filehelp; ?>
                    </small>
                </div>
                <input name="cid" id="cid" value="<?php echo $param[3]?>" type="text" class="form-control" hidden>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <?php echo $lang->uploadfile; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>