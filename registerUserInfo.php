<!DOCTYPE html>
<html>
<head>
	<title>WinnChay - Cadastro</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/Logo/logo3.png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
	<?php
		session_start();
		if (isset($_SESSION['emailRegister'])):
			$verify = true;
		else:
			header('location: register.php');
		endif;
	?>
</head>

<body class="bodyLogin">
	<header>
		Preencha suas Informações:
	</header>
	<div class="container">
		<center>
			<div id="element_form">
				<?php
					if (isset($_SESSION['errorRegister'])):
						echo $_SESSION['errorRegister'];
					endif;
				?>
				<form class="form-inline" action="" method="POST">
					<div class="form-group col-md-7">
						<label for="nome" class="mr-sm-2">Nome:</label>
						<input type="text" id="nome" name="txtFirstName" maxlength="20" class="form-control mb-2 mr-sm-2">
					</div>
					<div class="form-group col-md-7">
						<label for="sobrenome" class="mr-sm-2">Sobrenome:</label>
						<input type="text" id="sobrenome" name="txtLastName" maxlength="20"  class="form-control mb-2 mr-sm-2">
					</div>
					<div class="form-group col-md-9">
						<label for="nomeusu" class="mr-sm-2">Nome de Usuário:</label>
						<input type="text" id="nomeusu" name="txtUser" maxlength="16" class="form-control mb-2 mr-sm-2">
					</div>
					<div class="form-group col-md-7">
						<label for="tel" class="mr-sm-2">Telefone:</label>
						<input type="text" id="tel" name="txtPhone" maxlength="14"  class="form-control mb-2 mr-sm-2">
					</div>
					<br>
					<div class="col-md-12">
						<button class="element_buttonFinal" name="btnRegister">Finalizar Cadastro</button>
					</div>
				</form>
			</div>
		</center>
	</div>
	<?php
		include 'includes/Register.php';
		$register = new Register();
		if (isset($_POST['btnRegister'])):
			if ($register->verifyUser($_POST['txtUser']) == false):
				if ($register->createUser($_POST['txtFirstName'],$_POST['txtLastName'],$_POST['txtUser'],$_SESSION['emailRegister'],$_SESSION['pwdRegister'],$_POST['txtPhone'])):
					$register->rankingFifa();
				endif;
			endif;
		endif;
	?>
</body>
</html>
