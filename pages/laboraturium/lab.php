<audio id="suarabel" src="../rekaman/Airport_Bell.mp3"></audio>
<audio id="suarabelnomorurut" src="../rekaman/nomor-urut.mp3"  ></audio> 
<audio id="suarabelsuarabelruangan" src="../rekaman/ruang.mp3"  ></audio>
<audio id="belas" src="../rekaman/belas.mp3"></audio> 
<audio id="sebelas" src="../rekaman/sebelas.mp3"  ></audio> 
<audio id="puluh" src="../rekaman/puluh.mp3"></audio> 
<audio id="sepuluh" src="../rekaman/sepuluh.mp3"></audio> 
<audio id="ratus" src="../rekaman/ratus.mp3"  ></audio> 
<audio id="seratus" src="../rekaman/seratus.mp3"  ></audio> 
<audio id="suarabelruangan1" src="../rekaman/lab.mp3" ></audio>
<?php
$tanggal = date("Y-m-d");
//echo $tanggal;
include ('../dbconnect.php');
$berikutnya = $con->prepare("SELECT ID, NOMOR, JAM, TANGGAL, PASIENNM, TUJUANNM FROM `antrian` WHERE ((STATUS='2' OR STATUS='21') AND (TANGGAL='".$tanggal."')) ORDER BY ID ASC LIMIT 5");
$berikutnya->execute();
$datab=$berikutnya->fetchAll();

?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">ANTRIAN LABORATURIUM</h3>    
  </div>
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nomor Antrian</th>
          <th>Nama Pasien</th>
          <th>TGL/Jam Kunjungan</th>
          <th>KLINIK PEMERIKASA</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $n='1';
          foreach ($datab as $rowtunggu) {
            echo "<tr>";
              echo "<td>".$n++."</td>";
              echo "<td>".$rowtunggu['NOMOR']."</td>";
              echo "<td>".$rowtunggu['PASIENNM']."</td>";
              echo "<td>".$rowtunggu['TANGGAL']." / ".$rowtunggu['JAM']."</td>";
              echo "<td>Diperiksa Dari : KLINIK ".$rowtunggu['TUJUANNM']."</td>";
              echo "<td>";
                echo "<input name='panggilanid' id='panggilanid' type='hidden' value='".$rowtunggu['NOMOR']."'></input>";
                echo "<input name='idadata' id='iddata' type='hidden' value='".$rowtunggu['ID']."'></input>";
                echo "<a href='#' class='btn bg-olive btn-flat btn-sm' id='panggilan' name='panggilan' onclick='mulai();'><i class='fa fa-bullhorn'></i> PANGGIL</a> ";
                echo "<a href='#' class='btn bg-navy btn-flat btn-sm kembali' id_antri='".$rowtunggu['ID']."' ><i class='fa fa-step-backward'></i> KEMBALI KE KLINIK ".$rowtunggu['TUJUANNM']."</a> ";
              echo "</td>";
            echo "</tr>";

            $panjang = strlen($rowtunggu['NOMOR']);
            $antrian = $rowtunggu['NOMOR'];
            for ($i=0; $i < $panjang; $i++) { 
              echo "<audio id='suarabel".$i."' src='../rekaman/".substr($rowtunggu['NOMOR'],$i,1).".mp3'></audio>";
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<a href="" class='btn btn-sm bg-black'>Bantuan Pengguna</button>
  <script type="text/javascript">
    $(function() {
        $(".kembali").click(function(){
            var element = $(this) ;
            var app_idt = element.attr("id_antri");
            if(confirm("BERHASIL DI KEMBALIKAN KE KLINIK PEMERIKSA\nTERIMA KASIH.")){
                    $.ajax({
                            type: "POST",
                            url: "prockembali.php",
                            data: 'id=' + app_idt,
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