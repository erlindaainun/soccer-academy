<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <title>Admin SSB | Dasbor</title>
  <?php
  include 'session.php';
  include 'views/meta.php';
  ?>

  <?php include '../connection.php' ?>

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
      </ul>

      <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'views/sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dasbor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Dasbor</a></li>
                <li class="breadcrumb-item active">Dasbor</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  $sql = 'SELECT count(*) as total from `members`';
                  $result_count_members = $conn->query($sql)->fetch_assoc()['total'];
                  ?>
                  <h3><?php echo $result_count_members ?></h3>
                  <p>Anggota</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="member.php" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <?php
                  $sql = 'SELECT count(*) as total from `teams`';
                  $result_count_teams = $conn->query($sql)->fetch_assoc()['total'];
                  ?>
                  <h3><?php echo $result_count_teams ?></h3>
                  <p>Tim</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="team.php" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <?php
                  $sql = 'SELECT count(*) as total from `tournaments`';
                  $result_count_tournaments = $conn->query($sql)->fetch_assoc()['total'];
                  ?>
                  <h3><?php echo $result_count_tournaments ?></h3>
                  <p>Turnamen</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="tournament.php" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <?php
                  $sql = 'SELECT count(*) as total from `leagues`';
                  $result_count_leagues = $conn->query($sql)->fetch_assoc()['total'];
                  ?>
                  <h3><?php echo $result_count_leagues ?></h3>
                  <p>Liga</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="league.php" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title pt-2 font-weight-bold">Anggota Baru</h3>
                  <div class="card-tools">
                    <a href="member.php" class="btn btn-block btn-primary">Lihat Semua</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama</th>
                        <th style="width: 100px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = 'SELECT * FROM `members` ORDER BY `id` DESC LIMIT 5';
                      $result_member = $conn->query($sql);
                      $members_arr = $result_member->fetch_all();

                      foreach ($members_arr as $key => $member) {
                        $status = $member[16];
                        if ($status == "Disetujui")
                          $badge_color = 'success';
                        else if ($status == 'Tertunda')
                          $badge_color = 'warning';
                        else if ($status == 'Ditolak')
                          $badge_color = 'danger';
                      ?>
                        <tr>
                          <td><?php echo $key + 1 ?>.</td>
                          <td><?php echo $member[1] ?></td>
                          <td><span class="badge badge-pill badge-<?php echo $badge_color; ?> btn-block"><?php echo $status ?></span></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title pt-2 font-weight-bold">Tim Terbaru</h3>
                  <div class="card-tools">
                    <a href="team.php" class="btn btn-block btn-primary">Lihat Semua</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama</th>
                        <th style="width: 100px">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = 'SELECT * FROM `teams` ORDER BY `id` DESC LIMIT 5';
                      $result_team = $conn->query($sql);
                      $teams_arr = $result_team->fetch_all();

                      foreach ($teams_arr as $key => $team) {
                        $status = $team[10];
                        if ($status == "draft")
                          $badge_color = 'secondary';
                        else if ($status == 'pending')
                          $badge_color = 'warning';
                        else if ($status == 'approved')
                          $badge_color = 'success';
                      ?>
                        <tr>
                          <td><?php echo $key + 1 ?>.</td>
                          <td><?php echo $team[1] ?></td>
                          <td><span class="badge badge-pill badge-<?php echo $badge_color ?> btn-block"><?php echo ucfirst($status) ?></span></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
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
        v0.1
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2021 <a href="#">Erlinda Ainun</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/server/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/server/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/server/dist/js/adminlte.min.js"></script>
</body>

</html>