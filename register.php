<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WinnChay - Cadastro</title>
    <link rel="shortcut icon" href="img/Logo/logo3.png">
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
    <form action="" method="POST">
      <div class="boxCadastro">
        <?php
          session_start();
          if (isset($_SESSION['errorRegister'])):
            echo $_SESSION['errorRegister']."<br>";
          endif;
        ?>
        <center>
          <div class="inputBox">
            <input type="text" name="txtEmail" maxlength="50" autocomplete="off" autofocus required>
            <label>E-Mail</label>
          </div>
          <div class="inputBox">
            <input type="text" name="txtCEmail" maxlength="50" autocomplete="off" required>
            <label>Confirmar E-Mail</label>
          </div>
          <div class="inputBox">
            <input type="password" name="txtPwd" maxlength="16" autocomplete="off" required>
            <label>Senha</label>
          </div>
          <div class="inputBox">
            <input type="password" name="txtCPwd" maxlength="16" autocomplete="off" required>
            <label>Confirmar senha</label>
          </div>
          <button class="buttonCadastro" name="btnRegister">Cadastrar</button>
          <br>
        </center>
      </div>
    </form>

    <?php
      include 'includes/Register.php';
      $register = new Register();
      if (isset($_POST['btnRegister'])):
        if ($register->verifyEmail($_POST['txtEmail']) == false):
          // Parâmetros que serão enviados
          $_SESSION['emailRegister']  = $_POST['txtEmail'];
          $_SESSION['pwdRegister']    = $_POST['txtPwd'];
          // Verificando se o E-Mail e a senha são correspondentes
          if ($_POST['txtEmail'] == $_POST['txtCEmail'] && $_POST['txtPwd'] == $_POST['txtCPwd']):
            header('location: registerUserInfo.php');
          endif;
        endif;
      endif;
    ?>
  </body>
</html>
