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
                    if (KirimKeluhan($id,"luthfi_hamid_m@yahoo.co.id"))
                    {
                        header("Location: index.php?keluhan_terverifikasi");
                    }
                    else
                    {
                        header("Location: index.php?keluhan=".$id);
                    }
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
        else if (isset($_REQUEST['tambah_kategori']))
        {
            if (isset($_POST['nama-kategori']))
            {
                TambahKategori($_POST['nama-kategori']);
            }

            header("Location: index.php");
        }
        else if (isset($_REQUEST['hapus_kategori']))
        {
            if ($_REQUEST['hapus_kategori'] != null)
            {
                $id = $_REQUEST['hapus_kategori'];
                HapusKategori($id);
            }
            header("Location: index.php");
        }
        else if (isset($_REQUEST['edit_kategori']))
        {
            if ($_REQUEST['edit_kategori'] != null)
            {
                $id = $_REQUEST['edit_kategori'];
                if (isset($_POST['nama-kategori']))
                {
                    $nama = $_POST['nama-kategori'];
                    EditKategori($id,$nama);
                }
            }
            header("Location: index.php");
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