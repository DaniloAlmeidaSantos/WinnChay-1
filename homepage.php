<!DOCTYPE html>
<html class="formatpage">
<?php session_start(); ?>

<head>
	<title>WinnChay - Página Inicial</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/1680x1050_Desktop.css">
	<script type="text/javascript" src="js/codes-ajax/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Carter+One|Staatliches|Viga&display=swap" rel="stylesheet">
</head>

<body class="Font">
	<div class="deviceOnly"></div>
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
							<a href="#home" class="tablink" id="defaultOpen" onclick="openPage('Home', this, '#472880')">
								<img width="120%" src="img/Logo/home_navbar.png">
							</a>
						</div>
						<div class="perfilProcurar">
							<a href="#procurar"  class="tablink" onclick="openPage('Procurar', this, '#37164a')">
								<img width="120%" src="img/Logo/lupa_navbar.png">
							</a>
						</div>
						<div class="perfilIco">
							<a href="#torneios"  class="tablink" onclick="openPage('Torneios', this, '#200b31')">
								<img width="120%" src="img/Logo/torn_navbar.png">
							</a>
						</div>
					</center>
				</div>

				<div id="element_window">
					<button onclick="easeModal()"><b>X</b></button>
					<div class="element_trophyCreateTorn">
						<img class="element_img" src="img/Src/perfilteste.jpg" alt="img usuário">
					</div>
					<div class="element_titleCreateTorn">
						<h1><b>Criar Campeonato:</b></h1>
					</div>
					<div class="element_formCreateTorn">
						<form action="">
							<label for="">Nome do Campeonato:</label>
							<input type="text">
							<br>
							<label for="">Data:</label>
							<input type="text">
						</form>
					</div>
				</div>
				<div id="element_windowBack"></div>

				<div id="Bell">

				<button onclick="sinoNotifica2();"><b>X</b></button>
					<?php
						include 'includes/Notifications.php';
						$notify = new Notifications();
						$notify->viewNotification();
					?>
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

						</div>
					</div>
					<div class="elementHome_header">
						<h1>Bem Vindo Fulano</h1>
					</div>

					<div class="elementHome_third">
						terceiro
					</div>

					<a onclick="showModal()" href="#">
						<div class="elementHome_forth">
							quarto marcar
						</div>
					</a>

					<script>
						var modalWindow = document.getElementById("element_window");
						var modalBack = document.getElementById("element_windowBack");

						function showModal(){
							modalWindow.style.display = "block";
							modalBack.style.display = "initial";
						}

						function easeModal(){
							document.addEventListener("keydown", function(event){
								var tecla = event.keyCode;
								if (tecla == 27) {
									modalWindow.style.display = "none";
									modalBack.style.display = "none";
								}
							});

							modalWindow.style.display = "none";
							modalBack.style.display = "none";
						}
					</script>
				</div>

				<div id="Procurar" class="tabcontent">
					<div class="elementStats_Search">
						<script type="text/javascript" src="../js/codes-ajax/jquery-3.3.1.min.js"></script>
						<script type="text/javascript" src="js/codes-ajax/search.js"></script>
						<h1>Pesquisa:</h1>
					</div>
					<div class="elementStats_Container">
						<h5>Buscar Por:</h5>
						<button onclick="searchTorn()" class="elementStats_SearchTorn">
							<img src="img/Badges/trophy_badge.png" alt="">
							<p>Torneios</p>
						</button>
						<button onclick="searchUser()" class="elementStats_SearchUser">
							<img src="img/Badges/trophy_badge.png" alt="">
							<p>Usuários</p>
						</button>
						<h6>Lembrando que você pode fechar a janela de pesquisa usando "ESC"</h6>
					</div>
					<script type="text/javascript" src="js/codes-ajax/searchTorneios.js"></script>
					<div class="elementStats_ContainerTorn">
						<a onclick="easeSearchTorn()"><div class="Element_Close">X</div></a>
						<input type="text" id="searchTorneios" placeholder="Procure por TORNEIOS aqui..." />
						<div id="resultTorneios">

						</div>
					</div>
					<script type="text/javascript" src="js/codes-ajax/searchPlayers.js"></script>
					<div class="elementStats_ContainerUser">
						<a onclick="easeSearchTorn()"><div class="Element_Close">X</div></a>
						<input type="text" id="searchPlayers" placeholder="Procure por USUÁRIOS aqui...">
						<div id="resultPlayers">

						</div>
					</div>
				</div>

				<script>
					var searchResult = document.getElementsByClassName("elementStats_ContainerTorn")[0];
					var searchResultUsu = document.getElementsByClassName("elementStats_ContainerUser")[0];

						function searchTorn(){
							searchResult.style.display = "block";
						}

						function easeSearchTorn(){
							document.addEventListener("keydown", function(event){
								var tecla = event.keyCode;
								if (tecla == 27) {
									searchResult.style.display = "none";
									searchResultUsu.style.display = "none";
								}
							});
							searchResultUsu.style.display = "none";
							searchResult.style.display = "none";
						}

						function searchUser(){
							searchResultUsu.style.display = "initial";
						}


				</script>

				<div id="Torneios" class="tabcontent">
					<div class="elementTorn_header">
						<h1>Meus Campeonatos</h1>
					</div>

					<div class="elementTorn_sideBar">
						<div class="elementTorn_HeaderBar">
							Campeonatos:
						</div>
						<div class="elementTorn_tornWrap">
							<div class="elementTorn_tornImg">
								<img src="img/Src/videogame.jpg" alt="">
							</div>
							<div class="elementTorn_tornName">
								<h1>Copa Nome</h1>
							</div>
						</div>
					</div>

					<div class="elementTorn_display">

					</div>
					<div class="elementTorn_Users">
						<div class="elementTorn_Header">
							Participantes:
						</div>
						<div class="elementTorn_UserWrap">
							<div class="elementTorn_UserImg">
								<img src="img/Src/videogame.jpg" alt="">
								<center><input type="checkbox"/></center>
							</div>
						</div>
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
						include 'includes/ChangeInfo.php';
								include 'includes/ProfilePicture.php';
						include 'includes/Score.php';

						$historic = new Score();
								$info = new ChangeInfo();
								$picture = new ProfilePicture();

								$info->selectInfo();
								$picture->image();
					?>
				<div class="Perfil">
					<form style="width: 100%; height: 100%;" id='input-form' method="post" enctype="multipart/form-data" action="upload.php">
						<img src="<?php echo $_SESSION['picture']; ?>" name='img' id="img" alt="Foto de perfil">
						<div class="PerfilHover">
							<input type="file" name="image" onchange="saveImages()" id="image">
							<h5>Troque sua imagem</h5>
							<h6>Tamanho recomendado 300px x 300px</h6>
						</div>
						<br><br>
						<?php
							//if (empty($_SESSION['error'])) {
								echo $_SESSION['error'];
							//}
						?>
					</form>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   					<script src="//malsup.github.io/jquery.form.js"></script>
					<script type="text/javascript">
						function saveImages(){
							$('#input-form').ajaxSubmit({
								url  : 'upload.php',
								type : 'POST'
							});
						}

						$(function() {
							$('#image').change(function() {
								const file = $(this)[0].files[0]
								const fileReader = new FileReader()
								fileReader.onloadend = function() {
									$('#img').attr('src', fileReader.result)
								}
								fileReader.readAsDataURL(file)
							});
						});
					</script>
				</div>
				<div class="infoUser">
					<br>
					<p class="userName"><b><?php echo $_SESSION['user']; ?></b></p>
					<p class="userFirst"><?php echo '<b>'.$_SESSION['l_name'].'</b>, '. $_SESSION['f_name']; ?></p>
					<hr>
					<p class="userEmail">E-mail:</p>
					<p class="userEmail2"><b><?php echo $_SESSION['email']; ?></b></p>

					<p class="userTel">Telefone:</p>
					<p class="userTel2"><b><?php echo $_SESSION['phone']; ?></b></p>

					<p class="userTeam">Time de Coração:</p>
					<p class="userTeam2"><b>Barcelona</b></p>
				</div>
				<div class="centerHist">
					<div class="contentHist_header">
						Seu Histórico de partidas
					</div>
					<div class="contentHist_games">
						<div class='contentHist_date'>
							<p>19/11/2019</p>
							<p>horas</p>
						</div>

						<div class='contentHist_boardscore'>
							<img src='img/Logo/logo3.png'>
							<p>guadalaja</p>
						</div>

						<div class="contentHist_score">1</div>
						<div class="contentHist_vs">X</div>
						<div class="contentHist_scoreVisitor">1</div>

						<div class='contentHist_boardscoreVisitor'>
							<img src='img/Logo/logo3.png'>
							<p>PLAYER pc</p>
						</div>

					</div>
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