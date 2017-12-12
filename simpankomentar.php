<?php
error_reporting(0);
session_start();
include "config/koneksi.php";
include "config/library.php";
include 'config/fungsi_badword.php';

$nama=trim($_POST['namanya']);
$komentar=trim($_POST['isinya']);

if (empty($nama)){
  echo "Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($komentar)){
  echo "Anda belum mengisikan KOMENTAR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (strlen($_POST['isinya']) > 1000) {
  echo "KOMENTAR Anda kepanjangan, dikurangin atau dibagi jadi beberapa bagian.<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$nama_komentar = antiinjection($_POST['namanya']);
$url = antiinjection($_POST['urlnya']);
$isi_komentar = antiinjection($_POST['isinya']);


	if(!empty($_POST['kodenya'])){
     $n1=$tgl_skrg+1+6-2*2+$menit_sekarang;
     $n2=$n1*$tgl_skrg;
     $n3=$n2/3;
     $ini="Myreffah$n3";
    	if($_POST['kodenya']=="$ini"){

// Mengatasi input komentar tanpa spasi
$split_text = explode(" ",$isi_komentar);
$split_count = count($split_text);
$max = 57;

for($i = 0; $i <= $split_count; $i++){
if(strlen($split_text[$i]) >= $max){
for($j = 0; $j <= strlen($split_text[$i]); $j++){
$char[$j] = substr($split_text[$i],$j,1);
if(($j % $max == 0) && ($j != 0)){
  $v_text .= $char[$j] . ' ';
}else{
  $v_text .= $char[$j];
}
}
}else{
  $v_text .= " " . $split_text[$i] . " ";
}
}
$baca="N";
    $sql = mysql_query("INSERT INTO komentar(nama_komentar,url,isi_komentar,id_berita,tgl,jam_komentar,baca) 
                        VALUES('$nama_komentar','$url','$v_text','$_POST[id]','$tgl_sekarang','$jam_sekarang','$N')");

    echo "<meta http-equiv='refresh' content='0; url=berita-$_POST[id].myreffah'>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok $ini <br />
			     <script>window.alert('Isikan Kode Dengan Benar');
      history.go(-1);</script>";
		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <script>window.alert('Isi Kode Terlebih Dahulu');
      history.go(-1);</script>";
	}
}
?>
