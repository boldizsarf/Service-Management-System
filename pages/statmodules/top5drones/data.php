var top5dronesData = {
labels: [
<?php
$dbdata = $dbc->get("SELECT *, count(*) 
                                                        FROM devices 
                                                        GROUP BY name
                                                        ORDER BY count(*) DESC
                                                        LIMIT 10");
foreach ($dbdata as $device) {
    echo "'" . $device["name"] . " (" . $device["count(*)"] . ")" . "',";
}
?>
],
datasets: [{
backgroundColor: [
'rgba(255,153,51,0.3)',
'rgba(255,51,0,0.3)',
'rgba(51,102,204,0.3)',
'rgba(204,102,102,0.3)',
'rgba(51,204,51,0.3)',
'rgba(255,102,255,0.3)',
'rgba(255,255,0,0.3)',
'rgba(51,255,204,0.3)',
'rgba(153,102,0,0.3)',
'rgba(102,0,153,0.3)'
],
borderColor: [
'rgba(255,153,51,0.7)',
'rgba(255,51,0,0.7)',
'rgba(51,102,204,0.7)',
'rgba(204,102,102,0.7)',
'rgba(51,204,51,0.7)',
'rgba(255,102,255,0.7)',
'rgba(255,255,0,0.7)',
'rgba(51,255,204,0.7)',
'rgba(153,102,0,0.7)',
'rgba(102,0,153,0.7)'
],
borderWidth: 1,
data: [
<?php
foreach ($dbdata as $device) {
    echo "'" . $device["count(*)"] . "',";
}
?>
]
}]
};