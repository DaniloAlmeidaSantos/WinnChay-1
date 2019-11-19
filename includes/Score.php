<?php
  class Score
  {
    private $conn;

    public function __construct()
    {
      require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
    }

    // Quando este método é chamado, é realizado a atualização do número de vitórias do jogador
    public function wins($id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET WINS = WINS + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0):
        return true;
      else:
        echo "<b>Error: </b>Foi detectado um erro, volte mais tarde";
      endif;
    }

    // Quando este método é chamado, é realizado a atualização do número de derrotas do jogador
    public function loses($id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET LOSES = LOSES + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0):
        return true;
      else:
        echo "<b>Error: </b>Foi detectado um erro, volte mais tarde";
      endif;
    }

    // Quando este método é chamado, é realizado a atualização do número de empates do jogador
    public function draws($id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET DRAWS = DRAWS + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0):
        return true;
      else:
        echo "<b>Error: </b>Foi detectado um erro, volte mais tarde";
      endif;
    }

    // Quando este método é chamaado, é realizado uma pesquisa na tabela do histórico de partidas do jogador
    public function viewHistoric(){
      $stmt = $this->conn->prepare('SELECT * FROM HISTORIC WHERE PLAYER1 = ? OR PLAYER2 = ?');
      $stmt->bindValue(1, 1, PDO::PARAM_INT);
      $stmt->bindValue(2, 1, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->rowCount() > 0):
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<center>".$row['T1VICTORY']." - ".$row['PLAYER1']." VS ".$row['PLAYER2']." - ".$row['T2VICTORY']."<br><br></center>"; 
        }
        return true;
      else:
        echo "<b>Error: </b>Estamos encontrando problemas no momento, tente visualizar novamente mais tarde";
      endif;
    }

    public function updateChamp($o, $t, $n){
      $stmt = $this->conn->prepare('UPDATE HISTORIC SET P1VICTORY = ?, P2VICTORY = ? WHERE NAME_CHAMP = ?');
      $stmt->bindParam(1, $o, PDO::PARAM_STR);
      $stmt->bindParam(2, $t, PDO::PARAM_STR);
      $stmt->bindParam(3, $_SESSION['nChamp'], PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0):
        return true;
      else:
        echo "<b>Error: </b>Não foi possível fazer isso no momento, tente mais tarde";
      endif;
    }
  }
?>