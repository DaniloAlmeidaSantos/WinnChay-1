<!DOCTYPE html>
<html>
<head>
	<title>WinnChay - Trocar senha</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		<label>Digite uma nova senha:</label>&nbsp;
		<input type="text" name="txtPassword">

		<label>Digite sua senha novamente:</label>&nbsp;
		<input type="text" name="txtCPassword">
		<br><br>
		<button name="btnTrocar">Trocar a senha</button>
	</form>
	<?php 
		session_start();

		include 'UpdatePassword.php';

		$conn = new UpadatePassword();

		if (isset($_POST['btnTrocar'])):
			if ($_POST['txtPassword'] == $_POST['txtCPassword']):	
				$conn->updatePassword($_POST['txtPassword'], $_SESSION['email']);
			else:
				echo "As senhas não se coincidem, por favor digitar novamente";
			endif;
		endif;
	?>
</body>
</html>