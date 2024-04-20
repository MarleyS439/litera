let mesAtual = document.getElementById('mes').value;

var dados = [];

        // Loop para iterar sobre os dados do PHP e construir os dados para o gráfico
        for (var mes = 1; mes <= mesAtual; mes++) {
            dados.push(quantidade_por_mes[mes] || 0); // Adiciona o dado do mês, se não estiver definido, define como 0
        }

document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('myChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Usuários registrados',
                data: dados,
                borderColor: '#FFFFFF',
                backgroundColor: '#FFFFFF',
                borderWidth: 5,
            }]
        },
        options: {
            layout: {
                padding: {
                    left: 5,
                    right: 40,
                    top: 20,
                    bottom: 20
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#FFFFFF', // Cor da fonte do eixo X
                        fontWeight: 'bold'
                    },
                    grid: {
                        color: '#4180AB', // Cor das linhas de fundo do eixo X
                    }
                },
                y: {
                    ticks: {
                        color: '#FFFFFF', // Cor da fonte do eixo Y
                        fontWeight: 'bold'
                    },
                    beginAtZero: true,
                    grid: {
                        color: '#4180AB' // Cor das linhas de fundo do eixo Y
                    }
                },
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#FFFFFF', // mudar a cor da fonte da legenda
                        fontWeight: 'bold'
                    }
                }
            }
        }
    });
});
