<div class="col-12">
    <div class="card chat-box" id="mychatbox">
        <div class="card-header">
            <h4>Chat</h4>
        </div>
        <div id="chatdiv" class="card-body chat-content">
            <?php

            $dbchat = $dbc->get("SELECT * FROM chat WHERE ctype=? AND cid=? ORDER BY id ASC", [$param[2], $case["CaseID"]]);
            $chatLength = count($dbchat);
            $y = 1;
            foreach ($dbchat as $chat) {

                $dbuser2 = $dbc->get("SELECT * FROM users WHERE id=?", [$chat["uid"]]);

                if ($dbuser2[0]["id"] == $dbuser[0]["id"]) {
                    $msgpos = "chat-right";
                } else {
                    $msgpos = "chat-left";
                }

                $date1 = new DateTime(date("Y-m-d H:i:s"));
                $date2 = $date1->diff(new DateTime($chat["date"]));

                if ($date2->s > 0) {
                    $date = $date2->s . " másodperce";
                }

                if ($date2->i > 0) {
                    $date = $date2->i . " perce";
                }

                if ($date2->h > 0) {
                    $date = $date2->h . " órája";
                }

                if ($date2->d > 0) {
                    $date = $date2->d . " napja";
                }

                if ($date2->m > 0) {
                    $date = $date2->m . " hónapja";
                }

                if ($date2->y > 0) {
                    $date = $date2->y . " éve";
                }

                echo "<div class=\"chat-item " . $msgpos . "\" style=\"\">\n";
                echo '                    <img src="https://www.gravatar.com/avatar/' . hash("md5", $dbuser2[0]['email']) . '?d=' . urlencode("https://dev.tracking.dupliglobal.com/assets/drone.jpg") . '">';
                echo "                    <div class=\"chat-details\">\n";
                echo "                        <div class=\"chat-text\"><b>" . $dbuser2[0]["firstname"] . "</b></br> " . $chat["text"] . "</div>\n";
                echo "                        <div class=\"chat-time\">" . $date;
                if ($y === $chatLength) {
                    if (isset($chat["seenby"])) {
                        echo " | ";
                        $seenBy = explode(',', $chat["seenby"]);
                        $seenLength = count($seenBy);
                        $x = 2;
                        foreach ($seenBy as $seenUser) {
                            $dbuserSeen = $dbc->get("SELECT * FROM users WHERE id=?", [$seenUser]);
                            if (isset($dbuserSeen[0]["id"])) {
                                if ($x === $seenLength) {
                                    echo "<a href=\"/dashboard/user/" . $dbuserSeen[0]["id"] . "\">" . $dbuserSeen[0]["firstname"] . "</a> ";
                                } else {
                                    echo "<a href=\"/dashboard/user/" . $dbuserSeen[0]["id"] . "\">" . $dbuserSeen[0]["firstname"] . "</a>, ";
                                }
                            }
                            $x++;
                        }

                        echo "látta.";
                    }
                }
                echo "</div>\n";
                echo "                    </div>\n";
                echo "                </div>";

                $y++;

                if (strpos($chat["seenby"], $dbuser[0]["id"]) === false) {
                    $dbc->set("UPDATE chat SET seenby=? WHERE id=?",
                        [$chat["seenby"] . $dbuser[0]["id"] . ",", $chat["id"]]);
                }

            }
            ?>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var objDiv = document.getElementById("chatdiv");
                objDiv.scrollTop = objDiv.scrollHeight;
            });
        </script>
        <div class="row card-footer chat-form">
            <div class="col-11">
                <form method="post" action="/backend/chat.php" id="chat-form">
                    <input value="<?php echo $case["CaseID"]; ?>" id="cid" name="cid" type="text" class="form-control" hidden required>
                    <input value="<?php echo $param[2]; ?>" id="ctype" name="ctype" type="text" class="form-control" hidden required>
                    <input id="chatarea" name="chatarea" type="text" class="form-control" placeholder="Írj egy üzenetet">
                </form>
            </div>
            <script type="text/javascript">
                function sendChat() {
                    document.getElementById("chat-form").submit();
                }
            </script>
            <div class="col-1">
                <button onclick="sendChat();" class="btn btn-primary">
                    <i class="far fa-paper-plane"></i>
                </button>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                window.emojioneVersion = "2.1.1";
                $("#chatarea").emojioneArea();
            });
        </script>
    </div>
</div>

