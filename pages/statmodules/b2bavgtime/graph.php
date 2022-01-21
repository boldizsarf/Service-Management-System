var b2bavgtime = document.getElementById('b2bavgtime').getContext('2d');

var b2bavgtimeGraph = new Chart(b2bavgtime, {
type: 'bar',
data: b2bavgtimeData,
options: {
title: {
display: true,
text: 'B2B átlagos ügyintézési idő [Nap] (<?php echo $year; ?>)'
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