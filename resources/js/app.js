import './bootstrap';
import './theme-switcher.js';
// Importa el plugin (asegúrate de instalarlo primero con npm)
import {
    Chart,
    BarController,
    BarElement,
    DoughnutController,
    ArcElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend
  } from 'chart.js';

  import ChartDataLabels from 'chartjs-plugin-datalabels';

  Chart.register(
    BarController,
    BarElement,
    DoughnutController,
    ArcElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend,
    ChartDataLabels
  );

  window.Chart = Chart;
