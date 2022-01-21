var pcasesbystatus = document.getElementById('pcasesbystatus').getContext('2d');

var pcasesbystatusGraph = new Chart(pcasesbystatus, {
type: 'bar',
data: pcasesbystatusData,
options: {
title: {
display: true,
text: 'Fizetős ügyek állapot szerint (<?php echo $year; ?>)'
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