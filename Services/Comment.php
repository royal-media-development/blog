<?php

/**
 * Created by IntelliJ IDEA.
 * User: cdanial
 * Date: 13.12.2016
 * Time: 11:42
 */
class Comment
{
    private $id;
    private $content;
    private $contentTime;
    private $userId;
    private $postId;

    public function getId(){
        return $this -> id;
    }

    public function setId($id){
        $this->id=$id;
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

}