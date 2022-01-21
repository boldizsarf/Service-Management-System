var b2bbydist = document.getElementById('b2bbydist').getContext('2d');

var b2bbydistGraph = new Chart(b2bbydist, {
type: 'bar',
data: b2bbydistData,
options: {
title: {
display: true,
text: 'B2B ügyek forgalmazó szerint (<?php echo $year; ?>)'
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