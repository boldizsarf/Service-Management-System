<?php
$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

$dbdcheck = $dbc->get("SELECT * FROM devices WHERE uid=? AND id=?", [$uid, $param[3]]);
if (empty($dbdcheck[0]["id"])) {
    echo "<script type=\"text/javascript\">\n";
    echo "window.location.href = '/';\n";
    echo "</script>";
}
?>
<section class="section">
    <div class="section-header">
        <h1>Szolgáltatás aktiválása</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Szolgáltatás aktiválása</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/activatecard.php">

                    <div class="alert alert-<?php if ($param[4] == "s") { echo "success"; } else if ($param[4] == "e") { echo "danger"; } ?>" <?php if (empty($param[4])) { echo "hidden"; } ?>>
                        <?php
                        switch ($param[5]) {
                            default:
                                echo "Ismeretlen hiba.";
                                break;
                            case 1:
                                echo "Sikeres aktiváció!";
                                break;
                            case 2:
                                echo "Hibás kód!";
                                break;
                            case 3:
                                echo "Ez a kód nem ehhez az eszközhöz tartozik!";
                                break;
                            case 4:
                                echo "Ezt a kódot már felhasználták!";
                                break;
                        }
                        ?>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kód<span class="text-primary mb-2">*</span></label>
                            <input type="text" class="form-control" name="code" id="code" required>
                            <input type="text" value="<?php echo $param[3]; ?>" class="form-control" name="did" id="did" required hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Aktiválás
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>