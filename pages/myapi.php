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
                <div class="row">
                    <div class="form-group col-12">
                        <label>Username</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $apiacces['username']; ?>" disabled required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Token</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $apiacces['token']; ?>" disabled required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>API URL</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $serverurl . '/api/'; ?>" disabled required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <div class="section-title">Az API haszn??lata</div>
                        <p>
                            Rendszer??nk alapszint?? REST API -al rendelkezik. Az API -t arra tudjuk haszn??lni,
                            hogy bizonyos ??gyek adatait lek??rdezz??k. A lek??rdez??shez egy POST requestet kell
                            l??trehoznunk az adott API URL -re. <br/><br/>
                            A lek??rdez??skor az al??bbi POST v??ltoz??kat kell megadnunk:<br/>
                            <code>username</code> - Username<br/>
                            <code>token</code> - Token<br/>
                            <code>query</code> - A lek??rdezni k??v??nt Tracking ID<br/><br/>

                            A v??laszt JSON -ban kapjuk meg.
                        </p>
                    </div>
                </div>
                <form method="POST" action="/api/" target="_blank">
                    <div class="row">
                        <div class="form-group col-12">
                            <input name="username" type="text" class="form-control" value="<?php echo $apiacces['username']; ?>" hidden>
                            <input name="token" type="text" class="form-control" value="<?php echo $apiacces['token']; ?>" hidden>
                            <?php
                            $dbcase = $dbc->get("SELECT * FROM pcases WHERE uid=? ORDER BY id DESC", [$uid]);

                            $i = 0;
                            foreach ($dbcase as $case) {
                                $i++;
                            }

                            if ($i == 0) {
                                echo "<p>M??g nem hozt??l l??tre ??gyet. Az API kipr??b??l??s??hoz hozz l??tre egy ??gyet.</p>";
                            } else {
                                echo '<input name="query" type="text" class="form-control" value="' . $dbcase[0]['trackid'] . '" hidden>';
                                echo '<button type="submit" class="btn btn-primary btn-lg btn-block">';
                                echo 'P??lda';
                                echo '</button>';
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>