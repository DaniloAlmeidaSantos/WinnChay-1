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

    public function follower($id){
      if (isset($_POST['btnFollow'])):
        $stmt = $this->conn->prepare('INSERT INTO FOLLOWERS (IDFOLLOWER, IDFOLLOWED) VALUES (?,?)');
        $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0):
          return true;
        else:
          echo "<p style='color: white'><b>Error:</b> Estamos enfrentando algum problema, por favor tente seguir está pessoa mais tarde</p>";
          return true;
        endif;
      elseif (isset($_POST['btnUnfollow'])):
        $stmt = $this->conn->prepare('DELETE FROM FOLLOWERS WHERE FOLLOWER = ? AND FOLLOWED = ?');
        $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0):
          return true;
        else:
          echo "<p style='color: white'><b>Error:</b> Estamos enfrentando algum problema, por favor tente mais tarde</p>";
          return false;
        endif;
      endif;
    }

    public function viewButton($id){
      $stmt = $this->conn->prepare('SELECT * FROM FOLLOWERS WHERE FOLLOWER = ? AND FOLLOWED = ?');
      $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
      $stmt->bindParam(2, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->rowCount() > 0):
        echo "<button>Seguindo</button>";
      else:
        echo "<button>Seguir</button>";
      endif;
    }
  }
?>