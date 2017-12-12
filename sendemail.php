<?php
include "config/library.php";
include "config/koneksi.php";

    $name = $_POST['jeneng']; 
    $email = $_POST['_mail']; 
    $subject = $_POST['_subject']; 
    $message = $_POST['isine_opo']; 
    $baca = "N";

    $sql = mysql_query("INSERT INTO hubungi(nama,email,subjek,pesan,tanggal,jam,baca) 
                        VALUES('$name,$email,$subject,$message,$tgl_sekarang,$jam_sekarang,$baca')");
    
   echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>"; 

   ?>