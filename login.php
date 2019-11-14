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
	<div class="box">
		<h2>Login</h2>
		<form action="" method="POST">
			<div class="inputBox">
				<input type="text" name="txtEmail" required="">
				<label>E-Mail</label>
			</div>
			<div class="inputBox">
				<input type="password" name="txtPwd" required="">
				<label>Senha</label>
			</div>
			<center><input type="submit" name="btnSubmit"></center>
		</form>
		<br>
		<form action="SendGrid/forgotPassword.php" method="POST" style="text-align: center;">
			<button class="buttonLogin" name="btnForgot" style="">Esqueceu a Senha?</button>
			<br>
			<button class="buttonLogin"><a href="#" class="textDec">Cadastre-se</a></button>
		</form>

		<?php
			if (isset($_POST['btnSubmit'])):
				include 'includes/Login.php';

				$conn = new Login();
				$conn->select($_POST['txtEmail'], $_POST['txtPwd']);
			endif;
		?>
</body>
</html>
