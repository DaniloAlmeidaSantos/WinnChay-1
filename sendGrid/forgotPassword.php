<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>WinnChay - Esqueceu a senha</title>
        <meta charset="utf-8">
      	<link rel="stylesheet" href="../css/style.css">
      	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
    </head>
    <body class="bodyLogin">
      <br><br><br>
      <center><h1 style="color: white;">REDEFINIR SENHA</h1></center>
      <div class="box" style="height: 35%;">
        <div class="container">
          <?php if (isset($_POST['btnForgot'])): ?>
            <form action='' method='POST'>
                <div class="inputBox">
                  <input type="text" name="txtEmail" required>
                  <label>Digite seu E-Mail: </label>
                  <center><button name="btnSend">Enviar código de ativação</button></center>
                </div>
                <br><br>
          <?php elseif(isset($_POST['btnSend'])): ?>
          </form>
                <form action='' method='POST'>
                  <div class="inputBox">
                      <input type="text" name="txtCodigo" maxlength="4">
                      <label>Digite o código: </label>
                      <center><button name="btnRecover">Verificar</button> &nbsp;
                      <button name="btnRepeat">Reenviar código</button></center>
                  </div>
                </form>
            <?php elseif (isset($_POST['btnRepeat'])): ?>
                <form action='' method='POST'>
                  <div class="inputBox">
                      <input type="text" name="txtCodigo" maxlength="4">
                      <label>Digite o código: </label>
                      <center><button name="btnRecover">Verificar</button> &nbsp;
                      <button name="btnRepeat">Reenviar código</button></center>
                  </div>
                </form>
            <?php endif; ?>


            <?php
                session_start();
                if (isset($_POST["btnSend"])):
                    $_SESSION['cod'] = rand(1000, 9999);
                    $_SESSION['email'] = $_POST['txtEmail'];

                    // Requisitando o composer
                    require 'vendor/autoload.php';

                    // Definindo os parâmetros de envio da mensagem
                    $from = new SendGrid\Email(null, "WinnChay@suporte.com");
                    $subject = "Recuperar senha.";
                    $to = new SendGrid\Email(null, "{$_SESSION['email']}");
                    $content = new SendGrid\Content("text/html", "Olá, <br><br>ative seu código de recuperação da sua senha: <br><br><b> Código: </b>{$_SESSION['cod']}.<br><br> Atenciosamente,<br><b> Equipe WinnChay. </b>");
                    $mail = new SendGrid\Mail($from, $subject, $to, $content);

                    // Ativando a chave da API no SednGrid
                    $apiKey = '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';
                    $sg = new \SendGrid($apiKey);

                    //Finalizando o processo
                    $response = $sg->client->mail()->send()->post($mail);
                    echo "<br><h6 style='text-align:center;color: #925EFF;'>Código enviado com sucesso!</h6>";
                elseif (isset($_POST['btnRepeat'])):
                    $_SESSION['cod'] = rand(1000, 9999);

                    // Requisitando o composer
                    require 'vendor/autoload.php';

                    // Definindo os parâmetros de envio da mensagem
                    $from = new SendGrid\Email(null, "WinnChay@suporte.com");
                    $subject = "Recuperar senha.";
                    $to = new SendGrid\Email(null, "{$_SESSION['email']}");
                    $content = new SendGrid\Content("text/html", "Olá, <br><br>ative seu código de recuperação da sua senha: <br><br><b> Código: </b>{$_SESSION['cod']}.<br><br> Atenciosamente,<br><b> Equipe WinnChay. </b>");
                    $mail = new SendGrid\Mail($from, $subject, $to, $content);

                    // Ativando a chave da API no SednGrid
                    $apiKey = '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';
                    $sg = new \SendGrid($apiKey);

                    //Finalizando o processo
                    $response = $sg->client->mail()->send()->post($mail);
                    echo "<br><h6 style='text-align:center;color: #925EFF;'>Código enviado com sucesso!</h6>";
                elseif (isset($_POST['btnRecover'])):
                    // Verificando se o código digitado é o mesmo que o enviado para o email
                    if ($_SESSION['cod'] == $_POST['txtCodigo']):
                        header('location:../includes/forgotPassword.php');
                    else:
                      echo "<form action='' method='POST'>
                            <div class='inputBox'>
                                <input type='text' name='txtCodigo' maxlength='4'>
                                <label>Digite o código: </label>
                                <center><button name='btnRecover'>Verificar</button> &nbsp;
                                <button name='btnRepeat'>Reenviar código</button></center>
                            </div>
                          </form>";
                      echo "<br><h6 style='text-align:center;color: #925EFF;'>Código digitado incorreto</h6>";
                    endif;
                endif;
            ?>
        </div>
      </div>
    </body>
</html>
