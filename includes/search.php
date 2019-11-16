<?php
	require_once '../config/DbConnect.php';

	$conn = connect();

	if (isset($_POST["name"])):
		$search = $_POST["name"];
		$query = "SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES WHERE CHAMPIONSHIPS.NAME LIKE '%".$search."%' AND CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE ORDER BY NAME";
	else:
		$query = "SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES WHERE CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE ORDER BY NAME";
	endif;

	$stmt = $conn->prepare($query);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<div class='table-responsive'>
					<table class='table bordered'>
					<tr>
						<th>Nome</th>
					</tr>
					<tr>
						<td>".$row["NAME"]."</td>
						<img src=".$row['PICTURE']." width='20%'>
					</tr>";
		}
	}
	else {
		echo "Nenhum registro localizado.";
	}