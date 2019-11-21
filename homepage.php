<!DOCTYPE html>
<html class="formatpage">
<?php session_start(); ?>
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
							<a href="#home" class="tablink" onclick="openPage('Home')">
								<img width="90%" src="open-iconic-master/svg/home.svg">
							</a>
						</div>
						<div class="perfilProcurar">
							<a href="#hist" class="tablink" id="defaultOpen" onclick="openPage('Procurar')">
								<img width="90%" src="open-iconic-master/svg/bar-chart.svg">
							</a>
						</div>
						<div class="perfilIco">
							<a href="#perfil" class="tablink" onclick="openPage('Perfil')">
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
									<div class="item-active">
										<?php
											include 'includes/Carousel.php';
											$carousel = new Carousel();
											$carousel->carousel();
										?>
									</div>
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

				<div id="Procurar" class="tabcontent">
					<div class="elementStats_Search">
						<script type="text/javascript" src="js/codes-ajax/jquery-3.3.1.min.js"></script>
   						<script type="text/javascript" src="js/codes-ajax/search.js"></script>
						<h1>Procurar Campeonatos:</h1>
						<input type="text" name="search" id="search" placeholder="Digite o nome do campeonato...">
					</div>
					<div class="elementStats_third">
						<form action="pageChamp.php" method="POST">
							<div id='result'>

							</div>
						</form>
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
					$graphics = new Stats();
					$graphics->graphics(1);
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
							legend: 'none',
						};

						var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
						chart.draw(data, options);
					}
				</script>
				<!-- Div de visualização do gráfico -->
				<p class="titleGrafic">Gráfico de Desempenho</p>
				<div id="piechart_3d"></div>
				<?php
					include 'includes/ProfilePicture.php';
					$picture = new ProfilePicture();
					$picture->image();
				?>
				<div class="Perfil">
					<form action='' method="POST" enctype="multipart/form-data">
						<img src="<?php echo $_SESSION['picture']; ?>" name='image' id="img" alt="">
						<div class="PerfilHover">
								<input type="file" id="image">
								<h5>Troque sua imagem</h5>
								<h6>Tamanho recomendado 300px x 300px</h6>
						</div>
						<br><br>
						<button name="<?php echo $_SESSION['button']; ?>">Trocar foto</button>
					</form>
					<br>
					<?php
						if (isset($_POST['btnChange'])):
							if ($picture->paramPictures()):
								$picture->changePicture();
							endif;
						elseif (isset($_POST['btnInsert'])):
							if ($picture->paramPictures()):
								$picture->createPicture();
							endif;
						endif;
					?>
					<script>
						$(function(){
							$('#image').change(function(){
								const file = $(this)[0].files[0]
								const fileReader = new FileReader()
								fileReader.onloadend = function(){
									$('#img').attr('src', fileReader.result)
								}
								fileReader.readAsDataURL(file)
							})
						})
					</script>
				</div>
				<div class="infoUser">
					<br>
					<p class="userName"><b>user name</b></p>
					<p class="userFirst">First name and last name</p>
					<hr>
					<p class="userEmail">E-mail:</p>
					<p class="userEmail2"><b>messi@gmail.com</b></p>

					<p class="userTel">Telefone:</p>
					<p class="userTel2"><b>11 949432160</b></p>

					<p class="userTeam">Time de Coração:</p>
					<p class="userTeam2"><b>Barcelona</b></p>
				</div>
				<div class="centerHist">
					<div class="contentHist">
						<?php
							include 'includes/Score.php';
							$historic = new Score();
							$historic->viewHistoric();
						?>
					</div>
				</div>
				<div class="wrapperTrophy">
					<div class="tropy">
						dsadsadsa
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>