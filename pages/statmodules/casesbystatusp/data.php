var pcasesbystatusData = {
labels: ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"],
datasets: [{
label: 'Folyamatban',
backgroundColor: 'rgba(255,51,0,0.3)',
borderColor: 'rgba(255,51,0,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] != 15) {
        $count++;
    }
}
echo $count;
?>
]
}, {
label: 'Lezárt',
backgroundColor: 'rgba(102,255,51,0.3)',
borderColor: 'rgba(102,255,51,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE type=? AND created BETWEEN ? AND ?", ["paid", $start, $end]);
foreach ($dbdata as $case) {
    $dbstatus = $dbc->get("SELECT * FROM casestatuses WHERE cid=? ORDER BY id DESC", [$case["id"]]);
    if ($dbstatus[0]["status"] == 15) {
        $count++;
    }
}
echo $count;
?>
]
},]
};