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
			echo "<div class='elementStats_Torn'>

						<img src=".$row['PICTURE']." width='20%'>
						<b><h2>NOME DO CAMPEONATO: </b>".$row["REAL_NAME"]."</h2>
						<b><h3>Nº DE PARTICIPANTES: <i>".$row['NUMPLAYERS']." </i></b></h3>
						
						<b><h4>DATA DE ÍNICIO: </b>".$row["START_DATE"]."</h4>
						

						<button name='btnRegister' style='color: black;'>Inscrever-se</button>
						

						<input type='hidden' name='value' value='".$row['NAME_CHAMP']."'>
				</div>";
		}
	}
	else {
		echo "<b style='color: white;'>Nenhum registro localizado.</b>";
	}