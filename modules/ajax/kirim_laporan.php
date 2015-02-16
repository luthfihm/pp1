<?php
/**
 * Created by PhpStorm.
 * User: luthfi
 * Date: 17/02/2015
 * Time: 1:16
 */
    require_once dirname(__FILE__)."/../models/instansi.php";
    require_once dirname(__FILE__).'/../../plugins/phpmailer/PHPMailerAutoload.php';

    if ($_POST)
    {
        $file = dirname(dirname(dirname(__FILE__))).'/laporan/'.$_POST['laporan'];
        $instansi = GetInstansi();

        $from = new DateTime($_POST['from']);
        $to = new DateTime($_POST['to']);

        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

        $mulai = $from->format('j').' '.$bulan[$from->format('n')-1].' '.$from->format('Y');
        $akhir = $to->format('j').' '.$bulan[$to->format('n')-1].' '.$to->format('Y');

        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.luthfihm.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'bandung@luthfihm.com';                 // SMTP username
        $mail->Password = 'ppl1bandung';                           // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;                                    // TCP port to connect to

        $mail->From = 'bandung@luthfihm.com';
        $mail->FromName = 'Sistem Pengaduan Taman Kota Bandung';
        $mail->addAddress($instansi['email']);

        $mail->Subject = 'Laporan Keluhan Periode '.$mulai." s.d. ".$akhir;
        $mail->Body = 'Dengan Hormat,
Kami dari Sistem Pengaduan Taman Kota Bandung bermaksud memberikan laporan pengaduan yang kami terima dari pengunjung taman di kota bandung tertanggal '.$mulai.' s.d '.$akhir.'.
Bersama ini Kami lampirkan juga file Laporan pada periode ini.
Demikianlah laporan yang dapat Kami sampaikan. Atas perhatiannya Kami ucapkan terima kasih.

Hormat Kami,
Sistem Pengaduan Taman Kota Bandung';

        $mail->addAttachment($file);

        if ($mail->send())
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }
?>