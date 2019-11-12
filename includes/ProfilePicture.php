<?php 
	class ProfilePicture
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
            $arquivo = $_FILES['image'];

            $extesion = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

            if (array_search($extesion, $_UP['extensions']) === false):
                echo "<h5 style='color: red;'><b>ERROR:</b> Por favor insira nos formato .jpg, .png ou .jpeg</h6>";
                exit;
            elseif ($_UP['size'] < $arquivo['size']):
                echo "<h5 style='color: red;'><b>ERROR:</b> Por favor insira um imagem com o tamanho menor que 2MB!</h6>";
                exit;
            else:
                $_SESSION["final_name"] = $arquivo['name'];
            endif;

            // Movendo o arquivo e renomeando o arquivo.
            if (move_uploaded_file($arquivo['tmp_name'], $_UP['folder'].$_SESSION["final_name"])):
                return true;
            else:
                echo "<h5 style='color: red;'><b>ERRO:</b>Não foi possível fazer o upload da imagem neste momento, tente mais tarde!</h6>";
                return false;
                exit;
            endif;
		}

		// Quando este método é chamado, é realizado o processo de inserção da foto de perfil do usuário
		public function createPicture($p){
			$stmt = $this->conn->prepare('INSERT INTO PROFILE_PICTURES (PICTURE) VALUES (?)');
			$stmt->bindParam(1, $p, PDO::PARAM_STR);
			$stmt->execute();
		}

		public function image($id){
			$stmt  = $this->conn->prepare('SELECT * FROM PROFILE_PICTURES WHERE IDPLAYER = ?');
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo $row['PICTURE'];
			}
		}
	}
?>