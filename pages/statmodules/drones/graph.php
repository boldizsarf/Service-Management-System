var drones = document.getElementById('drones').getContext('2d');

var dronesGraph = new Chart(drones, {
type: 'bar',
data: dronesData,
options: {
title: {
display: true,
text: 'Ügyek létrehozva készülék széria szerint (<?php echo $year; ?>)'
},
tooltips: {
mode: 'index',
intersect: false
},
responsive: true,
scales: {
xAxes: [{
stacked: true
}],
yAxes: [{
stacked: true
}]
}
}
});