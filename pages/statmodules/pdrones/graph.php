var pdrones = document.getElementById('pdrones').getContext('2d');

var pdronesGraph = new Chart(pdrones, {
type: 'bar',
data: pdronesData,
options: {
title: {
display: true,
text: 'Fizetős ügyek létrehozva készülék széria szerint (<?php echo $year; ?>)'
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