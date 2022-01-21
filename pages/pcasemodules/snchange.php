<div class="card">
    <div class="card-header">
        <h4>SN csere</h4>
    </div>
    <div class="card-body">
        <form id="snchangeform" method="POST" action="/backend/pcaseman.php?q=changesn" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-12">
                    <label class="form-label">Új sorozatszám<span class="text-primary mb-2">*</span></label>
                    <input name="newsn" id="newsn" type="text" class="form-control" required>
                </div>
            </div>

            <script type="text/javascript">
                function snchgClick() {
                    swal({
                        title: 'Biztos, hogy kicseréled a sorozatszámot?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willAdd) => {
                            if (willAdd) {
                                document.getElementById("snchangeform").submit();
                            }
                        });
                }
            </script>
            <input name="trackingid" id="trackingid" value="<?php echo $case["TrackingID"]; ?>" type="text" class="form-control" hidden>
            <input name="pcid" id="pcid" value="<?php echo $case["CaseID"]; ?>" type="text" class="form-control" hidden>
            <input name="oldsn" id="oldsn" value="<?php echo $case["Device"]["SerialNumber"]; ?>" type="text" class="form-control" hidden>
            <div class="form-group">
                <a onclick="snchgClick()" href="#" class="btn btn-primary btn-lg btn-block">
                    SN kicserélése
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Eddigi cserék</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Change ID</th>
                <th scope="col">Új szériaszám</th>
                <th scope="col">Régi szériaszám</th>
                <th scope="col">Felelős</th>
                <th scope="col">Dátum</th>
                <th scope="col">Igazolás</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $dbchanges = $dbc->get("SELECT * FROM b2bsnchange WHERE pcid=? ORDER BY date DESC", [$case["CaseID"]]);

            foreach ($dbchanges as $change) {
                $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$change["uid"]]);
                echo "<tr>\n";
                echo "                    <th scope=\"row\">" . $change["id"] . "</th>\n";
                echo "                    <td>" . $change["newsn"] . "</td>\n";
                echo "                    <td>" . $change["oldsn"] . "</td>\n";
                echo "                    <td>" . $dbuser[0]["lastname"] . " " . $dbuser[0]["firstname"] . "</td>\n";
                echo "                    <td>" . $change["date"] . "</td>\n";
                echo "<td><a href=\"/backend/b2bsnchangelap.php?chgid=" . $change["id"] . "\" class=\"btn btn-icon icon-left btn-block btn-primary\" target='_blank'><i class=\"fas fa-print\"></i> Nyomtatás</a></td>";
                echo "                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>