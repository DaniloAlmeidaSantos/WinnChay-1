<?php
	// Class Login
	class Login
	{
		private $conn;

		// Método construtor do Login
		public function __construct()
		{
			require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
		}

		/*
			->> Operação de leitura
			->> Quando chamado, este método retorna um registro no BD
		*/
		public function select($em, $pass){
			$stmt = $this->conn->prepare("SELECT EMAIL,PASSWORD FROM PLAYERS WHERE EMAIL=? AND PASSWORD=?");
			$stmt->bindValue(1, $em, PDO::PARAM_STR);
			$stmt->bindValue(2, $pass, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					setcookie('user', $row["EMAIL"]);
					setcookie('id', $row["IDPLAYER"]);
					header('location:homepage.php');
				}
			else:
				// Caso o E-Mail e a Senha forem digitados incorretamente, essa estrutura retorna um aviso de erro
				echo "<h6 style='color: red;'>Email ou senha digitado  incorretamente.</h6><br>";
			endif;
		}
	}
?>
