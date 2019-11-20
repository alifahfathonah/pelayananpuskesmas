<?php
include ('../dbconnect.php');
$tglskr = date('Y-m-d');
$qantrian1 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='1' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");
$qantrian1->execute();
$rows1=$qantrian1->fetch();
if ($rows1['NOMOR']=='') {$nomorreg1 = '00';}
else {$nomorreg1 = $rows1['NOMOR'];}

$qantrian2 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='11' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");
$qantrian2->execute();
$rows2=$qantrian2->fetch();
if ($rows2['NOMOR']=='') {$nomorreg2 = '00';}
else {$nomorreg2 = $rows2['NOMOR'];}

$qantrian3 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='12' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");
$qantrian3->execute();
$rows3=$qantrian3->fetch();
if ($rows3['NOMOR']=='') {$nomorreg3 = '00';}
else {$nomorreg3 = $rows3['NOMOR'];}

$qantrian4 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='13' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");
$qantrian4->execute();
$rows4=$qantrian4->fetch();
if ($rows4['NOMOR']=='') {$nomorreg4 = '00';}
else {$nomorreg4 = $rows4['NOMOR'];}

$qantrian5 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='14' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");
$qantrian5->execute();
$rows5=$qantrian5->fetch();
if ($rows5['NOMOR']=='') {$nomorreg5 = '00';}
else {$nomorreg5 = $rows5['NOMOR'];}



?>

<div class="info-box bg-blue">
  <span class="info-box-icon"><b><?php echo $nomorreg1; ?></b></span>
  <div class="info-box-content">
    <span class="info-box-text"><h3><b>PENDAFTARAN</b></h3></span>
    <span class="progress-description"> 
    </span>
  </div>
  <!-- /.info-box-content -->
 </div>
 <div class="info-box bg-black">
  <span class="info-box-icon"><b><?php echo $nomorreg2; ?></b></span>
  <div class="info-box-content">
    <span class="info-box-text"><h3><b>APOTEK</b></h3></span>
    <span class="progress-description">
          <b>PASIEN: <?php echo $rows2['PASIENNM']; ?></b> 
    </span>
  </div>
  <!-- /.info-box-content -->
 </div>
 <div class="info-box bg-black">
  <span class="info-box-icon"><b><?php echo $nomorreg3; ?></b></span>
  <div class="info-box-content">
    <span class="info-box-text"><h3><b>LABORATURIUM</b></h3></span>
    <span class="progress-description">
          <b>PASIEN: <?php echo $rows3['PASIENNM']; ?></b> 
    </span>
  </div>
  <!-- /.info-box-content -->
 </div>
 <div class="info-box bg-red">
  <span class="info-box-icon"><b><?php echo $nomorreg4; ?></b></span>
  <div class="info-box-content">
    <span class="info-box-text"><h3><b>POLI TB PARU</b></h3></span>
    <span class="progress-description">
          <b>PASIEN: <?php echo $rows4['PASIENNM']; ?></b> 
    </span>
  </div>
  <!-- /.info-box-content -->
 </div>
 <div class="info-box bg-red">
  <span class="info-box-icon"><b><?php echo $nomorreg5; ?></b></span>
  <div class="info-box-content">
    <span class="info-box-text"><h3><b>POLI KUSTA</b></h3></span>
    <span class="progress-description">
          <b>PASIEN: <?php echo $rows5['PASIENNM']; ?></b> 
    </span>
  </div>
  <!-- /.info-box-content -->
 </div>
