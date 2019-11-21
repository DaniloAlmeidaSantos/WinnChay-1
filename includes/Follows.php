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

    // Quando este método é chamado, é realizado uma atualização no número de seguidores do usuário
    public function follows($id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET FOLLOWERS = FOLLOWERS + 1 WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();
    }

    // Quando este método é chamado, é realizado as estruturas de Follow ou Unfollow.
    public function follower($id){
      // Caso seja clicado o botão Follow é realizado a inserção no banco de dados de quem o usuário está seguindo.
      if (isset($_POST['btnFollow'])):
        $stmt = $this->conn->prepare('INSERT INTO FOLLOWERS (IDFOLLOWER, IDFOLLOWED) VALUES (?,?)');
        $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0):
          return true;
        else:
          // Retorna um erro
          echo "<p style='color: white'><b>Error:</b> Estamos enfrentando algum problema, por favor tente seguir está pessoa mais tarde</p>";
          return true;
        endif;
      // Caso seja clicado o botão Unfollow é realizado a remoção no banco de dados de quem o usuário está seguindo.
      elseif (isset($_POST['btnUnfollow'])):
        $stmt = $this->conn->prepare('DELETE FROM FOLLOWERS WHERE FOLLOWER = ? AND FOLLOWED = ?');
        $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0):
          return true;
        else:
          // Retorna um erro
          echo "<p style='color: white'><b>Error:</b> Estamos enfrentando algum problema, por favor tente mais tarde</p>";
          return false;
        endif;
      endif;
    }

    // Quando este método é chamado, é realizado a verificação se o usuário já está seguindo outros usuários.
    public function viewButton($id){
      $stmt = $this->conn->prepare('SELECT * FROM FOLLOWERS WHERE FOLLOWER = ? AND FOLLOWED = ?');
      $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
      $stmt->bindParam(2, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->rowCount() > 0):
        echo "<button name='btnUnfollow'>Seguindo</button>";
      else:
        echo "<button name='btnFollow'>Seguir</button>";
      endif;
    }
  }
?>