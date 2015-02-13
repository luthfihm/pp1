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
                <button type="submit" class="btn btn-default">Buat Laporan</button>
            </form>
        </div>
        <iframe src = "../plugins/ViewerJS/#../../laporan/Laporan.pdf" width='100%' height='500' allowfullscreen webkitallowfullscreen></iframe>
    </div>
    <script>

    </script>
</section>