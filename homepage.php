<!DOCTYPE html>
<html>
<head>
	<title>WinnChay - Página Inicial</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		include 'includes/Carousel.php';

		$conn = new Carousel();

		$conn->picture();
	?>
</body>
</html>