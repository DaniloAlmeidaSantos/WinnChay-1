<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WinnChay - Contato</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
  </head>
  <body class="bodyLogin">
    <div class="box" style="width: 50%">
      <div class="container">
        <form action="" method="POST">
          <div class="inputBox">
            <input type="text" name="txtEmail" required>
            <label>Digite seu E-Mail: </label>
            <br><br>
          </div>
          <div>
            <label style="color: white;">Motivo do contato: </label>
            <select name="cboTitle" required>
              <option value="Sugestão">Sugestão</option>
              <option value="Critíca">Crítica</option>
              <option value="Reclamação">Reclamação</option>
              <option value="Denúncia">Denúncia</option>
            </select>
            <br><br>
          </div>
          <div>
            <label style="color: white;">Descreva o motivo do contato:</label>
            <textarea name="txtContent" rows="8" cols="80" required></textarea>
          </div>
          <center><button name="btnSend">Enviar mensagem</button></center>
        </form>
      </div>
    </div>

    <?php
      if (isset($_POST["btnSend"])):
        // Requisitando o composer
        require 'vendor/autoload.php';

        // Definindo os parâmetros de envio da mensagem
        $from = new SendGrid\Email(null, "{$_POST['txtEmail']}");
        $subject = "{$_POST['cboTitle']}";
        $to = new SendGrid\Email(null, "winnchay_oficial@gmail.com");
        $content = new SendGrid\Content("text/html", "{$_POST['txtContent']}");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);

        // Ativando a chave da API no SednGrid
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        //Finalizando o processo
        $response = $sg->client->mail()->send()->post($mail);
        echo "<br><h6 style='text-align:center;color: white;'>Mensagem enviada com sucesso! - <a href='../homepage.php'>Voltar para página inicial</a></h6>";
      endif;
    ?>
  </body>
</html>