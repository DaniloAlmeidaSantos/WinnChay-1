<!DOCTYPE html>
<html class="formatpage">
<?php session_start(); ?>

<head>
	<title>WinnChay - Página Inicial</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Carter+One|Staatliches|Viga&display=swap" rel="stylesheet">
</head>

<body class="Font">
	<div class="outerWrapper">
		<div class="Wrapper">
			<div class="slide Home">
				<div class="sidenav">
					<center>
						<div class="perfilLogo">
							<img width="80%" src="img/Logo/logo3.png">
						</div>
						<div class="perfilBell">
							<a onclick="sinoNotifica();">
								<img width="120%" src="img/Logo/sino_navbar.png">
							</a>
						</div>
						<div class="perfilHome">
							<a href="#home" class="tablink" onclick="openPage('Home', this, '#472880')">
								<img width="120%" src="img/Logo/home_navbar.png">
							</a>
						</div>
						<div class="perfilProcurar">
							<a href="#procurar" class="tablink" onclick="openPage('Procurar', this, '#37164a')">
								<img width="120%" src="img/Logo/lupa_navbar.png">
							</a>
						</div>
						<div class="perfilIco">
							<a href="#torneios" id="defaultOpen" class="tablink" onclick="openPage('Torneios', this, '#200b31')">
								<img width="120%" src="img/Logo/torn_navbar.png">
							</a>
						</div>
					</center>
				</div>

				<div id="Bell">
					<h1>olá mundo</h1><button onclick="sinoNotifica2();"><b>X</b></button>
				</div>

				<script>
					function sinoNotifica() {
						var anima = document.getElementById("Bell");
						anima.style.animation = 'deslizarLeft 1s';
						anima.style.animationFillMode = "forwards";
					}

					function sinoNotifica2() {
						var anima = document.getElementById("Bell");
						anima.style.animation = 'deslizarRight 1s';
						anima.style.animationFillMode = "forwards";
					}
				</script>

				<div id="Home" class="tabcontent">
					<h3 class="h3_Nov">Novidades</h3>
					<h3 class="h3_Mod">Modos</h3>

					<div class="elementHome_second">
						<div class="container">
							<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">


								<div class="carousel-inner">
									<?php
									include 'includes/Carousel.php';
									$carousel = new Carousel();
									$carousel->itemCarousel();
									?>
								</div>

								<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div> -->
						</div>
					</div>
					<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
					<script>
						$(document).ready(function() {
							//tempo de duração do slide
							$('.carousel').carousel({
								interval: 7000
							});

							$('#myCarousel').on('slid.bs.carousel', function() {
								//Receber o valor do atributo data-slide-to quando estiver ativo
								var numeroSlide = $('#valor-car.active').data('slide-to');
								//$("#msg").html(numeroSlide);

								//Ocultar a descrição do slide anterior
								//$('.conteudo').hide();

								//Apresentar o conteúdo do slide atual
								//$('.imagem' + numeroSlide).show();
							});
						});
					</script> -->
					<div class="elementHome_header">
						<h1>Bem Vindo Fulano</h1>
					</div>

					<div class="elementHome_third">
						terceiro
					</div>

					<div class="elementHome_forth">
						quarto marcar
					</div>
				</div>

				<div id="Procurar" class="tabcontent">
					<div class="elementStats_Search">
						<script type="text/javascript" src="js/codes-ajax/jquery-3.3.1.min.js"></script>
						<script type="text/javascript" src="js/codes-ajax/search.js"></script>
						<h1>Procurar Campeonatos:</h1>
						<input type="search" name="search" id="search" placeholder="Digite o nome do campeonato...">
					</div>
					<div class="elementStats_third">
						<form action="pageChamp.php" method="POST">
							<div id='result'>

							</div>
						</form>
					</div>
				</div>

				<div id="Torneios" class="tabcontent">
					<div class="elementTorn_header">
						<h1>Meus Campeonatos</h1>
					</div>

					<div class="elementTorn_sideBar">
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis velit id laborum fugit fuga magnam pariatur rerum illo consectetur laudantium. Reiciendis quae earum consequatur veniam recusandae molestias quis voluptatem dolorem?
					</div>

					<div class="elementTorn_display">

					</div>
					<div class="elementTorn_Users">

					</div>
				</div>

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
					<form style="width: 100%; height: 100%;" action='' method="POST" enctype="multipart/form-data">
						<img src="img/Src/perfilteste.jpg" name='image' id="img" alt="">
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
					if (isset($_POST['btnChange'])) :
						if ($picture->paramPictures()) :
							$picture->changePicture();
						endif;
					elseif (isset($_POST['btnInsert'])) :
						if ($picture->paramPictures()) :
							$picture->createPicture();
						endif;
					endif;
					?>
					<script>
						$(function() {
							$('#image').change(function() {
								const file = $(this)[0].files[0]
								const fileReader = new FileReader()
								fileReader.onloadend = function() {
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
					<div class="contentHist_header">
						Seu Histórico de partidas
					</div>
					<div class="contentHist_games">
						<div class="contentHist_date">
							<p>19/11/2019</p>
							<p>horas</p>
						</div>
						<div class="contentHist_boardscore">
							<img src="img/Logo/logo3.png" alt="">
							<p>TimeA</p>
						</div>
					</div>
					<!-- <?php
							include 'includes/Score.php';
							$historic = new Score();
							$historic->viewHistoric();
							?> -->
				</div>
				<div class="wrapperTrophy">

				</div>
			</div>
		</div>
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
			elmnt.style.backgroundColor = "";
		}
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>
</body>

</html>