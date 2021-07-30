<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin SSB | Turnamen</title>
  <?php
  include 'session.php';
  include 'views/meta.php';
  ?>

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
              <h1 class="m-0">Turnamen</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Dasbor</a></li>
                <li class="breadcrumb-item active">Turnamen</li>
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
                $sql = 'SELECT * FROM `tournaments` WHERE id = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") { ?>
                  <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Ubah Turnamen</h3>
                      </div>
                      <!-- /.card-header -->
                      <form name="form1" method="post" action="/api/tournament.php" enctype="multipart/form-data">
                        <input type="hidden" name="tipe" value="update">
                        <input type="hidden" name="id" value="">
                        <div class="card-body">
                          <?php if ($error_msg = $_GET['errorMsg'] ?? false)
                            if ($error_msg == 'already_exist')
                              echo '
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5><i class="icon fas fa-ban"></i> Error!</h5>
                              Maaf, file sudah ada.
                            </div>';
                            else if ($error_msg == 'file_size')
                              echo '
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5><i class="icon fas fa-ban"></i> Error!</h5>
                              Maksimal ukuran file foto adalah 1 MB.
                            </div>';
                            else if ($error_msg == 'file_format')
                              echo '
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5><i class="icon fas fa-ban"></i> Error!</h5>
                              Maaf, hanya terima file JPG, JPEG & PNG.
                            </div>';
                            else
                              echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                Terjadi kesalahan, harap cek kembali form!
                              </div>';

                          ?>
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
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label for="fileToUpload">Upload Logo</label><br>
                                <?php
                                // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                $image_path = str_replace('..', '', $row['image_path']);
                                $src = 'http://' . $_SERVER['HTTP_HOST'] . $image_path;
                                // $file_name = '';
                                echo '<img src="' . $src . '" alt="image" width="300px" style="padding-bottom: 20px;">'
                                ?>
                                <div class="custom-file">
                                  <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                  <label class="custom-file-label" for="fileToUpload">Choose file</label>
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
                <div class="col-lg-8 col-md-12 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Turnamen</h3>
                    </div>
                    <!-- /.card-header -->
                    <form name="form1" method="post" action="/api/tournament.php" enctype="multipart/form-data">
                      <input type="hidden" name="tipe" value="store">
                      <div class="card-body">
                        <?php if ($error_msg = $_GET['errorMsg'] ?? false)
                          if ($error_msg == 'already_exist')
                            echo '
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5><i class="icon fas fa-ban"></i> Error!</h5>
                              Maaf, file sudah ada.
                            </div>';
                          else if ($error_msg == 'file_size')
                            echo '
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5><i class="icon fas fa-ban"></i> Error!</h5>
                              Maksimal ukuran file foto adalah 1 MB.
                            </div>';
                          else if ($error_msg == 'file_format')
                            echo '
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h5><i class="icon fas fa-ban"></i> Error!</h5>
                              Maaf, hanya terima file JPG, JPEG & PNG.
                            </div>';
                          else
                            echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                Terjadi kesalahan, harap cek kembali form!
                              </div>';

                        ?>
                        <div class="row">
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Nama</label>
                              <input name="name" type="text" class="form-control" placeholder="Enter name">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Tanggal</label>
                              <input name="date" type="date" class="form-control" placeholder="Enter date">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Lokasi</label>
                              <input name="location" type="text" class="form-control" placeholder="Enter location">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="custom-select">
                                <option selected disabled value="">Choose..</option>
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="fileToUpload">Upload Logo</label>
                              <div class="custom-file">
                                <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                <label class="custom-file-label" for="fileToUpload">Choose file</label>
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
            } else if (($_GET['page'] ?? '') == 'manage') {
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
                $sql = 'SELECT * FROM `tournaments` WHERE id=' . $id . ' AND `status`="Buka"';
                $result = $conn->query($sql);

                // Jika ada 
                if ($row = $result->fetch_assoc()) {
                ?>
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-header">
                        <h3 class="card-title">Kelola Turnamen</h3>
                      </div>
                      <!-- /.card-header -->

                      <form name="formManage" method="post" action="/api/tournament.php">
                        <input type="hidden" name="tipe" value="postManage">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="row">
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Nama Turnamen</span>
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
                                          JOIN team_has_tournaments tl ON t.id = tl.team_id 
                                          JOIN tournaments l ON tl.tournament_id = l.id 
                                          WHERE t.id IN (
                                            SELECT team_id FROM team_has_tournaments tl 
                                            JOIN tournaments l ON tl.tournament_id = l.id 
                                            WHERE l.id = ' . $row['id'] . '
                                          )';
                                  $result = $conn->query($sql);

                                  // Checking who joined to the tournaments
                                  $sql_league = 'SELECT * FROM `tournaments` WHERE `id` = ' . $id;
                                  $result_league = $conn->query($sql_league);
                                  $row_league = $result_league->fetch_assoc();
                                  $extras = json_decode($row_league['extras']);

                                  $teams_joined_leagues = $extras->teams ?? [];

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
                    <div class="brackets" id="brackets"></div>
                  </div>
                <?php
                  // Load data manage tournament
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
            } else if ($_GET['page'] ?? '' == 'view' && isset($_GET['id'])) {

              if (!empty($id = $_GET['id'])) {
                $sql = 'SELECT * FROM `tournaments` WHERE `id` = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") {

                ?>
                  <!-- Lihat Turnamen -->
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-eye"></i>
                          Lihat Turnamen
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
                        <hr>
                        <dl class="row">
                          <!-- Extras -->
                          <?php
                          $extras = json_decode($row['extras']);
                          $round_one = $extras->round_one ?? '';
                          $third_place_winner = $extras->third_place_winner ?? '';
                          ?>
                          <dt class="col-sm-4">Ronde Pertama</dt>
                          <dd class="col-sm-8"><?php echo $round_one ?></dd>
                          <dt class="col-sm-4">Pencarian Juara 3</dt>
                          <dd class="col-sm-8"><?php echo $third_place_winner ?></dd>
                        </dl>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <div class="col-12">
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
                  </div>
              <?php
                  echo '<script>document.addEventListener("DOMContentLoaded", function() {viewLeague(' . $id . ')})</script>';
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
                    <h3 class="card-title">List Turnamen</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div style="margin-bottom: 10px;" class="row">
                      <div class="col-lg-12">
                        <a class="btn btn-success" href="tournament.php?page=create">
                          <i class="fa fa-plus"></i>&nbsp; Tambah Turnamen
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
  <!-- bs-custom-file-input -->
  <script src="/server/plugins/bs-custom-file-input/bs-custom-file-input.min.js" wfd-invisible="true"></script>

  <script wfd-invisible="true">
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
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
        url: "/api/tournament.php",
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

      if (findGetParameter('page') == 'manage' || findGetParameter('page') == 'view') {

        var saveData2 = {};

        // Get match by tournament_id
        $.ajax({
          type: "POST",
          url: "/api/match.php",
          data: {
            'tipe': 'getMatchByLeagueId',
            'id': findGetParameter('id')
          },
          success: function(response) {
            var res = JSON.parse(response)

            var teams = []
            var participant_teams = []
            res.teams.forEach(function(match) {
              var id = match[0];
              var participant = match[1].split(', ');
              var date = match[2]
              var time = match[3]
              var participant_name = []
              $.ajax({
                async: false,
                type: "POST",
                url: "/api/team.php",
                data: {
                  'tipe': 'getTeamAsParticipant',
                  'participant': participant,
                },
                success: function(response) {
                  // console.log('api/team.php')
                  // console.log(response)
                  // return tmp = 'test'
                  // console.log(response)
                  participant_name = JSON.parse(response)
                }
              });

              participant_teams.push(participant_name)
              teams.push(participant);

            })

            saveData2['teams'] = participant_teams;
            saveData2['results'] = JSON.parse(res.results[0])

            // Ajax to get third winner
            $.ajax({
              type: "POST",
              url: "/api/tournament.php",
              async: false,
              data: {
                'tipe': 'show',
                'id': findGetParameter('id'),
              },
              success: function(response) {
                var res = JSON.parse(response)
                var extras = JSON.parse(res['extras']);
                extras.third_place_winner == "Tidak" ? third_place_winner_status = true : third_place_winner_status = false;
              }
            });

            // For Bracket
            if (teams.length > 0) {
              var container = $('.bracketGenerated')
              if (findGetParameter('page') == 'view')
                container.bracket({
                  teamWidth: 350, // Lebar bracket tim
                  matchMargin: 50,
                  skipConsolationRound: third_place_winner_status,
                  init: saveData2,
                  onMatchClick: void(0),
                  onMatchHover: void(0),
                  userData: "http://myapi",
                })
              else
                container.bracket({
                  teamWidth: 350, // Lebar bracket tim
                  matchMargin: 50,
                  disableTeamEdit: true,
                  skipConsolationRound: third_place_winner_status,
                  init: saveData2,
                  save: saveFn,
                  userData: "http://myapi",
                  disableToolbar: true,
                })

              var data = container.bracket('data')
            }

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
          "ajax": '/api/tournament.php',
          "columnDefs": [{
            "targets": 4,
            "data": 4,
            "render": function(data, type, full, meta) {
              console.log(full['3']);

              var manage_button = full['3'] == "Buka" ? '<a class="btn btn-primary btn-sm" href="/server/tournament.php?page=manage&id=' + data + '"><i class="far fa-edit"></i> Kelola</a> ' : '';
              return '' +
                manage_button +
                '<a class="btn btn-primary btn-sm" href="/server/tournament.php?page=view&id=' + data + '"><i class="fas fa-eye"></i> Lihat</a> ' +
                '<a class="btn btn-info btn-sm" href="/server/tournament.php?page=edit&id=' + data + '"><i class="fas fa-pencil-alt"></i> Ubah</a> ' +
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
          'Berhasil menambahkan turnamen!',
          'success'
        )
      else if (status == 'updated')
        Swal.fire(
          'Berhasil!',
          'Berhasil mengubah turnamen!',
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
      else if (generate == "acak")
        Swal.fire(
          'Berhasil!',
          'Berhasil membuat bracket acak',
          'success'
        )
      else
        Swal.fire(
          'Info!',
          'Tidak ada tim yang terpilih dalam turnamen ini.',
          'info'
        )

    }

    function editLeague(id) {
      $.ajax({
        type: "POST",
        url: "/api/tournament.php",
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
        title: 'Apakah anda yakin hapus turnamen ini?',
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
            url: "/api/tournament.php",
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
                  'Turnamen berhasil dihapus.',
                  'success'
                )
              else
                Swal.fire(
                  'Gagal!',
                  'Gagal menghapus turnamen.',
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

    function viewLeague(id) {
      $.ajax({
        type: "POST",
        url: "/api/tournament.php",
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
          }
          $("select[name=round_one] option[value='" + extras.round_one + "']").attr("selected", "selected");
          $("select[name=third_place_winner ] option[value='" + extras.third_place_winner + "']").attr("selected", "selected");
        }
      });
    }

    function manageLeague(id) {
      $.ajax({
        type: "POST",
        url: "/api/tournament.php",
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
          }
          $("select[name=round_one] option[value='" + extras.round_one + "']").attr("selected", "selected");
          $("select[name=third_place_winner ] option[value='" + extras.third_place_winner + "']").attr("selected", "selected");
        }
      });
    }
  </script>
</body>

</html>