<section class="section">
    <div class="section-header">
        <h1><?php echo $lang->settings; ?></h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><?php echo $lang->pfp; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="empty-state" data-height="200" style="height: 400px;">
                            <div class="row">
                                <div class="form-group">
                                    <figure class="avatar mr-2 avatar-xl">
                                        <img src="https://www.gravatar.com/avatar/<?php echo hash("md5", $dbuser[0]['email']) . "?d=" . urlencode("https://dev.tracking.dupliglobal.com/assets/drone.jpg"); ?>?s=700">
                                    </figure>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="https://hu.gravatar.com/" target="_blank" class="btn btn-primary"><?php echo $lang->setpfp; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div  class="card card-primary">
                    <div class="card-header">
                        <h4><?php echo $lang->setnewpasswd; ?></h4>
                    </div>
                    <form method="POST" action="/backend/sndnwpsswdml.php">
                        <div class="card-body">
                            <div class="empty-state" data-height="200" style="height: 400px;">
                                <div class="row">
                                    <div class="form-group">
                                        <input value="<?php echo $_SESSION["email"]; ?>" id="email" type="password" class="form-control" name="email" tabindex="1" hidden>
                                        <button type="submit" class="btn btn-primary" tabindex="4">
                                            <?php echo $lang->setnewpasswd; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <script type="text/javascript">
                $(document).ready( function () {
                    $("#logins").dataTable( {
                        ordering: true
                    } );
                } );
            </script>
            <div class="col-12">
            <div class="card card-primary">
            <div class="card-header">
                <h4><?php echo $lang->loginattempts; ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table data-order='[[ 0, "desc" ]]' id="logins" class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo $lang->date; ?></th>
                            <th><?php echo $lang->login; ?></th>
                            <th><?php echo $lang->ip; ?></th>
                            <th><?php echo $lang->useragent; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dblogin = $dbc->get("SELECT * FROM loginlog WHERE user=? ORDER BY date DESC", [$dbuser[0]['email']]);

                        foreach ($dblogin as $login) {
                            echo "<tr>\n";
                            echo "                    <td>" . $login["date"] . "</td>";
                            if ($login["attempt"] == "0") {
                                echo "                    <td>Sikertelen</td>";
                            } else {
                                echo "                    <td>Sikeres</td>";
                            }
                            echo "                    <td>" . $login["ip"] . "</td>";
                            echo "                    <td>" . $login["useragent"] . "</td>";
                            echo "                </tr>";


                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>