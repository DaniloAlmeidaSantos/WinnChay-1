<?php
  class Chat
  {
    private $conn;

    public function __construct()
    {
      require_once '../config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
    }

    public function startChat(){

    }
    
  }
?>