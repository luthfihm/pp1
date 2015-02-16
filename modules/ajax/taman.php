<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 16/02/2015
 * Time: 19:37
 */
    require_once dirname(__FILE__)."/../models/taman.php";

    if (isset($_REQUEST['get_list']))
    {
        $list_taman = GetAllTaman();
        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("markers"); //Create new element node
        $parnode = $dom->appendChild($node); //make the node show up

        header("Content-type: text/xml");

        foreach ($list_taman as $taman) {
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);
            $newnode->setAttribute("id_taman",$taman['id']);
            $newnode->setAttribute("name",$taman['nama']);
            $newnode->setAttribute("address",$taman['alamat']);
            $newnode->setAttribute("lat", $taman['latitude']);
            $newnode->setAttribute("lng", $taman['longitude']);
        }
        echo $dom->saveXML();
    }
    else if (isset($_REQUEST['tambah']))
    {
        if($_POST)
        {
            $mLatLang	= explode(',',$_POST["latlang"]);
            $mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
            $mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
            $mName 		= filter_var($_POST["name"], FILTER_SANITIZE_STRING);
            $mAddress 	= filter_var($_POST["address"], FILTER_SANITIZE_STRING);

            $data = array(
                "nama" => $mName,
                "alamat" => $mAddress,
                "latitude" => $mLat,
                "longitude" => $mLng
            );

            if (AddTaman($data))
            {
                echo '<h1 class="marker-heading">'.$mName.'</h1><p>'.$mAddress.'</p><button name="edit-marker" class="edit-marker btn btn-sm btn-primary">Edit</button>';
            }
        }
    }
    else if (isset($_REQUEST['get_laporan']))
    {
        if($_REQUEST['get_laporan'] != null)
        {
            $id = $_REQUEST['get_laporan'];
            echo GetLaporanTaman($id);
        }
    }
    else if (isset($_REQUEST['edit']))
    {
        if($_POST)
        {
            $mLatLang	= explode(',',$_POST["latlang"]);
            $mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
            $mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
            $mName 		= filter_var($_POST["name"], FILTER_SANITIZE_STRING);
            $mAddress 	= filter_var($_POST["address"], FILTER_SANITIZE_STRING);

            $oldLatLang	= explode(',',$_POST["old"]);
            $oldLat 		= filter_var($oldLatLang[0], FILTER_VALIDATE_FLOAT);
            $oldLng 		= filter_var($oldLatLang[1], FILTER_VALIDATE_FLOAT);

            $data = array(
                "nama" => $mName,
                "alamat" => $mAddress,
                "latitude" => $mLat,
                "longitude" => $mLng
            );

            if (EditTaman($data,$oldLat,$oldLng))
            {
                echo '<h1 class="marker-heading">'.$mName.'</h1><p>'.$mAddress.'</p><button name="edit-marker" class="edit-marker btn btn-sm btn-primary">Edit</button>';
            }
        }
    }
    else if (isset($_REQUEST['hapus']))
    {
        if($_POST)
        {
            $mLatLang	= explode(',',$_POST["latlang"]);
            $mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
            $mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);

            if (DelTaman($mLat,$mLng))
            {
                exit("Done!");
            }
            else
            {
                header('HTTP/1.1 500 Error: Could not delete Markers!');
                exit();
            }
        }
    }
?>