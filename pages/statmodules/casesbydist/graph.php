var casesbydist = document.getElementById('casesbydist').getContext('2d');

var casesbydistGraph = new Chart(casesbydist, {
type: 'bar',
data: casesbydistData,
options: {
title: {
display: true,
text: 'Készülékek hozzáadva forgalmazó szerint (<?php echo $year; ?>)'
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