var top5drones = document.getElementById('top5drones').getContext('2d');

var top5dronesGraph = new Chart(top5drones, {
type: 'pie',
data: top5dronesData,
options: {
title: {
display: true,
text: 'Top 10 hozzáadott eszköz típus szerint'
},
tooltips: {
mode: 'index',
intersect: false
},
responsive: true
}
});