<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Duplitec Service Management System</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/prism.min.js" integrity="sha512-rYNMWcr8EuYc/6mSBu0wD+hSoA4KkHvYRlmJEJGQI4bsho0OiX8fPOVB822QQZizkTUdkUCnJLnN8SAUBg9y9w==" crossorigin="anonymous"></script>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <div class="login-brand">
                        <a href="/"><img src="<?php echo $logoColor; ?>" alt="Duplitec" width="200"><br></a>
                        <h6><small class="text-muted">Service Management System</small></h6>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Changelog</h4></div>

                        <div class="card-body">

                            <?php
                            $changelog = simplexml_load_file('db/changelog.db');
                            foreach ($changelog->version as $version) {

                                echo '<div class="section-title mt-0">' . $version->date . ' - ' . $version->number . ' ' . $version->type . ' by ' . $version->creator . '</div>';
                                echo '<ul>';
                                foreach ($version->changes->feature as $feature) {
                                    echo '<li>' . $feature . '</li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <a href="/"><?php echo $lang->backtohome; ?></a>
                    </div>
                    <div class="simple-footer">
                        Copyright <a href="#"><i class="fas fa-copyright"></i></a> <?php echo date("Y"); ?> FlyMore Kft.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>
</html>
