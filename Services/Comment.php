<?php

/**
 * Created by IntelliJ IDEA.
 * User: cdanial
 * Date: 13.12.2016
 * Time: 11:42
 */
class Comment
{
    private $commentID;
    private $content;
    private $contentTime;
    private $userId;
    private $postId;

    public function __construct($userId , $postId)
    {
        $result = $this->getCommentInDB($userId,$postId);
        if($result){
            $this->setId($result["id"]);
            $this->setContent($result["content"]);
            $this->setContentTime($result["contentTime"]);
            $this->setUserId($result["userId"]);
            $this->setPostId($result["postId"]);
        }
    }

    public function getCommentID(){
        return $this -> commentID;
    }

    public function setId($commentID){
        $this->commentID = $commentID;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content=$content;
    }

    public function getContentTime(){
        return $this->contentTime;
    }

    public function setContentTime($contentTime){
        $this->contentTime=$contentTime;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId=$userId;
    }

    public function getPostId(){
        return $this->postId;
    }

    public function setPostId($postId){
        $this->postId=$postId;
    }

    private function getCommentInDB(){
        try{
            include '/../config.php';
            $conn = new PDO("mysql:host=$HOST;dbname=$DBNAME , $DBCONTENT , $DBCONTENTTIME , $DBUSERID , $DBPOSTID");
            $conn ->setAttribute(PDO :: ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $stmt = $conn ->prepare("SELECT * FROM COMMENT WHERE commentID = $commentID");
            $stmt ->execute();
            $result = $stmt->fetch();
        }catch(PDOException $e){
            $result =$e;
        }
        $conn = null;

        return $result;
    }

}