<?php
include "functions.php";
/**
 * Created by IntelliJ IDEA.
 * User: cdanial
 * Date: 19.01.2017
 * Time: 09:40
 */
    $dateTime = getCurrentDateTime();
    $postId = $_POST["post_id"];
    $postContent = $_POST["content"];
    $submit = $_POST[submit];
    if($session->isUserLoggedIn()){

        $user = $session->getUserSession();
        $userId = $user->getId();

        if($submit){
            if($userId&&$content) {
                $connection = new Connection();
                $connection->setInsert("INSERT INTO comment (content , commenttime , user_id , post_id  ) VALUES (':content' , '$dateTime','$userId', '$postId')");
            }
        }else{
            echo "The Textarea should be filld with words if you want to comment soemthing ";
        }
        $getConnection = $db->query('SELECT * FROM comment ORDER BY commenttime DESC' , PDO::FETCH_ASSOC);
        while($rows = $getConnection()){
            $userId = $rows['user_id'];
            $postId = $rows['post_id'];
            $commenttime = $rows['commenttime'];
            $content = $rows['content'];

            echo $userId . '<br>'. '<br>' . $content . '<br>' . '<br>';


        }



}



