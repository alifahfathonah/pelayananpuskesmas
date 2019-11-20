<?php
$tanggal = date("Y-m-d");
//echo $tanggal;
include ('../dbconnect.php');
$berikutnya = $con->prepare("SELECT NOMOR, JAM FROM `antrian` WHERE `TUJUANNO`='1' AND STATUS='1' AND TANGGAL='".$tanggal."' ORDER BY ID ASC LIMIT 5");
$berikutnya->execute();
$datab=$berikutnya->fetchAll();

$tunda = $con->prepare("SELECT ID, NOMOR, JAM FROM `antrian` WHERE `TUJUANNO`='1' AND STATUS='0' AND TANGGAL='".$tanggal."' ORDER BY ID ASC LIMIT 5");
$tunda->execute();
$datat=$tunda->fetchAll();

$masterpoli2 = $con->prepare("SELECT * FROM `masterdata` WHERE `STATUS`='1'");
$masterpoli2->execute();
$datapoli2=$masterpoli2->fetchAll();
?>
<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Tabel Nomor Antrian</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="box-group" id="accordion">
      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
      <div class="panel box box-primary">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              Nomor Antrian Berikutnya
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <th>Nomor Antrian</th>
                <th>Waktu Kedatangan</th>
                <th>Status</th>
              </thead>
              <tbody>                
                <?php
                foreach ($datab as $row1) {
                    echo "<tr>";
                      echo "<td>".$row1['NOMOR']."</td>";
                      echo "<td>".$tanggal." / ".$row1['JAM']."</td>";                     
                      echo "<td>Mengantri Panggilan</td>";
                    echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="panel box box-danger">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Nomor Antrian Tertunda
            </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <th>Nomor Antrian</th>
                <th>Waktu Kedatangan</th>
                <th>Action</th>
              </thead>
              <tbody>                
                <?php
                foreach ($datat as $row2) {
                    echo "<tr>";
                      echo "<td>".$row2['NOMOR']."</td>";
                      echo "<td>".$tanggal." / ".$row2['JAM']."</td>";
                      ?>
                      <td>
                        <div class='btn-group'>
                            <button class='btn btn-sm bg-purple'><i class='fa fa-send'></i> PILIH POLI</button>
                            <button data-toggle='dropdown' class='btn btn-sm bg-purple dropdown-toggle'>
                                <i class='ace-icon fa fa-angle-down icon-only'></i>
                            </button>
                            <ul class='dropdown-menu dropdown-info'>
                                <?php
                                  foreach ($datapoli2 as $rowpoli2) {
                                    echo "<li><a href='#' class='poli2' id_antrianT='".$row2['ID']."' id_poliT='".$rowpoli2['ID_R']."' poli_nmT='POLI ".$rowpoli2['RUANG']."' nomor_antrianT='".$row2['NOMOR']."'><i class='fa fa-user-md'></i><b> POLI ".$rowpoli2['RUANG']."</b></a></li>";
                                  }
                                ?>
                            </ul>
                            <input type="hidden" name="loket" id="loket" class="loket" value="registration">
                            <input type="hidden" name="nomor" id="nomor" class="nomor" value="registration">
                        </div>
                      </td>
                      <?php
                    echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<a href="" class='btn btn-sm bg-black'>Bantuan Pengguna</button>
  <script type="text/javascript">
    $(function() {
        $(".poli2").click(function(){
            var element = $(this) ;
            var app_idt = element.attr("id_antrianT");
            var app_polit = element.attr("id_poliT");
            var app_polinmt = element.attr("poli_nmT");
            var app_nomort = element.attr("nomor_antrianT");                          
            if(confirm("NOMOR ANTRIAN "+app_nomort+" AKAN MENUJU KE "+app_polinmt+"\nKLIK OK JIKA BENAR.!")){
                    $.ajax({
                            type: "POST",
                            url: "procantrian.php",
                            data: 'id=' + app_idt + '&idpoli=' + app_polit + '&idpolinm=' + app_polinmt,
                            success: function() {
                            }
                    });
                            location.reload();
            }
            return false;
        });
      });
  </script>