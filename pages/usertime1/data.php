var averagepData = {
labels: ["Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek"],
datasets: [{
label: 'Ügyintézési idő',
backgroundColor: 'rgba(51,102,204,0.3)',
borderColor: 'rgba(51,102,204,0.7)',
borderWidth: 1,
data: [
// Hétfő
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$pavgArray1[] = null;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "3"]);
    $statusCompleted = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "15"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($pavgArray1, $diff);
        }
    }
}

echo round(array_sum($pavgArray1)/count($pavgArray1)) . ", ";
?>

// Kedd
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$pavgArray2[] = null;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "3"]);
    $statusCompleted = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "15"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($pavgArray2, $diff);
        }
    }
}

echo round(array_sum($pavgArray2)/count($pavgArray2)) . ", ";
?>

// Szerda
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$pavgArray3[] = null;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "3"]);
    $statusCompleted = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "15"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($pavgArray3, $diff);
        }
    }
}

echo round(array_sum($pavgArray3)/count($pavgArray3)) . ", ";
?>

// Csütörtök
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$pavgArray4[] = null;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "3"]);
    $statusCompleted = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "15"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($pavgArray4, $diff);
        }
    }
}

echo round(array_sum($pavgArray4)/count($pavgArray4)) . ", ";
?>

// Péntek
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$pavgArray5[] = null;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "3"]);
    $statusCompleted = $dbc->get("SELECT * FROM casestatuses WHERE cid=? AND status=?", [$case["id"], "15"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($pavgArray5, $diff);
        }
    }
}

echo round(array_sum($pavgArray5)/count($pavgArray5)) . ", ";
?>

]
}]
};