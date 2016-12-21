<?php
//Klasse Like
class Like
{
    private var $id;
    private var $post;
    private var $user;
    private var $value;
    $db = new db("mysql:host=localhost;port=8080;dbname=6Pun","admin","admin");


    public function __construct($post="", $user="", $value=""){

    }
}
