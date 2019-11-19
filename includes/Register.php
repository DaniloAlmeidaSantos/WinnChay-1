<?php
	class Register
	{
		private $conn;

		public function __construct()
		{
			require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
		}

		public function createUser($fn, $ln, $u, $e, $pwd, $p){
			$stmt = $this->conn->prepare('INSERT INTO PLAYERS (FIRST_NAME, LAST_NAME, USERNAME, EMAIL, PASSWORD, PHONE) VALUES (?,?,?,?,?,?)');
			$stmt->bindParam( 1, $fn, PDO::PARAM_STR);
			$stmt->bindParam( 2, $ln, PDO::PARAM_STR);
			$stmt->bindParam( 3, $u, PDO::PARAM_STR);
			$stmt->bindParam( 4, $e, PDO::PARAM_STR);
			$stmt->bindParam( 5, $pwd, PDO::PARAM_STR);
			$stmt->bindParam( 6, $p, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				return true;
			else:
				echo "<Strong>Error:</strong> Por favor insira outro E-Mail!";
			endif;
		}

		public function rakingFifa($i, $u){
			$stmt = $this->conn->prepare('INSERT INTO RAKING_FIFA (IDPLAYER, USERNAME) VALUES (?,?)');
			$stmt->bindParam(1, $i, PDO::PARAM_INT);
			$stmt->bindParam(2, $u, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				header('location:homepage.php');
			else:
				echo "<Strong>Error:</strong> Tente novamente, mais tarde!";
			endif;
		}
	}
?>
