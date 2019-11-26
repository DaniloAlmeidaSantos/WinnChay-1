<?php
	class Carousel
	{
		private $conn;

		public function __construct()
		{
			require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
		}

		// Quando este método é chamado, é realizado uma consulta na tabela CHAMPIONSHIPS
		public function liCarousel(){
			$stmt = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES WHERE CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE ORDER BY PICTURE DESC LIMIT 3');
			$stmt->execute();
			$count = $stmt->rowCount();
			$count_marc = 0;

			while ($count_marc < $count) {
				echo "<li id='valor-car' data-target='#myCarousel' data-slide-to='$count_marc'></li>";
				$count_marc++;
			}
		}

		public function itemCarousel(){
			$stmt = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES WHERE CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE ORDER BY PICTURE DESC LIMIT 3');
			$stmt->execute();

			$count_slide = 0;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$active = "";
				if($count_slide == 0){
					$active = "active";
				}

				echo "<div class='carousel-item $active'>";
				echo "<img class='d-block w-100' src='{$row["PICTURE"]}'>";
				echo "</div>";
				$count_slide++;
			}
		}

	}
?>
