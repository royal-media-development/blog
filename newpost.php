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
			$post = new Post();
			$post->setUserId($user->getId());
			$post->setImg($filename);
			$postdate = getCurrentDateTime();
			$post->setPostDate($postdate);
			
			$connection = new Connection();
			$userid = $post->getUserId();
			$connection->setInsert("INSERT INTO POST (user_id, postdate, img) VALUES ('user_id', 'postdate', 'img')", [
					'user_id'=>$userid,
					'postdate'=>$postdate,
					'img'=>$filename,
			]);
			
			setRedirect("./profile.php");
		} else {
			setRedirect("./index.php");
		}
	}else{
		setRedirect("./index.php");
	}
?>