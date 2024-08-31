<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake"
        src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png"
        alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png"
          alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span
          class="brand-text font-weight-light"><?= session()->get('title'); ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">Hai,
              <?php echo session()->get('nama')."</br>(".session()->get('nama_user_level').")"; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input id="main-search" name="main-search" class="form-control form-control-sidebar" type="search"
              placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a id="navDashboard" href="<?php echo base_url(); ?>"
                class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li id="liNavTransaksi" class="nav-item">
              <a id="navTransaksi"
                href="<?php echo base_url(); ?>transaksi"
                class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Transaksi</p>
              </a>
            </li>

            <?php
          if(session()->get('id_user_level')=='1') {
              ?>
            <li id="liNavMasterData" class="nav-item">
              <a id="navMasterData" href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Master Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a id="navBarang"
                    href="<?php echo base_url(); ?>barang"
                    class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php
          }
    ?>

            <li id="liNavUserManagement" class="nav-item">
              <a id="navUserManagement" href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  User Management
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <?php
        if(session()->get('id_user_level')=='1') {
            ?>

                <li class="nav-item">
                  <a id="navSetting"
                    href="<?php echo base_url(); ?>setting"
                    class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Setting</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a id="navUser"
                    href="<?php echo base_url(); ?>user"
                    class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a id="navUserLevel"
                    href="<?php echo base_url(); ?>userlevel"
                    class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Level</p>
                  </a>
                </li>

                <?php
        }
    ?>

                <li class="nav-item">
                  <a id="navLogout"
                    href="<?php echo base_url(); ?>logout"
                    class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logout</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper"><?php echo $main; ?></div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2024.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b><?= session()->get('cms_name'); ?>
          (<?= session()->get('cms_version'); ?>)</b>
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui.min.js">
  </script>

  <!-- Bootstrap 4 -->
  <script
    src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js">
  </script>

  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>

  <script
    src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js">
  </script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
  </script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js">
  </script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
  </script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js">
  </script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
  </script>
  <script src="<?php echo base_url(); ?>plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/pdfmake/pdfmake.min.js">
  </script>
  <script src="<?php echo base_url(); ?>plugins/pdfmake/vfs_fonts.js"></script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.html5.min.js">
  </script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.print.min.js">
  </script>
  <script
    src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.colVis.min.js">
  </script>
  <script src="<?php echo base_url(); ?>plugins/select2/js/select2.full.min.js">
  </script>
  <script src="<?php echo base_url(); ?>plugins/toastr/toastr.min.js"></script>
</body>

</html>