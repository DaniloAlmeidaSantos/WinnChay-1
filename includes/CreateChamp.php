<?php 
	class Championship
	{
		private $conn;

		public function __construct()
		{
			require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
		}

		// Quando este método é chamado, é realizado o processo de inserção de dados na tabela NUMPLAYERS
		public function createNumPlayers($nPlayers){
			$stmt = $this->conn->prepare('INSERT INTO NUMPLAYERS (NAME_CHAMP, IDADM, NUMPLAYERS) VALUES (?,?,?)');
			$stmt->bindParam(1, $_SESSION["nChamp"], PDO::PARAM_STR);
			$stmt->bindValue(2, 1, PDO::PARAM_INT);
			$stmt->bindParam(3, $nPlayers, PDO::PARAM_INT);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				return true;
			else:
				return false;
			endif;
		}

		// Quando este método é chamado, é realizado o processo de inserção de dados na tabela CHAMPIONSHIPS
		public function createChamp($ic, $ip, $a, $sd, $fd, $d){
			$stmt = $this->conn->prepare("INSERT INTO CHAMPIONSHIPS (NAME, IDCATEGORY, START_DATE, FINAL_DATE, IDPLATAFORM, AWARDS, DESCRIPTION, IDADM, IDNUMPLAYERS) VALUES(?,?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $_SESSION["nChamp"], PDO::PARAM_STR);
			$stmt->bindParam(2, $ic, PDO::PARAM_INT);
			$stmt->bindParam(3, $sd, PDO::PARAM_STR);
			$stmt->bindParam(4, $fd, PDO::PARAM_STR);
			$stmt->bindParam(5, $ip, PDO::PARAM_INT);
			$stmt->bindParam(6, $a, PDO::PARAM_STR);
			$stmt->bindParam(7, $d, PDO::PARAM_STR);
			$stmt->bindValue(8, 1, PDO::PARAM_INT);
			$stm->execute();

			if ($stmt->rowCount() > 0):
				return true;
			else:
				return false;
			endif;
		}

		// Quando este método é chamado, é realizado o processo de criação de tabelas para campeonatos
		public function createTb(){
			// Definindo o nome do campeonato
			$_SESSION["nChamp"] = 'Championship_'. time() . '_WinnChay';

			// Criando a tabela do campeonato
			$stmt = $this->conn->prepare('CREATE TABLE '.$_SESSION["nChamp"].'(
				IDPLAYER INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				IDCHAMP INT(11) NOT NULL,
				USERNAME VARCHAR(16) NOT NULL,
				PHONE CHAR(14) NOT NULL,

				CONSTRAINT FK_IDCHAMP_CHAMP_'.$_SESSION["nChamp"].'  FOREIGN KEY (IDCHAMP) REFERENCES CHAMPIONSHIPS (IDCHAMP)
			)');
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				return true;
			else:
				return false;
			endif;
		}

		// Quando este método é chamado, é realizado a inserção de dados na tabela criada pelo USUÁRIO
		public function insertChamp($u, $p){
			$validate = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS WHERE NAME = ?');
			$validate->bindParam(1, $_SESSION["nChamp"], PDO::PARAM_STR);
			$validate->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$id = $row['IDCHAMP'];
			}

			$stmt = $this->conn->prepare('INSERT INTO '.$_SESSION["nChamp"].' (IDCHAMP, USERNAME, PHONE) VALUES (?,?,?)');
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			$stmt->bindParam(2, $u, PDO::PARAM_STR);
			$stmt->bindParam(3, $p, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				echo "Feita a inserção!!!";
				//header('location:pageCreateChamp.php');
			endif;
		}
	}
?>