<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 17/02/2015
 * Time: 0:59
 */
    require_once dirname(__FILE__)."/../database.php";

    function GetInstansi()
    {
        $data = $GLOBALS['database']->select("instansi","*");
        return $data[0];
    }

    function EditInstansi($nama,$email)
    {
        $data = $GLOBALS['database']->update("instansi",[
            "nama" => $nama,
            "email" => $email
        ]);
        return ($data>0);
    }
?>