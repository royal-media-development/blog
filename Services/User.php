<?php

class User extends Connection
{
    private $id;
    private $username;
    private $password;
    private $img;
    private $visibility;
    /**
     * @var bool
     */
    private $valid;

    public function __construct($filter)
    {
        parent::__construct();
        $result = $this->getUserInDB($filter);
        $this->setValidation($result);
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
     * @return bool
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }



    /**
     * @param $filter
     * @return Exception|mixed|PDOException
     */
    private function getUserInDB($filter)
    {
        return $this->getSelectFrom("SELECT * FROM user WHERE " . $filter)[0];
    }

    private function setValidation($result)
    {
        if($result["id"] != null && $result["username"] != null && strlen($result["password"]) == 40) {
           $this->setValid(true);
        }else {
            $this->setValid(false);
        }
    }

}