<?php
	session_start();
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
		public function carousel(){
			$stmt = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES WHERE CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE ORDER BY IDCHAMP DESC LIMIT 3');
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					echo "<div class='item active'>
							<img src='{$row['PICTURE']}' alt='Los Angeles' width='100%'>
						</div>";
				}
			endif;
		}

		// Quando este método é chamado, é realizado uma consulta na tabela CHAMPIONSHIPS
		public function championship(){
			for ($i=0; $i <= 2; $i++) {
				$stmt = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS WHERE IDCHAMP = ?');
				$stmt->bindValue(1, $_SESSION["name"][$i], PDO::PARAM_INT);
				$stmt->execute();
			}

			if ($stmt->rowCount() > 0):
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

				}
				return true;
			endif;
		}
	}
?>