<?php
	require_once '../config/DbConnect.php';
	$conn = connect();

	if (isset($_POST["name"])):
		$search = $_POST["name"];
		$query = "SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES INNER JOIN NUMPLAYERS WHERE CHAMPIONSHIPS.REAL_NAME LIKE '%$search%' AND CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE AND NUMPLAYERS.NAME_CHAMP = CHAMPIONSHIPS.NAME ORDER BY REAL_NAME";
	else:
		$query = "SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES INNER JOIN NUMPLAYERS WHERE CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE AND NUMPLAYERS.NAME_CHAMP = CHAMPIONSHIPS.NAME ORDER BY NAME";
	endif;

	$stmt = $conn->prepare($query);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<div class='card mb-3' style='max-width: 97%; margin-left:1.5%; margin-top:8px;'>
						<div class='row no-gutters'>
						<div class='col-md-4'>
							<img src=".$row['PICTURE']." class='card-img' alt='...'>
						</div>
						<div class='col-md-8'>
							<div class='card-body'>
							<h4 class='card-title'><b>".$row["REAL_NAME"]."</b></h4>
							<p class='card-text'>Nº DE PARTICIPANTES: ".$row['NUMPLAYERS']."</p>
							<p class='card-text'><small class='text-muted'>DATA DE ÍNICIO: ".$row["START_DATE"]."</small></p>
							</div>
						</div>
						</div>
						<a class='buttonTorn' href='pageChamp.php?name=".$row['NAME_CHAMP']."'>Inscrever-se</a>
					</div>";
		}
	}
	else {
		echo "<center><p><b style='color: white;'>Nenhum registro localizado.</b></p></center>";
	}