<!DOCTYPE html>
<html>
<head>
	<title>Historic</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<?php
			$date = date('');
			echo $date. '<br>';
			echo date('his');

			if (isset($_POST['button'])):
				echo $_POST['date'];
			endif;
		?>
		<form action="" method="post">
			<input type="month" name="date" value="">
			<button name="button">Enviar</button>
		</form>
	</center>
</body>
</html>