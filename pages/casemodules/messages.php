<div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-casetabs">
    <div class="col-md-12">
        <div class="card card-warning" <?php if ($hasmsg == true) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->messages; ?></h4>
            </div>
            <div class="card-body">
                <div class="empty-state" data-height="400" style="height: 400px;">
                    <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                    </div>
                    <h2><?php echo $lang->nomsg; ?></h2>
                    <p class="lead">
                        <?php echo $lang->nomsglong; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-primary" <?php if ($hasmsg == false) { echo "hidden"; }?>>
            <div class="card-header">
                <h4><?php echo $lang->messages; ?></h4>
            </div>
            <div class="card-body">
                <?php
                $dbmessages = $dbc->get("SELECT * FROM messages WHERE cid=?", [$param[3]]);
                foreach ($dbmessages as $msg) {
                    $dbmsguser = $dbc->get("SELECT * FROM users WHERE id=?", [$msg["uid"]]);
                    $msguser = $dbmsguser[0];
                    $roles = simplexml_load_file('db/roles.db');
                    $langc = $_COOKIE["sw_lang"];
                    foreach ($roles->role as $role) {
                        if ($role["id"] == $msguser["role"]) {
                            $roletext = $role->$langc;
                            $roleicon = $role->icon;
                            $rolecolor = $role->color;
                        }
                    }
                    echo "<div class=\"tickets\">\n";
                    echo "                                                <div class=\"ticket-content\" style=\"width: 100% !important;\">\n";
                    echo "                                                    <div class=\"ticket-header\">\n";
                    echo "                                                        <div class=\"ticket-sender-picture img-shadow\">\n";
                    echo "                                                            <img src=\"https://www.gravatar.com/avatar/" . hash("md5", $msguser['email']) . "\">\n";
                    echo "                                                        </div>\n";
                    echo "                                                        <div class=\"ticket-detail\">\n";
                    echo "                                                            <div class=\"ticket-title\">\n";
                    echo "                                                                <h4>" . $msg["title"] . "</h4>\n";
                    echo "                                                            </div>\n";
                    echo "                                                            <div class=\"ticket-info\">\n";
                    echo "                                                                <div class=\"font-weight-600\">" . $msguser["lastname"] . " " . $msguser["firstname"] . "</div>\n";
                    echo "                                                                <div class=\"bullet\"></div>\n";
                    echo "                                                                <div class=\"font-weight-600 " . $rolecolor . "\"><i class=\"" . $roleicon . "\"></i> " . $roletext . "</div>\n";
                    echo "                                                                <div class=\"bullet\"></div>\n";
                    echo "                                                                <div class=\"text-primary font-weight-600\">" . $msg["date"] . "</div>\n";
                    echo "                                                            </div>\n";
                    echo "                                                        </div>\n";
                    echo "                                                    </div>\n";
                    echo "                                                    <div class=\"ticket-description\">\n";
                    echo "                                                        <p>" . $msg["msg"] . "</p>\n";
                    echo "                                                        <div class=\"ticket-divider\"></div>\n";
                    echo "                                                    </div>\n";
                    echo "                                                </div>\n";
                    echo "                                            </div>";

                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4><?php echo $lang->newmsg; ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/backend/sendmsg.php?cid=<?php echo $param[3]; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="cid" id="cid" value="<?php echo $param[3]; ?>" hidden>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $lang->msg; ?>" hidden>
                        <textarea name="msg" id="msg" rows="10" cols="80" required></textarea>
                        <script>
                            CKEDITOR.replace( 'msg' );
                        </script>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <?php echo $lang->writemsg; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>