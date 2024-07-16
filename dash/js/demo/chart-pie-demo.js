// Preparar datos para el gráfico
var tiposVenta = ventasPorTipo.map(function(item) {
  return item.tipo_venta; // Las descripciones legibles
});
var cantidadesVentas = ventasPorTipo.map(function(item) {
  return item.cantidad_ventas; // Cantidades de ventas
});

// Definir los colores para el gráfico de pastel
var colores = ["#007bff", "#28a745", "#dc3545", "#ffc107", "#6c757d", "#17a2b8", "#6610f2", "#e83e8c", "#fd7e14", "#20c997"];

// Preparar datos para la leyenda del gráfico
var legendHTML = ventasPorTipo.map(function(item, index) {
  return '<span class="mr-2"><i class="fas fa-circle" style="color: ' + colores[index] + ';"></i> ' + item.tipo_venta + '</span>';
}).join('');

// Mostrar leyenda en el HTML
document.getElementById('chartLegend').innerHTML = legendHTML;

var ctx = document.getElementById("myPieChart");

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: tiposVenta,  // Los tipos de venta como etiquetas
    datasets: [{
      data: cantidadesVentas,  // Cantidades de ventas
      backgroundColor: colores,  // Colores del gráfico de pastel
    }],
  },
  options: {
    maintainAspectRatio: false,
    responsive: true,
    plugins: {
      legend: {
        display: false // Desactiva la leyenda automática del gráfico
      },
      tooltip: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.data.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.raw);
          }
        }
      }
    }
  }
});

// Función para formatear números
function number_format(number) {
    return new Intl.NumberFormat().format(number);
}