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
		public function createNumPlayers($idAdm, $nPlayers){
			$stmt = $this->conn->prepare('INSERT INTO NUMPLAYERS (NAME_CHAMP, IDADM, NUMPLAYERS) VALUES (?,?,?)');
			$stmt->bindParam(1, $name, PDO::PARAM_STR);
			$stmt->bindParam(2, $idAdm, PDO::PARAM_INT);
			$stmt->bindParam(3, $nPlayers, PDO::PARAM_INT);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				return true;
			return false;
		}

		// Quando este método é chamado, é realizado o processo de inserção de dados na tabela CHAMPIONSHIPS
		public function createChamp($ic, $ip, $n, $a, $sd, $fd, $d){
			$stmt = $this->conn->prepare("INSERT INTO CHAMPIONSHIPS (NAME, IDCATEGORY, START_DATE, FINAL_DATE, IDPLATAFORM, AWARDS, DESCRIPTION) VALUES(?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $n, PDO::PARAM_STR);
			$stmt->bindParam(2, $ic, PDO::PARAM_INT);
			$stmt->bindParam(3, $sd, PDO::PARAM_STR);
			$stmt->bindParam(4, $fd, PDO::PARAM_STR);
			$stmt->bindParam(5, $ip, PDO::PARAM_INT);
			$stmt->bindParam(6, $a, PDO::PARAM_STR);
			$stmt->bindParam(7, $d, PDO::PARAM_STR);
			$stm->execute();

			if ($stmt->rowCount() > 0):
				return true;
			return false;
		}

		// Quando este método é chamado, é realizado o processo de criação de tabelas para campeonatos
		public function createTb($idAdm, $idCategory){
			// Definindo o nome do campeonato
			$_SESSION["nChamp"] = 'Championship_'. time() . '_WinnChay';

			// Criando a tabela do campeonato
			$stmt = $this->conn->prepare('CREATE TABLE '.$_SESSION["nChamp"].'(
				IDPLAYER INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				IDCHAMP INT(11) NOT NULL,
				USERNAME VARCHAR(16) NOT NULL,

				CONSTRAINT FK_IDCHAMP_CHAMP_'.$_SESSION["nChamp"].'  FOREIGN KEY (IDCHAMP) REFERENCES CHAMPIONSHIPS (IDCHAMP)
			)');
			$stmt->execute();

			if ($stmt->rowCount()):
				header('location:pageCreateChamp.php');
			endif;
		}
	}
?>