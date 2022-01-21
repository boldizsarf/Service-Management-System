<?php

$dbpcase = $dbc->get("SELECT * FROM pcases WHERE trackid=?", [$query]);

if (empty($dbpcase[0]["id"])) {
    $data["Error"] = "No data found!";
} else {
    $dbuser = $dbc->get("SELECT * FROM users WHERE id=?", [$dbpcase[0]["uid"]]);
    $dbinspection = $dbc->get("SELECT * FROM pinspections WHERE pcid=? ORDER BY id DESC", [$dbpcase[0]["id"]]);
    require 'b2b/case.php';
    require 'b2b/dates.php';
    require 'b2b/status.php';
    require 'b2b/task.php';
    require 'b2b/responsible.php';
    require 'b2b/inspection.php';
}