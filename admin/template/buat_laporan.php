<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 13/02/2015
 * Time: 19:50
 */
$list_kategori = GetAllKategori();
date_default_timezone_set("Asia/Jakarta");
$now = new DateTime();
?>
<section class="panel">
    <header class="panel-heading wht-bg">
        <h4 class="gen-case"> Buat Laporan

        </h4>
    </header>
    <div class="panel-body minimal">
        <div class="mail-option">
            <form action="#" class="form-inline">
                <div class="form-group">
                    <div class="input-group input-large" id="tanggal" data-date="2015-01-01" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control dpd1" value="<?php echo $now->format('m/01/Y'); ?>" name="from" id="from" placeholder="Tanggal Mulai" >
                        <span class="input-group-addon">s/d</span>
                        <input type="text" class="form-control dpd2" value="<?php echo $now->format('m/d/Y'); ?>" name="to" id="to" placeholder="Tanggal Akhir">
                    </div>
                </div>
                <button type="button" class="btn btn-default" onclick="BuatLaporan()"><i class="fa fa-book"></i> Buat Laporan</button>
                <button type="button" class="btn btn-default" id="kirim" style="display: none;"><i class="fa fa-send"></i> Kirim</button>
            </form>
        </div>
        <div class="col-md-12" id="loading" style="display: none;">
            <br/>
            <center>
                <img src="../assets/img/loading.gif" alt=""/>
            </center>
            <br/>
        </div>
        <iframe id="laporan" src = "" width='100%' height='500' allowfullscreen webkitallowfullscreen style="display: none;"></iframe>
    </div>
    <script>
        function BuatLaporan()
        {
            var from = $("#from").val();
            var to = $("#to").val();
            $.ajax({
                type	: "POST",
                url 	: "../modules/ajax/buat_laporan.php",
                data	: {
                    from : from,
                    to : to
                },
                success	: function(html){
                    $("#laporan").attr('src','../plugins/ViewerJS/#../../laporan/'+html);
                    $("#loading").hide();
                    $("#laporan").show();
                    $("#kirim").show();
                },
                beforeSend : function(){
                    $("#laporan").attr('src','');
                    $("#laporan").hide();
                    $("#kirim").hide();
                    $("#loading").show();
                }
            });
        }
    </script>
</section>