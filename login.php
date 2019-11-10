<!DOCTYPE html>
<html>
<head>
	<title>WinnChay - Login</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		<label>Email: </label>
		<input type="text" name="txtEmail"><br>
		<label>Senha: </label>
		<input type="text" name="txtPassword">
		<br><br>
		<button name="txtLogin">Fazer Login</button>
	</form>
	<form action="sendGrid/forgotPassword.php" method="POST">
		<button name="txtForgot">Esqueceu a senha?</button>
	</form>
	<?php 
		
	?>
</body>
</html>