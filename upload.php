<?php
	session_start();
	require  'includes/ProfilePicture.php';
	$pic = new ProfilePicture();
	echo "oláa";
	var_dump($_SESSION["change"]);
	if ($_SESSION["change"]):
		$pic->changePicture();
	else:
		$pic->createPicture();
	endif;
?>