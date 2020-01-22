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

		public function rakingFifa($user){
			$validate = $thies->conn->prepare('SELECT IDPLAYER FROM PLAYERS WHERE USERNAME = ?');
			$validate->bindParam(1, $user, PDO::PARAM_INT);
			$validate->execute();

			while ($row = $validate->fetch(PDO::FETCH_ASSOC)){
				$id = $row['IDPLAYER'];
			}

			$stmt = $this->conn->prepare('INSERT INTO RAKING_FIFA (IDPLAYER, USERNAME) VALUES (?,?)');
			$stmt->bindParam(1, $i, PDO::PARAM_INT);
			$stmt->bindParam(2, $user, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				header('location:homepage.php');
			else:
				echo "<Strong>Error:</strong> Tente novamente, mais tarde!";
			endif;
		}

		public function verifyEmail($email){
			$stmt = $this->conn->prepare('SELECT * FROM PLAYERS WHERE EMAIL = ?');
			$stmt->bindParam(1, $email, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				$_SESSION['errorRegister'] = "<h6 style='color:red;'><strong>Error: </strong>Por favor insira outro e-mail, esse já está sendo utilizado</h6>";
				header('location: register.php');
			else:
				$_SESSION['errorRegister'] = null;
				return false;
			endif;
		}

		public function verifyUser($user){
			$stmt = $this->conn->prepare('SELECT * FROM PLAYERS WHERE USERNAME = ?');
			$stmt->bindParam(1, $user, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				$_SESSION['errorRegister'] = "<h6 style='color:red;'><strong>Error: </strong>Por favor insira outro Nome de usuário, esse já está sendo utilizado</h6>";
				header('location: registerUserInfo.php');
			else:
				$_SESSION['errorRegister'] = null;
				return false;
			endif;
		}
	}
?>
