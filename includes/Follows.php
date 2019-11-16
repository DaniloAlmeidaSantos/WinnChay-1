<?php
  class Follows
  {
    private $conn;

    public function __construct()
    {
      require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
    }

    public function follows($id){
      $validate = $this->conn->prepare('SELECT FOLLOWERS FROM PLAYERS WHERE IDPLAYER = ?');
      $validate->bindParam(1, $f, PDO::PARAM_STR);
      $validate->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $f = $row['FOLLOWERS'];
        $f++;
      }

      $stmt = $this->conn->prepare('UPDATE PLAYERS SET FOLLOWERS = ? WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $f, PDO::PARAM_INT);
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();
    }
  }

?>