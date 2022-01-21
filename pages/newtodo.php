<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->newtodo; ?></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $lang->newtodo; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addtodo.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->todo2; ?><span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="todo" id="todo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label><?php echo $lang->expire; ?><span class="text-primary mb-2">*</span></label>
                            <input type="datetime-local" class="form-control" name="expire" id="expire" required>
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