<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 11/02/2015
 * Time: 14:00
 */
    $num_keluhan = GetNumKeluhan();
    $active = "";
    $title = "";
    if (isset($_REQUEST['keluhan']))
    {
        $content = "keluhan.php";
        $title = "Keluhan";
    }
    else if (isset($_REQUEST['keluhan_masuk']))
    {
        $content = "keluhan_masuk.php";
        $active = "masuk";
        $title = "Keluhan Masuk";
    }
    else if (isset($_REQUEST['keluhan_terverifikasi']))
    {
        $content = "keluhan_terverifikasi.php";
        $active = "verified";
        $title = "Keluhan Terverifikasi";
    }
    else if (isset($_REQUEST['buat_laporan']))
    {
        $content = "buat_laporan.php";
        $active = "laporan";
        $title = "Buat Laporan";
    }
    else if (isset($_REQUEST['manajemen_pengguna']))
    {
        $content = "manajemen_pengguna.php";
        $active = "user";
        $title = "Manajemen Pengguna";
    }
    else
    {
        $content = "keluhan_masuk.php";
        $active = "masuk";
        $title = "Home";
    }
    $list_taman = GetAllTaman();
    $list_kategori = GetAllKategori();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="http://alvarez.is/demo/dashio/favicon.png">

    <title>Administrator - <?php echo $title; ?> | Sistem Pengaduan Taman Kota Bandung</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/datertimepicker.css" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <script type="text/javascript" src="../assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="../assets/js/advanced-form-components.js"></script>
</head>

<body>

<section id="container" >
<!-- **********************************************************************************************************************************************************
TOP BAR CONTENT & NOTIFICATIONS
*********************************************************************************************************************************************************** -->
<!--header start-->
<header class="header black-bg">
    <!--logo start-->
    <a href="../" class="logo" target="_blank"><b>Sistem Pengaduan Taman <span>Kota Bandung</span></b></a>
    <!--logo end-->
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="index.php?logout">Logout</a></li>
        </ul>
    </div>
</header>
<!--header end-->

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row mt">
<div class="col-sm-3">
    <section class="panel">
        <div class="panel-body">
            <a href="index.php?buat_laporan"  class="btn btn-compose">
                <i class="fa fa-book"></i>  Buat Laporan
            </a>
            <ul class="nav nav-pills nav-stacked mail-nav">
                <li class="<?php if ($active=='masuk') echo 'active'; ?>"><a href="index.php?keluhan_masuk"> <i class="fa fa-inbox"></i> Keluhan Masuk  <?php if ($num_keluhan >0){ ?><span class="label label-theme pull-right inbox-notification"><?php echo $num_keluhan ?></span><?php } ?></a></li>
                <li class="<?php if ($active=='verified') echo 'active'; ?>"><a href="index.php?keluhan_terverifikasi"> <i class="fa fa-check-circle"></i> Keluhan Terverifikasi  </a></li>
                <li class="<?php if ($active=='user') echo 'active'; ?>"><a href="index.php?manajemen_pengguna"> <i class="fa fa-user"></i> Manajemen Pengguna  </a></li>
                <li class="<?php if ($active=='setting') echo 'active'; ?>"><a href="#"> <i class="fa fa-cog"></i> Setelan  </a></li>
            </ul>
        </div>
    </section>
    <section class="panel">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked labels-info ">
                <li> <h4>Daftar Kategori</h4> </li>
                <?php foreach ($list_kategori as $kategori){ ?>
                <li class="list-kategori">
                    <a href="#" id="kat<?php echo $kategori['id']; ?>">
                        <img src="../assets/img/tree.png" class="img-circle" width="20"><?php echo $kategori['nama']; ?>
                        <p class="edit-kategori">
                            <button class="btn btn-sm btn-theme" onclick="ShowEditkat(<?php echo $kategori['id']; ?>)">
                                <i class="fa fa-pencil"> Edit</i>
                            </button>
                            <button class="btn btn-sm btn-default" onclick="HapusKategori(<?php echo $kategori['id']; ?>)">
                                <i class="fa fa-trash"> Hapus</i>
                            </button>
                        </p>
                    </a>
                    <form action="index.php?edit_kategori=<?php echo $kategori['id']; ?>" method="post">
                        <div class="input-group" id="edit-kat<?php echo $kategori['id']; ?>" style="display: none;">
                            <input type="text" class="form-control" value="<?php echo $kategori['nama']; ?>" name="nama-kategori" id="nama-kategori<?php echo $kategori['id']; ?>" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-default" type="button" onclick="HideEditkat(<?php echo $kategori['id']; ?>)"><i class="fa fa-undo"></i></button>
                        </span>
                        </div><!-- /input-group -->
                    </form>
                </li>
                <?php } ?>
            </ul>
            <a href="#" id="add-btn-kat" onclick="ShowAddkat()"> + Tambah Kategori</a>
            <form action="index.php?tambah_kategori" method="post">
                <div class="input-group" id="add-kat" style="display: none;">
                    <input type="text" class="form-control" name="nama-kategori" id="nama-kategori" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-default" type="button" onclick="HideAddkat()"><i class="fa fa-remove"></i></button>
                        </span>
                </div><!-- /input-group -->
            </form>
        </div>
    </section>
</div>
<div class="col-sm-9">
<?php
    include($content);
?>
</div>
</div>




</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->

<!-- js placed at the end of the document so the pages load faster -->


<script>
//custom select box


    function ShowAddkat()
    {
        $("#add-btn-kat").hide();
        $("#add-kat").show();
        $("#nama-kategori").focus();
    }

    function HideAddkat()
    {
        $("#add-btn-kat").show();
        $("#add-kat").hide();
        $("#nama-kategori").val("");
    }

    function HapusKategori(id)
    {
        if (confirm("Yakin untuk menghapus?"))
        {
            window.location = "index.php?hapus_kategori="+id;
        }
    }

    function ShowEditkat(id)
    {
        $("#kat"+id).hide();
        $("#edit-kat"+id).show();
        $("#nama-kategori"+id).focus();
    }

    function HideEditkat(id)
    {
        $("#kat"+id).show();
        $("#edit-kat"+id).hide();
    }
</script>

</body>
</html>
