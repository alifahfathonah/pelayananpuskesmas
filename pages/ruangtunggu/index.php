<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SIAP</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">    
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="./https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="./https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .rp {
          width: 100%;
          height: auto;
      }
    </style>
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="skin-blue layout-top-nav fixed">
    <div class="wrapper">      
      <header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
            <marquee><h5 style="color: #ffffff"><b>SELAMAT DATANG DI UPT PUSKESMAS NYOMPOK / Jl. Cikande Kopo KM. 3 Ds. Nyompok Kec. Kopo Tlp (0254) 254189 Kodepos 42177</b></h5></marquee>
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Content Header (Page header) -->
          <img src="../../dist/img/headerpuskesmas.png" class="rp">
          
          

          <!-- Main content -->
          <section class="content">  
            <div class="row">
              <div class="col-md-6">
                <video width="100%" height="auto" autoplay loop>
                      <source src="../../dist/img/vid/penyuluhan.mp4" type="video/mp4">
                </video>
                <?php include('../time.php'); ?>
              </div>
              <div class="col-md-3">
                <div id="nomorright1"></div>                
              </div>
              <div class="col-md-3">
                <div id="nomorright2"></div>
                
              </div>
            </div>
            
            
           
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      var auto_refresh = setInterval(
        function (){
        $("#nomorright1").load('nomorright1.php');
        $("#nomorright2").load('nomorright2.php'); 
          },2000);
    </script>
  </body>
</html>
