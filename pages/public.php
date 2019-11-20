<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SIAP</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">  
    <!-- Theme style -->
    <link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="./dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="./https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="./https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="skin-blue layout-top-nav fixed">
    <div class="wrapper">      
      <header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="./index2.html" class="navbar-brand"><b>S!AP</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Sistem Antrian Pasien <span class="sr-only">(current)</span></a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1 align="center">
              PEMERINTAH KABUPATEN SERANG<br>DINAS KESEHATAN<br>UPT PUSKESMAS NYOMPOK KECAMATAN KOPO<br>
              <small>Jl. Cikande - Kopo Km.3 Ds. Nyompok Kec. Kopo Kab. Serang - Banten Kode Pos 42178</small>
            </h1>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="callout callout-danger">
              <h4>Info !</h4>
              <p>Silahkan klik pada tombol di bawah ini untuk dapat akses ke dalam halaman masing-masing Ruangan atau Poli.</p>
            </div>
            <div class="row">
              <div class="col-md-6">
                <a href="./pages/antrian/" target="_blank" type="button" class="btn bg-maroon margin btn-lg col-md-12">PENGAMBILAN NOMOR ANTRIAN</a>
                <a href="./pages/ruangtunggu/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">RUANG TUNGGU</a>
                <a href="./pages/registrasi/" target="_blank" type="button" class="btn bg-olive margin btn-lg col-md-12">RUANG REGISTRASI</a>
                <a href="./pages/apotik/" target="_blank" type="button" class="btn bg-orange margin btn-lg col-md-12">APOTEK</a>
                <a href="./pages/laboraturium/" target="_blank" type="button" class="btn bg-purple margin btn-lg col-md-12">LABORATURIUM</a>
                <a href="./pages/server/" target="_blank" type="button" class="btn bg-blue margin btn-lg col-md-12">SERVER</a>

              </div>
              <div class="col-md-6">
                <a href="./pages/polilansia/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">POLI LANSIA</a>
                <a href="./pages/poliumum/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">POLI UMUM</a>
                <a href="./pages/poligigi/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">POLI GIGI</a>
                <a href="./pages/polimtbs/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">POLI MTBS</a>
                <a href="./pages/polikia/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">POLI KIA</a>
                <a href="./pages/politbparu/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">POLI TB PARU</a>
                <a href="./pages/polikusta/" target="_blank" type="button" class="btn bg-navy margin btn-lg col-md-12">POLI KUSTA</a>

              </div>
            </div>
            
            
           
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
          </div>
          <strong>Copyright &copy; <?php echo date("Y"); ?> Application By <a href="http://dazira.com">Dazira.com</a> And Template By <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->    
    <!-- jQuery 2.1.3 -->
    <script src="./plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="./plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='./plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/app.min.js" type="text/javascript"></script>
    
  </body>
</html>
