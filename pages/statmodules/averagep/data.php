var averagepData = {
labels: ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"],
datasets: [{
label: 'Ügyintézési idő',
backgroundColor: 'rgba(51,102,204,0.3)',
borderColor: 'rgba(51,102,204,0.7)',
borderWidth: 1,
data: [
// Január
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

// Február
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

// Március
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

// Április
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

// Május
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

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$pavgArray6[] = null;
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
            array_push($pavgArray6, $diff);
        }
    }
}

echo round(array_sum($pavgArray6)/count($pavgArray6)) . ", ";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$pavgArray7[] = null;
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
            array_push($pavgArray7, $diff);
        }
    }
}

echo round(array_sum($pavgArray7)/count($pavgArray7)) . ", ";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$pavgArray8[] = null;
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
            array_push($pavgArray8, $diff);
        }
    }
}

echo round(array_sum($pavgArray8)/count($pavgArray8)) . ", ";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$pavgArray9[] = null;
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
            array_push($pavgArray9, $diff);
        }
    }
}

echo round(array_sum($pavgArray9)/count($pavgArray9)) . ", ";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$pavgArray10[] = null;
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
            array_push($pavgArray10, $diff);
        }
    }
}

echo round(array_sum($pavgArray10)/count($pavgArray10)) . ", ";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$pavgArray11[] = null;
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
            array_push($pavgArray11, $diff);
        }
    }
}

echo round(array_sum($pavgArray11)/count($pavgArray11)) . ", ";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$pavgArray12[] = null;
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
            array_push($pavgArray12, $diff);
        }
    }
}

echo round(array_sum($pavgArray12)/count($pavgArray12)) . ", ";
?>
]
}]
};