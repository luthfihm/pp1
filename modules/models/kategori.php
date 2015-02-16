<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 9:20 PM
 */
    require_once dirname(__FILE__)."/../database.php";

    function TambahKategori($nama)
    {
        $last_id = $GLOBALS['database']->insert("kategori",["nama" => $nama]);
        if ($last_id > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

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

    function EditKategori($id,$nama)
    {
        $data = $GLOBALS['database']->update("kategori",[
            "nama" => $nama
        ],[
            "id" => $id
        ]);
        return ($data > 0);
    }

    function HapusKategori($id)
    {
        $data = $GLOBALS['database']->delete("kategori",[
            "id" => $id
        ]);
        return ($data > 0);
    }
?>