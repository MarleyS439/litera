const lineChart = document.getElementById('lineChart').getContext('2d');
const doughnutChart1 = document.getElementById('doughnutChart1').getContext('2d');
const doughnutChart2 = document.getElementById('doughnutChart2').getContext('2d');
const doughnutChart3 = document.getElementById('doughnutChart3').getContext('2d');

// Criar gradiente
const gradient = lineChart.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, 'rgba(110, 200, 239, 1)'); // Cor inicial
gradient.addColorStop(1, 'rgba(255, 255, 255, 0.3)');   // Cor final

new Chart(lineChart, {
  type: 'line',
  data: {
    labels: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado'],
    datasets: [{
      data: [12, 19, 3, 5, 2, 3, 7],
      tension: 0.2,
      borderWidth: 1,
      borderColor: 'rgb(45, 156, 219)',
      backgroundColor: gradient,
      borderWidth: 3,
      fill: true,
    }]
  },
  options: {
    plugins: {
      title: {
        display: true,
        text: 'Acessos',
        align: 'start',
        font: {
          size: 24 // Tamanho da fonte do título
        },
        padding: {
          top: 10 // Espaçamento superior do título
        }
      },
      subtitle: {
        display: true,
        text: 'Acessos de usuários nesta semana',
        align: 'start',
        font: {
          size: 16 // Tamanho da fonte do subtítulo
        },
        padding: {
          top: 5, // Espaçamento superior do subtítulo
          bottom: 50,
        }
      },
      legend: {
        display: false // Oculta a legenda
      }
    },
    scales: {
      x: {
        grid: {
          display: false // Esconde as linhas de grade do eixo X
        }
      },
      y: {
        display: false, // Esconde o eixo Y
        ticks: {
          display: false // Esconde os ticks do eixo Y
        },
        grid: {
          display: false // Esconde as linhas de grade do eixo Y
        }
      }
    }
  },
});


new Chart(doughnutChart1, {
  type: 'doughnut',
  data: {
    datasets: [{
      label: '# of Votes',
      data: [81, 19],
      backgroundColor: [
        'red',
        'blue',
      ]
    }]
  },
  options: {
    // Suas opções de gráfico de pizza aqui
  }
});

new Chart(doughnutChart2, {
  type: 'doughnut',
  data: {
    datasets: [{
      label: '# of Votes',
      data: [22, 78],
      backgroundColor: [
        'red',
        'blue',
      ]
    }]
  },
  options: {
    // Suas opções de gráfico de pizza aqui
  }
});

new Chart(doughnutChart3, {
  type: 'doughnut',
  data: {
    datasets: [{
      label: '# of Votes',
      data: [62, 38],
      backgroundColor: [
        'red',
        'blue',
      ]
    }]
  },
  options: {
    // Suas opções de gráfico de pizza aqui
  }
});

