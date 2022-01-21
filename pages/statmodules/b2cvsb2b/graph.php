var b2cvsb2b = document.getElementById('b2cvsb2b').getContext('2d');

var b2cvsb2bGraph = new Chart(b2cvsb2b, {
type: 'bar',
data: b2cvsb2bData,
options: {
title: {
display: true,
text: 'Összes ügy típus szerint (<?php echo $year; ?>)'
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