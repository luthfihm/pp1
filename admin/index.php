<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 11/02/2015
 * Time: 12:43
 */
    require_once dirname(__FILE__)."/../modules/models/admin.php";
    require_once dirname(__FILE__)."/../modules/models/kategori.php";
    require_once dirname(__FILE__)."/../modules/models/taman.php";
    require_once dirname(__FILE__)."/../modules/models/keluhan.php";
    if (IsLoggedIn())
    {
        if (isset($_REQUEST['logout']))
        {
            Logout();
            header("Location: login.php");
        }
        else if (isset($_REQUEST['verifikasi_keluhan']))
        {
            if ($_REQUEST['verifikasi_keluhan'] != null)
            {
                $id = $_REQUEST['verifikasi_keluhan'];
                if (VerifikasiKeluhan($id))
                {
                    header("Location: index.php?keluhan_terverifikasi");
                }
                else
                {
                    header("Location: index.php?keluhan=".$id);
                }
            }
        }
        else if (isset($_REQUEST['hapus_keluhan']))
        {
            if ($_REQUEST['hapus_keluhan'] != null)
            {
                $id = $_REQUEST['hapus_keluhan'];
                if (HapusKeluhan($id))
                {
                    header("Location: index.php");
                }
                else
                {
                    header("Location: index.php?keluhan=".$id);
                }
            }
        }
        else if (isset($_REQUEST['proses_keluhan']))
        {
            if (isset($_POST['id_keluhan']))
            {
                foreach ($_POST['id_keluhan'] as $id_keluhan) {
                    if (isset($_POST['verifikasi']))
                    {
                        VerifikasiKeluhan($id_keluhan);
                    }
                    else if (isset($_POST['hapus']))
                    {
                        HapusKeluhan($id_keluhan);
                    }
                }
                if (isset($_POST['verifikasi']))
                {
                    header("Location: index.php?keluhan_terverifikasi");
                }
                else if (isset($_POST['hapus']))
                {
                    header("Location: index.php?keluhan_masuk");
                }
            }
        }
        else
        {
            include "template/page.php";
        }
    }
    else
    {
        header("Location: login.php");
    }
?>