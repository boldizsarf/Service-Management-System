var averagep = document.getElementById('averagep').getContext('2d');

var averagepGraph = new Chart(averagep, {
type: 'bar',
data: averagepData,
options: {
title: {
display: true,
text: 'Átlagos fizetős ügyintézési idő [Nap] (<?php echo $year; ?>)'
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