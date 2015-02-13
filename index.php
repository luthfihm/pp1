<?php
    require_once dirname(__FILE__)."/modules/models/kategori.php";
    require_once dirname(__FILE__)."/modules/models/taman.php";

    $kategori = GetAllKategori();
    $list_taman = GetAllTaman();
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

    <title>Sistem Pengaduan Taman Kota Bandung</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
   <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
        <header class="header black-bg">
            <div class="container">
                <!--logo start-->
                <a href="index.php" class="logo"><b>Sistem Pengaduan Taman <span>Kota Bandung</span></b></a>
                <!--logo end-->
            </div>   
            
        </header>
      <!--header end-->    
      <section id="front-content">
          <div class="container">
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="lapor_keluhan.php">
                  <fieldset>
                    <legend>Form Keluhan Taman</legend>
                    <div class="form-group">
                      <label for="nama" class="col-lg-2 control-label">Nama</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="nama" name="nama_pelapor" placeholder="Nama" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-lg-2 control-label">Email</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email">
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
                        <?php foreach ($kategori as $kat){ ?>
                            <label class="radio-inline">
                                <input type="radio" name="kategori" id="<?php echo $kat['id']; ?>" value="<?php echo $kat['id']; ?>"> <?php echo $kat['nama']; ?>
                            </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="keluhan" class="col-lg-2 control-label">Keluhan</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="keluhan" name="deskripsi"></textarea>
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="foto" class="col-lg-2 control-label">Foto *</label>
                      <div class="col-lg-10">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                              <div>
                                  <span class="btn btn-theme02 btn-file">
                                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
                                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                      <input type="file" name="foto" id="foto" class="default" />
                                  </span>
                                  
                              </div>
                          </div>
                      </div>
                    </div>                    
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" name="submit" class="btn btn-primary">laporkan!</button>
                        <span class="help-block">*) Tidak Wajib.</span>
                      </div>
                    </div>
                  </fieldset>
                </form>
          </div>
      </section>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
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

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
