<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 13/02/2015
 * Time: 19:50
 */
$list_kategori = GetAllKategori();
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
                    <div class="input-group input-large" id="tanggal" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control dpd1" name="from" placeholder="Tanggal Mulai">
                        <span class="input-group-addon">s/d</span>
                        <input type="text" class="form-control dpd2" name="to" placeholder="Tanggal Akhir">
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option value="">Kategori</option>
                        <?php foreach ($list_kategori as $kategori){ ?>
                        <option value="<?php echo $kategori['id']; ?>"><?php echo $kategori['nama']; ?></option>
                        <?php } ?>
                    </select>
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
            $("#loading").show();
            $("#laporan").attr('src','../plugins/ViewerJS/#../../laporan/Laporan.pdf');
            $("#loading").hide();
            $("#laporan").show();
            $("#kirim").show();
        }
    </script>
</section>