<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 9:20 PM
 */
    require_once dirname(__FILE__)."/../database.php";

    function GetAllKategori()
    {
        $data = $GLOBALS['database']->select("kategori","*");
        return $data;
    }

    function GetKategori($id)
    {
        $data = $GLOBALS['database']->get("kategori","*",["id" => $id]);
        return $data;
    }
?>