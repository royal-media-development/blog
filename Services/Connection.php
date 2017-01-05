<?php

class Connection extends Config
{
    /**
     * @var $connection PDO
     */
    private static $connection;

    public function __construct()
    {
        $this->buildConnection();
    }


    public function getConnection()
    {
        return self::$connection;
    }


    private function setConnection($connection)
    {
        self::$connection = $connection;
    }


    public function getSelectFrom($sql)
    {
        $conn = self::$connection;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * @param $sql
     * @param $param array
     * @return bool
     */
    public function setInsert($sql, $param)
    {

        $success = false;
        if($this->parameterIsValid($param)) {
            $conn = $this->getConnection();
            $stmt = $conn->prepare($sql);
            $stmt = $this->prepareStatement($param, $stmt);
            $stmt->execute();
            $success =  true;
        }

        return $success;

    }

    private function buildConnection()
    {
        $host = $this->getHost();
        $dbName = $this->getDbName();
        $dbUser = $this->getDbUser();
        $dbPassword = $this->getDbPassword();
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setConnection($conn);
    }

    /**
     * @param $param
     * @return bool
     */
    private function parameterIsValid($param)
    {
        $valid = false;
        if(count($param) > 0 && is_array($param)){
            $valid =  true;
        }

        return $valid;
    }

    /**
     * @param $param array
     * @param $statement PDOStatement
     * @return PDOStatement
     */
    private function prepareStatement($param, $statement)
    {
        if($this->parameterIsValid($param)){
            foreach ($param as $key => $value){
                $statement->bindParam($key, $value);
            }
        }

        return $statement;
    }

}