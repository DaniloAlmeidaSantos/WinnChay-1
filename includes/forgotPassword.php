<!DOCTYPE html>
<html>
<head>
	<title>WinnChay - Trocar senha</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
</head>
<body class="bodyLogin">
	<div class="box" style="height: 55%;width: 35%;">
		<center><h1 style="color:#925EFF;">REDEFINIR SENHA</h1></center>
		<br>
		<form action="" method="POST">
			<div class="inputBox">
				<input type="text" name="txtPassword" required>
				<label>Digite uma nova senha:</label>
			</div>
			<div class="inputBox">
				<input type="text" name="txtCPassword" required>
				<label>Digite sua senha novamente:</label>
				<br><br>
			</div>
			<center><button name="btnTrocar">Trocar a senha</button> </center>
		</form>
	</div>

	<?php
		session_start();

		include 'UpdatePassword.php';

		$conn = new UpadatePassword();

		if (isset($_POST['btnTrocar'])):
			if ($_POST['txtPassword'] == $_POST['txtCPassword']):
				$conn->updatePassword($_POST['txtPassword'], $_SESSION['email']);
			else:
				echo "<br><h6 style='text-align:center;color: white;'>As senhas não se coincidem, por favor digitar novamente</h6>";
			endif;
		endif;
	?>
</body>
</html>
