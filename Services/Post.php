<?php
class Post extends Connection
{
    private $postID;
    private $userId;
    private $postdate;
    private $img;

    public function __construct($postID = null)
    {
        parent::__construct();
        if(isset($postID)){
        	$result = $this->getPostInDB();
        	if ($result) {
        		$this->setPostID($result["id"]);
        		$this->setUserID($result["post"]);
        		$this->setPostDate($result["user"]);
        		$this->setImg($result["value"]);
        	}
        }
    }

    public function getPostID()
    {
        return $this->postID;
    }

    public function setPostID($postID)
    {
        $this->postID = $postID;
    }

    public function getUserID()
    {
        return $this->userId;
    }

    public function setUserID($userID)
    {
        $this->content = $userID;
    }

    public function getPostDate()
    {
        return $this->postdate;
    }

    public function setPostDate($postDate)
    {
        $this->postdate = $postDate;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    private function getPostInDB()
    {
        $postId = $this->getPostID();
        return $this->getSelectFrom("SELECT * FROM POST WHERE postID = '$postId'");
        //TEST
    }

}