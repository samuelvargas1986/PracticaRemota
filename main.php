<?php
session_start();
if(isset($_SESSION['login'])==false){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelPets</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DATATABLES-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="main.php" class="nav-link">Inicio</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" id="btnCerrarSesion" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCerrarsesion">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  
  <!-- Modal Cerrar Sesion -->
  <div class="modal fade" id="modalCerrarsesion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cerrar Sesión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <span>¿Estas seguro de cerrar sesión?</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a href="controller/CUsuarios.php?operation=logout" type="button" class="btn btn-primary">Cerrar Sesion</a>
        </div>
      </div>
    </div>
  </div>




  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="main.php" class="brand-link">
      <img src="dist/img/helpets.png" alt="Helpets Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HelPets</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- opciones personalizadas-->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="main.php?view=compras" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Compras
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="main.php?view=personas" class="nav-link">
                <i class="fas fa-running nav-icon" ></i>
              <p>
                Personass 
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="main.php?view=donaciones" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>                
              <p>
                donaciones
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="main.php?view=voluntarios" class="nav-link">
              <i class="nav-icon fas fa-hand-paper"></i>              
              <p>
                voluntarios
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="main.php?view=usuarios" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          </li>


          <li class="nav-item">
            <a href="main.php?view=mascotas" class="nav-link">              
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Mascota Rescatado
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="main.php?view=adopciones" class="nav-link">
              <i class="nav-icon fas fa-hands-helping"></i>              
              <p>
                Adopciones
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="main.php?view=grafico-estatico" class="nav-link">
              <i class="far fa-chart-bar nav-icon"></i>
              <p>
                grafico estatico
              </p>
            </a>
          </li>
          


          <!-- /opciones personalizadas-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">HELPETS</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid" id="contenido">

        <!--esta seccion se carga de forma dinmica -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
    
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Ingenieria de Software con I. A.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 </strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
         <!--SWEET ALERT -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- REQUIRED SCRIPTS -->
<script src="https://kit.fontawesome.com/bc7e70a433.js" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- libreria para cargar view en dashboard-->
<script src="dist/js/loadweb.js"></script>
<!-- chartjs cdn-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
       <!-- DATATABLES-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function(){
    let content = getParam('view');
    console.log(content);
    if (content == false){
      $("#contenido").load('views/welcome.php');
    }else{
      // la variable/Key "view"tiene un valor (nombre del archivo abrir)
      $("#contenido").load('views/' + content + '.php');

    }
  
  });
</script>
<script src="dist/js/colors-chart.js"></script>
<script src="dist/js/option-chart.js"></script>
</body>
</html>
