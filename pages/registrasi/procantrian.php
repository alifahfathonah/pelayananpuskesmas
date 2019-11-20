
<?php
include ('../dbconnect.php');

$idantrian = $_POST['id'];
$nopoli = $_POST['idpoli'];
$nmpoli = $_POST['idpolinm'];
$nama = strtoupper($_POST['namapas']);

$poli=$con->prepare("UPDATE `antrian` SET TUJUANNO = '".$nopoli."', TUJUANNM='".$nmpoli."', STATUS='1', PASIENNM='".$nama."' WHERE ID='".$idantrian."'");
$poli->execute();

?>