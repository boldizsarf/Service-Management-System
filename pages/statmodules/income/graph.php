var income = document.getElementById('income').getContext('2d');

var incomeGraph = new Chart(income, {
type: 'bar',
data: incomeData,
options: {
title: {
display: true,
text: 'Pénzforgalom [Ft, Nettó] (<?php echo $year; ?>)'
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