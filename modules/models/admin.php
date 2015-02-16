<?php
    require_once dirname(__FILE__)."/../database.php";
    session_start();
    /**
     * @param $user
     * @param $pass
     */
    function LoginAdmin($user,$pass)
    {
        if (ValidateAdmin($user,$pass))
        {
            $_SESSION["username_ppl"] = $user;
            return true;
        }
        else
        {
            return false;
        }
    }

    function ValidateAdmin($user,$pass)
    {
        $pass_encrypted = md5($pass);
        $data = $GLOBALS['database']->count("admin",[
            "AND" => [
                "username" => $user,
                "password" => $pass_encrypted
            ]
        ]);
        return ($data == 1);
    }

    function ChangeUserPass($user,$pass)
    {
        $pass_encrypted = md5($pass);
        $data = $GLOBALS['database']->update("admin",[
            "username" => $user,
            "password" => $pass_encrypted
        ]);
        return ($data == 1);
    }

    function IsLoggedIn()
    {
        return isset($_SESSION["username_ppl"]);
    }

    function GetUserLoggedIn()
    {
        return $_SESSION["username_ppl"];
    }
    function Logout()
    {
        unset($_SESSION["username_ppl"]);
        session_destroy();
    }
?>