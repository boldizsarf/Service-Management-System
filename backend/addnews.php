<?php
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('file_uploads', 'On');

session_start();
if ($_SESSION["SYSTEM"] != "allowed") {
    echo "Hiba! Nincs jogod ehhez a fájlhoz!";
    return;
}
require 'dbc.php';

error_reporting(-1);
ini_set('display_errors', 'On');

$dbuser = $dbc->get("SELECT * FROM users WHERE email=?", [$_SESSION["email"]]);
$uid = $dbuser[0]["id"];

if ($dbuser[0]["role"] == 0) {
    header("Location: /dashboard/home");
    return;
}

$dbnews = $dbc->get("SELECT * FROM news ORDER BY id DESC");
$id = $dbnews[0]["id"] + 1;

$title = $_POST["title"];
$content = $_POST["content"];

$added = date("Y-m-d H:i:s");

$dbc->set("INSERT INTO news (id, uid, title, text, date) VALUES (?, ?, ?, ?, ?)",
    [$id, $uid, $title, $content, $added]);

if (is_dir("./../db/newsimages/" . hash("sha256", $id)) == false) {
    mkdir("./../db/newsimages/" . hash("sha256", $id));
}

$uploads_dir = "./../db/newsimages/" . hash("sha256", $id);

foreach ($_FILES["upload"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["upload"]["tmp_name"][$key];
        $name = "tmb.jpg";
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}

header("Location: /dashboard/news/");
return;