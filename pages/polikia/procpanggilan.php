<?php
include ('../dbconnect.php');

$idant2 = $_POST['idupdatex'];
$querypanggil=$con->prepare("UPDATE `antrian` SET `STATUS`='11' WHERE `ID`='".$idant2."'");
$querypanggil->execute();

if ($querypanggil) {
	echo $idant2;
}
?>