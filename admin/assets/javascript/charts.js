const lineChart = document.getElementById("lineChart").getContext("2d");
const doughnutChart1 = document
  .getElementById("doughnutChart1")
  .getContext("2d");
const doughnutChart2 = document
  .getElementById("doughnutChart2")
  .getContext("2d");
const doughnutChart3 = document
  .getElementById("doughnutChart3")
  .getContext("2d");

// Criar gradiente
const gradient = lineChart.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, "rgba(110, 200, 239, 1)"); // Cor inicial
gradient.addColorStop(1, "rgba(255, 255, 255, 0.3)"); // Cor final

const resultado = JSON.parse(quantidade_por_semana)

new Chart(lineChart, {
  type: "line",
  data: {
    labels: [
      "Domingo",
      "Segunda-Feira",
      "Terça-Feira",
      "Quarta-Feira",
      "Quinta-Feira",
      "Sexta-Feira",
      "Sabado",
    ],
    datasets: [
      {
        data: [resultado[0].totalAcessos, resultado[1].totalAcessos, resultado[2].totalAcessos, resultado[3].totalAcessos, resultado[4].totalAcessos, resultado[5].totalAcessos, resultado[6].totalAcessos],
        tension: 0.3,
        borderWidth: 1,
        borderColor: "rgb(45, 156, 219)",
        backgroundColor: gradient,
        borderWidth: 3,
        fill: true,
      },
    ],
  },
  options: {
    responsive: true, // Torna o gráfico responsivo
    maintainAspectRatio: false, // Permite que o gráfico se ajuste ao tamanho do contêiner pai
    scales: {
      y: {
        beginAtZero: true,
      },
    },
    plugins: {
      legend: {
        display: false, // Oculta a legenda
      },
    },
    scales: {
      x: {
        grid: {
          display: false, // Esconde as linhas de grade do eixo X
        },
      },
      y: {
        display: false, // Esconde o eixo Y
        ticks: {
          display: false, // Esconde os ticks do eixo Y
        },
        grid: {
          display: false, // Esconde as linhas de grade do eixo Y
        },
      },
    },
  },
});

new Chart(doughnutChart1, {
  type: "doughnut",
  data: {
    datasets: [
      {
        label: "# of Votes",
        data: [81, 19],
        backgroundColor: ["rgba(255, 91, 91, 1)", "rgba(255, 91, 91, 0.15)"],
      },
    ],
  },
  options: {
    responsive: true, // Torna o gráfico responsivo
    maintainAspectRatio: false, // Permite que o gráfico se ajuste ao tamanho do contêiner pai
    plugins: {
      title: {
        display: true,
        text: "Total Order",
        align: "center",
        position: "bottom",
        padding: {
          top: 30,
        },
        color: "rgb(102, 102, 102)",
        font: {
          size: 24, // Tamanho da fonte do título
        },
        padding: {
          top: 10, // Espaçamento superior do título
        },
      },
    },
  },
});

new Chart(doughnutChart2, {
  type: "doughnut",
  data: {
    datasets: [
      {
        label: "# of Votes",
        data: [22, 78],

        backgroundColor: ["rgba(0, 176, 116, 1)", "rgba(0, 176, 116, 0.15)"],
      },
    ],
  },
  options: {
    plugins: {
      responsive: true, // Torna o gráfico responsivo
      maintainAspectRatio: false, // Permite que o gráfico se ajuste ao tamanho do contêiner pai
      title: {
        display: true,
        text: "Customer Growth",
        align: "center",
        position: "bottom",
        padding: {
          top: 50,
        },
        color: "rgb(102, 102, 102)",
        font: {
          size: 24, // Tamanho da fonte do título
        },
        padding: {
          top: 10, // Espaçamento superior do título
        },
      },
    },
  },
});

new Chart(doughnutChart3, {
  type: "doughnut",
  data: {
    datasets: [
      {
        label: "# of Votes",
        data: [62, 38],
        backgroundColor: ["rgba(45, 156, 219, 1)", "rgba(45, 156, 219, 0.15)"],
      },
    ],
  },
  options: {
    plugins: {
      responsive: true, // Torna o gráfico responsivo
      maintainAspectRatio: false, // Permite que o gráfico se ajuste ao tamanho do contêiner pai
      title: {
        display: true,
        text: "Total Revenue",
        align: "center",
        position: "bottom",
        padding: {
          top: 50,
        },
        color: "rgb(102, 102, 102)",
        font: {
          size: 24, // Tamanho da fonte do título
        },
        padding: {
          top: 10, // Espaçamento superior do título
        },
      },
    },
  },
});
