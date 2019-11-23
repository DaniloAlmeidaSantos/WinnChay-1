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
    public function levelChampion($i){
      $validate = $this->conn->prepare('SELECT MAXPOINTS, POINTS FROM PLAYERS WHERE IDPLAYER = ?');
      $validate->bindParam(1, $i, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $mxPoints = $row['MAXPOINTS'];
        $points = $row['POINTS'] + 120 + 30;
      }

      if ($points >= $mxPoints):
        $stmt = $this->conn->prepare('UPDATE PLAYERS SET LEVEL = LEVEL + 1, POINTS = ?, MAXPOINTS = MAXPOINTS * 2 WHERE IDPLAYER = ?');
        $stmt->bindParam(1, $points, PDO::PARAM_INT);
        $stmt->bindParam(2, $i, PDO::PARAM_INT);
        $stmt->execute();
      else:
        $stmt = $this->conn->prepare('UPDATE PLAYERS SET POINTS = POINTS + ? WHERE IDPLAYER = ?');
        $stmt->bindParam(1, $points, PDO::PARAM_INT);
        $stmt->bindParam(2, $i, PDO::PARAM_INT);
        $stmt->execute();
      endif;
    }

    public function levelWins($i){
      $validate = $this->conn->prepare('SELECT MAXPOINTS, POINTS FROM PLAYERS WHERE IDPLAYER = ?');
      $validate->bindParam(1, $i, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $mxPoints = $row['MAXPOINTS'];
        $points = $row['POINTS'] + 30;
      }

      if ($points >= $mxPoints):
        $stmt = $this->conn->prepare('UPDATE PLAYERS SET LEVEL = LEVEL + 1, POINTS = ?, MAXPOINTS = MAXPOINTS * 2 WHERE IDPLAYER = ?');
        $stmt->bindParam(1, $points, PDO::PARAM_INT);
        $stmt->bindParam(2, $i, PDO::PARAM_INT);
        $stmt->execute();
      else:
        $stmt = $this->conn->prepare('UPDATE PLAYERS SET POINTS = POINTS + ? WHERE IDPLAYER = ?');
        $stmt->bindParam(1, $points, PDO::PARAM_INT);
        $stmt->bindParam(2, $i, PDO::PARAM_INT);
        $stmt->execute();
      endif;
    }

    public function levelDraws($i){
      $validate = $this->conn->prepare('SELECT MAXPOINTS, POINTS FROM PLAYERS WHERE IDPLAYER = ?');
      $validate->bindParam(1, $i, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $mxPoints = $row['MAXPOINTS'];
        $points = $row['POINTS'] + 15;
      }

      if ($points >= $mxPoints):
        $stmt = $this->conn->prepare('UPDATE PLAYERS SET LEVEL = LEVEL + 1, POINTS = ?, MAXPOINTS = MAXPOINTS * 2 WHERE IDPLAYER = ?');
        $stmt->bindParam(1, $points, PDO::PARAM_INT);
        $stmt->bindParam(2, $i, PDO::PARAM_INT);
        $stmt->execute();
      else:
        $stmt = $this->conn->prepare('UPDATE PLAYERS SET POINTS = POINTS + ? WHERE IDPLAYER = ?');
        $stmt->bindParam(1, $points, PDO::PARAM_INT);
        $stmt->bindParam(2, $i, PDO::PARAM_INT);
        $stmt->execute();
      endif;
    }

    public function level($i){
      $validate = $this->conn->prepare('SELECT MAXPOINTS, POINTS, LEVEL FROM PLAYERS WHERE IDPLAYER = ?');
      $validate->bindParam(1, $i, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $points = ($row['POINTS'] * 100) / $row['MAXPOINTS'];
        echo "<div class='progress-bar' role='progressbar' aria-valuenow='{$row['POINTS']}' style='width: $points%;background-color: #925EFF;' aria-valuemin='0' aria-valuemax='{$row["MAXPOINTS"]}'>XP - Level {$row["LEVEL"]}</div>";
      }
    }

    // Quando este método é chamado, é realizado a atualização do número de vitórias do jogador
    public function wins($i){
      $validate = $this->conn->prepare("SELECT IDPLAYER FROM {$_SESSION["nChamp"]} WHERE IDPLAYER = ?");
      $validate->bindParam(1, $i, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['IDPLAYER'];
      }

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
    public function loses($i){
      $validate = $this->conn->prepare("SELECT IDPLAYER FROM {$_SESSION["nChamp"]} WHERE IDPLAYER = ?");
      $validate->bindParam(1, $i, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['IDPLAYER'];
      }

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
    public function draws($i){
      $validate = $this->conn->prepare("SELECT IDPLAYER FROM {$_SESSION["nChamp"]} WHERE IDPLAYER = ?");
      $validate->bindParam(1, $i, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['IDPLAYER'];
      }

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
          echo "<center>".$row['P1VICTORY']." - ".$row['PLAYER1']." VS ".$row['PLAYER2']." - ".$row['P2VICTORY']."<br><br></center>";
        }
        return true;
      else:
        echo "<b>Error: </b>Estamos encontrando problemas no momento, tente visualizar novamente mais tarde";
      endif;
    }

    public function updateChamp($p1, $p2){
      $stmt = $this->conn->prepare('UPDATE HISTORIC SET P1VICTORY = ?, P2VICTORY = ? WHERE PLAYER1 = ? AND PLAYER2 = ? AND NAME_CHAMP = ?');
      $stmt->bindParam(1, $p1, PDO::PARAM_STR);
      $stmt->bindParam(2, $p2, PDO::PARAM_STR);
      $stmt->bindParam(3, $_SESSION['nChamp'], PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0):
        return true;
      else:
        echo "<b>Error: </b>Não foi possível fazer isso no momento, tente mais tarde";
      endif;
    }

    // Quando este método é chamado, é realizado a atualização de dados dos PLAYERS que venceram seus adversários
    public function changeTable($p1, $p2){
      $validate = $this->conn->prepare('UPDATE HISTORIC SET P1VICTORY = ?, P2VICTORY = ? WHERE PLAYER1 = ? AND PLAYER2 = ? AND NAME_CHAMP = ?');
      $validate->bindParam(1, $p1, PDO::PARAM_STR);
      $validate->bindParam(2, $p2, PDO::PARAM_STR);
      $validate->execute();

      if ($validate->rowCount() > 0):
        return true;
      else:
        echo "<p style='color: white'><b>Error: </b>Estamos enfrentando um problema inesperado, tente mais tarde!</p>";
        return false;
      endif;
    }

    // Quando este método é chamado, é realizado a inserção de novos dados de PLAYERS vencedores de suas respectivas chaves e formando novas
    public function attTable(){
      $validate = $this->conn->prepare("SELECT * FROM HISTORIC WHERE NAME_CHAMP = ?");
      $validate->bindParam(1, $_SESSION['nChamp'], PDO::PARAM_STR);
      $validate->execute();
      $n = 0;

      // Definindo vencedores de suas respectivas chaves
      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        // Fazendo a verificação de vitória do PLAYER1, para que passe de fase
        if($row['P1VICTORY'] == 'Vitória'):
          $n++;
          $_SESSION["p$n"] = $row['PLAYER1'];
        endif;
        // Fazendo a verificação de vitória do PLAYER2, para que passe de fase
        if ($row['P2VICTORY'] = 'Vitória'):
          $n++;
          $_SESSION["p$n"] = $row['PLAYER2'];
        endif;
      }

      $j = 0;
      for ($i=1; $i <= $n; $i++):
        $j = $i + 1;
        // Inserindo no banco de dados as partidas que serão feitas.
        $stmt = $this->conn->prepare('INSERT INTO HISTORIC (NAME_CHAMP, PLAYER1, PLAYER2) VALUES (?,?,?)');
        $stmt->bindParam(1, $_SESSION['nChamp'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_SESSION["p$i"], PDO::PARAM_INT);
        $stmt->bindParam(3, $_SESSION["p$j"], PDO::PARAM_INT);
        $stmt->execute();

        $i++;
      endfor;
    }

    // Qunado este método é chamado, é realizado um retorno de registro formando os chaveamento do campeonato
    public function viewTable(){
      $stmt = $this->conn->prepare("SELECT * FROM HISTORIC WHERE P1VICTORY = 'NO' AND P2VICTORY = 'NO' AND NAME_CHAMP = ?");
      $stmt->bindValue(1, $_SESSION["nChamp"], PDO::PARAM_STR);
      $stmt->execute();

      // Formando as chaves
      if ($stmt->rowCount() == 1 && $stmt->rowCount() < 2):
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "Final: ".$row['PLAYER1']." VS ".$row['PLAYER2'];
        }
        return true;
      else:
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo $row['PLAYER1']." VS ".$row['PLAYER2']. "<br><hr>";
        }
        return false;
      endif;
    }
  }
?>
