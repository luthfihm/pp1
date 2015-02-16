<?php
require_once dirname(__FILE__)."/modules/models/kategori.php";
require_once dirname(__FILE__)."/modules/models/taman.php";

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
                                        <li><a href="#services">Alur Kerja</a></li>
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
<?php if (false) { ?>
    <!-- section start -->
    <!-- ================ -->
    <div class="section">
        <div class="container">
            <h1 class="text-center title" id="lapor">Laporkan Keluhan Anda</h1>
            <div class="separator"></div>
            <p class="lead text-center">Lorem ipsum dolor sit amet laudantium molestias similique.<br> Quisquam incidunt ut laboriosam.</p>
            <br>
            <div class="row object-non-visible" data-animation-effect="fadeIn">
                <div class="col-md-12">



                </div>
            </div>
        </div>
    </div>
    <!-- section end -->
<?php }else{ ?>
<!-- banner start -->
<!-- ================ -->
<div id="banner" class="banner" style="background-image: url('assets/worthy/images/banner.jpg');">
    <div class="banner-image"></div>
    <div class="banner-caption">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
                    <h1 class="text-center">Selamat <span>Datang</span></h1>
                    <p class="lead text-center"></p>
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
                <h1 id="about" class="title text-center">About <span>Worthy</span></h1>
                <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta officia, aspernatur.</p>
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="assets/worthy/images/section-image-1.png" alt="">
                        <div class="space"></div>
                    </div>
                    <div class="col-md-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi adipisci illo, voluptatum ipsam fuga error commodi architecto, laudantium culpa tenetur at id, beatae placeat deserunt iure quas voluptas fugit eveniet.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo ducimus explicabo quibusdam temporibus deserunt doloremque pariatur ea, animi a. Delectus similique atque eligendi, enim vel reiciendis deleniti neque aliquid, sit?</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> Lorem ipsum dolor sit amet</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> Reiciendis deleniti neque aliquid</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> Ipsam fuga error commodi</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> Lorem ipsum dolor sit amet</li>
                            <li><i class="fa fa-caret-right pr-10 text-colored"></i> Dignissimos molestiae necessitatibus</li>
                        </ul>
                    </div>
                </div>
                <div class="space"></div>
                <h2>Becessitatibus quae beatae possimus ullam</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi adipisci illo, voluptatum ipsam fuga error commodi architecto, laudantium culpa tenetur at id, beatae placeat deserunt iure quas voluptas fugit eveniet.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo ducimus explicabo quibusdam temporibus deserunt doloremque pariatur ea, animi a. Delectus similique atque eligendi, enim vel reiciendis deleniti neque aliquid, sit?</p>
                        <p>Vitae dolores quam magnam accusantium nam, voluptatibus expedita delectus, dolorum odio magni ut nemo nihil ex earum pariatur molestias velit eveniet, facere autem saepe aut. Ut minima itaque porro facere. Cumque vitae autem, dignissimos molestiae necessitatibus culpa aliquam deleniti soluta sunt voluptatibus tenetur, unde dolorem eligendi doloribus quibusdam facere totam. Possimus atque deserunt numquam aliquam magnam, facilis officiis illo alias ipsa voluptas laborum, praesentium eveniet nobis velit voluptatem odio eligendi, corporis et iste distinctio! Repellendus, id, ad.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Collapsible Group Item #1
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Collapsible Group Item #2
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Collapsible Group Item #3
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        Richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<!-- section start -->
<!-- ================ -->
<div class="section translucent-bg bg-image-1 blue">
    <div class="container object-non-visible" data-animation-effect="fadeIn">
        <h1 id="services"  class="text-center title">Worthy Services</h1>
        <div class="space"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-body text-right">
                        <h4 class="media-heading">Service 1</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                    <div class="media-right">
                        <i class="fa fa-cog"></i>
                    </div>
                </div>
                <div class="media">
                    <div class="media-body text-right">
                        <h4 class="media-heading">Service 2</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                    <div class="media-right">
                        <i class="fa fa-check"></i>
                    </div>
                </div>
                <div class="media">
                    <div class="media-body text-right">
                        <h4 class="media-heading">Service 3</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                    <div class="media-right">
                        <i class="fa fa-desktop"></i>
                    </div>
                </div>
                <div class="media">
                    <div class="media-body text-right">
                        <h4 class="media-heading">Service 4</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                    <div class="media-right">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="space visible-xs"></div>
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left">
                        <i class="fa fa-leaf"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service 5</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <i class="fa fa-area-chart"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service 6</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <i class="fa fa-child"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service 7</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <i class="fa fa-codepen"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Service 8</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aperiam consequatur quo quis exercitationem reprehenderit dolor vel ducimus, voluptate eaque suscipit iste placeat.</p>
                    </div>
                </div>
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
                <h1 class="text-center">Let's Work Together!</h1>
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
<p class="lead text-center">Lorem ipsum dolor sit amet laudantium molestias similique.<br> Quisquam incidunt ut laboriosam.</p>
<br>
<div class="row object-non-visible" data-animation-effect="fadeIn">
<div class="col-md-12">

    <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="lapor_keluhan.php">
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
            <h1 class="title text-center" id="contact">Contact Us</h1>
            <div class="space"></div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="footer-content">
                        <p class="large">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Repellat vel, et itaque commodi iste ab, laudantium voluptas deserunt nobis.</p>
                        <ul class="list-icons">
                            <li><i class="fa fa-map-marker pr-10"></i> One infinity loop, 54100</li>
                            <li><i class="fa fa-phone pr-10"></i> +00 1234567890</li>
                            <li><i class="fa fa-fax pr-10"></i> +00 1234567891 </li>
                            <li><i class="fa fa-envelope-o pr-10"></i> your@email.com</li>
                        </ul>
                        <ul class="social-links">
                            <li class="facebook"><a target="_blank" href="https://www.facebook.com/pages/HtmlCoder/714570988650168"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a target="_blank" href="https://twitter.com/HtmlcoderMe"><i class="fa fa-twitter"></i></a></li>
                            <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                            <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
                            <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                            <li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube"></i></a></li>
                            <li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
                            <li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="footer-content">
                        <form role="form" id="footer-form">
                            <div class="form-group has-feedback">
                                <label class="sr-only" for="name2">Name</label>
                                <input type="text" class="form-control" id="name2" placeholder="Name" name="name2" required>
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="sr-only" for="email2">Email address</label>
                                <input type="email" class="form-control" id="email2" placeholder="Enter email" name="email2" required>
                                <i class="fa fa-envelope form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="sr-only" for="message2">Message</label>
                                <textarea class="form-control" rows="8" id="message2" placeholder="Message" name="message2" required></textarea>
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <input type="submit" value="Send" class="btn btn-default">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer end -->
    <?php } ?>
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
    var map;
    function initialize() {
        var mapOptions = {
            zoom: 13,
            center: new google.maps.LatLng(-6.9033101,107.642621)
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var infowindow;
        <?php
        $list_taman = GetAllTaman();
        foreach ($list_taman as $taman){
        ?>

        var marker<?php echo $taman['id']; ?>  = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $taman['latitude']; ?> , <?php echo $taman['longitude']; ?> ),
            map: map,
            title: "<?php echo $taman['nama']; ?>"
        });
        google.maps.event.addListener(marker<?php echo $taman['id']; ?>, 'click', function() {
            infowindow = new google.maps.InfoWindow({
                content: '<div align="center" class="info-map"><a href="#">10 Keluhan</a></div>'
            });
            infowindow.open(map,marker<?php echo $taman['id']; ?> );
        });

        <?php } ?>
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>


</body>
</html>
