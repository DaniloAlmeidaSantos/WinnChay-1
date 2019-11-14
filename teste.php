<html>
  <head>
  </head>
  <body>
    <?php
      include 'includes/Carousel.php';
      $conn = new Carousel();

      if ($conn->carousel()):
        $conn->picture();
      endif;
    ?>
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
