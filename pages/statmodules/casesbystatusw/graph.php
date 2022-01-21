var wcasesbystatus = document.getElementById('wcasesbystatus').getContext('2d');

var wcasesbystatusGraph = new Chart(wcasesbystatus, {
type: 'bar',
data: wcasesbystatusData,
options: {
title: {
display: true,
text: 'Garanciális ügyek állapot szerint (<?php echo $year; ?>)'
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