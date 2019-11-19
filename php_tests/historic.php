<!DOCTYPE html>
<html>
<head>
	<title>Historic</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
	<?php 
		include '../includes/Score.php';

		$conn = new Scor();

		$conn->viewHistoric();
	?>
	</center>
</body>
</html>