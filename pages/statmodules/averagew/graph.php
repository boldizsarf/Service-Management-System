var averagew = document.getElementById('averagew').getContext('2d');

var averagewGraph = new Chart(averagew, {
type: 'bar',
data: averagewData,
options: {
title: {
display: true,
text: 'Átlagos garanciális ügyintézési idő [Nap] (<?php echo $year; ?>)'
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