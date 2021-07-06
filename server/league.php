<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <?php include '../connection.php' ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

  <link rel="stylesheet" type="text/css" href="dist/css/jquery.bracket.min.css" />

  <style type="text/css">
    .metroBtn {
      background-color: #2E7BCC;
      color: #fff;
      font-size: 1.1em;
      padding: 10px;
      display: inline-block;
      margin-bottom: 30px;
      cursor: pointer;
    }

    .brackets>div {
      vertical-align: top;
      clear: both;
    }

    .brackets>div>div {
      float: left;
      height: 100%;
    }

    .brackets>div>div>div {
      margin: 50px 0;
    }

    .brackets div.bracketbox {
      position: relative;
      width: 100%;
      height: 100%;
      border-top: 1px solid #555;
      border-right: 1px solid #555;
      border-bottom: 1px solid #555;
    }

    .brackets div.bracketbox>span.info {
      position: absolute;
      top: 25%;
      left: 25%;
      font-size: 0.8em;
      color: #BBB;
    }

    .brackets div.bracketbox>span {
      position: absolute;
      left: 5px;
      font-size: 0.85em;
    }

    .brackets div.bracketbox>span.teama {
      top: -20px;
    }

    .brackets div.bracketbox>span.teamb {
      bottom: -20px;
    }

    .brackets div.bracketbox>span.teamc {
      bottom: 1px;
    }

    .brackets>.group2 {
      height: 260px;
    }

    .brackets>.group2>div {
      width: 49%;
    }

    .brackets>.group3 {
      height: 320px;
    }

    .brackets>.group3>div {
      width: 32.7%;
    }

    .brackets>.group4>div {
      width: 24.5%;
    }

    .brackets>.group5>div {
      width: 19.6%;
    }

    .brackets>.group6 {
      height: 2000px;
    }

    .brackets>.group6>div {
      width: 16.3%;
    }

    .brackets>div>.r1>div {
      height: 60px;
    }

    .brackets>div>.r2>div {
      margin: 80px 0 110px 0;
      height: 110px;
    }

    .brackets>div>.r3>div {
      margin: 135px 0 220px 0;
      height: 220px;
    }

    .brackets>div>.r4>div {
      margin: 250px 0 445px 0;
      height: 445px;
    }

    .brackets>div>.r5>div {
      margin: 460px 0 0 0;
      height: 900px;
    }

    .brackets>div>.r6>div {
      margin: 900px 0 0 0;
    }

    .brackets div.final>div.bracketbox {
      border-top: 0px;
      border-right: 0px;
      height: 0px;
    }

    .brackets>div>.r4>div.drop {
      height: 180px;
      margin-bottom: 0px;
    }

    .brackets>div>.r5>div.final.drop {
      margin-top: 345px;
      margin-bottom: 0px;
      height: 1px;
    }

    .brackets>div>div>div:last-of-type {
      margin-bottom: 0px;
    }
  </style>
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
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
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
      </ul>
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
              <h1 class="m-0">Liga</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Liga</li>
              </ol>
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

            // Ambil parameter page
            $page = $_GET['page'] ?? '';

            // Jika parameter `page` sama dengan `create` atau `edit`
            if ($page == 'create' || $page == 'edit') {

              // Jika page sama dengan `edit` dan memiliki `id`
              if ($page == 'edit' && isset($_GET['id'])) {
                // Check apakah `id` ada didatabase
                $id = $_GET['id'];
                $sql = 'SELECT * FROM `leagues` WHERE id = ' . $id;
                $result = $conn->query($sql);

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") { ?>
                  <div class="col-8">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Ubah Liga</h3>
                      </div>
                      <!-- /.card-header -->
                      <form name="form1" method="post" action="/api/league.php">
                        <input type="hidden" name="tipe" value="update">
                        <input type="hidden" name="id" value="">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Nama</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter ...">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Tanggal</label>
                                <input name="date" type="date" class="form-control" placeholder="Enter ...">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Lokasi</label>
                                <input name="location" type="text" class="form-control" placeholder="Enter ...">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="custom-select">
                                  <option selected disabled value="">Choose...</option>
                                  <option value="Buka">Buka</option>
                                  <option value="Tutup">Tutup</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="customFile">Upload Logo</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                  <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- /.card-body -->
                      </form>
                    </div>
                  </div>
                <?php
                  // get data from ajax request
                  echo '<script>document.addEventListener("DOMContentLoaded", function() {editLeague(' . $id . ')})</script>';
                }
              } else if ($page == 'edit' && !isset($_GET['id'])) { // Jika page sama dengan `edit` dan tidak memiliki `id`
                echo '<div class="error-page">
                  <h2 class="headline text-warning"> 404</h2>
          
                  <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
          
                    <p>
                      We could not find the page you were looking for.
                      Meanwhile, you may <a href="/server/index.php">return to dashboard</a> or try using the search form.
                    </p>
                  </div>
                  <!-- /.error-content -->
                </div>';
              } else {
                ?>
                <div class="col-8">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Liga</h3>
                    </div>
                    <!-- /.card-header -->
                    <form name="form1" method="post" action="/api/league.php">
                      <input type="hidden" name="tipe" value="store">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Nama</label>
                              <input name="name" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Tanggal</label>
                              <input name="date" type="date" class="form-control" placeholder="Enter ...">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Lokasi</label>
                              <input name="location" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="custom-select">
                                <option selected disabled value="">Choose...</option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="customFile">Upload Logo</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                </div>
                <?php }
            } else if (!empty($_GET['page']) == 'manage') {
              $id = $_GET['id'] ?? '';

              // Jika id tidak di isi 
              if ($id == '') {
                echo '<div class="error-page">
                <h2 class="headline text-warning"> 404</h2>
        
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
        
                  <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="/server/index.php">return to dashboard</a> or try using the search form.
                  </p>
                </div>
                <!-- /.error-content -->
              </div>';
              } else {
                //  Checking id in database
                $sql = 'SELECT * FROM `leagues` WHERE id=' . $id . ' AND `status`="Buka"';
                $result = $conn->query($sql);

                // Jika ada 
                if ($row = $result->fetch_assoc()) {
                ?>
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h3 class="card-title">Kelola Liga</h3>
                      </div>
                      <!-- /.card-header -->

                      <form name="formManage" method="post" action="/api/league.php">
                        <input type="hidden" name="tipe" value="postManage">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="row">
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Nama Liga</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['name'] ?></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Tanggal</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['date'] ?></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Lokasi</span>
                                      <span class="info-box-number text-center text-muted mb-0"><?php echo $row['location'] ?></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Pilih Tim</label>
                                <select name="teams[]" class="duallistbox" multiple="multiple" style="display: none;">
                                  <?php
                                  // Select many to many using from this link https://stackoverflow.com/a/3395372
                                  $sql = 'SELECT t.* FROM teams t 
                                          JOIN team_has_leagues tl ON t.id = tl.team_id 
                                          JOIN leagues l ON tl.league_id = l.id 
                                          WHERE t.id IN (
                                            SELECT team_id FROM team_has_leagues tl 
                                            JOIN leagues l ON tl.league_id = l.id 
                                            WHERE l.id = ' . $row['id'] . '
                                          )';
                                  $result = $conn->query($sql);

                                  // Checking who joined to the leagues
                                  $sql_league = 'SELECT * FROM `leagues` WHERE `id` = ' . $id;
                                  $result_league = $conn->query($sql_league);
                                  $row_league = $result_league->fetch_assoc();
                                  $extras = json_decode($row_league['extras']);

                                  $teams_joined_leagues = $extras->teams;

                                  // Option
                                  while ($row = $result->fetch_assoc()) {
                                    if (!in_array($row['id'], $teams_joined_leagues))
                                      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                    else
                                      echo '<option value="' . $row['id'] . '" selected="">' . $row['name'] . '</option>';
                                  }
                                  ?>
                                </select>
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group">
                                <label>Ronde Pertama <i class="fa fa-info-circle" data-toggle="tooltip" title="Info apa itu ronde pertama"></i></label>
                                <select name="round_one" class="custom-select">
                                  <option selected disabled value="">Choose...</option>
                                  <option value="Acak">Acak</option>
                                  <option value="Unggulan">Unggulan</option>
                                  <option value="Manual">Manual</option>
                                </select>
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group">
                                <label>Pencarian Juara 3 <i class="fa fa-info-circle" data-toggle="tooltip" title="Info apa itu juara 3"></i></label>
                                <select name="third_place_winner" class="custom-select">
                                  <option selected disabled value="">Choose...</option>
                                  <option value="Ya">Ya</option>
                                  <option value="Tidak">Tidak</option>
                                </select>

                              </div>
                              <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Generate</button>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Turnamen Bracket
                          </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="bracketGenerated"></div>

                          <div class="row">
                            <div id="dataOutput" class=""></div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- ./col -->
                    <div class="brackets" id="brackets"></div>
                  </div>
                <?php
                  // Load data manage league
                  echo '<script>document.addEventListener("DOMContentLoaded", function() {manageLeague(' . $id . ')})</script>';
                } else { // Jika tidak ada didatabase
                  echo '<div class="error-page">
                  <h2 class="headline text-warning"> 404</h2>
          
                  <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
          
                    <p>
                      We could not find the page you were looking for.
                      Meanwhile, you may <a href="/server/index.php">return to dashboard</a> or try using the search form.
                    </p>
                  </div>
                  <!-- /.error-content -->
                </div>';
                }
              }
            } else if (!empty($_GET['page']) == 'view' && isset($_GET['id'])) {
              if (!empty($id = $_GET['id'])) {
                $sql = 'SELECT * FROM `leagues` WHERE `id` = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") {

                ?>
                  <!-- Lihat Liga -->
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-eye"></i>
                          Lihat Liga
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-4">Nama</dt>
                          <dd class="col-sm-8"><?php echo $row['name'] ?? '-' ?></dd>
                          <dt class="col-sm-4">Tanggal</dt>
                          <dd class="col-sm-8"><?php echo $row['date'] ?? '-' ?></dd>
                          <dt class="col-sm-4">Lokasi</dt>
                          <dd class="col-sm-8"><?php echo $row['location'] ?? '-' ?></dd>
                          <dt class="col-sm-4">Status</dt>
                          <dd class="col-sm-8"><?php echo $row['status'] ?? '-' ?></dd>
                        </dl>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
              <?php } else {
                  echo '<div class="error-page">
                <h2 class="headline text-warning"> 404</h2>
        
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
        
                  <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="/server/index.php">return to dashboard</a> or try using the search form.
                  </p>
                </div>
                <!-- /.error-content -->
              </div>';
                }
              } else {
                echo '<div class="error-page">
                <h2 class="headline text-warning"> 404</h2>
        
                <div class="error-content">
                  <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
        
                  <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="/server/index.php">return to dashboard</a> or try using the search form.
                  </p>
                </div>
                <!-- /.error-content -->
              </div>';
              }
            } else { ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">List Liga</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div style="margin-bottom: 10px;" class="row">
                      <div class="col-lg-12">
                        <a class="btn btn-success" href="league.php?page=create">
                          <i class="fa fa-plus"></i>&nbsp; Tambah Liga
                        </a>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Lokasi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Lokasi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            <?php } ?>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal editing matches -->
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Hasil</h4>
            <button type="button" id="player-modal" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-12">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Jadwal</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true">Ubah Hasil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Ubah stat pemain</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input name="match_date" type="date" class="form-control" placeholder="Enter ...">
                      </div>
                      <div class="form-group">
                        <label>Jam</label>
                        <input name="match_time" type="time" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 400px">Tim</th>
                            <th>Skor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Tim #1</td>
                            <td>
                              <div class="col-3">
                                <input type="text" class="form-control" placeholder="">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Tim #2</td>
                            <td>
                              <div class="col-3">
                                <input type="text" class="form-control" placeholder="">
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                      Tampilkan table team serta input
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button onclick="submitPemain()" type="button" class="btn btn-primary">Tambah</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

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
  <!-- DataTables  & Plugins -->
  <script src="/server/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/server/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/server/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/server/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="/server/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/server/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/server/plugins/jszip/jszip.min.js"></script>
  <script src="/server/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="/server/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="/server/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="/server/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="/server/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/server/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/server/dist/js/demo.js"></script>
  <!-- Swal2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript" src="dist/js/jquery.bracket.min.js"></script>

  <!-- Bootstrap4 Duallistbox -->
  <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

  <script src="http://underscorejs.org/underscore-min.js"></script>

  <!-- Page specific script -->
  <script>
    /* Called whenever bracket is modified
     *
     * data:     changed bracket object in format given to init
     * userData: optional data given when bracket is created.
     */
    function saveFn(data, userData) {
      var json = JSON.stringify(data)
      $('#saveOutput').text('POST ' + userData + ' ' + json)
      /* You probably want to do something like this */
      $.ajax({
        type: "post",
        url: "/api/league.php",
        data: {
          'json': json,
          'tipe': 'setResultsToLeagueExtrasColumn',
          'id': findGetParameter('id'),
        },
        dataType: "json",
        success: function(response) {

        }
      });
    }

    $(function() {

      if (findGetParameter('page') == 'manage') {

        var saveData2 = {};

        // Get match by league_id
        $.ajax({
          type: "POST",
          url: "/api/match.php",
          data: {
            'tipe': 'getMatchByLeagueId',
            'id': findGetParameter('id')
          },
          success: function(response) {
            var res = JSON.parse(response)

            var teams = [];
            res.teams.forEach(function(match) {
              var id = match[0];
              var participant = match[1].split(', ');
              var date = match[2]
              var time = match[3]

              teams.push(participant);

            })

            saveData2['teams'] = teams;
            saveData2['results'] = JSON.parse(res.results[0])

            // For Bracket
            var container = $('.bracketGenerated')
            container.bracket({
              init: saveData2,
              save: saveFn,
              userData: "http://myapi",
              disableToolbar: true,
            })

            /* You can also inquiry the current data */
            var data = container.bracket('data')
            // console.log(JSON.stringify(data));
            // $('#dataOutput').text(JSON.stringify(data))

            // End for bracket
          }
        });
      }

      if ($('#example1').length) {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          "ajax": '/api/league.php',
          "columnDefs": [{
            "targets": 4,
            "data": 4,
            "render": function(data, type, full, meta) {
              console.log(full['3']);

              var manage_button = full['3'] == "Buka" ? '<a class="btn btn-primary btn-sm" href="/server/league.php?page=manage&id=' + data + '"><i class="far fa-edit"></i> Kelola</a> ' : '';
              return '' +
                manage_button +
                '<a class="btn btn-primary btn-sm" href="/server/league.php?page=view&id=' + data + '"><i class="fas fa-eye"></i> Lihat</a> ' +
                '<a class="btn btn-info btn-sm" href="/server/league.php?page=edit&id=' + data + '"><i class="fas fa-pencil-alt"></i> Ubah</a> ' +
                '<a class="btn btn-danger btn-sm" onclick="deleteLeague(' + data + ')" href="javascript:void(0)"><i class="fas fa-trash"></i> Hapus</a>';

            }
          }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      }

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      $('[data-toggle="tooltip"]').tooltip()
    });

    function findGetParameter(parameterName) {
      var result = null,
        tmp = [];
      var items = location.search.substr(1).split("&");
      for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
      }
      return result;
    }

    if (status = findGetParameter('status')) {
      if (status == 'stored')
        Swal.fire(
          'Berhasil!',
          'Berhasil menambahkan liga!',
          'success'
        )
      else if (status == 'updated')
        Swal.fire(
          'Berhasil!',
          'Berhasil mengubah liga!',
          'success'
        )
    }

    // If generate bracket detected
    if (generate = findGetParameter('generate')) {
      if (generate == "unggulan")
        Swal.fire(
          'Berhasil!',
          'Berhasil membuat bracket unggulan',
          'success'
        )
      else
        Swal.fire(
          'Info!',
          'Tidak ada tim yang terpilih dalam liga ini.',
          'info'
        )

    }

    function editLeague(id) {
      $.ajax({
        type: "POST",
        url: "/api/league.php",
        data: {
          'tipe': 'edit',
          'id': id
        },
        success: function(response) {
          var res = JSON.parse(response)
          var data = res.data

          // for (let key in data) {
          //   if (data.hasOwnProperty(key)) {
          //     $("input")
          //     console.log(`${key} : ${data[key]}`)
          //   }
          // }

          $("input[name=id]").val(data.id);
          $("input[name=name]").val(data.name);
          $("input[name=date]").val(data.date);
          $("input[name=location]").val(data.location);
          $("select[name=status ] option[value='" + data.status + "']").attr("selected", "selected");

        }
      });
    }

    function deleteLeague(id) {
      Swal.fire({
        title: 'Apakah anda yakin hapus liga ini?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "/api/league.php",
            data: {
              'tipe': 'delete',
              'id': id
            },
            success: function(response) {
              $('#example1').DataTable().ajax.reload();
              var res = JSON.parse(response);
              if (res.status)
                Swal.fire(
                  'Dihapus!',
                  'Liga berhasil dihapus.',
                  'success'
                )
              else
                Swal.fire(
                  'Gagal!',
                  'Gagal menghapus liga.',
                  'error'
                )
            },
            fail: function(response) {
              Swal.fire(
                'Error!',
                'Terjadi kesalahan, silahkan coba kembali.',
                'fail'
              )
            }
          });
        }
      })
    }

    function manageLeague(id) {
      $.ajax({
        type: "POST",
        url: "/api/league.php",
        data: {
          'tipe': 'manage',
          'id': id
        },
        success: function(response) {
          var res = JSON.parse(response)
          var data = res.data
          if (data) {
            var extras = JSON.parse(data);
            var teams = extras.teams;

            if (teams.length > 0) {
              for (i = 0; i < teams.length; i++)
                exampleTeams[i] = teams[i][1];
              // getBracket(teams.length);
            }
          }
          $("select[name=round_one] option[value='" + extras.round_one + "']").attr("selected", "selected");
          $("select[name=third_place_winner ] option[value='" + extras.third_place_winner + "']").attr("selected", "selected");
        }
      });
    }

    // Check if form manage submit button clicked
    // TODO

    var knownBrackets = [2, 4, 8, 16, 32], // brackets with "perfect" proportions (full fields, no byes)

      // exampleTeams = _.shuffle(["New Jersey Devils", "New York Islanders", "New York Rangers", "Philadelphia Flyers", "Pittsburgh Penguins", "Boston Bruins", "Buffalo Sabres", "Montreal Canadiens", "Ottawa Senators", "Toronto Maple Leafs", "Carolina Hurricanes", "Florida Panthers", "Tampa Bay Lightning", "Washington Capitals", "Winnipeg Jets", "Chicago Blackhawks", "Columbus Blue Jackets", "Detroit Red Wings", "Nashville Predators", "St. Louis Blues", "Calgary Flames", "Colorado Avalanche", "Edmonton Oilers", "Minnesota Wild", "Vancouver Canucks", "Anaheim Ducks", "Dallas Stars", "Los Angeles Kings", "Phoenix Coyotes", "San Jose Sharks", "Montreal Wanderers", "Quebec Nordiques", "Hartford Whalers"]), // because a bracket needs some teams!
      exampleTeams = [];

    bracketCount = 0;

    /*
     * Build our bracket "model"
     */
    function getBracket(base) {

      var closest = _.find(knownBrackets, function(k) {
          return k >= base;
        }),
        byes = closest - base;

      if (byes > 0) base = closest;

      var brackets = [],
        round = 1,
        baseT = base / 2,
        baseC = base / 2,
        teamMark = 0,
        nextInc = base / 2;

      for (i = 1; i <= (base - 1); i++) {
        var baseR = i / baseT,
          isBye = false;

        if (byes > 0 && (i % 2 != 0 || byes >= (baseT - i))) {
          isBye = true;
          byes--;
        }

        var last = _.map(_.filter(brackets, function(b) {
          return b.nextGame == i;
        }), function(b) {
          return {
            game: b.bracketNo,
            teams: b.teamnames
          };
        });

        brackets.push({
          lastGames: round == 1 ? null : [last[0].game, last[1].game],
          nextGame: nextInc + i > base - 1 ? null : nextInc + i,
          teamnames: round == 1 ? [exampleTeams[teamMark], exampleTeams[teamMark + 1]] : [last[0].teams[_.random(1)], last[1].teams[_.random(1)]],
          bracketNo: i,
          roundNo: round,
          bye: isBye
        });
        teamMark += 2;
        if (i % 2 != 0) nextInc--;
        while (baseR >= 1) {
          round++;
          baseC /= 2;
          baseT = baseT + baseC;
          baseR = i / baseT;
        }
      }

      renderBrackets(brackets);
    }

    /*
     * Inject our brackets
     */
    function renderBrackets(struct) {
      var groupCount = _.uniq(_.map(struct, function(s) {
        return s.roundNo;
      })).length;

      var group = $('<div class="group' + (groupCount + 1) + '" id="b' + bracketCount + '"></div>'),
        grouped = _.groupBy(struct, function(s) {
          return s.roundNo;
        });

      for (g = 1; g <= groupCount; g++) {
        var round = $('<div class="r' + g + '"></div>');
        _.each(grouped[g], function(gg) {
          if (gg.bye)
            round.append('<div></div>');
          else
            round.append(
              '<div>' +
              '<div class="bracketbox">' +
              '<span class="info">' +
              '<a href="javascript:void(0)"' +
              'data-toggle="modal"' +
              'data-target="#modal-default">' +
              '<i class="fa fa-edit"></i>' +
              '</a>' + gg.bracketNo +
              '</span>' +
              '<span class="teama">' + gg.teamnames[0] + '</span>' +
              '<span class="teamb">' + gg.teamnames[1] + '</span>' +
              '</div>' +
              '</div>'
            );
        });
        group.append(round);
      }
      group.append(
        '<div class="r' + (groupCount + 1) + '">' +
        '<div class="final">' +
        '<div class="bracketbox">' +
        '<span class="teamc">' +
        _.last(struct).teamnames[_.random(1)] +
        '</span>' +
        '</div>' +
        '</div>' +
        '</div>');
      $('#brackets').append(group);

      bracketCount++;
      $('html,body').animate({
        scrollTop: $("#b" + (bracketCount - 1)).offset().top
      });
    }
  </script>
</body>

</html>