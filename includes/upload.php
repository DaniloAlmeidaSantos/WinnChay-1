<?php
	require  'ProfilePicture.php';
	$picture = new ProfilePicture();
	echo "oláa";
	// if ($_SESSION["change"]):
		$picture->changePicture();
	// else:
	// 	$picture->createPicture();
	// endif;
?>