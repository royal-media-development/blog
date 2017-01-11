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


    public function __construct($postId = null)
    {
        parent::__construct();
        if(isset($postId)){
                //Daten aus Post holen, nur wenn Post gesetzt ist
        }


    }

    public function getId()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
        $this->post = $post;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

}
