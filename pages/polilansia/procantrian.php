
<?php
include ('../dbconnect.php');

$idantrian = $_POST['id'];
$nopoli = $_POST['idpoli'];
$nmpoli = $_POST['idpolinm'];


if ($nopoli=='11') {
	$poli=$con->prepare("UPDATE `antrian` SET TUJUANNO = '".$nopoli."', TUJUANNM='".$nmpoli."', STATUS='1' WHERE ID='".$idantrian."'");
	$poli->execute();
}
elseif($nopoli=='12'){
	$poli=$con->prepare("UPDATE `antrian` SET STATUS='2' WHERE ID='".$idantrian."'");
	$poli->execute();
}

?>