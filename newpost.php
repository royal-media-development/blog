<?php
	include "functions.php";
	
	var_dump($session->isUserLoggedIn());
	
	$random = rand(1000000,9999999);
	$uploadDir = $_SERVER["DOCUMENT_ROOT"]."/blog/img/";
	$filename = $random.basename($_FILES['file']['name']);
	$uploadfile = $uploadDir .$filename;
	
	if($session->isUserLoggedIn()){
		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
			$user = $session->getUserSession();
			$userid = $user->getId();
			
			$currentDateTime = getCurrentDateTime();
			
			$connection = new Connection();
			$connection->setInsertNoParam("INSERT INTO POST (user_id, postdate, img) VALUES ('$userid', '$currentDateTime', '$filename')");
			
			setRedirect("./profile.php");
		} else {
			setRedirect("./profile.php");
		}
	}else{
		setRedirect("./index.php");
	}
?>