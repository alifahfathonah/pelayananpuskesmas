
<?php
include ('../dbconnect.php');

$tanggal = $_POST['tgldelete'];

if ($tanggal=='') {
	echo "[ERROR DATA]\nANDA BELUM MEMASUKKAN DATA DENGAN BENAR KLIK F5 KEMBALI";
}else{
$deletedata=$con->prepare("DELETE FROM `antrian` WHERE `TANGGAL`='".$tanggal."'");
$deletedata->execute();
if ($deletedata){
	echo "DATA AKAN DI DELETE DARI DATABASE\nTEKAN F5 UNTUK RELOAD HALAMAN.";
}
}


?>