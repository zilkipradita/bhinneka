<title><?= session()->get('title'); ?> |
  Dashboard</title>
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/chart.js/Chart.min.js"></script>
<script>
  $(function() {
    $("#navDashboard").click();
    document.getElementById("navDashboard").classList.add("active");
  });
</script>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Selamat Datang</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <?php
        if(session()->get('id_user_level')=='1') {
            ?>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $countBarang; ?></h3>

            <p>Barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo base_url(); ?>barang"
            class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $countTransaksi; ?></h3>

            <p>Transaksi</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo base_url(); ?>transaksi"
            class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php print_r($countUserLevel); ?></h3>

            <p>User Level</p>
          </div>
          <div class="icon">
            <i class="ion ion-key"></i>
          </div>
          <a href="<?php echo base_url(); ?>userlevel"
            class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $countUser1; ?></h3>

            <p>Admin</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo base_url(); ?>user"
            class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php
        }
?>

    </div>
  </div>
</section>