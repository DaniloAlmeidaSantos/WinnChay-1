<!DOCTYPE html>
<html>
<head>
	<title>Historic</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<?php
		// router.php
		$path = pathinfo($_SERVER["SCRIPT_FILENAME"]);
		if ($path["extension"] == "el") {
			header("Content-Type: text/x-script.elisp");
			readfile($_SERVER["SCRIPT_FILENAME"]);
		}
		else {
			return FALSE;
		}
		?>
		<form action="" method="post">
			<input type="month" name="date" value="">
			<button name="button">Enviar</button>
		</form>
	</center>
</body>
</html>