<?php

class Registration extends Config
{

    public function __construct($username, $password, $email)
    {

        $password = $this->hashPassword($password);
        try {
            $host = $this->getHost();
            $dbname = $this->getDbName();
            $dbuser = $this->getDbUser();
            $dbPassword = $this->getDbPassword();
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbPassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user (username, password, img, visibility)
    VALUES ('$username', '$password', 'default.jpg', '1')";
            $conn->exec($sql);

        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    private function hashPassword($password)
    {
        return sha1($password);
    }

}