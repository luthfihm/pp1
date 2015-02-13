<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 9:39 PM
 */
    require_once dirname(__FILE__)."/modules/models/keluhan.php";
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $err_msg = "";
    $file_name = "";
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            $err_msg = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $err_msg = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $err_msg = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["foto"]["size"] > 2000000) {
        $err_msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $err_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo $err_msg;
    // if everything is ok, try to upload file
    } else {
        $file_name = date("Ymd-His").".".$imageFileType;
        $target_file = $target_dir.$file_name;
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    if(isset($_POST["submit"]))
    {
        if ($uploadOk == 0)
        {
            $file_name = "";
        }
        $data = array(
            "nama_pelapor"  => $_POST["nama_pelapor"],
            "email"         => $_POST["email"],
            "taman" => $_POST["taman"],
            "deskripsi" => $_POST["deskripsi"],
            "foto" => $file_name,
            "kategori" => $_POST["kategori"],
            "status" => 0
        );
        if (AddKeluhan($data))
        {
            echo "Keluhan berhasil masuk";
        }
        else
        {
            echo "Keluhan Gagal Masuk";
        }
    }
?>