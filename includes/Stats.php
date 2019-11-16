<?php
  class Stats
  {
    private $conn;

    public function __construct()
    {
      require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
      // Defininodo as váriaveis de passagem de dados do gráfico
      $_SESSION['wins'] = 0;
      $_SESSION['loses'] = 0;
      $_SESSION['draws'] = 0;
    }

    // Quando este método é chamado, é realizado uma consulta na tabela PLAYERS
    public function graphics($i){
      $stmt = $this->conn->prepare('SELECT WINS, LOSES, DRAWS FROM PLAYERS WHERE IDPLAYER = ?');
      $stmt->bindParam(1, $i, PDO::PARAM_INT);
      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Passando dados para as variáveis do gráfico
        $_SESSION['wins'] = $row['WINS'];
        $_SESSION['loses'] = $row['LOSES'];
        $_SESSION['draws'] = $row['DRAWS'];
      }

    }
  }

?>
