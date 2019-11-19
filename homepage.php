<!DOCTYPE html>
<html class="formatpage">

<head>
	<title>WinnChay - Página Inicial</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
</head>

<body>
	<div class="outerWrapper">
		<div class="Wrapper">
			<div class="slide Home">
				<div class="sidenav">
					<center>
						<div class="perfilLogo">
							<a href="#">
								<img width="100%" src="img/Logo/logo4.png">
							</a>
						</div>
						<div class="perfilHome">
							<a href="#home" class="tablink" id="defaultOpen" onclick="openPage('Home')">
								<img width="90%" src="open-iconic-master/svg/home.svg">
							</a>
						</div>
						<div class="perfilHist">
							<a href="#hist" class="tablink" id="defaultOpen" onclick="openPage('Hist')">
								<img width="90%" src="open-iconic-master/svg/bar-chart.svg">
							</a>
						</div>
						<div class="perfilIco">
							<a href="#perfil" class="tablink" id="defaultOpen" onclick="openPage('Perfil')">
								<img width="90%" src="open-iconic-master/svg/cog.svg">
							</a>
						</div>
					</center>
				</div>

				<div id="Home" class="tabcontent">
					<h3 class="h3_Nov">Novidades</h3>
					<h3 class="h3_Mod">Modos</h3>

					<div class="elementHome_second">
						<div class="container">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<?php
									include 'includes/Carousel.php';
									$conn = new Carousel();
									$conn->carousel();
									?>
								</div>

								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>

								<a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>

					<div class="elementHome_header">
						<h1>Bem Vindo Fulano</h1>
					</div>

					<div class="elementHome_first">
						primaryesse que eu tenho que colocar o grafico
					</div>

					<div class="elementHome_third">
						terceiro
					</div>

					<div class="elementHome_forth">
						quarto
					</div>
				</div>

				<div id="Hist" class="tabcontent">
					
					<!-- <div class="elementStats_primary">
					
					</div>  -->

					<div class="elementStats_second">
						second
					</div>
					<div class="elementStats_third">
						third
					</div>
				</div>

				<div id="Perfil" class="tabcontent">
					<h3>Contact</h3>
					<p>Get in touch, or swing by for a cup of coffee.</p>
				</div>

				<div id="About" class="tabcontent">
					<h3>About</h3>
					<p>Who we are and what we do.</p>
				</div>
				<script>
					function openPage(pageName, elmnt, color) {
						var i, tabcontent, tablinks;
						tabcontent = document.getElementsByClassName("tabcontent");
						for (i = 0; i < tabcontent.length; i++) {
							tabcontent[i].style.display = "none";
						}
						tablinks = document.getElementsByClassName("tablink");
						for (i = 0; i < tablinks.length; i++) {
							tablinks[i].style.backgroundColor = "";
						}
						document.getElementById(pageName).style.display = "block";
						elmnt.style.backgroundColor = color;
					}
					// Get the element with id="defaultOpen" and click on it
					document.getElementById("defaultOpen").click();
				</script>
			</div>
			<div class="slide Center">
				
			<?php
					include 'includes/Stats.php';
					$conn = new Stats();
					$conn->graphics(1);
					?>
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<script type="text/javascript">
						// Criando um gráfico
						google.charts.load("current", {
							packages: ["corechart"]
						});
						google.charts.setOnLoadCallback(drawChart);
						// Determinando os valores do gráfico
						function drawChart() {
							var data = google.visualization.arrayToDataTable([
								['Desempenho', 'W/D/L'],
								['Vitórias', <?php echo $_SESSION['wins']; ?>],
								['Derrotas', <?php echo $_SESSION['loses']; ?>],
								['Empates', <?php echo $_SESSION['draws']; ?>]
							]);

							// Dando um nome e definindo o tipo do gráfico
							var options = {
								is3D: true,
								colors: ['#925EFF', '#000', '#FFF'],
								backgroundColor: 'transparent',
							};

							var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
							chart.draw(data, options);
						}
					</script>
					<!-- Div de visualização do gráfico -->
					<div id="piechart_3d"></div>

				<div class="Perfil">
					<img src="img/Src/perfilteste.jpg" alt="">
					<div class="PerfilHover">
						<button><img style="position: absolute;" src="img/Src/addImg.png" alt=""></button>
						<p>Change your image</p>
					</div>
				</div>
				<div class="infoUser">
					<p class="userName"><b>user name</b></p>
					<p class="userFirst">First name and last name</p>
					<hr>
					<p class="userEmail">E-mail:</p>
					<p class="userEmail2"><b>johnatan@gmai.com</b></p>

					<p class="userTel">Telefone:</p>
					<p class="userTel2"><b>11 949432160</b></p>

					<p class="userTeam">Time de Coração:</p>
					<p class="userTeam2"><b>Palmeiras</b></p>
				</div>
				<!-- <div class="centerHist">
					<div class="contentHist">
						dsadsadsa
					</div>
				</div> -->
			</div>
		</div>
	</div>
</body>

</html>