<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $img;
    private $visibility;

    public function __construct($userId)
    {
        $result = $this->getUserInDB($userId);
        if($result) {
            $this->setId($result["id"]);
            $this->setUsername($result["username"]);
            $this->setPassword($result["password"]);
            $this->setImg($result["img"]);
            $this->setVisibility($result["visibility"]);
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
       $this->id = $id;
    }


    public function setUsername($username)
    {
       $this->username = $username;
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @param $userId
     * @return Exception|mixed|PDOException
     */
    private function getUserInDB($userId)
    {

        try {
            include '/../config.php';
            $conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM USER WHERE id = $userId");
            $stmt->execute();
            $result = $stmt->fetch();
        } catch (PDOException $e) {
            $result = $e;
        }
        $conn = null;

        return $result;
    }

}