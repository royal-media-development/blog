<?php
//Klasse Like
class Like
{
    private $id;
    private $post;
    private $user;
    private $value;
    $db = new db("mysql:host=localhost;port=8080;dbname=6Pun","admin","admin");


    public function __construct($likeId)
    {
        $result = $this->getUserInDB($likeId);
        if($result) {
            $this->setId($result["id"]);
            $this->setPost($result["post"]);
            $this->setUser($result["user"]);
            $this->setValue($result["value"]);
            }

    }
    public function getId()
    {
        return $this->id;
    }

    public function setID($id)
    {
    this->id = $id;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
    this->post = $post;
    }
    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
    this->user = $user;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
    this->value = $value;
    }
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

        return $result;
    }
}
