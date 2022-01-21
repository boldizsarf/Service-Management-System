<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];
$role = $dbuser[0]["role"];

if ($role == 0) {
    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/">';
    return;
}

$dbapiacces = $dbc->get("SELECT * FROM apiaccess WHERE uid=?", [$uid]);

if (empty($dbapiacces[0]["id"])) {
    $dbapiacceslist = $dbc->get("SELECT * FROM apiaccess ORDER BY id DESC");
    $aid = $dbapiacceslist[0]["id"] + 1;

    $dbc->set("INSERT INTO apiaccess (id, uid, username, token) VALUES (?, ?, ?, ?)",
        [$aid, $uid, $dbuser[0]['lastname'], $dbuser[0]['password']]);

    echo '<meta http-equiv="refresh" content="0; URL=/dashboard/myapi/">';
    return;
}

$apiacces = $dbapiacces[0];
?>
<section class="section">
    <div class="section-header">
        <h1>API</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>API</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/api/" target="_blank">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Query</label>
                            <?php
                            echo '<input name="query" type="text" class="form-control">';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <input name="username" type="text" class="form-control" value="<?php echo $apiacces['username']; ?>" hidden>
                            <input name="token" type="text" class="form-control" value="<?php echo $apiacces['token']; ?>" hidden>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Teszt</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>