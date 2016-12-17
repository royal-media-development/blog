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
        $sql = "SELECT FROM user WHERE id = $userId";
        $result = $this->getUserInDB($userId);
        echo $result;
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
     * @param $sql
     * @return bool|null
     */
    private function getUserInDB($sql)
    {

        try {
            include '../config.php';
            $conn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchObject(User::class);
        } catch (PDOException $e) {
            $result = null;
        }
        $conn = null;

        return $result;
    }

}