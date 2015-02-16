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
                <button type="button" class="btn btn-default" id="kirim" style="display: none;" onclick="KirimLaporan()"><i class="fa fa-send"></i> Kirim</button>
                <img src="../assets/img/loading.gif" alt="" id="load-kirim" style="display: none;"/>
                <span class="post-proses" style="display: none;" id="sent"><i class="fa fa-check"></i> Laporan berhasil dikirim</span>
                <span class="post-proses" style="display: none;" id="fail"><i class="fa fa-warning"></i> Laporan gagal dikirim!</span>
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
        var from;
        var to;
        var file;
        function BuatLaporan()
        {
            from = $("#from").val();
            to = $("#to").val();
            $.ajax({
                type	: "POST",
                url 	: "../modules/ajax/buat_laporan.php",
                data	: {
                    from : from,
                    to : to
                },
                success	: function(html){
                    file = html;
                    $("#laporan").attr('src','../plugins/ViewerJS/#../../laporan/'+html);
                    $("#loading").hide();
                    $("#laporan").show();
                    $("#kirim").show();
                },
                beforeSend : function(){
                    $(".post-proses").hide();
                    $("#laporan").attr('src','');
                    $("#laporan").hide();
                    $("#kirim").hide();
                    $("#loading").show();
                }
            });
        }

        function KirimLaporan()
        {
            $.ajax({
                type	: "POST",
                url 	: "../modules/ajax/kirim_laporan.php",
                data	: {
                    from : from,
                    to : to,
                    laporan : file
                },
                success	: function(html){
                    $("#load-kirim").hide();
                    if (html == "true")
                    {
                        $("#sent").show();
                    }
                    else
                    {
                        $("#fail").show();
                    }
                },
                beforeSend : function(){
                    $(".post-proses").hide();
                    $("#load-kirim").show();
                }
            });
        }
    </script>
</section>