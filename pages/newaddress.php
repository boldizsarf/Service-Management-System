<section class="section">
    <div class="section-header">
        <h1>Cím hozzáadása</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Cím hozzáadása</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/addaddress.php">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Név<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Adószám</label>
                            <input type="text" class="form-control" name="taxnumber" id="taxnumber">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label><?php echo $lang->country; ?><span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="country" id="country" required>
                                <option selected>Magyarország</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label><?php echo $lang->state; ?><span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="state" id="state" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Irányítószám<span class="text-primary mb-2">*</span></label>
                            <input type="number" class="form-control" name="postcode" id="postcode" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Település<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="city" id="city" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Közterület neve<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="addressname" id="addressname" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Közterület típusa<span class="text-primary mb-2">*</span></label>
                            <select class="form-control select2" name="addresssuffix" id="addresssuffix" required>
                                <?php
                                $suffixes = file("https://ceginformaciosszolgalat.kormany.hu/download/b/46/11000/kozterulet_jelleg_2015_09_07.txt");
                                foreach ($suffixes as $suffix) {
                                    echo " <option>" . $suffix . "</option>";
                                }
                                ?>
                                <option disabled selected hidden></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label>Házszám<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="housenumber" id="housenumber" required>
                        </div>
                        <div class="form-group col-4">
                            <label>Emelet</label>
                            <input type="text" class="form-control" name="floor" id="floor">
                        </div>
                        <div class="form-group col-4">
                            <label>Ajtó</label>
                            <input type="text" class="form-control" name="door" id="door">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Típus</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="type" value="home" class="selectgroup-input" checked="">
                                <span class="selectgroup-button">Szállítási cím</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="type" value="billing" class="selectgroup-input">
                                <span class="selectgroup-button">Számlázási cím</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Hozzáadás
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>