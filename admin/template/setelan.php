<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 17/02/2015
 * Time: 0:17
 */
    $instansi = GetInstansi();
?>
<section class="panel">
    <header class="panel-heading wht-bg">
        <h4 class="gen-case"> Setelan

        </h4>
    </header>
    <div class="panel-body ">
        <form class="form-horizontal" action="index.php?simpan_setelan" method="post">
            <div class="form-group">
                <label for="nama-instansi" class="col-sm-2 control-label">Nama Instansi</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama-instansi" name="nama-instansi" placeholder="Nama Instansi" value="<?php echo $instansi['nama']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email-instansi" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" id="email-instansi" name="email-instansi" placeholder="Email" value="<?php echo $instansi['email']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-5">
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <script>

    </script>
</section>