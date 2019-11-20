
<?php
include ('../dbconnect.php');

$tanggal = $_POST['dateinput'];
$querydate = $con->prepare("SELECT `TANGGAL`, `NOMOR` FROM `antrian` WHERE `STATUS`>'0' AND TANGGAL='".$tanggal."' ORDER BY ID DESC LIMIT 1");
$querydate->execute();
$datadate = $querydate->fetch();

$tanggalnow = $datadate['TANGGAL'];
$nomor = $datadate['NOMOR'];

if ($tanggalnow == $tanggal) {
	$tnomor = $nomor+1;
	$insertdata=$con->prepare("INSERT INTO `antrian`(`TANGGAL`, `JAM`, `NOMOR`, `TUJUANNO`, `TUJUANNM`, `STATUS`) VALUES (now(),now(),'$tnomor','1','REGISTRATION','1')");
	$insertdata->execute();
}else{
	$tnomor = '1';
	$insertdata=$con->prepare("INSERT INTO `antrian`(`TANGGAL`, `JAM`, `NOMOR`, `TUJUANNO`, `TUJUANNM`, `STATUS`) VALUES (now(),now(),'$tnomor','1','REGISTRATION','1')");
	$insertdata->execute();
}

?>