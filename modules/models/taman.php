<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 9:30 PM
 */
    require_once dirname(__FILE__)."/../database.php";

    function AddTaman($data)
    {
        $last_id = $GLOBALS['database']->insert("taman",$data);
        if ($last_id > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

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

    function EditTaman($datain,$old_lat,$old_lng)
    {
        $data = $GLOBALS['database']->update("taman",[
            "nama" => "",
            "alamat" => ""
        ],[
            "AND" => [
                "latitude" => $old_lat,
                "longitude" => $old_lng
            ]
        ]);
        $data = $GLOBALS['database']->update("taman",$datain,[
            "AND" => [
                "latitude" => $old_lat,
                "longitude" => $old_lng
            ]
        ]);
        return ($data > 0);
    }

    function DelTaman($lat,$lng)
    {
        $data = $GLOBALS['database']->delete("taman",[
            "AND" => [
                "latitude" => $lat,
                "longitude" => $lng
            ]
        ]);
        return ($data > 0);
    }

    function GetLaporanTaman($id)
    {
        $data = $GLOBALS['database']->count("keluhan","*",[
            "taman" => $id
        ]);
        return $data;
    }
?>