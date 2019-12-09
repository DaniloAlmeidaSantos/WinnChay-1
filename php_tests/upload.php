<?php
	session_start();
	require  '../includes/ProfilePicture.php';
	$picture = new ProfilePicture();
	$picture->changePicture();
?>