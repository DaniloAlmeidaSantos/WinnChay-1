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
				<button onclick="changeImgLater()" class="button_nao">Não</button>
			</div>
			<br>
			<div id="imgUsu">
				<img src="img/Src/perfilteste.jpg" alt="img usuário">
				<br><br>
				<button class="btnUsu">escolher imagem</button>
			</div>

			<div id="element_button2">
				<button onclick="showForm()" class="button2_sim">Mais tarde</button>
				<button onclick="showForm()" class="button2_nao">Prosseguir</button>
			</div>

			<div id="element_form">
				<?php
					session_start();
					if (isset($_SESSION['errorRegister'])):
						echo $_SESSION['errorRegister'];
					endif;
				?>
				<form class="form-inline" action="" method="POST">
					<div class="form-group col-md-7">
						<label for="nome" class="mr-sm-2">Nome:</label>
						<input type="text" id="nome" name="txtFirstName" class="form-control mb-2 mr-sm-2">
					</div>
					<div class="form-group col-md-7">
						<label for="sobrenome" class="mr-sm-2">Sobrenome:</label>
						<input type="text" id="sobrenome" name="txtLastName" class="form-control mb-2 mr-sm-2">
					</div>
					<div class="form-group col-md-9">
						<label for="nomeusu" class="mr-sm-2">Nome de Usuário:</label>
						<input type="text" id="nomeusu" name="textUser" class="form-control mb-2 mr-sm-2">
					</div>
					<div class="form-group col-md-7">
						<label for="tel" class="mr-sm-2">Telefone:</label>
						<input type="text" id="tel" name="txtPhone" class="form-control mb-2 mr-sm-2">
					</div>
					<div class="col-md-12">
						<button class="element_buttonFinal">Finalizar Cadastro</button>
					</div>
				</form>
			</div>
		</center>
	</div>

	<script src="js/registerUserInfo.js"></script>
	<?php
		include 'includes/Register.php';
		$register = new Register();

		if ($register->verifyUsername($_POST['txtUser'])):
			if ($rgister->createUser($_POST['txtFirstName'],$_POST['txtLastName'],$_POST['txtUser'],$_SESSION['emailRegister'],$_SESSION['pwdRegister'],$_POST['txtPhone'])):
				$register->rankingFifa();
			endif;
		endif;
	?>
</body>
</html>