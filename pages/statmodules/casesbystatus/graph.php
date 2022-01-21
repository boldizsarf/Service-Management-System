var casesbystatus = document.getElementById('casesbystatus').getContext('2d');

var casesbystatusGraph = new Chart(casesbystatus, {
type: 'bar',
data: casesbystatusData,
options: {
title: {
display: true,
text: 'Ügyek állapot szerint (<?php echo $year; ?>)'
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