<html>
  <head>
  </head>
  <body>
    <script type="text/javascript" src="js/codes-ajax/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/codes-ajax/search.js"></script>
		<h2 align="center">Busca dinâmica</h2>
		<span>Buscar</span>
		<input type="text" name="search" id="search" placeholder="Digite o nome" class="form-control" />
		<div id="result"></div>

    <?php
      include 'includes/Stats.php';
      $conn = new Stats();
      $conn->graphics(1);
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // Criando um gráfico
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      // Determinando os valores do gráfico
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Desempenho', 'W/D/L'],
          ['Vitórias',  <?php echo $_SESSION['wins']; ?>],
          ['Derrotas',  <?php echo $_SESSION['loses']; ?>],
          ['Empates',   <?php echo $_SESSION['draws']; ?>]
        ]);

        // Dando um nome e definindo o tipo do gráfico
        var options = {
          title: 'Gráfico de desempenho',
          is3D: true,
          colors: ['#925EFF', '#000', '#FFF'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <!-- Div de visualização do gráfico -->
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>
