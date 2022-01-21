var casesbytype = document.getElementById('casesbytype').getContext('2d');

var casesbytypeGraph = new Chart(casesbytype, {
type: 'bar',
data: casesbytypeData,
options: {
title: {
display: true,
text: 'Ügyek típus szerint (<?php echo $year; ?>)'
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