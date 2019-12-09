<?php
	require 'includes/ProfilePicture.php';
	$pic = new ProfilePicture();
	// if (isset($_FILES['image'])):
		if ($_SESSION["change"]):
			$pic->changePicture();
			$_SESSION['error'] = null;
			header('location: homepage.php');
		else:
			$pic->createPicture();
			$_SESSION['error'] = null;
			header('location: homepage.php');
		endif;
	// endif;
?>