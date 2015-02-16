<?php
require_once dirname(__FILE__)."/modules/models/kategori.php";
require_once dirname(__FILE__)."/modules/models/taman.php";
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
        //echo $err_msg;
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
}

$laporan_masuk = false;

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
    $laporan_masuk = AddKeluhan($data);
}

$kategori = GetAllKategori();
$list_taman = GetAllTaman();
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Sistem Pengaduan Taman Kota Bandung</title>
    <meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
    <meta name="author" content="htmlcoder.me">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/logo%20bandung.png">

    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="assets/worthy/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="assets/worthy/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Plugins -->
    <link href="assets/worthy/css/animations.css" rel="stylesheet">

    <!-- Worthy core CSS file -->
    <link href="assets/worthy/css/style.css" rel="stylesheet">

    <!-- Custom css -->
    <link href="assets/worthy/css/custom.css" rel="stylesheet">

    <!--external css-->
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.css" />
</head>

<body class="no-trans">
<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<!-- header start -->
<!-- ================ -->
<header class="header fixed clearfix navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <!-- header-left start -->
                <!-- ================ -->
                <div class="header-left clearfix">

                    <!-- logo -->
                    <div class="logo smooth-scroll">
                        <a href="#banner"><img id="logo" src="assets/img/logo%20bandung.png" alt="Worthy"></a>
                    </div>

                    <!-- name-and-slogan -->
                    <div class="site-name-and-slogan smooth-scroll">
                        <div class="site-name"><a href="#banner">Bandung</a></div>
                        <div class="site-slogan">Sistem Pengaduan Taman Kota</div>
                    </div>

                </div>
                <!-- header-left end -->

            </div>
            <div class="col-md-8">

                <!-- header-right start -->
                <!-- ================ -->
                <div class="header-right clearfix">

                    <!-- main-navigation start -->
                    <!-- ================ -->
                    <div class="main-navigation animated">

                        <!-- navbar start -->
                        <!-- ================ -->
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">

                                <!-- Toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a href="#banner">Beranda</a></li>
                                        <li><a href="#about">Tentang Kami</a></li>
                                        <li><a href="#services">Cara Kerja</a></li>
                                        <li><a href="#lapor">Lapor!</a></li>
                                        <li><a href="#data">Data Keluhan</a></li>
                                        <li><a href="#contact">Kontak</a></li>
                                    </ul>
                                </div>

                            </div>
                        </nav>
                        <!-- navbar end -->

                    </div>
                    <!-- main-navigation end -->

                </div>
                <!-- header-right end -->

            </div>
        </div>
    </div>
</header>
<!-- header end -->
<!-- banner start -->
<!-- ================ -->
<div id="banner" class="banner" style="background-image: url('assets/worthy/images/banner.jpg');">
    <div class="banner-image"></div>
    <div class="banner-caption">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
                    <h1 class="text-center">Selamat <span>Datang</span></h1>
                    <p class="lead text-center">Kita semua mencintai Bandung. Pernah ke salah satu tamannya? Jika Anda ke sini, pasti Anda memiliki keluhan atau masukkan terkait salah satunya. Masukkan Anda sangat berarti buat kami.</p>
                    <div class="smooth-scroll" align="center"><a href="#lapor" class="btn btn-lg btn-primary">Laporkan Keluhan Anda Sekarang!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- section start -->
<!-- ================ -->
<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 id="about" class="title text-center">Tentang <span>Kami</span></h1>
                <p class="lead text-center">Kami "SARIUS" Kelompok 6 pada Mata Kuliah IF3250 Proyek Perangkat Lunak</p>
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/worthy/images/section-image-1.png" alt="">
                        <div class="space"></div>
                    </div>
                    <div class="col-md-6">
                        <p style="text-align: justify;">Kami Kelompok 6 pada mata kuliah IF3250-Proyek Perangkat Lunak yang menamakan diri kami "SARIUS". Namun, sehari-hari lebih dikenal kelompok 6 karena untuk mempermudah identifikasi kelompok</p>
                        <p style="text-align: justify;">Nama "SARIUS" sendiri diambil saat perdebatan nama yang bagaimana yang harus dipakai, apakah serius atau terkesan lucu, dan akhirnya kami mencari jalan tengah diantara keduanya, dan terbentuklah nama "SARIUS" yang beranggotakan:</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> 13512030 - Alvin Natawiguna</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> 13512058 - Andrey Simaputera</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> 13512090 - Nisa Dian Rachmadi</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> 13512096 - Kevin</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> 13512100 - Luthfi Hamid Masykuri</li>
                        </ul>
                    </div>
                </div>
                <div class="space"></div>
                <div class="space"></div>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<!-- section start -->
<!-- ================ -->
<div class="section translucent-bg bg-image-1 blue">
    <div class="container object-non-visible" data-animation-effect="fadeIn">
        <h1 id="services"  class="text-center title">Cara Kerja Kami</h1>
        <div class="space"></div>
        <div class="row">
            <div class="col-md-12" align="center">
                <img src="assets/img/workflow.png" class="img-responsive" alt=""/>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<!-- section start -->
<!-- ================ -->
<div class="default-bg space blue">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Segera Laporkan Keluhan Anda!</h1>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<!-- section start -->
<!-- ================ -->
<div class="section">
<div class="container">
<h1 class="text-center title" id="lapor">Laporkan Keluhan Anda</h1>
<div class="separator"></div>
<p class="lead text-center">Silakan isi form di bawah ini.</p>
<br>
<div class="row object-non-visible" data-animation-effect="fadeIn">
<div class="col-md-12">

    <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <fieldset>
            <div class="form-group">
                <label for="nama" class="col-lg-2 control-label">Nama</label>
                <div class="col-lg-10">
                    <input class="form-control" id="nama" name="nama_pelapor" placeholder="Nama" type="text" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="taman" class="col-lg-2 control-label">Nama Taman</label>
                <div class="col-lg-10">
                    <select class="form-control" id="taman" name="taman">
                        <?php foreach ($list_taman as $taman){ ?>
                            <option value="<?php echo $taman['id']; ?>"><?php echo $taman['nama']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Kategori</label>
                <div class="col-lg-10">
                    <?php $i=1; foreach ($kategori as $kat){ ?>
                        <label class="radio-inline">
                            <input type="radio" name="kategori" id="<?php echo $kat['id']; ?>" value="<?php echo $kat['id']; ?>" <?php if ($i==1) echo 'checked' ?>> <?php echo $kat['nama']; ?>
                        </label>
                    <?php $i++;} ?>
                </div>
            </div>
            <div class="form-group">
                <label for="keluhan" class="col-lg-2 control-label">Keluhan</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="keluhan" name="deskripsi" required></textarea>

                </div>
            </div>
            <div class="form-group">
                <label for="foto" class="col-lg-2 control-label">Foto <span class="help-block small">(Tidak Wajib)</span></label>
                <div class="col-lg-10">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div style="margin-bottom: 10px;">
                                  <span class="btn btn-info btn-file">
                                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
                                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                      <input type="file" name="foto" id="foto" class="default" />
                                  </span>

                        </div>
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" name="submit" class="btn btn-primary">laporkan!</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>
</div>
</div>
</div>
<!-- section end -->

<!-- section start -->
<!-- ================ -->
<div class="section translucent-bg bg-image-2 pb-clear">
    <div class="container object-non-visible" data-animation-effect="fadeIn">
        <h1 id="data" class="title text-center">Data Keluhan Taman Kota Bandung</h1>
        <div id="map-canvas"></div>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
    </div>
    <!-- section start -->
    <!-- ================ -->
    <!-- section end -->
</div>
<!-- section end -->

<!-- footer start -->
<!-- ================ -->
<footer id="footer">

    <!-- .footer start -->
    <!-- ================ -->
    <div class="footer section">
        <div class="container">
            <h1 class="title text-center" id="contact">Kontak Kami</h1>
            <div class="space"></div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="footer-content">
                        <p class="large">Jika Anda memiliki masukkan terkait dengan sistem pengaduan ini, silakan hubungi salah satu jalur yang tersedia di bawah ini. Anda juga dapat mengisi formulir di bagian kanan. Tim kami akan sesegera mungkin merespons Anda.</p>
                        <ul class="list-icons">
                            <li><i class="fa fa-map-marker pr-10"></i> Gedung Benny Subianto, Jalan Ganesha no. 10 Bandung</li>
                            <li><i class="fa fa-phone pr-10"></i> (022) 1234567</li>
                            <li><i class="fa fa-fax pr-10"></i> 08112345678 </li>
                            <li><i class="fa fa-envelope-o pr-10"></i> bandung@sarius.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="footer-content">
                        <img class="img-responsive" src="assets/img/labtek5.jpg" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer end -->

    <!-- .subfooter start -->
    <!-- ================ -->
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Copyright © 2015 Sistem Pengaduan Kota Bandung by <a target="_blank" href="#">Sarius Team</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- .subfooter end -->

</footer>
<!-- footer end -->
<?php if ($laporan_masuk){ ?>
<div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-label">Berhasil!</h4>
            </div>
            <div class="modal-body" align="center">
                <div class="space"></div>
                <div class="space"></div>
                <h1>Terima Kasih!</h1>
                <h3>Keluhan Anda sudah masuk ke dalam Sistem kami. Setelah kami verifikasi, keluhan Anda akan otomatis terkirim ke Dinas Pertamanan dan Pemakaman Kota Bandung.</h3>
                <div class="space"></div>
                <div class="smooth-scroll" align="center"><a href="#contact" class="btn btn-lg btn-primary" onclick="HideModal()">Anda bisa memnghubungi kami di sini!</a></div>
                <div class="space"></div>
                <div class="space"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- JavaScript files placed at the end of the document so the pages load faster
================================================== -->
<!-- Jquery and Bootstap core js files -->
<script type="text/javascript" src="assets/worthy/plugins/jquery.min.js"></script>
<script type="text/javascript" src="assets/worthy/bootstrap/js/bootstrap.min.js"></script>

<!-- Modernizr javascript -->
<script type="text/javascript" src="assets/worthy/plugins/modernizr.js"></script>

<!-- Isotope javascript -->
<script type="text/javascript" src="assets/worthy/plugins/isotope/isotope.pkgd.min.js"></script>

<!-- Backstretch javascript -->
<script type="text/javascript" src="assets/worthy/plugins/jquery.backstretch.min.js"></script>

<!-- Appear javascript -->
<script type="text/javascript" src="assets/worthy/plugins/jquery.appear.js"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="assets/worthy/js/template.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="assets/worthy/js/custom.js"></script>

<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<script src="assets/js/advanced-form-components.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
    $('#modal-success').modal('show');
    function HideModal()
    {
        $('#modal-success').modal('hide');
    }
    var map;
    var mapCenter = new google.maps.LatLng(-6.8968177,107.608704);
    function initialize() {
        var googleMapOptions =
        {
            center: mapCenter, // map center
            zoom: 15, //zoom level, 0 = earth view to higher value
            maxZoom: 18,
            minZoom: 13,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL //zoom control size
            },
            scaleControl: true, // enable scale control
            mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
        };

        map = new google.maps.Map(document.getElementById("map-canvas"), googleMapOptions);

        //Load Markers from the XML File, Check (map_process.php)
        $.get("modules/ajax/taman.php?get_list", function (data) {
            $(data).find("marker").each(function () {
                var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: "assets/img/pin_blue.png"
                });
                var infowindow = new google.maps.InfoWindow();
                var name = $(this).attr('name');
                var id = $(this).attr('id_taman');
                google.maps.event.addDomListener(marker, "click", function(event) {
                    $.get("modules/ajax/taman.php?get_laporan="+id, function (html) {
                        infowindow.setContent("<h1>"+name+"</h1><p>"+html+" Keluhan</p>");
                        infowindow.open(map,marker);
                    });
                });
            });
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>


</body>
</html>
