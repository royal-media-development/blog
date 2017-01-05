<?php

class Session
{
    private $session;


    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->setSession($_SESSION);
    }

    private function getSession()
    {
        return $this->session;
    }


    private function setSession($session)
    {
        $this->session = $session;
    }

    public function setSessionParameter($key, $val)
    {
        $session = $this->getSession();
        $val = serialize($val);
        $session[$key] = $val;
        $this->setSession($session);
        $this->syncSession();
    }

    public function getSessionParameter($key)
    {
        $session = $this->getSession();
        $val = isset($session[$key]) ? $session[$key] : null;
        $val = $this->isSerialized($val) ? unserialize($val) : $val;
        return $val;
    }

    public function setUserSession($user)
    {

        if ($user instanceof User) {
            $this->setSessionParameter("user", $user);
        }
    }

    /**
     * @return User
     */
    public function getUserSession()
    {
        return $this->getSessionParameter("user");
    }

    public function isUserLoggedIn()
    {
        $logged = false;
        $user = $this->getUserSession();
        if($user instanceof User && $user->getValid()){
            $logged = true;
        }
        return $logged;
    }

    public function setDeleteUserSession()
    {
        $this->setSessionParameter('user', null);
    }

    private function syncSession()
    {
        $_SESSION = $this->getSession();
    }

    private function isSerialized($data)
    {
        if (!is_string($data))
            return false;
        $data = trim($data);
        if ('N;' == $data)
            return true;
        if (!preg_match('/^([adObis]):/', $data, $badions))
            return false;
        switch ($badions[1]) {
            case 'a' :
            case 'O' :
            case 's' :
                if (preg_match("/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data))
                    return true;
                break;
            case 'b' :
            case 'i' :
            case 'd' :
                if (preg_match("/^{$badions[1]}:[0-9.E-]+;\$/", $data))
                    return true;
                break;
        }
        return false;
    }



}