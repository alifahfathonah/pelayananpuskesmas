
<?php
include ('../dbconnect.php');

$idantrian = $_POST['iddel'];
$politunda=$con->prepare("UPDATE `antrian` SET STATUS='0' WHERE ID='".$idantrian."'");
$politunda->execute();

?>