<?php
    require_once dirname(__FILE__)."/../database.php";
    session_start();
    /**
     * @param $user
     * @param $pass
     */
    function LoginAdmin($user,$pass)
    {
        $pass_encrypted = md5($pass);
        $data = $GLOBALS['database']->count("admin",[
            "AND" => [
                "username" => $user,
                "password" => $pass_encrypted
            ]
        ]);
        if ($data == 1)
        {
            $_SESSION["username_ppl"] = $user;
            return true;
        }
        else
        {
            return false;
        }
    }
    function IsLoggedIn()
    {
        return isset($_SESSION["username_ppl"]);
    }
    function Logout()
    {
        unset($_SESSION["username_ppl"]);
        session_destroy();
    }
?>