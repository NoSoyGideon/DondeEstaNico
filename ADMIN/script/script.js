const ctx = document.getElementById('adoptionsChart').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
        datasets: [{
            label: 'Adopciones',
            data: [5, 10, 7, 12, 8, 15],
            borderColor: '#675BC8',
            backgroundColor: 'rgba(103,91,200,0.2)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});