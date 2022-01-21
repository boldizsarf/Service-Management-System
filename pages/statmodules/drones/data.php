var dronesData = {
labels: ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"],
datasets: [{
label: 'Mavic',
backgroundColor: 'rgba(255,153,51,0.3)',
borderColor: 'rgba(255,153,51,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$likename = "Mavic";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>
]
}, {
label: 'Phantom',
backgroundColor: 'rgba(255,51,0,0.3)',
borderColor: 'rgba(255,51,0,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$likename = "Phantom";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>
]
}, {
label: 'Osmo',
backgroundColor: 'rgba(51,102,204,0.3)',
borderColor: 'rgba(51,102,204,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$likename = "Osmo";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>
]
}, {
label: 'Ronin',
backgroundColor: 'rgba(204,102,102,0.3)',
borderColor: 'rgba(204,102,102,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$likename = "Ronin";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>
]
}, {
label: 'Spark',
backgroundColor: 'rgba(51,204,51,0.3)',
borderColor: 'rgba(51,204,51,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$likename = "Spark";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>
]
}, {
label: 'Inspire',
backgroundColor: 'rgba(255,102,255,0.3)',
borderColor: 'rgba(255,102,255,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$likename = "Inspire";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>
]
}, {
label: 'Tello',
backgroundColor: 'rgba(70,100,51,0.3)',
borderColor: 'rgba(70,100,51,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$likename = "Tello";
$count = 0;
$dbdata = $dbc->get("SELECT * FROM cases WHERE created BETWEEN ? AND ?", [$start, $end]);
foreach ($dbdata as $data) {
    $dbdata2 = $dbc->get("SELECT * FROM devices WHERE id=? AND name LIKE ?", [$data["device"], "%" . $likename . "%"]);
    foreach ($dbdata2 as $data2) {
        $count++;
    }
}
echo $count . ",";
?>
]
}]
};