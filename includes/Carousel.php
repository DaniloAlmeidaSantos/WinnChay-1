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
			$stmt = $this->conn->prepare('SELECT IDCHAMP, IDPICTURE, NAME FROM CHAMPIONSHIPS ORDER BY DESC LIMIT 1');
			$stmt->execute();

			// Determinando as array
			$_SESSION['idpicture'] = array();
			$_SESSION['idchamp'] = array();
			$_SESSION['name'] = array();

			// Passando dados para as array
			if ($stmt->rowCount() > 0):
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$_SESSION['idchamp'][] = $row['IDCHAMP'];
					$_SESSION['idpicture'][] = $row['IDPICTURE'];
					$_SESSION['name'][] = $row['NAME'];
				}
				return true;
			endif;
		}

		// Quando este método é chamado, é realizado uma consulta na tabela PICTURE
		public function picture(){
			for ($i=0; $i <= 2; $i++) { 
				$stmt = $this->conn->prepare('SELECT PICTURE FROM PICTURES WHERE IDPICTURE = ?');
				$stmt->bindValue(1, $_SESSION["idpicture"][$i], PDO::PARAM_INT);
				$stmt->execute();
			}

			if ($stmt->rowCount() > 0):
				$_SESSION['picture'] = $row['PICTURE'];
				return true;
			else:
				$img = 'uploads/up_pictures/default.png';
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
				return true
			endif;
		}
	}
?>