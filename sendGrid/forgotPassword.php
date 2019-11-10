<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>WinnChay - Esqueceu a senha</title>
    </head>
    <body>
        <div class="container">
            <?php if (isset($_POST['txtForgot'])): ?>
                <form action='' method='POST'>
                    <label>Digite seu E-Mail: </label>
                    <input type="text" name="txtEmail">

                    <button name="btnSend">Enviar código de ativação</button>
                </form>
            <?php elseif(isset($_POST['btnSend'])): ?>
                <form action='' method='POST'>
                    <label>Digite o código: </label>
                    <input type="text" name="txtCodigo">

                    <button name="btnRecover">Verificar</button> &nbsp;
                    <button name="btnRepeat">Reenviar código</button>
                </form>
            <?php elseif (isset($_POST['btnRepeat'])): ?>
                <form action='' method='POST'>
                    <label>Digite o código: </label>
                    <input type="text" name="txtCodigo">

                    <button name="btnRecover">Verificar</button> &nbsp;
                    <button name="btnRepeat">Reenviar código</button>
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
                    $from = new SendGrid\Email(null, "winnchay@winnchay.com");
                    $subject = "Recuperar senha.";
                    $to = new SendGrid\Email(null, "{$_SESSION['email']}");
                    $content = new SendGrid\Content("text/html", "Olá, <br><br>ative seu código de recuperação da sua senha: <br><br><b> Código: </b>{$_SESSION['cod']}.<br><br> Atenciosamente,<br><b> Equipe WinnChay. </b>");
                    $mail = new SendGrid\Mail($from, $subject, $to, $content);
                    
                    // Ativando a chave da API no SednGrid
                    $apiKey = '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';
                    $sg = new \SendGrid($apiKey);
                    
                    //Finalizando o processo        
                    $response = $sg->client->mail()->send()->post($mail);
                    echo "Mensagem enviada com sucesso";
                elseif (isset($_POST['btnRepeat'])):
                    $_SESSION['cod'] = rand(1000, 9999);
                    
                    // Requisitando o composer
                    require 'vendor/autoload.php';

                    // Definindo os parâmetros de envio da mensagem
                    $from = new SendGrid\Email(null, "winnchay@winnchay.com");
                    $subject = "Recuperar senha.";
                    $to = new SendGrid\Email(null, "{$_SESSION['email']}");
                    $content = new SendGrid\Content("text/html", "Olá, <br><br>ative seu código de recuperação da sua senha: <br><br><b> Código: </b>{$_SESSION['cod']}.<br><br> Atenciosamente,<br><b> Equipe WinnChay. </b>");
                    $mail = new SendGrid\Mail($from, $subject, $to, $content);
                    
                    // Ativando a chave da API no SednGrid
                    $apiKey = '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';
                    $sg = new \SendGrid($apiKey);
                    
                    //Finalizando o processo        
                    $response = $sg->client->mail()->send()->post($mail);
                    echo "Mensagem enviada com sucesso";
                elseif (isset($_POST['btnRecover'])):
                    // Verificando se o código digitado é o mesmo que o enviado para o email
                    if ($_SESSION['cod'] == $_POST['txtCodigo']):
                        header('location:../login.php');
                    endif;
                endif;
            ?>
        </div>
    </body>
</html>
