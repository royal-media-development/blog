<?php
class Validation extends Config
{
    /**
     * @param $username
     * @param array $password
     * @param $email
     * @return bool
     */
    public function registration($username, array $password, $email)
    {
        $allow = false;
        if (isset($username) &&
            strlen($username) &&
            strlen($password[0]) > 5 &&
            count($this->userExists($username)) == 0&&
            $password[0] == $password[1] &&
            isset($email) &&
            strlen($email) > 5 &&
            $this->contains("@", $email) &&
            $this->contains(".", $email)
        ) {
            $allow = true;
        }


        return $allow;

    }

    public function userExists($username)
    {


        try {
            $host = $this->getHost();
            $dbName = $this->getDbName();
            $dbUser = $this->getDbUser();
            $dbPassword = $this->getDbPassword();
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM USER WHERE username = '$username'");
            $stmt->execute();
            $result = $stmt->fetchAll();

        } catch (PDOException $e) {
            $result = $e;
        }
        $conn = null;
        return $result;


    }

    private function contains($needle, $haystack)
    {
        return strpos($haystack, $needle) !== false;
    }

}