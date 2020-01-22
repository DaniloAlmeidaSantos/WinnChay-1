<?php
	require_once '../config/DbConnect.php';
	$conn = connect();

	if (isset($_POST["namePlayer"])):
		$search = $_POST["namePlayer"];
		$query = "SELECT * FROM PLAYERS INNER JOIN PROFILE_PICTURES WHERE PLAYERS.USERNAME LIKE '%$search%' AND PLAYERS.IDPLAYER = PROFILE_PICTURE.IDPLAYER ORDER BY USERNAME";
	else:
		$query = "SELECT * FROM PLAYERS INNER JOIN PROFILE_PICTURES WHERE PLAYERS.IDPLAYER = PROFILE_PICTURES.IDPLAYER ORDER BY FIRST_NAME";
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
								<h4 class='card-title'><b>".$row["USERNAME"]."</b></h4>
							</div>
						</div>
						</div>
						<a class='buttonTorn' href='pageChamp.php?name=".$row['USERNAME']."'>Conhecer</a>
					</div>";
		}
	}
	else {
		$noPic = "SELECT * FROM PLAYERS ORDER BY FIRST_NAME";
		$stmt = $conn->prepare($noPic);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo "<div class='card mb-3' style='max-width: 97%; margin-left:1.5%; margin-top:8px;'>
							<div class='row no-gutters'>
							<div class='col-md-4'>
								<img src='uploads/up_profile/user_default.png' class='card-img' alt='...'>
							</div>
							<div class='col-md-8'>
								<div class='card-body'>
									<h4 class='card-title'><b>".$row["USERNAME"]."</b></h4>
								</div>
							</div>
							</div>
							<a class='buttonTorn' href='pageChamp.php?name=".$row['USERNAME']."'>Conhecer</a>
						</div>";
			}
		}
		else {
			echo "<center><p><b style='color: white;'>Nenhum registro localizado.</b></p></center>";
		}
	}
