<?php
date_default_timezone_set("Asia/Jakarta");
include ('../dbconnect.php');
$tglsekarang = date("Y-m-d");
//$tglsekarang = '2017-08-22';
$queryreg = $con->prepare("SELECT * FROM `antrian` WHERE ((`STATUS`='1' OR `STATUS`='11') AND (`TUJUANNO`='6') AND (`TANGGAL`='".$tglsekarang."')) ORDER BY ID ASC LIMIT 1");
$queryreg->execute();
$rowsnumber=$queryreg->fetch();

if ($rowsnumber['NOMOR']=='') {$number = "00";}
else {$number = $rowsnumber['NOMOR'];}
$tglmasuk = $rowsnumber['TANGGAL'];
$jammasuk = $rowsnumber['JAM'];
$idant1 = $rowsnumber['ID'];
$namapasien = $rowsnumber['PASIENNM'];
$ruangan = "registrasi";

$masterpoli = $con->prepare("SELECT * FROM `masterdata` WHERE `STATUS`='2'");
$masterpoli->execute();
$datapoli=$masterpoli->fetchAll();

$masterpolis = $con->prepare("SELECT * FROM `masterdata` WHERE `STATUS`='1' AND ID_R != '6'");
$masterpolis->execute();
$datapolis=$masterpolis->fetchAll();

?>

<audio id="suarabel" src="../rekaman/Airport_Bell.mp3"></audio>
<audio id="suarabelnomorurut" src="../rekaman/nomor-urut.mp3"  ></audio> 
<audio id="suarabelsuarabelruangan" src="../rekaman/ruang.mp3"  ></audio>
<audio id="belas" src="../rekaman/belas.mp3"></audio> 
<audio id="sebelas" src="../rekaman/sebelas.mp3"  ></audio> 
<audio id="puluh" src="../rekaman/puluh.mp3"></audio> 
<audio id="sepuluh" src="../rekaman/sepuluh.mp3"></audio> 
<audio id="ratus" src="../rekaman/ratus.mp3"  ></audio> 
<audio id="seratus" src="../rekaman/seratus.mp3"  ></audio> 
<audio id="suarabelruangan1" src="../rekaman/polimtbs.mp3" ></audio>
<div class="box box-default">
    <div class="box-header with-border">
      <i class="fa fa-user-md"></i>

      <h3 class="box-title">KLINIK MTBS</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="info-box bg-green">
            <span class="info-box-icon"><b><?php echo $number; ?></b></span>
            <div class="info-box-content">
              <span class="info-box-text"><h3><b>ANTRIAN</b></h3></span>
              <span class="progress-description">
                    <?php echo $tglmasuk."/".$jammasuk;?>
              </span>
            </div>
            <!-- /.info-box-content -->
        </div>

      <div class="alert alert-danger alert-dismissible peringatan">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i>Warning!</h4>
        Belum Ada Nomor Antrian Di Hari Ini, Silahkan Klik Reload.
      </div>      
    </div>    
    <!-- /.box-body -->
</div>
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
      <label>Nama Pasien (OPTIONAL) :</label>
      <?php echo "<h4>".$namapasien."</h4>"; ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <input name="panggilanid" id="panggilanid" type="hidden" value="<?php echo $number;?>"></input>
        <input name="idadata" id="iddata" type="hidden" value="<?php echo $idant1;?>"></input>
        <button class='btn btn-lg bg-blue panggil' id="panggilan" name="panggilan" onclick="mulai();"><i class='fa fa-bullhorn'></i> PANGGIL</button>
        <div class='btn-group pilihpoli'>
            <button class='btn btn-lg bg-purple'><i class='fa fa-send'></i> TINDAKAN</button>
            <button data-toggle='dropdown' class='btn btn-lg bg-purple dropdown-toggle'>
                <i class='ace-icon fa fa-angle-down icon-only'></i>
            </button>
            <ul class='dropdown-menu dropdown-info'>
                <?php
                  foreach ($datapoli as $rowpoli) {
                    echo "<li><a href='#' class='nextR' id_antrian='".$idant1."' id_poli='".$rowpoli['ID_R']."' poli_nm='".$rowpoli['RUANG']."' nomor_antrian='".$number."'><i class='fa fa-user-md'></i><b>".$rowpoli['RUANG']."</b></a></li>";
                  }
                ?>
            </ul>
        </div>
        <div class='btn-group pilihpoli'>
            <button class='btn btn-lg bg-black'><i class='fa fa-send'></i> PINDAH</button>
            <button data-toggle='dropdown' class='btn btn-lg bg-black dropdown-toggle'>
                <i class='ace-icon fa fa-angle-down icon-only'></i>
            </button>
            <ul class='dropdown-menu dropdown-info'>
                <?php
                  foreach ($datapolis as $rowpolis) {
                    echo "<li><a href='#' class='nextRs' id_antrians='".$idant1."' id_polis='".$rowpolis['ID_R']."' poli_nms='".$rowpolis['RUANG']."' nomor_antrians='".$number."'><i class='fa fa-user-md'></i><b>".$rowpolis['RUANG']."</b></a></li>";
                  }
                ?>
            </ul>
        </div>
        <a href='#' style='color: #ffffff' class='delete' id_del='<?php echo $idant1; ?>'>
            <button class='btn btn-lg bg-maroon'><i class='ace-icon fa fa-trash-o bigger-120 white'></i> TUNDA ANTRIAN</button>
        </a>
            
    </div>    
    <!-- /.box-body -->
</div>
<?php
    $panjang = strlen($number);
    $antrian = $number;
    for ($i=0; $i < $panjang; $i++) { 
        echo "<audio id='suarabel".$i."' src='../rekaman/".substr($number,$i,1).".mp3'></audio>";
    }
?>
<script type="text/javascript">
<?php
  if ($number=='00') {
?>
  $(".peringatan").show();
  $(".panggil").hide();
  $(".pilihpoli").hide();
  
<?php
  }else{
?>
  $(".peringatan").hide();
  $(".panggil").show();
  $("#tunda").show();
<?php
}
?>

      $(function() {
        $(".nextR").click(function(){
            var element = $(this) ;
            var app_id = element.attr("id_antrian");
            var app_poli = element.attr("id_poli");
            var app_polinm = element.attr("poli_nm");
            var app_nomor = element.attr("nomor_antrian");                           
            if(confirm("NOMOR ANTRIAN "+app_nomor+" AKAN MENUJU KE "+app_polinm+"\nKLIK OK JIKA BENAR.!")){
                    $.ajax({
                            type: "POST",
                            url: "procantrian.php",
                            data: 'id=' + app_id + '&idpoli=' + app_poli + '&idpolinm=' + app_polinm,
                            success: function() {
                            }
                    });
                            location.reload();
            }
            return false;
        });
      });
      $(function() {
        $(".nextRs").click(function(){
            var element = $(this) ;
            var app_id = element.attr("id_antrians");
            var app_poli = element.attr("id_polis");
            var app_polinm = element.attr("poli_nms");
            var app_nomor = element.attr("nomor_antrians");                           
            if(confirm("NOMOR ANTRIAN "+app_nomor+" AKAN MENUJU KE "+app_polinm+"\nKLIK OK JIKA BENAR.!")){
                    $.ajax({
                            type: "POST",
                            url: "procantrian.php",
                            data: 'id=' + app_id + '&idpoli=' + app_poli + '&idpolinm=' + app_polinm,
                            success: function() {
                            }
                    });
                            location.reload();
            }
            return false;
        });
      });
      $(function() {
        $(".delete").click(function(){
                var element = $(this) ;
                var app_id = element.attr("id_del"); 
                var info =  'iddel=' + app_id;                              
                if(confirm("APAKAH ANDA YAKIN AKAN MENUNDA NOMOR ANTRIAN INI ?")){
                        $.ajax({
                                type: "POST",
                                url: "proctunda.php",
                                data: info,
                                success: function() {
                                }
                        });
                               location.reload();
                }
                return false;
        });
      });

      function mulai(){
            var idupdate = document.getElementById('iddata').value;
            var infodata = 'idupdatex=' + idupdate;

            $.ajax({
                type: "POST",
                url: "procpanggilan.php",
                data: infodata,
                success: function() {
                }
            });
            
            var idpanggilan = document.getElementById('panggilanid').value;
            
            //SET DELAY UNTUK MEMAINKAN REKAMAN NOMOR URUT      
            totalwaktu=document.getElementById('suarabel').duration*10;   

            //MAINKAN SUARA NOMOR URUT      
            setTimeout(function() {
                    document.getElementById('suarabelnomorurut').pause();
                    document.getElementById('suarabelnomorurut').currentTime=0;
                    document.getElementById('suarabelnomorurut').play();
            }, totalwaktu);
            totalwaktu=totalwaktu+1500;
            if (idpanggilan<10) {
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime=0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
            }
            else if (idpanggilan==10) {
                setTimeout(function() {            
                    document.getElementById('sepuluh').pause();
                    document.getElementById('sepuluh').currentTime=0;
                    document.getElementById('sepuluh').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
            }
            else if (idpanggilan==11) {
                setTimeout(function() {
                    document.getElementById('sebelas').pause();
                    document.getElementById('sebelas').currentTime=0;
                    document.getElementById('sebelas').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
            }
            else if (idpanggilan<20) {
                setTimeout(function() {
                    document.getElementById('suarabel1').pause();
                    document.getElementById('suarabel1').currentTime=0;
                    document.getElementById('suarabel1').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
                setTimeout(function() {
                    document.getElementById('belas').pause();
                    document.getElementById('belas').currentTime=0;
                    document.getElementById('belas').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
            }
            else if (idpanggilan<100){
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime=0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime=0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
                setTimeout(function() {
                    document.getElementById('suarabel1').pause();
                    document.getElementById('suarabel1').currentTime=0;
                    document.getElementById('suarabel1').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;
            }
			else if (idpanggilan==100){
                setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime=0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1700;
            }
			else if (idpanggilan<110){
				setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime=0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime=0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;                
            }
			else if (idpanggilan==111){
				setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime=0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;
                setTimeout(function() {
                    document.getElementById('sebelas').pause();
                    document.getElementById('sebelas').currentTime=0;
                    document.getElementById('sebelas').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;                
            }
			else if (idpanggilan<120){
				setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime=0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime=0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;
				setTimeout(function() {
                    document.getElementById('belas').pause();
                    document.getElementById('belas').currentTime=0;
                    document.getElementById('belas').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1000;				
            }
			else if (idpanggilan<200){
				setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime=0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;
                setTimeout(function() {
                    document.getElementById('suarabel1').pause();
                    document.getElementById('suarabel1').currentTime=0;
                    document.getElementById('suarabel1').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1500;
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime=0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+900;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime=0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu=totalwaktu+1600;			
            }
			setTimeout(function() {
				document.getElementById('suarabelruangan1').pause();
				document.getElementById('suarabelruangan1').currentTime=0;
				document.getElementById('suarabelruangan1').play();
			}, totalwaktu);
        }   
</script>