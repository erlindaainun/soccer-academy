<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin SSB | Tim</title>
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
              <h1 class="m-0">Tim</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tim</li>
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

            <!-- FORM CREATE TIM -->
            <?php

            // Ambil parameter page
            $page = $_GET['page'] ?? '';

            // Jika parameter `page` sama dengan `create` atau `edit`
            if ($page == 'create' || $page == 'edit') {

              // Jika page sama dengan `edit` dan memiliki `id`
              if ($page == 'edit' && isset($_GET['id'])) {
                // Check apakah `id` ada didatabase
                $id = $_GET['id'];
                $sql = 'SELECT * FROM `teams` WHERE id = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") { ?>

                  <div class="col-sm-8">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Edit Data Tim</h3>
                      </div>
                      <!-- /.card-header -->
                      <form name="form1" method="post" action="/api/team.php" enctype="multipart/form-data">
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
                                <label for="namaklub">Pilih Liga / Turnamen</label>
                                <select name="league" class="custom-select">
                                  <option selected disabled value="">Choose..</option>
                                  <?php
                                  $sql = 'SELECT * FROM `leagues` WHERE `status`="Buka"';
                                  $result = $conn->query($sql);

                                  while ($row = $result->fetch_assoc()) {
                                  ?>
                                    <option value="<?php echo $row['id'] ?>">(Liga) <?php echo $row['name'] ?></option>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  $sql = 'SELECT * FROM `tournaments` WHERE `status`="Buka"';
                                  $result = $conn->query($sql);

                                  while ($row = $result->fetch_assoc()) {
                                  ?>
                                    <option value="<?php echo $row['id'] ?>">(Turnamen) <?php echo $row['name'] ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label for="namaklub">Nama Klub</label>
                                <input name="club-name" type="text" class="form-control" placeholder="Enter name">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label for="lisensi">Lisensi</label>
                                <input name="license" type="text" class="form-control" placeholder="Enter license">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label for="emailklub">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter email">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label for="notelfonklub">No Telfon</label>
                                <input name="phone-number" type="number" class="form-control" placeholder="Enter phone number">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label for="alamatklub">Alamat</label>
                                <textarea name="address" rows="2" class="form-control" placeholder="Enter address"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="fileToUpload">Upload Gambar</label>
                                <div class="custom-file">
                                  <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                  <label class="custom-file-label" for="fileToUpload">Choose file</label>
                                  <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group row">
                                <div class="col-sm-4">
                                  <label for="manager-name">Nama Manajer</label>
                                  <input name="manager-name" type="text" class="form-control" placeholder="Enter manager name">
                                </div>
                                <div class="col-sm-4">
                                  <label for="manager-telp">No Telfon Manajer</label>
                                  <input name="manager-phone" type="number" class="form-control" placeholder="Enter manager phone number">
                                </div>
                                <div class="col-sm-4">
                                  <label for="fileToUpload">Upload Foto Manajer</label>
                                  <div class="custom-file">
                                    <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                    <label class="custom-file-label" for="fileToUpload">Choose file</label>
                                    <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group row">
                                <div class="col-sm-6">
                                  <label for="pelatihkepala">Nama Pelatih</label>
                                  <input name="coach" type="text" class="form-control" id="pelatihkepala" placeholder="Enter coach name">
                                </div>
                                <div class="col-sm-6">
                                  <label for="fileToUpload">Upload Foto Pelatih</label>
                                  <div class="custom-file">
                                    <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                    <label class="custom-file-label" for="fileToUpload">Choose file</label>
                                    <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i>&nbsp; Tambah Pemain
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </form>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                <?php
                  // get data from ajax request
                  echo '<script>document.addEventListener("DOMContentLoaded", function() {editTeam(' . $id . ')})</script>';
                } else { // jika `id` yang diberikan tidak ada di database
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
                <div class="col-sm-8">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Data Tim</h3>
                    </div>
                    <!-- /.card-header -->
                    <form name="form1" method="post" action="/api/team.php" enctype="multipart/form-data">
                      <input type="hidden" name="tipe" value="store">
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
                              <label for="namaklub">Pilih Liga / Turnamen</label>
                              <select name="league" class="custom-select">
                                <option selected disabled value="">Choose..</option>
                                <?php
                                $sql = 'SELECT * FROM `leagues` WHERE `status`="Buka"';
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                ?>
                                  <option value="<?php echo $row['id'] ?>">(Liga) <?php echo $row['name'] ?></option>
                                <?php
                                }
                                ?>

                                <?php
                                $sql = 'SELECT * FROM `tournaments` WHERE `status`="Buka"';
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                ?>
                                  <option value="<?php echo $row['id'] ?>">(Turnamen) <?php echo $row['name'] ?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label for="namaklub">Nama Klub</label>
                              <input name="club-name" type="text" class="form-control" placeholder="Enter name">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label for="lisensi">Lisensi</label>
                              <input name="license" type="text" class="form-control" placeholder="Enter license">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label for="emailklub">Email</label>
                              <input name="email" type="email" class="form-control" placeholder="Enter email">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label for="notelfonklub">No Telfon</label>
                              <input name="phone-number" type="number" class="form-control" placeholder="Enter phone number">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label for="alamatklub">Alamat</label>
                              <textarea name="address" rows="2" class="form-control" placeholder="Enter address"></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="fileToUpload">Upload Gambar</label>
                              <div class="custom-file">
                                <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                <label class="custom-file-label" for="fileToUpload">Choose file</label>
                                <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group row">
                              <div class="col-sm-4">
                                <label for="manager-name">Nama Manajer</label>
                                <input name="manager-name" type="text" class="form-control" placeholder="Enter manager name">
                              </div>
                              <div class="col-sm-4">
                                <label for="manager-telp">No Telfon Manajer</label>
                                <input name="manager-phone" type="number" class="form-control" placeholder="Enter manager phone number">
                              </div>
                              <div class="col-sm-4">
                                <label for="fileToUpload">Upload Foto Manajer</label>
                                <div class="custom-file">
                                  <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                  <label class="custom-file-label" for="fileToUpload">Choose file</label>
                                  <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group row">
                              <div class="col-sm-6">
                                <label for="pelatihkepala">Nama Pelatih</label>
                                <input name="coach" type="text" class="form-control" id="pelatihkepala" placeholder="Enter coach name">
                              </div>
                              <div class="col-sm-6">
                                <label for="fileToUpload">Upload Foto Pelatih</label>
                                <div class="custom-file">
                                  <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                  <label class="custom-file-label" for="fileToUpload">Choose file</label>
                                  <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <div class="input-group">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                  <i class="fa fa-plus"></i>&nbsp; Tambah Pemain
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </form>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
                <?php }
            } else if (!empty($_GET['page']) == 'view' && isset($_GET['id'])) {

              if (!empty($id = $_GET['id'])) {
                $sql = 'SELECT * FROM `teams` WHERE `id` = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") {

                  $image_path = str_replace('..', '', $row['photo']);
                  $src = 'http://' . $_SERVER['HTTP_HOST'] . $image_path;
                ?>

                  <div class="col-md-3">
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">
                          Data Oficial Tim
                        </h3>
                      </div>
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-circle rounded-circle" src="<?php echo $src ?>" alt="" style="height:100px;">
                        </div>
                        <h3 class="profile-username text-center"><?php echo $row['name'] ?></h3>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-body">
                        <strong><i class="fas fa-id-badge mr-1"></i> Lisensi</strong>
                        <p class="text-muted">
                          <?php echo $row['licenses'] ?>
                        </p>
                        <hr>
                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                        <p class="text-muted">
                          <?php echo $row['email'] ?>
                        </p>
                        <hr>
                        <strong><i class="fas fa-phone mr-1"></i> No Telfon</strong>
                        <p class="text-muted">
                          <?php echo $row['telp'] ?>
                        </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted">
                          <?php echo $row['address'] ?>
                        </p>
                        <hr>

                        <?php
                        $TEAM_MANAGER_ID = "";
                        $TEAM_COACH_ID = "";
                        $TEAM_ID = "";

                        $sql = 'SELECT * FROM `teams` WHERE `id` = ' . $_GET['id'];
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $TEAM_MANAGER_ID = $row['manager_id'] ?? '';
                        $TEAM_COACH_ID = $row['coach_id'] ?? '';
                        $TEAM_ID = $row['id'] ?? '';

                        $sql = 'SELECT * FROM `managers` WHERE `id` = ' . $TEAM_MANAGER_ID ?? '';
                        $result = $conn->query($sql);
                        $rowmanager = $result->fetch_assoc();

                        $sql = 'SELECT * FROM `coaches` WHERE `id` = ' . $TEAM_COACH_ID ?? '';
                        $result = $conn->query($sql);
                        $rowcoach = $result->fetch_assoc();

                        ?>
                        <strong><i class="fas fa-user-tie mr-1"></i> Nama Manajer</strong>
                        <p class="text-muted">
                          <?php echo $rowmanager['name'] ?>
                        </p>
                        <hr>
                        <strong><i class="fas fa-phone mr-1"></i> No Telfon Manajer</strong>
                        <p class="text-muted">
                          <?php echo $rowmanager['phone_number'] ?>
                        </p>
                        <hr>
                        <strong><i class="fas fa-futbol mr-1"></i> Nama Pelatih</strong>
                        <p class="text-muted">
                          <?php echo $rowcoach['name'] ?>
                        </p>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--  Pemain -->
                  <div class="col-9">
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">
                          Data Pemain
                        </h3>
                      </div>
                      <div class="card-body">
                        <!-- <h4>Left Sided</h4> -->
                        <?php
                        if ($TEAM_ID != "") {
                          $sql = 'SELECT * FROM `players` WHERE `team_id` = ' . $TEAM_ID;
                          $result = $conn->query($sql);

                          // $rows = $result->fetch_assoc();
                          // foreach ($rows as $key => $value) {
                          //   echo $key . '  ' . $value;
                          // }
                        ?>
                          <div class="row">
                            <?php if ($result->num_rows == 0) echo "Belum ada pemain" ?>
                            <div class="col-5 col-sm-3">
                              <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <?php
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                  $name = str_replace(' ', '-', strtolower($row['full_name']));
                                ?>
                                  <a class="nav-link <?php if ($i == 0) echo 'active';
                                                      $i++; ?>" id="vert-tabs-<?php echo $name ?>-tab" data-toggle="pill" href="#vert-tabs-<?php echo $name ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><?php echo $row['id'] . '. ' . $row['full_name'] ?></a>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="col-7 col-sm-9">
                              <div class="tab-content" id="vert-tabs-tabContent">
                                <?php
                                $result = $conn->query($sql);
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                  $name = str_replace(' ', '-', strtolower($row['full_name']));

                                  $image_path = str_replace('..', '', $row['image_path']);
                                  $src = 'http://' . $_SERVER['HTTP_HOST'] . $image_path;
                                ?>
                                  <div class="tab-pane text-left fade <?php if ($i == 0) echo 'active show';
                                                                      $i++; ?>" id="vert-tabs-<?php echo $name ?>" role="tabpanel" aria-labelledby="vert-tabs-<?php echo $name ?>-tab">
                                    <!-- Detail player -->
                                    <div class="row">
                                      <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                          <div class="card-header text-muted border-bottom-0">
                                            <?php echo $row['position'] ?> - <?php echo $row['back_name'] ?> - <?php echo $row['back_number'] ?>
                                          </div>
                                          <div class="card-body pt-0">
                                            <div class="row">
                                              <div class="col-8">
                                                <h2 class="lead"><b><?php echo $row['full_name'] ?></b></h2>
                                                <p class="text-muted text-sm"><b>No. Identitas: </b> <?php echo $row['identity_number'] ?> </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> TTL: <?php echo $row['birth_place'] . ', ' . $row['birth_date'] ?></li>
                                                  <li class="small"><span class="fa-li"><i class="fas fa-star-and-crescent"></i></span> Agama: <?php echo $row['religion'] ?></li>
                                                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: <?php echo $row['address'] ?></li>
                                                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-ruler"></i></span> Tinggi Badan: <?php echo $row['height'] ?> cm</li>
                                                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-weight"></i></span> Berat Badan: <?php echo $row['weight'] ?> kg</li>
                                                </ul>
                                              </div>
                                              <div class="col-4 text-center">
                                                <img src="<?php echo $src ?>" alt="user-avatar" class="img-fluid rounded-circle" style="width: 250px; height: 250px; display:flex">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              <?php }
                              } ?>
                              </div>
                            </div>
                          </div>
                      </div>
                      <!-- /.card -->
                    </div>
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
                    <h3 class="card-title">List Tim</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div style="margin-bottom: 10px;" class="row">
                      <div class="col-lg-12">
                        <a class="btn btn-success" href="team.php?page=create">
                          <i class="fa fa-plus"></i>&nbsp; Tambah Tim
                        </a>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Lisensi</th>
                          <th>Email</th>
                          <th>No Telfon</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Nama</th>
                          <th>Lisensi</th>
                          <th>Email</th>
                          <th>No Telfon</th>
                          <th>Alamat</th>
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

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Individu Pemain</h4>
            <button type="button" id="player-modal" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="kartu">No.Kartu Identitas</label>
              <input name="identity-number" type="number" class="form-control" id="kartu" placeholder="Enter identity number">
            </div>
            <div class="form-group">
              <label for="namapemain">Nama</label>
              <input name="full-name" type="text" class="form-control" id="namapemain" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="tempatlahir">Tempat Lahir</label>
              <input name="birth-place" type="text" class="form-control" id="tempatlahir" placeholder="Enter birth place">
            </div>
            <div class="form-group">
              <label for="tanggallahir">Tanggal Lahir</label>
              <input name="birth-date" type="date" class="form-control" id="tanggallahir" placeholder="Enter birth date">
            </div>
            <div class="form-group">
              <label for="alamatpemain">Alamat</label>
              <textarea name="address" type="text" rows="2" class="form-control" id="alamatpemain" placeholder="Enter address"></textarea>
            </div>
            <div class="form-group">
              <label for="agamapemain">Agama</label>
              <select name="religion" class="custom-select">
                <option selected disabled value="">Choose..</option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Khonghucu">Khonghucu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="agamapemain">Jenis Kelamin</label>
              <select name="gender" class="custom-select">
                <option selected disabled value="">Choose..</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tinggibadanpemain">Tinggi Badan</label>
              <input name="height" type="number" class="form-control" id="tinggibadanpemain" placeholder="Enter height">
            </div>
            <div class="form-group">
              <label for="beratbadanpemain">Berat Badan</label>
              <input name="weight" type="number" class="form-control" id="beratbadanpemain" placeholder="Enter weight">
            </div>
            <div class="form-group">
              <label for="posisipemain">Posisi Bermain</label>
              <input name="position" type="text" class="form-control" id="posisipemain" placeholder="Enter weight">
            </div>
            <div class="form-group">
              <label for="nopemain">Nomor Punggung</label>
              <input name="back-number" type="number" class="form-control" id="nopemain" placeholder="Enter back number">
            </div>
            <div class="form-group">
              <label for="namapunggungpemain">Nama Punggung</label>
              <input name="back-name" type="text" class="form-control" id="namapunggungpemain" placeholder="Enter back name">
            </div>
            <div class="form-group">
              <label for="fileToUpload">Upload Foto</label>
              <div class="custom-file">
                <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                <label class="custom-file-label" for="fileToUpload">Choose file</label>
                <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
              </div>
            </div>
            <div class="form-group">
              <label for="fileToUpload">Upload Kartu Identitas</label>
              <div class="custom-file">
                <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                <label class="custom-file-label" for="fileToUpload">Choose file</label>
                <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
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

  <!-- Page specific script -->

  <!-- bs-custom-file-input -->
  <script src="/server/plugins/bs-custom-file-input/bs-custom-file-input.min.js" wfd-invisible="true"></script>

  <script wfd-invisible="true">
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "ajax": '/api/team.php',
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "columnDefs": [{
          "targets": 5,
          "data": 5,
          "render": function(data, type, full, meta) {
            return '<a class="btn btn-primary btn-sm" href="/server/team.php?page=view&id=' + data + '"><i class="fas fa-eye"></i> Lihat</a> ' +
              '<a class="btn btn-info btn-sm" href="/server/team.php?page=edit&id=' + data + '"><i class="fas fa-pencil-alt"></i> Ubah</a> ' +
              '<a class="btn btn-danger btn-sm" onclick="deleteTeam(' + data + ')" href="javascript:void(0)"><i class="fas fa-trash"></i> Hapus</a> ';

          }
        }]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {});

    function deleteTeam(id) {
      Swal.fire({
        title: 'Apakah anda yakin hapus tim ini?',
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
            url: "/api/team.php",
            data: {
              'tipe': 'deleteTeam',
              'id': id
            },
            success: function(response) {
              $('#example1').DataTable().ajax.reload();
              var res = JSON.parse(response);
              if (res.status)
                Swal.fire(
                  'Dihapus!',
                  'Tim berhasil dihapus.',
                  'success'
                )
              else
                Swal.fire(
                  'Gagal!',
                  'Gagal menghapus tim.',
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
  </script>
</body>

</html>