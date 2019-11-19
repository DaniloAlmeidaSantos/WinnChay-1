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

    public function wins($id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET WINS = WINS + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0){
        return true;
      }
    }

    public function loses($id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET LOSES = LOSES + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0){
        return true;
      }
    }

    public function draws($id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET DRAWS = DRAWS + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numCount() > 0){
        return true;
      }
    }
  }
?>