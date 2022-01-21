var wdrones = document.getElementById('wdrones').getContext('2d');

var wdronesGraph = new Chart(wdrones, {
type: 'bar',
data: wdronesData,
options: {
title: {
display: true,
text: 'Garanciális ügyek létrehozva készülék széria szerint (<?php echo $year; ?>)'
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