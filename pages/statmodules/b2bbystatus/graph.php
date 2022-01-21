var b2bbystatus = document.getElementById('b2bbystatus').getContext('2d');

var b2bbystatusGraph = new Chart(b2bbystatus, {
type: 'bar',
data: b2bbystatusData,
options: {
title: {
display: true,
text: 'B2B ügyek állapot szerint (<?php echo $year; ?>)'
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