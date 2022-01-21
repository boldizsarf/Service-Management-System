var b2bbytype = document.getElementById('b2bbytype').getContext('2d');

var b2bbytypeGraph = new Chart(b2bbytype, {
type: 'bar',
data: b2bbytypeData,
options: {
title: {
display: true,
text: 'B2B ügyek típus szerint (<?php echo $year; ?>)'
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