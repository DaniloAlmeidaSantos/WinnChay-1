<!DOCTYPE html>
<html>
<head>
	<title>WinnChay - Página Inicial</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		include 'includes/CreateChamp.php';

		$conn = new Championship();

		$conn->createTb(2, 1);

		print_r($conn);
	?>
</body>
</html>