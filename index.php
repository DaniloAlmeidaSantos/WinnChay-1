<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Winnchay</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">  

<script src="js/parallax.js"></script>
</head>
<body>
	<center>
    <div class="parallax">
		<ul id="scene" style="margin:0;">
			<li class="layer" data-depth=".1"><img class="img-fluid" src="img/teste/text.png"></li>
			
			<li class="layer" data-depth="1"><img class="img-fluid" src="img/teste/margin2.png"></li>
			<li class="layer" data-depth="-1"><img class="img-fluid" src="img/teste/margin1.png"></li>
			<li class="layer" data-depth=".1"><img class="img-fluid" src="img/teste/margin.png"></li>
			
			<!-- <li class="layer" data-depth="1"><img class="img-fluid" src="img/teste/planet1.png"></li>
			<li class="layer" data-depth="-1"><img class="img-fluid" src="img/teste/planet2.png"></li>
			<li class="layer" data-depth="2"><img class="img-fluid" src="img/teste/astronaut.png"></li>
			<li class="layer" data-depth="0.5"><img class="img-fluid" src="img/teste/rocket.png"></li> -->

			
			<li class="layer" data-depth=".0"><img class="img-fluid" class="tamImg" src="img/teste/light.png"></li>
			<li class="layer" data-depth="0.5"><a href="#"><img class="img-fluid" src="img/teste/botao.png"></a></li>
		</ul>
	</div>
	</center>
	<script>
		var scene = document.getElementById('scene');
		var parallax = new Parallax(scene);
	</script>
	<div class="container">
		<section>
			<div class="maxAlt">
				<h1>Gerador de Campeonatos E-Sports:</h1>
			<hr>
				<h3 class="sizeText">Crie Campeonatos e faça disputas épicas com seus amigos:</h3>
				<p class="sizeText">Disponibilizamos a criação de tabelas para diversos jogos. Independente se é PC, Xbox ou Playstation. Além disso temos as modalidades mata-mata e pontos corridos.</p>
			</div>
		</section>

		<section>
		<div class="row">
			<div class="col-md-8">
				<div class="sizeText">
					<h1>Com a nossa plataforma você vai ser capaz de criar campeonatos e participar de campeonatos </h1>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sizeImagem">
					<center><img src="img/Badges/table_badge.png"></center>
				</div>
			</div>
    	</div>
		</section>

			<br>

		<section>
		<div class="row">
			<div class="col-md-4">
				<div class="sizeImagem">
					<center><img src="img/Badges/trophy_badge.png"></center>
				</div>
			</div>
			<div class="col-md-8">
				<div class="sizeText">
					<h1>Com a nossa plataforma você vai ser capaz de criar campeonatos e participar de campeonatos </h1>
				</div>
			</div>
    	</div>
		</section>
	</div>
</body>
</html>
