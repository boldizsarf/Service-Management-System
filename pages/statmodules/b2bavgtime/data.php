var b2bavgtimeData = {
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
$avgArray1[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray1)/count($avgArray1)) . ", ";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$avgArray2[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray2)/count($avgArray2)) . ", ";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$avgArray3[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray3)/count($avgArray3)) . ", ";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$avgArray4[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray4)/count($avgArray4)) . ", ";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$avgArray5[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray5)/count($avgArray5)) . ", ";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$avgArray6[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray6)/count($avgArray6)) . ", ";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$avgArray7[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray7)/count($avgArray7)) . ", ";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$avgArray8[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray8)/count($avgArray8)) . ", ";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$avgArray9[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray9)/count($avgArray9)) . ", ";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$avgArray10[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray10)/count($avgArray10)) . ", ";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$avgArray11[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray11)/count($avgArray11)) . ", ";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$avgArray12[] = null;
$dbdata = $dbc->get("SELECT * FROM pcases WHERE submitdate BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $case) {
    $statusArrived = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "2"]);
    $statusCompleted = $dbc->get("SELECT * FROM pcasestatuses WHERE pcid=? AND status=?", [$case["id"], "16"]);

    if (isset($statusArrived[0]["date"])) {
        if (isset($statusCompleted[0]["date"])) {
            $datetime1 = date_create($statusCompleted[0]["date"]);
            $datetime2 = date_create($statusArrived[0]["date"]);
            $interval = date_diff($datetime1, $datetime2);
            $diff = $interval->format("%a");
            array_push($avgArray1, $diff);
        }
    }
}

echo round(array_sum($avgArray12)/count($avgArray12)) . ", ";
?>
]
}]
};