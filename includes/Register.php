<?php 
	class Register
	{
		
		function __construct()
		{
			require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();

			// Definindo o nome do campeonato
			$_SESSION["nChamp"] = 'Championship_'. time() . '_WinnChay';
		}

		public function createUser($fn, $ln, $u, $e, $p, $c, $p){
			$stmt = $this->conn->prepare('INSERT INTO PLAYERS (FIRST_NAME, LAST_NAME, USERNAME, EMAIL, PASSWORD, CPF, PHONE) VALUES (?,?,?,?,?,?,?)');
			$stmt->bindParam( 1, $fn, PDO::PARAM_STR);
			$stmt->bindParam( 2, $ln, PDO::PARAM_STR);
			$stmt->bindParam( 3, $u, PDO::PARAM_STR);
			$stmt->bindParam( 4, $e, PDO::PARAM_STR);
			$stmt->bindParam( 5, $p, PDO::PARAM_STR);
			$stmt->bindParam( 6, $c, PDO::PARAM_STR);
			$stmt->bindParam( 7, $p, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				header('location:homepage.php');
			else:
				echo "<Strong>Error:</strong> Por favor insira outro E-Mail!";
			endif;
		}
	}
?>