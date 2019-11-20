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
			$stmt = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS INNER JOIN PICTURES WHERE CHAMPIONSHIPS.IDPICTURE = PICTURES.IDPICTURE ORDER BY PICTURE DESC LIMIT 3');
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo "<img src='{$row['PICTURE']}' alt='Los Angeles' width='100%'>";
			}
		}
	}
?>