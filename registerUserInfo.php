<!DOCTYPE html>
<html>

<head>
	<title>WinnChay - Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
</head>

<body class="bodyLogin">
	<header>
		Preencha suas Informações:
	</header>
	<div class="container">
		<p id="p">Deseja inserir uma imagem de perfil agora?</p>
		<center>
			<div id="element_button">
				<button onclick="showImg()" class="button_sim">Sim</button>
				<button class="button_nao">Não</button>
			</div>
			<br>
			<div id="imgUsu">
				<img src="img/Src/perfilteste.jpg" alt="img usuário">
				<br><br>
				<button class="btnUsu">escolher imagem</button>
			</div>

			<div id="element_button2">
				<button onclick="showForm()" class="button2_sim">Depois eu troco</button>
				<button onclick="showForm()" class="button2_nao">Prosseguir</button>
			</div>

			<div class="element_form">
				<form class="form-inline" action="" method="POST">
					<div class="row">
						<div class="col">
							<label for="nome" class="mr-sm-2">Nome:</label>
							<input type="text" id="nome" class="form-control mb-2 mr-sm-2">
						</div>

						<div class="col">
							<label for="sobrenome" class="mr-sm-2">Sobrenome:</label>
							<input type="text" id="sobrenome" class="form-control mb-2 mr-sm-2">
						</div>
					</div>

						<label for="nomeusu" class="mr-sm-2">Nome de Usuário:</label>
						<input type="text" id="nomeusu" class="form-control mb-2 mr-sm-2">

						<label for="tel" class="mr-sm-2">Telefone:</label>
						<input type="text" id="tel" class="form-control mb-2 mr-sm-2">
				
						<label for="skype" class="mr-sm-2">Skype:</label>
						<input type="text" id="skype" class="form-control mb-2 mr-sm-2">

						<label for="discord" class="mr-sm-2">Discord:</label>
						<input type="text" id="discord" class="form-control mb-2 mr-sm-2">

						<label for="origin" class="mr-sm-2">Nome de usuário Origin:</label>
						<input type="text" id="origin" class="form-control mb-2 mr-sm-2">

						<label for="steam" class="mr-sm-2">Nome de usuário Steam:</label>
						<input type="text" id="steam" class="form-control mb-2 mr-sm-2">
					
				</form>
			</div>
		</center>
	</div>

	<script src="js/registerUserInfo.js"></script>

</body>
</html>