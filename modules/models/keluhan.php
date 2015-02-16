<?php
/**
 * Created by PhpStorm.
 * User: upix
 * Date: 2/11/2015
 * Time: 9:35 PM
 */
    require_once dirname(__FILE__)."/../database.php";
    require_once dirname(__FILE__).'/../../plugins/phpmailer/PHPMailerAutoload.php';

    function AddKeluhan($data)
    {
        $last_id = $GLOBALS['database']->insert("keluhan",$data);
        if ($last_id > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function GetKeluhan($id)
    {
        $data = $GLOBALS['database']->get("keluhan","*",["id" => $id]);
        return $data;
    }

    function GetListKeluhanMasuk()
    {
        $data = $GLOBALS['database']->select("keluhan","*",["status" => 0,"ORDER" => ["waktu DESC"]]);
        return $data;
    }

    function GetListKeluhanVerified()
    {
        $data = $GLOBALS['database']->select("keluhan","*",["status" => 1,"ORDER" => ["waktu DESC"]]);
        return $data;
    }

    function GetNumKeluhan()
    {
        return $GLOBALS['database']->count("keluhan","*",["status"=>0]);
    }

    function GetNumKeluhanVerified()
    {
        return $GLOBALS['database']->count("keluhan","*",["status"=>1]);
    }

    function VerifikasiKeluhan($id)
    {
        $data = $GLOBALS['database']->update("keluhan",[
            "status" => 1
        ],[
            "id" => $id
        ]);
        return ($data > 0);
    }

    function MarkAsReadKeluhan($id)
    {
        $data = $GLOBALS['database']->update("keluhan",[
            "read" => 1
        ],[
            "id" => $id
        ]);
        return ($data > 0);
    }

    function HapusKeluhan($id)
    {
        $data = $GLOBALS['database']->delete("keluhan",[
            "id" => $id
        ]);
        return ($data > 0);
    }

    function GetNumLaporan($from,$to,$taman,$kategori)
    {
        $data = $GLOBALS['database']->count("keluhan","*",[
            "AND" => [
                "status" => 1,
                "taman" => $taman,
                "kategori" => $kategori,
                "waktu[<>]" => [$from." 00:00:00",$to." 23:59:59"]
            ]
        ]);
        return $data;
    }

    function KirimKeluhan($id,$email)
    {
        $keluhan = GetKeluhan($id);
        $taman = GetTaman($keluhan['taman']);
        $kategori = GetKategori($keluhan['kategori']);
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.luthfihm.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'bandung@luthfihm.com';                 // SMTP username
        $mail->Password = 'ppl1bandung';                           // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;                                    // TCP port to connect to

        $mail->From = 'bandung@luthfihm.com';
        $mail->FromName = 'Sistem Pengaduan Taman Kota Bandung';
        $mail->addAddress($email);
        //$mail->isHTML(true);
        $mail->Subject = 'Keluhan Mengenai '.$kategori['nama'].' di '.$taman['nama'];
        $mail->Body    = 'Dengan hormat,
Kami dari Sistem Pengaduan Taman Kota Bandung memberitahukan bahwa terdapat keluhan dengan detail sebagai berikut :
        Nama pelapor : '.$keluhan['nama_pelapor'].'
        Email : '.$keluhan['email'].'
        Waktu : '.$keluhan['waktu'].'
        Keluhan :
        '.$keluhan['deskripsi'].'
Demikianlah pemberitahuan ini telah Kami sampaikan. Atas perhatiannya, Kami ucapkan terima kasih.

Hormat kami,
Sistem Pengaduan Taman Kota Bandung';
        if ($keluhan['foto'] != '')
        {
            $mail->addAttachment(dirname(dirname(dirname(__FILE__)))."/uploads/".$keluhan['foto']);
        }
        return $mail->send();
    }

    function KirimFeedBack($id)
    {
        $keluhan = GetKeluhan($id);
        $taman = GetTaman($keluhan['taman']);
        $kategori = GetKategori($keluhan['kategori']);
        $date = new DateTime($keluhan['waktu']);
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $tanggal = $date->format('j').' '.$bulan[$date->format('n')-1].' '.$date->format('Y');

        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.luthfihm.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'bandung@luthfihm.com';                 // SMTP username
        $mail->Password = 'ppl1bandung';                           // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;                                    // TCP port to connect to

        $mail->From = 'bandung@luthfihm.com';
        $mail->FromName = 'Sistem Pengaduan Taman Kota Bandung';
        $mail->addAddress($keluhan['email']);
        //$mail->isHTML(true);
        $mail->Subject = 'Keluhan Mengenai '.$kategori['nama'].' di '.$taman['nama'];
        $mail->Body    = 'Kepada Bapak/Ibu '.$keluhan['nama'].'
Kami dari Sistem Pengaduan Taman Kota Bandung ingin memberitahukan bahwa keluhan yang telah Anda sampaikan pada situs Kami pada tanggal '.$tanggal.' di '.$taman['nama'].' mengenai '.$kategori['nama'].' telah diverifikasi dan dikirim kepada Dinas Pertamanan Kota Bandung.
Demikianlah pemberitahuan ini telah Kami sampaikan. Atas perhatian Anda, Kami ucapkan terimakasih.

Hormat Kami,
Sistem Pengaduan Taman Kota Bandung';

        return $mail->send();
    }

?>