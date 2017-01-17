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
    }

    public function setLike()
    {
        if ($session->isUserLoggedIn())
        {
            $postId=$_GET["id"]; //kommt das aus der URL?
            $userID=$session->getUserSession();
            $connection= new Connection;

            $result = $connection->getSelectFrom("SELECT * FROM LIKE WHERE user_id='$userId' AND post_id='$postId'");
            $result = $result[0];
            $isLiked = count($result["id"]);  // bin mir da nicht so sicher ob das so klappt
            $value = $result["value"];
            if ($isLiked==1 && $value==1)
            {
                setDelete("DELETE FROM LIKE WHERE post_id='$postId' AND user_id='$userId'");
            }
            else if($isLiked==0)
            {
                setInsert("INSERT INTO LIKE (post_id, user_id, value) VALUES ('$postId', '$userId', 1)");
            }
            else if($isLiked==1 && $value==-1)
            {
                setUpdate("UPDATE LIKE SET VALUE=1 WHERE user_id='$userId' AND post_id='$postId'");
            }
        }
    }

    public function setDislike()
    {
        if ($session->isUserLoggedIn())
        {
            $postId=$_GET["id"]; //kommt das aus der URL?
            $userID=$session->getUserSession();
            $connection= new Connection;

            $result = $connection->getSelectFrom("SELECT * FROM LIKE WHERE user_id='$userId' AND post_id='$postId'");
            $result = $result[0];
            $isLiked = count($result["id"]);  // bin mir da nicht so sicher ob das so klappt
            $value = $result["value"];
            if ($isLiked==1 && $value==-1)
            {
                setDelete("DELETE FROM LIKE WHERE post_id='$postId' AND user_id='$userId'");
            }
            else if($isLiked==0)
            {
                setInsert("INSERT INTO LIKE (post_id, user_id, value) VALUES ('$postId', '$userId', -1)");
            }
            else if($isLiked==1 && $value==1)
            {
                setUpdate("UPDATE LIKE SET VALUE=-1 WHERE user_id='$userId' AND post_id='$postId'");
            }
        }
    }
    private function getLikeInDB($likeId)

    {



        try {

            include '/../config.php';

            $conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM Like WHERE id = '$likeId'");

            $stmt->execute();

            $result = $stmt->fetch();

        } catch (PDOException $e) {

            $result = $e;

        }

        $conn = null;

    }



    public function setLike()

    {

        if ($session->isUserLoggedIn())

        {

            $postId=$_GET["id"]; //kommt das aus der URL?

            $userID=$session->getUserSession();

            $connection= new Connection;



            $result = $connection->getSelectFrom("SELECT * FROM LIKE WHERE user_id='$userId' AND post_id='$postId'");

            $result = $result[0];

            $isLiked = count($result["id"]);  // bin mir da nicht so sicher ob das so klappt

            $value = $result["value"];

            if ($isLiked==1 && $value==1)

            {

                setDelete("DELETE FROM LIKE WHERE post_id='$postId' AND user_id='$userId'");

            }

            else if($isLiked==0)

            {

                setInsert("INSERT INTO LIKE (post_id, user_id, value) VALUES ('$postId', '$userId', 1)");

            }

            else if($isLiked==1 && $value==-1)

            {

                setUpdate("UPDATE LIKE SET VALUE=1 WHERE user_id='$userId' AND post_id='$postId'");

            }

        }

    }



    public function setDislike()

    {

        if ($session->isUserLoggedIn())

        {

            $postId=$_GET["id"]; //kommt das aus der URL?

            $userID=$session->getUserSession();

            $connection= new Connection;



            $result = $connection->getSelectFrom("SELECT * FROM LIKE WHERE user_id='$userId' AND post_id='$postId'");

            $result = $result[0];

            $isLiked = count($result["id"]);  // bin mir da nicht so sicher ob das so klappt

            $value = $result["value"];

            if ($isLiked==1 && $value==-1)

            {

                setDelete("DELETE FROM LIKE WHERE post_id='$postId' AND user_id='$userId'");

            }

            else if($isLiked==0)

            {

                setInsert("INSERT INTO LIKE (post_id, user_id, value) VALUES ('$postId', '$userId', -1)");

            }

            else if($isLiked==1 && $value==1)

            {

                setUpdate("UPDATE LIKE SET VALUE=-1 WHERE user_id='$userId' AND post_id='$postId'");

            }

        }

    }

}
