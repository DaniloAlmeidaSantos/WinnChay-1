<?php
	require_once '../config/DbConnect.php';

	$conn = connect();

	if (isset($_POST["name"])):
		$search = $_POST["name"];
		$query = "SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES INNER JOIN NUMPLAYERS WHERE CHAMPIONSHIPS.NAME LIKE '%$search%' AND CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE AND NUMPLAYERS.NAME_CHAMP = CHAMPIONSHIPS.NAME ORDER BY NAME";
	else:
		$query = "SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES INNER JOIN NUMPLAYERS WHERE CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE AND NUMPLAYERS.NAME_CHAMP = CHAMPIONSHIPS.NAME ORDER BY NAME";
	endif;

	$stmt = $conn->prepare($query);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<div class='elementStats_Torn'>
					<table class='table bordered' style='color: white;border: 0px;'>
						<img src=".$row['PICTURE']." width='20%'>
						<b style='color: white;'>Nº DE PARTICIPANTES: <i>".$row['NUMPLAYERS']." </i></b>
						<tr>
							<td><b>NOME DO CAMPEONATO: </b>".$row["NAME_CHAMP"]."</td>
							<td><b>DATA DE ÍNICIO: </b>".$row["START_DATE"]."</td>
							<input type='hidden' name='value' value='".$row['NAME_CHAMP']."'>
						</tr>
						<tr>
							<center>
								<td>
									<button name='btnRegister' style='color: black;'>Inscrever-se</button>
								</td>
							<center>
						</tr>
					</table>
				</div>";
		}
	}
	else {
		echo "<b style='color: white;'>Nenhum registro localizado.</b>";
	}