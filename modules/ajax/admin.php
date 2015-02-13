<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 11/02/2015
 * Time: 13:09
 */
    require_once dirname(__FILE__)."/../models/admin.php";
    session_start();
    if (isset($_REQUEST['login']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if (LoginAdmin($user,$pass))
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }
?>