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
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET FOLLOWERS = FOLLOWERS + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();
    }
  }
?>