<?php
	class Championship
	{
		private $conn;

		public function __construct()
		{
			require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();

			// Definindo o nome do campeonato
			$_SESSION["nChamp"] = 'Championship_'. time() . '_WinnChay';
		}

		// Quando este método é chamado, é realizado o processo de inserção de dados na tabela NUMPLAYERS
		public function createNumPlayers($nPlayers){
			echo $_SESSION["nChamp"];
			$stmt = $this->conn->prepare('INSERT INTO NUMPLAYERS (NAME_CHAMP, IDADM, NUMPLAYERS) VALUES (?,?,?)');
			$stmt->bindParam(1, $_SESSION["nChamp"], PDO::PARAM_STR);
			$stmt->bindParam(2, $_COOKIE['id'], PDO::PARAM_INT);
			$stmt->bindParam(3, $nPlayers, PDO::PARAM_INT);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				return true;
			else:
				return false;
			endif;
		}

		// Quando este método é chamado, é realizado o processo de inserção de dados na tabela CHAMPIONSHIPS
		public function createChamp($sd, $ip, $a, $d, $n){
			$validate = $this->conn->prepare('SELECT IDNUMPLAYERS FROM NUMPLAYERS WHERE IDADM = ?');
			$validate->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
			$validate->execute();

			while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
				$np = $row['IDNUMPLAYERS'];
			}

			$stmt = $this->conn->prepare("INSERT INTO CHAMPIONSHIPS (NAME, START_DATE, IDPLATFORM, AWARDS, DESCRIPTION, IDADM, IDNUMPLAYERS, NAME_CHAMP) VALUES(?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $_SESSION["nChamp"], PDO::PARAM_STR);
			$stmt->bindParam(2, $sd, PDO::PARAM_STR);
			$stmt->bindParam(3, $ip, PDO::PARAM_INT);
			$stmt->bindParam(4, $a, PDO::PARAM_STR);
			$stmt->bindParam(5, $d, PDO::PARAM_STR);
			$stmt->bindParam(6, $_COOKIE['id'], PDO::PARAM_INT);
			$stmt->bindParam(7, $np, PDO::PARAM_INT);
			$stmt->bindParam(8, $n, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				return true;
			else:
				return false;
			endif;
		}

		// Quando este método é chamado, é realizado o processo de criação de tabelas para campeonatos
		public function createTb(){
			// Criando a tabela do campeonato
			$stmt = $this->conn->prepare("CREATE TABLE ".$_SESSION["nChamp"]."(
				IDPCHAMP INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				IDCHAMP INT(11) NOT NULL,
				IDHISTORIC INT(11),
				IDPLAYER INT(11) NOT NULL,
				USERNAME VARCHAR(16) NOT NULL,
				PHONE CHAR(14) NOT NULL,
				VICTORY CHAR(3) NOT NULL DEFAULT 'NO',
				CHAMPION CHAR(3) NOT NULL DEFAULT 'NO',

				CONSTRAINT FK_IDPLAYERS_{$_SESSION["nChamp"]} FOREIGN KEY (IDPLAYER) REFERENCES PLAYERS (IDPLAYER),
				CONSTRAINT FK_IDHISTORIC_{$_SESSION["nChamp"]} FOREIGN KEY (IDHISTORIC) REFERENCES HISTORIC (IDHISTORIC),
				CONSTRAINT FK_IDCHAMP_CHAMP_{$_SESSION["nChamp"]}  FOREIGN KEY (IDCHAMP) REFERENCES CHAMPIONSHIPS (IDCHAMP)
			)");
			$stmt->execute();

			return true;
		}

		// Quando este método é chamado, é realizado a inserção de dados na tabela criada pelo USUÁRIO
		public function insertChamp($i, $u, $p){
			$validate = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS WHERE NAME = ?');
			$validate->bindParam(1, $_SESSION["nChamp"], PDO::PARAM_STR);
			$validate->execute();

			while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
				$id = $row['IDCHAMP'];
			}

			$stmt = $this->conn->prepare('INSERT INTO '.$_SESSION["nChamp"].' (IDPLAYER, IDCHAMP, IDHISTORIC, USERNAME, PHONE) VALUES (?,?,?,?,?)');
			$stmt->bindParam(1, $i, PDO::PARAM_INT);
			$stmt->bindParam(2, $id, PDO::PARAM_INT);
			$stmt->bindParam(3, $i, PDO::PARAM_INT);
			$stmt->bindParam(4, $u, PDO::PARAM_STR);
			$stmt->bindParam(5, $p, PDO::PARAM_STR);
			$stmt->execute();

			if ($stmt->rowCount() > 0):
				header('location:pageChamp.php');
			endif;
		}
	}
?>