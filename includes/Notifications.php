<?php
  class Notifications
  {
    private $conn;

    public function __construct()
    {
      require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
    }

    public function dateChampionship(){
      $stmt = $this->conn->prepare('SELECT NAME FROM CHAMPIONSHIPS');
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

      }
    }

    // Quando este método é chamado, é realizado o retorno de dados das notificações dos usuários
    public function viewNotification(){
      $stmt = $this->conn->prepare('SELECT * FROM NOTIFICATIONS WHERE IDPLAYER = ?');
      $stmt->bindValue(1, 1, PDO::PARAM_INT);
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['TITLE'].' - '.$row['DESCRIPTION'];
      }
    }

    // Quando este método é chamado, é realizado a inserção de novas notificações quando o usuário passa de level
    public function levelNotification(){
      $validate = $this->conn->prepare('SELECT LEVEL FROM PLAYERS WHERE IDPLAYER = ?');
      $validate->bindValue(1, 1, PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        $level = $row['LEVEL'];
      }

      $stmt = $this->conn->prepare("INSERT INTO NOTIFICATIONS (TITLE, DESCRIPTION)  VALUES('<h3><b>Parabéns você passou de level</b></h3>','<p>Você subiu para o level <i>$level</i> continue ganhando partidas e campeonatos para que você suba mais de level</p>') WHERE IDPLAYER = ?");
      $stmt->bindValue(1,1, PDO::PARAM_INT);
      $stmt->execute();
    }
  }

?>