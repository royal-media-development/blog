<?php
include "functions.php";
/**
 * Created by IntelliJ IDEA.
 * User: cdanial
 * Date: 19.01.2017
 * Time: 09:40
 */

if($session->isUserLoggedIn()){
    $dateTime = getCurrentDateTime();
    $user = $session->getUserSession();
    $userId = $user->getId();
    $postId = $_POST["post_id"];
    $postContent = $_POST["content"];
    $connection = new Connection();
    $connection->setInsert("INSERT INTO comment (content , commenttime , user_id , post_id  ) VALUES (':content' , '$dateTime','$userId', '$postId')", );


}

