<!DOCTYPE html>
<html>
<head>
	<title>WinnChay - Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
</head>
<body class="bodyLogin">
	<header>
		Foi enviado um E-mail com o Código de verificação
	</header>
	<div class="container">
		<center>
		<?php if (isset($_GET['true'])): ?>
			<div class="element_confirmEmail">
				<form class="" action="" method="post">
					<p>Digite o Codigo que foi enviado em seu E-mail:</p>
					<input type="text" name="txtCodigo" maxlength="4">
					<br><br>
					<button name="btnRecover" class="buttonCadastro">Confirmar</button>
					<button name="btnRepeat" class="buttonCadastro">Reenviar Código</button>
				</form>
			</div>
		<?php elseif (isset($_POST['btnRepeat'])):?>
			<div class="element_confirmEmail">
				<form action="" method="post">
					<p>Código reenviado</p>
					<p>Digite o Codigo que foi enviado em seu E-mail:</p>
					<input type="text" name="txtCodigo" maxlength="4">
					<br><br>
					<button name="btnRecover" class="buttonCadastro">Confirmar</button>
					<button name="btnRepeat" class="buttonCadastro">Reenviar Código</button>
				</form>
			</div>
		<?php endif; ?>
		<?php
			session_start();
			if (isset($_GET['true'])):
				$_GET['true'] = false;
				$_SESSION['cod'] = rand(1000, 9999);
				// Requisitando o composer
				require 'vendor/autoload.php';

				// Definindo os parâmetros de envio da mensagem
				$from = new SendGrid\Email(null, "WinnChay@suporte.com");
				$subject = "Ativar Conta - WinnChay";
				$to = new SendGrid\Email(null, "{$_SESSION["emailRegister"]}");
				$content = new SendGrid\Content("text/html", "Olá, <br><br>Seu código de ativação de conta: <br><br><b> Código: </b>{$_SESSION['cod']}.<br><br> Atenciosamente,<br><b> Equipe WinnChay. </b>");
				$mail = new SendGrid\Mail($from, $subject, $to, $content);

				// Ativando a chave da API no SednGrid
				$apiKey = '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';
				$sg = new \SendGrid($apiKey);

				//Finalizando o processo
				$response = $sg->client->mail()->send()->post($mail);
			elseif (isset($_POST['btnRepeat'])):
				$_SESSION['cod'] = rand(1000, 9999);

				// Requisitando o composer
				require 'vendor/autoload.php';

				// Definindo os parâmetros de envio da mensagem
				$from = new SendGrid\Email(null, "WinnChay@suporte.com");
				$subject = "Ativar Conta - WinnChay";
				$to = new SendGrid\Email(null, "{$_SESSION["emailRegister"]}");
				$content = new SendGrid\Content("text/html", "Olá, <br><br>Seu código de ativação de conta: <br><br><b> Código: </b>{$_SESSION['cod']}.<br><br> Atenciosamente,<br><b> Equipe WinnChay. </b>");
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
					header('location:../includes/register.php');
				else:
					echo "<br><h6 style='text-align:center;color: #925EFF;'>Código digitado incorreto!!</h6>";
				endif;
			endif;
		?>
		</center>
	</div>
</body>
</html>
