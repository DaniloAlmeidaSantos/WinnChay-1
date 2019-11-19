<?php
  class Organize
  {
    private $conn;

    public function __construct()
    {
      require_once '../config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
    }

    // Quando este método é chamado, é realizado o sorteio das chaves de confrontos do campeonato
    public function competitors($n){
      // Determinando o tipo das váriaveis para contagem
      $count = 0;
      $players = array();
      // Fazendo a contagem e o sorteio das chaves de cada confronto
      do{
        // $n é o parâmetro passado pelo usuário para determinar no número de jogadores do campeonato
        $value = rand(1,$n);
        if(in_array($value,$players) == false){
            $count++;
            $players[$count] = $value;
        }
      }while($count < $n);

      // Retornando registros do banco
      $validate = $this->conn->prepare('SELECT * FROM CHAMPIONSHIPS WHERE IDADM = ?');
      $validate->bindParam(1, $_COOKIE['id'], PDO::PARAM_INT);
      $validate->execute();

      while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
        // Pegando o nome do campeonato e passando para uma variável
        $name = $row['NAME'];
      }

      for ($i=1; $i <= $n; $i++) { 
        $j = $i + 1;

        // Inserindo no banco de dados as partidas que serão feitas.
        $stmt = $this->conn->prepare('INSERT INTO HISTORIC (NAME_CHAMP, PLAYER1, PLAYER2) VALUES (?,?,?)');
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $players[$i], PDO::PARAM_INT);
        $stmt->bindParam(3, $players[$j], PDO::PARAM_INT);
        $stmt->execute();
        
        $i++;
      }
    }
  }
?>