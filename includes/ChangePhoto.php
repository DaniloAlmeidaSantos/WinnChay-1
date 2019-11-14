<?php
  class ChangePhoto
  {

    private $conn;

    public function __construct()
    {
      require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
    }

    // Passando as propriedades que as fotos de perfil deve seguir
    public function paramFotos(){
        $_UP['folder'] = 'uploads/';
        $_UP['size'] = 1024*1024*2; // 2MB
        $_UP['extensions'] = array('jpg', 'png', 'jpeg');
        $_UP['rename'] = true;
        $arquivo = $_FILES['image'];

        $extesion = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

        if (array_search($extesion, $_UP['extensions']) === false):
            echo "<h5 style='color: red;'><b>ERRO:</b> Por favor insira nos formato .jpg, .png ou .jpeg</h6>";
            exit;
        elseif ($_UP['size'] < $arquivo['size']):
            echo "<h5 style='color: red;'><b>ERRO:</b> Por favor insira um imagem com o tamanho menor que 2MB!</h6>";
            exit;
        else:
            $_SESSION["final_name"] = $arquivo['name'];
        endif;

        if (move_uploaded_file($arquivo['tmp_name'], $_UP['folder'].$_SESSION["final_name"])):
            return true;
        else:
            echo "<h5 style='color: red;'><b>ERRO:</b>Não foi possível fazer o upload da imagem neste momento, tente mais tarde!</h6>";
            return false;
            exit;
        endif;
    }
    
    public function profilePicture($p){

    }
  }

?>
