<?php
  class Historic
  {

    public function __construct()
    {
      require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
    }

    public function viewHistory(){
      $stmt = $this->conn->prepare('SELECT * FROM HISTORIC WHERE PLAYER1 = ? OR PLAYER2 = ?');
      $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
      $stmt->bindParam(2, $_COOKIE['id'], PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->rowCount() > 0):
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        }
      else:
        echo "<strong style='color: black;'><h3>Participe de campeonatos para que apareça as suas partidas em seu historico</h1></strong>";
      endif;
    }

    public function myChamp(){
      $validate = $this->conn->prepare('SELECT NAME, IDPICTURE FROM CHAMPIONSHIPS');
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {

        $realName = $row['REAL_NAME'];
        $name     = $row['NAME'];
        $idPic    = $row['IDPICTURE'];

        $stmt = $this->conn->prepare("SELECT * FROM $name INNER JOIN PICTURES WHERE IDPLAYER = ? AND PICTURE.IDPICTURE = ?");
        $stmt->bindValue(1, $_COOKIE['id'], PDO::PARAM_INT);
        $stmt->bindValue(2, $idPic, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='elementTorn_tornWrap'>
    							<div class='elementTorn_tornImg'>
    								<img src='{$row["PICTURE"]}' alt=''>
    							</div>
    							<div class='elementTorn_tornName'>
    								<h1>$realName</h1>
    							</div>
    						</div>";
        }
      }
    }
  }

?>
