var incomeData = {
labels: ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"],
datasets: [{
label: 'Pénzforgalom',
backgroundColor: 'rgba(51,102,204,0.3)',
borderColor: 'rgba(51,102,204,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$sum = 0;
$dbdata = $dbc->get("SELECT * FROM inspections WHERE type=? AND accepted=? AND date BETWEEN ? AND ?", ["paid", "1", $start, $end]);
foreach ($dbdata as $inspection) {
    $sum2 = 0;
    $dbcase = $dbc->get("SELECT * FROM cases WHERE id=?", [$inspection["cid"]]);
    if ($dbcase[0]["price"] == "normal") {
        $sum2 += 7795*$inspection["workhours"];
    } else {
        $sum2 += 11692*$inspection["workhours"];
    }

    $dbparts = $dbc->get("SELECT * FROM parts WHERE iid=? ORDER BY id ASC", [$inspection["id"]]);

    foreach ($dbparts as $part) {
        $sum2 += $part["pricebr"]*$part["quantity"];
    }

    $sum2 *= (100-$inspection["discount"])/100;

    $sum += $sum2;
}

echo round($sum) . ", ";
?>
]
}]
};