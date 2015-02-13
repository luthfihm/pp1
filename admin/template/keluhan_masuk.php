<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 10:41 PM
 */
    $list_keluhan = GetListKeluhanMasuk();
    $list_kategori = GetAllKategori();

    $num_keluhan = GetNumKeluhan();
?>

<section class="panel">
    <header class="panel-heading wht-bg">
        <h4 class="gen-case">Keluhan Masuk <?php if ($num_keluhan > 0) echo "(".$num_keluhan.")"; ?>

        </h4>
    </header>
    <?php if ($num_keluhan > 0){ ?>
    <form action="index.php?proses_keluhan" method="post">
    <div class="panel-body minimal">
        <div class="mail-option">
            <div class="chk-all">
                <div class="pull-left mail-checkbox">
                    <input type="checkbox" class="" onclick="CheckAll(this)" id="cek-all">
                </div>

                <div class="btn-group">
                    <label for="cek-all">Tandai Semua</label>
                </div>
            </div>

            <div class="btn-group">
                <button class="btn btn-theme proses" type="submit" name="verifikasi" style="display: none;"><i class=" fa fa-check"></i> Verifikasi</button>
            </div>
            <div class="btn-group">
                <button class="btn btn-danger proses" type="submit" name="hapus" style="display: none;" onclick="if(!confirm('Yakin untuk menghapus?')) return false;"><i class=" fa fa-trash"></i></button>
            </div>
        </div>
        <div class="table-inbox-wrap ">
            <table class="table table-inbox table-hover">
                <tbody>
                <?php
                    foreach ($list_keluhan as $keluhan){
                        $waktu = new DateTime($keluhan['waktu']);
                        date_default_timezone_set("Asia/Jakarta");
                        $now = new DateTime();
                        $format_waktu = "";
                        if ($waktu->format("Y-m-d")==$now->format("Y-m-d"))
                        {
                            $format_waktu = $waktu->format("H:i");
                        }
                        else if ($waktu->format("Y")==$now->format("Y"))
                        {
                            $format_waktu = $waktu->format("j M");
                        }
                        else
                        {
                            $format_waktu = $waktu->format("M Y");
                        }
                        $taman = GetTaman($keluhan['taman']);
                        $kategori = GetKategori($keluhan['kategori']);
                    ?>
                <tr class="<?php if ($keluhan['read']==0) echo 'unread'; ?>">
                    <td class="inbox-small-cells">
                        <input type="checkbox" class="mail-checkbox proses-cek" name="id_keluhan[]" value="<?php echo $keluhan['id']; ?>" onclick="ChangeStat(this)">
                    </td>
                    <td class="view-message  dont-show"><a href="index.php?keluhan=<?php echo $keluhan['id']; ?>"><?php echo $keluhan['nama_pelapor']; ?></a></td>
                    <td class="view-message "><a href="index.php?keluhan=<?php echo $keluhan['id']; ?>"><?php echo $taman['nama']; ?></a></td>
                    <td class="view-message "><a href="index.php?keluhan=<?php echo $keluhan['id']; ?>"><?php echo $kategori['nama']; ?></a></td>
                    <td class="view-message  inbox-small-cells" width="50px"><?php if ($keluhan['foto'] != ""){ ?><i class="fa fa-paperclip"></i><?php } ?></td>
                    <td class="view-message  text-center" width="120px"><?php echo $format_waktu; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    </form>
    <script>
        var num_cek = 0;
        function ChangeStat (Object)
        {
            if (Object.checked)
            {
                num_cek++;
            }
            else
            {
                num_cek--;
            }
            if (num_cek>0)
            {
                $(".proses").show();
            }
            else
            {
                $(".proses").hide();
            }

            if (num_cek == <?php echo $num_keluhan; ?>)
            {
                $("#cek-all").prop('checked',true);
            }
            else
            {
                $("#cek-all").prop('checked',false);
            }
        }
        function CheckAll(Object)
        {
            if (Object.checked)
            {
                $(".proses-cek").prop('checked',true);
                $(".proses").show();
                num_cek = <?php echo $num_keluhan; ?>;
            }
            else
            {
                $(".proses-cek").prop('checked',false);
                $(".proses").hide();
                num_cek = 0;
            }
        }
    </script>
    <?php }else{ ?>
        <footer class="panel-footer wht-bg">Tidak ada keluhan yang masuk</footer>
    <?php  } ?>
</section>