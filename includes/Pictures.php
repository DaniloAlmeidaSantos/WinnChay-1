<?php
	class Pictures
	{
		private $conn;

		public function __construct()
		{
			require_once 'config/DbConnect.php';

			// Chamando o método connect da classe Database e inicializando um link de conexão
			$this->conn = connect();
		}

		// Quando este método é chamado, parâmetros de inserção da imagem são definidos
		public function paramPictures(){
			// Definindo a pasta para upload
			$_UP['folder'] = 'uploads/up_profile';
			// Definindo o tamanho do arquivo
      $_UP['size'] = 1024*1024*2; // 2MB
      // Definindo as extensões que serão aceitas
      $_UP['extensions'] = array('jpg', 'png', 'jpeg');
      $_UP['rename'] = true;
      // Definindo a váriavel para receber a imagem
      $file = $_FILES['image'];

      $extesion = pathinfo($file['name'], PATHINFO_EXTENSION);

      if (array_search($extesion, $_UP['extensions']) === false):
					// Se a extensão da imagem não for a requerida, é efetuada uma mensagem de erro na tela do usuário
          echo "<h5 style='color : red;'><b>ERROR:</b> Por favor insira nos formato .jpg, .png ou .jpeg</h6>";
          exit;
      elseif ($_UP['size'] < $file['size']):
					// Se o tamanho da imagem não for a requerida, é efetuada uma mensagem de erro na tela do usuário
          echo "<h5 style='color: red;'><b>ERROR:</b> Por favor insira um imagem com o tamanho menor que 2MB!</h6>";
          exit;
      else:
					// Determinando o nome do arquivo
          $_SESSION["final_name"] = $file['name'];
      endif;

      // Movendo o arquivo e renomeando o arquivo.
      if (move_uploaded_file($file['tmp_name'], $_UP['folder'].$_SESSION["final_name"])):
					// Caso seja possível mover a imagem para a pasta destinada, é retornado verdadeiro
          return true;
      else:
					// Caso não seja possível mover a imagem para a pasta destinada, é efutado uma mensagem de erro na tela do usuário e retorna false
          echo "<h5 style='color: red;'><b>ERRO:</b>Não foi possível fazer o upload da imagem neste momento, tente mais tarde!</h6>";
          return false;
          exit;
      endif;
		}

    // Quando este método é chamado, é realizado o processo de inserção da imagem
		public function createPicture($p){
			$stmt = $this->conn->prepare('INSERT INTO PROFILE_PICTURES (PICTURE) VALUES (?)');
      $stmt->bindParam(1, $p, PDO::PARAM_STR);
      $stmt->execute();
		}

		// Quand este método é chamado, é realizado o retorno de informações do banco de dados
    public function imageTeam($i){
        $stmt  = $this->conn->prepare('SELECT * FROM PICTURES INNER JOIN TEAM WHERE PICTURES.IDTEAM = TEAM.IDTEAM');
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row['PICTURE'];
        }
    }

		// Quando este método é chamado, é realizado um retornon de informações do banco de dados
		public function changeChamp($i, $img){
			$validate = $this->conn->prepare('SELECT IDPICTURE FROM CHAMPIONSHIPS WHERE IDCHAMP = ?');
			$validate->bindParam(1, $i, PDO::PARAM_INT);
			$validate->execute();

			while ($row = $validate->fetch(PDO::FETCH_ASSOC)) {
				$id = $row['IDPICTURE'];
			}

			$stmt = $this->conn->prepare('UPDATE PICTURES SET PICTURE = ? WHERE IDPICTURE = ?');
			$stmt->bindParam(1, $img, PDO::PARAM_STR);
			$stmt->bindParam(2, $id, PDO::PARAM_INT);
			$stmt->execute();
		}
	}
?>
