<?php

/**
 * Class Like
 *
 * Diese Klasse muss noch von der Connection Klasse erben.
 * extends Connection
 * Der
 */
class Like extends Connection
{
    private $id;
    private $post;
    private $user;
    private $value;


    public function __construct($postId = null, User $user, Post $post)
    {
        parent::__construct();
        if (isset($postId)) {
            $this->value = $this->getValueTest();
        }
        $this->user = $user;
        $this->post = $post;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }


    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    private function getLikeInDB()
    {

        $postId = $this->getPostId();
        $userId = $this->getUserId();
        return $this->getSelectFrom("SELECT * FROM like WHERE user_id = '$userId' AND post_id = '$postId'")[0];
    }

    private function getValueTest()
    {
        return $this->getLikeInDB()["value"];
    }

    public function setLike()
    {

        $userId = $this->user->getId();
        $postId = $this->post->getPostID();
        $connection = new Connection;
        $result = $this->getLikeInDB();
        $isLiked = count($result["id"]);  // bin mir da nicht so sicher ob das so klappt
        $value = $this->getValue();
        if ($isLiked == 1 && $value == 1) {
            $this->setDelete("DELETE FROM LIKE WHERE post_id='$postId' AND user_id='$userId'");
        } else if ($isLiked == 0) {
            $this->setInsert("INSERT INTO LIKE (post_id, user_id, value) VALUES ('$postId', '$userId', 1)");
        } else if ($isLiked == 1 && $value == -1) {
            $this->setUpdate("UPDATE LIKE SET VALUE=1 WHERE user_id='$userId' AND post_id='$postId'");
        }

        $this->setValue($this->getValueTest());

    }

    public function setDislike()
    {

        $userId = $this->user->getId();
        $postId = $this->post->getPostID();
        $connection = new Connection;

        $result = $connection->getSelectFrom("SELECT * FROM LIKE WHERE user_id='$userId' AND post_id='$postId'");
        $result = $result[0];
        $isLiked = count($result["id"]);  // bin mir da nicht so sicher ob das so klappt
        $value = $result["value"];
        if ($isLiked == 1 && $value == -1) {
            $this->setDelete("DELETE FROM LIKE WHERE post_id='$postId' AND user_id='$userId'");
        } else if ($isLiked == 0) {
            $this->setInsert("INSERT INTO LIKE (post_id, user_id, value) VALUES ('$postId', '$userId', -1)");
        } else if ($isLiked == 1 && $value == 1) {
            $this->setUpdate("UPDATE LIKE SET VALUE=-1 WHERE user_id='$userId' AND post_id='$postId'");
        }

    }

    private function getPostId()
    {
        return $this->post->getPostID();
    }

    private function getUserId()
    {
        return $this->user->getId();
    }


}
