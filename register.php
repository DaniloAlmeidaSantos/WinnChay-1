<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WinnChay - Cadastro</title>
  	<link rel="stylesheet" href="css/style.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
  </head>
  <body class="bodyLogin">
        <div class="elementLeft">
            <img class="elementHand" src="img/Src/hand.png" alt="hand/mão">
            <img class="elementPs4" src="img/Src/controlePS4.png" alt="controle ps4">
            <img class="elementXBOX" src="img/Src/controleXBOX.png" alt="controle ps4">
        </div>
            <h1>Cadastre-se:</h1>
            <form action="emailConfirmation.php" method="POST">
              <div class="boxCadastro">
                <center>
                  <div class="inputBox">
                    <input type="text" name="txtEmail" maxlength="50" required>
                    <label>E-Mail</label>
                  </div>
                  <div class="inputBox">
                    <input type="text" name="txtCEmail" maxlength="50" required>
                    <label>Confirmar E-Mail</label>
                  </div>
                  <div class="inputBox">
                    <input type="password" name="txtPwd" maxlength="16" required>
                    <label>Senha</label>
                  </div>
                  <div class="inputBox">
                    <input type="password" name="txtCPwd" maxlength="16" required>
                    <label>Confirmar senha</label>
                  </div>
                  <button class="buttonCadastro" name="btnRegister">Cadastrar</button>
                  <br>
                </center>
              </div>
            </form>
    
    <?php
      if (isset($_POST['btnRegister'])):
        // Parâmetros que serão enviados
        $e = $_POST['txtEmail'];
        $pwd = $_POST['txtPwd'];

        // Verificando se o E-Mail e a senha são correspondentes
        if ($_POST['txtEmail'] == $_POST['txtCEmail'] && $_POST['txtPwd'] == $_POST['txtCPwd']):
          include 'includes/Register.php';
          $conn = new Register();
           // Passando os Parâmetros
          $conn->createUser($fn, $ln, $u, $e, $pwd, $p);
        else:
          // Caso a estrutura de decisão não for verdadeira, esta linha retorna um erro
          echo "<h6 style='color: white;'> Senha ou E-Mail não correspondentes </h6>";
        endif;
      endif;
    ?>
  </body>
</html>
