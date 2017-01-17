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
<<<<<<< HEAD
=======
    private function getLikeInDB($likeId)
    {

        try {
            include '/../config.php';
            $conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM Like WHERE id = $likeId");
            $stmt->execute();
            $result = $stmt->fetch();
        } catch (PDOException $e) {
            $result = $e;
        }
        $conn = null;
>>>>>>> parent of 07ef2d8... Like.php

}
