<?php
  class ChangeInfo
  {
    private $conn;

    public function __construct()
    {
        require_once 'config/DbConnect.php';

        // Chamando o método connect da classe Database e inicializando um link de conexão
        $this->conn = connect();
    }

    public function selectInfo(){
      $stmt = $this->conn->prepare('SELECT * FROM PLAYERS WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['user'] = $row['USERNAME'];
        $_SESSION['f_name'] = $row['FIRST_NAME'];
        $_SESSION['l_name'] = $row['LAST_NAME'];
        $_SESSION['email'] = $row['EMAIL'];
        $_SESSION['phone'] = $row['PHONE'];
      }
    }

    public function changeInfo($fn, $ln, $e, $c, $p, $id){
      $stmt = $this->conn->prepare('UPDATE PLAYERS SET FIRST_NAME=?, LAST_NAME=?, EMAIL=?, CPF=?, PHONE=? WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $fn, PDO::PARAM_STR);
      $stmt->bindParam(2, $ln, PDO::PARAM_STR);
      $stmt->bindParam(3, $e, PDO::PARAM_STR);
      $stmt->bindParam(4, $c, PDO::PARAM_INT);
      $stmt->bindParam(5, $p, PDO::PARAM_STR);
      $stmt->bindParam(6, $id, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->numRow() > 0):
        echo "<h5 style='color: green;'>Atualização de suas informações, realizadas com sucesso!!</h6>";
        return true;
      endif;
    }
  }
?>
