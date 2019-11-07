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

		if ($conn->createTb()):
			if ($conn->createNumPlayers(16)):
				if ($conn->createChamp(1, '21/12/2019', '25/12/2019', 1, '20 mil reais', 'Um torneio gay', 1, 1)):
					$conn->insertChamp('DAN', '11963273155');
				endif;	
			endif;
		endif;	
	?>
</body>
</html>