<?php
	// Verifica a existência de usuário
	if (empty($_COOKIE['user'])):
		// Caso não tenha a existência de um usuário na página, é realizado o redirencionamento para o Login.php
		header('location: login.php');
	endif;
?>