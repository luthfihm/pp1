<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 9:35 PM
 */
    require_once dirname(__FILE__)."/../database.php";

    function AddKeluhan($data)
    {
        $last_id = $GLOBALS['database']->insert("keluhan",$data);
        if ($last_id > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function GetKeluhan($id)
    {
        $data = $GLOBALS['database']->get("keluhan","*",["id" => $id]);
        return $data;
    }

    function GetListKeluhanMasuk()
    {
        $data = $GLOBALS['database']->select("keluhan","*",["status" => 0,"ORDER" => ["waktu DESC"]]);
        return $data;
    }

    function GetListKeluhanVerified()
    {
        $data = $GLOBALS['database']->select("keluhan","*",["status" => 1,"ORDER" => ["waktu DESC"]]);
        return $data;
    }

    function GetNumKeluhan()
    {
        return $GLOBALS['database']->count("keluhan","*",["status"=>0]);
    }

    function GetNumKeluhanVerified()
    {
        return $GLOBALS['database']->count("keluhan","*",["status"=>1]);
    }

    function VerifikasiKeluhan($id)
    {
        $data = $GLOBALS['database']->update("keluhan",[
            "status" => 1
        ],[
            "id" => $id
        ]);
        return ($data > 0);
    }

    function MarkAsReadKeluhan($id)
    {
        $data = $GLOBALS['database']->update("keluhan",[
            "read" => 1
        ],[
            "id" => $id
        ]);
        return ($data > 0);
    }

    function HapusKeluhan($id)
    {
        $data = $GLOBALS['database']->delete("keluhan",[
            "id" => $id
        ]);
        return ($data > 0);
    }

    function GetNumLaporan($from,$to,$taman,$kategori)
    {
        $data = $GLOBALS['database']->count("keluhan","*",[
            "AND" => [
                "status" => 1,
                "taman" => $taman,
                "kategori" => $kategori,
                "waktu[<>]" => [$from." 00:00:00",$to." 23:59:59"]
            ]
        ]);
        return $data;
    }
?>