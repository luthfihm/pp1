<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 9:30 PM
 */
    require_once dirname(__FILE__)."/../database.php";

    function GetAllTaman()
    {
        $data = $GLOBALS['database']->select("taman","*");
        return $data;
    }

    function GetTaman($id)
    {
        $data = $GLOBALS['database']->get("taman","*",["id" => $id]);
        return $data;
    }
?>