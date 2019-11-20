<?php
include ('../dbconnect.php');
$tglskr = date('Y-m-d');
$qpoli1 = $con->prepare("SELECT `PASIENNM`, `NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='3' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");//LANSIA
$qpoli1->execute();
$rowspoli1=$qpoli1->fetch();
if ($rowspoli1['NOMOR']=='') {$poli1 = '00';}
else {$poli1 = $rowspoli1['NOMOR'];}

$qpoli2 = $con->prepare("SELECT `PASIENNM`, `NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='4' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");//UMUM
$qpoli2->execute();
$rowspoli2=$qpoli2->fetch();
if ($rowspoli2['NOMOR']=='') {$poli2 = '00';}
else {$poli2 = $rowspoli2['NOMOR'];}

$qpoli3 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='5' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");//GIGI
$qpoli3->execute();
$rowspoli3=$qpoli3->fetch();
if ($rowspoli3['NOMOR']=='') {$poli3 = '00';}
else {$poli3 = $rowspoli3['NOMOR'];}

$qpoli4 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='6' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");//MTBS
$qpoli4->execute();
$rowspoli4=$qpoli4->fetch();
if ($rowspoli4['NOMOR']=='') {$poli4 = '00';}
else {$poli4 = $rowspoli4['NOMOR'];}

$qpoli5 = $con->prepare("SELECT `PASIENNM`,`NOMOR` FROM `antrian` WHERE `STATUS`='11' AND TUJUANNO='9' AND TANGGAL='".$tglskr."' ORDER BY `ID` DESC LIMIT 1");//KIA
$qpoli5->execute();
$rowspoli5=$qpoli5->fetch();
if ($rowspoli5['NOMOR']=='') {$poli5 = '00';}
else {$poli5 = $rowspoli5['NOMOR'];}



?>
 
<div class="info-box">
  <span class="info-box-icon bg-green"><b><?php echo $poli1; ?></b></span>

  <div class="info-box-content">
    <span class="info-box-number"><h3><strong>POLI LANSIA</strong></h3></span>
    <span class="info-box-text"><b>PASIEN: <?php echo $rowspoli1['PASIENNM']; ?></b></span>
  </div>
  <!-- /.info-box-content -->
</div>
    <!-- /.info-box -->
<div class="info-box">
  <span class="info-box-icon bg-green"><b><?php echo $poli2; ?></b></span>

  <div class="info-box-content">
    <span class="info-box-number"><h3><strong>POLI UMUM</strong></h3></span>
    <span class="info-box-text"><b>PASIEN: <?php echo $rowspoli2['PASIENNM']; ?></b></span>
  </div>
  <!-- /.info-box-content -->
</div>

<div class="info-box">
  <span class="info-box-icon bg-green"><b><?php echo $poli3; ?></b></span>

  <div class="info-box-content">
    <span class="info-box-number"><h3><strong>POLI GIGI</strong></h3></span>
    <span class="info-box-text"><b>PASIEN: <?php echo $rowspoli3['PASIENNM']; ?></b></span>
  </div>
  <!-- /.info-box-content -->
</div>

<div class="info-box">
  <span class="info-box-icon bg-green"><b><?php echo $poli4; ?></b></span>

  <div class="info-box-content">
    <span class="info-box-number"><h3><strong>POLI MTBS</strong></h3></span>
    <span class="info-box-text"><b>PASIEN: <?php echo $rowspoli4['PASIENNM']; ?></b></span>
  </div>
  <!-- /.info-box-content -->
</div>

<div class="info-box">
  <span class="info-box-icon bg-green"><b><?php echo $poli5; ?></b></span>

  <div class="info-box-content">
    <span class="info-box-number"><h3><strong>POLI KIA</strong></h3></span>
    <span class="info-box-text"><b>PASIEN: <?php echo $rowspoli5['PASIENNM']; ?></b></span>
  </div>
  <!-- /.info-box-content -->
</div>