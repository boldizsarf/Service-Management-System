var casesbydistData = {
labels: ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"],
datasets: [{
label: 'Egyéb',
backgroundColor: 'rgba(255,51,0,0.3)',
borderColor: 'rgba(255,51,0,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ",";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ",";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata) . ", ";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["0", $start, $end]);
echo count($dbdata);
?>
]
}, {
label: 'Duplitec',
backgroundColor: 'rgba(102,255,51,0.3)',
borderColor: 'rgba(102,255,51,0.7)',
borderWidth: 1,
data: [
// Január
<?php
$start = $year . "-01-01";
$end = $year . "-01-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Február
<?php
$start = $year . "-02-01";
$end = $year . "-02-29";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Március
<?php
$start = $year . "-03-01";
$end = $year . "-03-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Április
<?php
$start = $year . "-04-01";
$end = $year . "-04-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Május
<?php
$start = $year . "-05-01";
$end = $year . "-05-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Június
<?php
$start = $year . "-06-01";
$end = $year . "-06-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Július
<?php
$start = $year . "-07-01";
$end = $year . "-07-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Augusztus
<?php
$start = $year . "-08-01";
$end = $year . "-08-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Szeptember
<?php
$start = $year . "-09-01";
$end = $year . "-09-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// Október
<?php
$start = $year . "-10-01";
$end = $year . "-10-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// November
<?php
$start = $year . "-11-01";
$end = $year . "-11-30";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata) . ", ";
?>

// December
<?php
$start = $year . "-12-01";
$end = $year . "-12-31";
$dbdata = $dbc->get("SELECT * FROM devices WHERE dupli=? AND added BETWEEN ? AND ?", ["1", $start, $end]);
echo count($dbdata);
?>
]
},]
};