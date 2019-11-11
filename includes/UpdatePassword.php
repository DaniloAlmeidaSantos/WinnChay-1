<?php 
	class UpadatePassword
	{
		private $conn;

		public function __construct()
		{
			require_once '../config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();	
		}

		// Quando este método é chamado, é realizado o processo de mudança de senha
		public function updatePassword($p, $e){
			$stmt = $this->conn->prepare('UPDATE PLAYERS SET PASSWORD = ? WHERE EMAIL = ?');
			$stmt->bindParam(1, $p, PDO::PARAM_STR);
			$stmt->bindParam(2, $e, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				header('location: ../login.php');
			else:
				echo '<b>Error:</b> Estamos enfrentando alguns problemas, tente novamente mais tarde!';
			endif;
		}
	}
?>