<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/12/2015
 * Time: 8:48 AM
 */
    $keluhan = GetKeluhan($_REQUEST['keluhan']);
    $kategori = GetKategori($keluhan['kategori']);
    $taman = GetTaman($keluhan['taman']);
    MarkAsReadKeluhan($keluhan['id'])
?>
<section class="panel">
    <header class="panel-heading wht-bg">
        <h4 class="gen-case"> Lihat Keluhan

        </h4>
    </header>
    <div class="panel-body ">

        <div class="mail-header row">
            <div class="col-md-8">
                <h4 class="pull-left"> <?php echo $kategori['nama'].' - '.$taman['nama']; ?> <?php if ($keluhan['status'] == 1){ ?><span class="small"><i class="fa fa-check"></i> Terverifikasi</span><?php } ?></h4>
            </div>
            <div class="col-md-4">
                <div class="compose-btn pull-right">
                    <?php if ($keluhan['status'] == 0){ ?>
                    <a href="index.php?verifikasi_keluhan=<?php echo $keluhan['id']; ?>" class="btn btn-sm btn-theme" ><i class="fa fa-check"></i> Verifikasi</a>
                    <?php } ?>
                    <button class="btn btn-sm btn-danger tooltips" onclick="HapusKeluhan()" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-trash-o"></i></button>
                </div>
            </div>

        </div>
        <div class="mail-sender">
            <div class="row">
                <div class="col-md-8">
                    <strong><?php echo $keluhan['nama_pelapor']; ?></strong>
                    <span>[<?php echo $keluhan['email']; ?>]</span>
                </div>
                <div class="col-md-4">
                    <p class="date"> <?php echo $keluhan['waktu']; ?></p>
                </div>
            </div>
        </div>
        <div class="view-mail">
            <p><?php echo $keluhan['deskripsi']; ?></p>
        </div>
        <?php if ($keluhan['foto'] != ""){ ?>
        <div class="attachment-mail">
            <p>
                <span><i class="fa fa-paperclip"></i> Foto Keluhan </span>
            <ul>
                <li>
                    <a class="atch-thumb" href="#">
                        <img src="../uploads/<?php echo $keluhan['foto']; ?>">
                    </a>

                    <a class="name" href="#">
                        <?php echo $keluhan['foto']; ?>
                        <span>20KB</span>
                    </a>

                    <div class="links">
                        <a href="#" data-toggle="modal" data-target="#modal-img">View</a> -
                        <a href="../uploads/<?php echo $keluhan['foto']; ?>" target="_blank">Download</a>
                    </div>
                </li>

            </ul>
        </div>
        <div class="modal fade" id="modal-img" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $keluhan['foto']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <img class="img-responsive" src="../uploads/<?php echo $keluhan['foto']; ?>" alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="compose-btn pull-left">
            <?php if ($keluhan['status'] == 0){ ?>
                <a href="index.php?verifikasi_keluhan=<?php echo $keluhan['id']; ?>" class="btn btn-sm btn-theme" ><i class="fa fa-check"></i> Verifikasi</a>
            <?php } ?>
            <button class="btn btn-sm btn-danger tooltips" onclick="HapusKeluhan()" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-trash-o"></i></button>
        </div>
    </div>
    <script>
        function HapusKeluhan()
        {
            if (confirm('Yakin untuk menghapus?'))
            {
                window.location = "index.php?hapus_keluhan=<?php echo $keluhan['id']; ?>";
            }
        }
    </script>
</section>