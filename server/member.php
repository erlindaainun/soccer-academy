<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin SSB | Member</title>

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
              <h1 class="m-0">Anggota</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Anggota</li>
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
            <!-- FORM CREATE MEMBER -->
            <?php

            // Ambil parameter page
            $page = $_GET['page'] ?? '';

            // Jika parameter `page` sama dengan `create` atau `edit`
            if ($page == 'create' || $page == 'edit') {

              // Jika page sama dengan `edit` dan memiliki `id`
              if ($page == 'edit' && isset($_GET['id'])) {
                // Check apakah `id` ada didatabase
                $id = $_GET['id'];
                $sql = 'SELECT * FROM `members` WHERE id = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") { ?>
                  <div class="col-8">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Ubah Anggota</h3>
                      </div>
                      <!-- /.card-header -->
                      <form name="form1" method="post" action="/api/member.php" enctype="multipart/form-data">
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
                                <label>NISN / NIK</label>
                                <input name="identity_number" type="number" class="form-control" placeholder="Enter ...">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input name="birth_place" type="text" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input name="birth_date" type="date" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Kelas</label>
                                <select name="class_type" class="custom-select">
                                  <option selected disabled value="">Choose...</option>
                                  <option value="U6-U8">U6-U8</option>
                                  <option value="U9-U11">U9-U11</option>
                                  <option value="U12-U15">U12-U15</option>
                                  <option value="U16-U18">U16-U18</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="gender_id" class="custom-select">
                                  <option selected disabled value="">Choose...</option>
                                  <option value="1">Laki-Laki</option>
                                  <option value="2">Perempuan</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Agama</label>
                                <select name="religion" class="custom-select">
                                  <option selected disabled value="">Choose...</option>
                                  <option value="Islam">Islam</option>
                                  <option value="Protestan">Protestan</option>
                                  <option value="Katolik">Katolik</option>
                                  <option value="Hindu">Hindu</option>
                                  <option value="Buddha">Buddha</option>
                                  <option value="Khonghucu">Khonghucu</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="address" rows="2" class="form-control" placeholder="Enter ..."></textarea>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input name="weight" type="number" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input name="height" type="number" class="form-control" placeholder="Enter ...">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>No Telfon</label>
                                <input name="phone_number" type="number" class="form-control" placeholder="Enter ...">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Alasan Ingin Bergabung</label>
                                <textarea name="reason" rows="2" class="form-control" placeholder="Enter ..."></textarea>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Posisi</label>
                                <input name="position" type="text" class="form-control" placeholder="Enter ...">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="fileToUpload">Upload Gambar</label><br>

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
                            <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Catatan</label>
                                <textarea name="notes" rows="2" class="form-control" placeholder="Enter ..."></textarea>
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
                  echo '<script>document.addEventListener("DOMContentLoaded", function() {editMember(' . $id . ')})</script>';
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
                <div class="col-8">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Anggota</h3>
                    </div>
                    <!-- /.card-header -->
                    <form name="form1" method="post" action="/api/member.php" enctype="multipart/form-data">
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
                              <label>NISN / NIK</label>
                              <input name="identity_number" type="number" class="form-control" placeholder="Enter identity number">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="row">
                              <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Tempat Lahir</label>
                                  <input name="birth_place" type="text" class="form-control" placeholder="Enter birth place">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Tanggal Lahir</label>
                                  <input name="birth_date" type="date" class="form-control" placeholder="Enter birth date">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Kelas</label>
                              <select name="class_type" class="custom-select">
                                <option selected disabled value="">Choose..</option>
                                <option value="U6-U8">U6-U8</option>
                                <option value="U9-U11">U9-U11</option>
                                <option value="U12-U15">U12-U15</option>
                                <option value="U16-U18">U16-U18</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <select name="gender_id" class="custom-select">
                                <option selected disabled value="">Choose..</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Agama</label>
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
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Alamat</label>
                              <textarea name="address" rows="2" class="form-control" placeholder="Enter address"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="row">
                              <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Berat Badan</label>
                                  <input name="weight" type="number" class="form-control" placeholder="Enter weight">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Tinggi Badan</label>
                                  <input name="height" type="number" class="form-control" placeholder="Enter height">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>No Telfon</label>
                              <input name="phone_number" type="number" class="form-control" placeholder="Enter phone number">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Alasan Ingin Bergabung</label>
                              <textarea name="reason" rows="2" class="form-control" placeholder="Enter reason"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Posisi</label>
                              <input name="position" type="text" class="form-control" placeholder="Enter position">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="customFile">Upload Gambar</label>
                              <div class="custom-file">
                                <input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload">
                                <label class="custom-file-label" for="fileToUpload">Choose file</label>
                                <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Catatan</label>
                              <textarea name="notes" rows="2" class="form-control" placeholder="Enter notes"></textarea>
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
            } else if (!empty($_GET['page']) == 'view' && isset($_GET['id'])) {

              if (!empty($id = $_GET['id'])) {
                $sql = 'SELECT * FROM `members` WHERE `id` = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "") {

                ?>

                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-eye"></i>
                          Lihat Anggota
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-4">Nama</dt>
                          <dd class="col-sm-8"><?php echo $row['name'] ?></dd>
                          <dt class="col-sm-4">NISN / NIK</dt>
                          <dd class="col-sm-8"><?php echo $row['nisn'] ?></dd>
                          <dt class="col-sm-4">Tempat, Tgl Lahir</dt>
                          <dd class="col-sm-8"><?php echo $row['birth_place'] . ', ' . $row['birth_date'] ?></dd>
                          <dt class="col-sm-4">Kelas</dt>
                          <dd class="col-sm-8"><?php echo $row['class_type'] ?></dd>
                          <dt class="col-sm-4">Jenis Kelamin</dt>
                          <dd class="col-sm-8"><?php echo $row['gender_id'] == 1 ? "Laki-Laki" : "Perempuan"; ?></dd>
                          <dt class="col-sm-4">Agama</dt>
                          <dd class="col-sm-8"><?php echo $row['religion'] ?></dd>
                          <dt class="col-sm-4">Alamat</dt>
                          <dd class="col-sm-8"><?php echo $row['address'] ?></dd>
                          <dt class="col-sm-4">Berat Badan</dt>
                          <dd class="col-sm-8"><?php echo $row['weight'] ?></dd>
                          <dt class="col-sm-4">Tinggi Badan</dt>
                          <dd class="col-sm-8"><?php echo $row['height'] ?></dd>
                          <dt class="col-sm-4">No Telfon</dt>
                          <dd class="col-sm-8"><?php echo $row['phone_number'] ?></dd>
                          <dt class="col-sm-4">Alasan Ingin Bergabung</dt>
                          <dd class="col-sm-8"><?php echo $row['reason'] ?></dd>
                          <dt class="col-sm-4">Posisi</dt>
                          <dd class="col-sm-8"><?php echo $row['position'] ?></dd>
                          <dt class="col-sm-4">Catatan</dt>
                          <dd class="col-sm-8"><?php echo $row['notes'] ?></dd>
                          <dt class="col-sm-4">Gambar</dt>
                          <!-- <dd class="col-sm-8"><?php echo $row['image_path'] ?></dd> -->
                          <?php
                          // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                          $image_path = str_replace('..', '', $row['image_path']);
                          $src = 'http://' . $_SERVER['HTTP_HOST'] . $image_path;
                          ?>
                          <dd class="col-sm-8"><img width="200px" height="auto" src="<?php echo $src ?>" alt=""></dd>
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
                    <h3 class="card-title">List Anggota</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div style="margin-bottom: 10px;" class="row">
                      <div class="col-lg-12">
                        <a class="btn btn-success" href="member.php?page=create">
                          <i class="fa fa-plus"></i>&nbsp; Tambah Anggota
                        </a>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>NISN / NIK</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Alamat</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>NISN / NIK</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Alamat</th>
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
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "ajax": '/api/member.php',
        "columnDefs": [{
          "targets": 5,
          "data": 5,
          "render": function(data, type, full, meta) {
            return '<a class="btn btn-primary btn-sm" href="/server/member.php?page=view&id=' + data + '"><i class="fas fa-eye"></i> Lihat</a> ' +
              '<a class="btn btn-info btn-sm" href="/server/member.php?page=edit&id=' + data + '"><i class="fas fa-pencil-alt"></i> Ubah</a> ' +
              '<a class="btn btn-danger btn-sm" onclick="deleteMember(' + data + ')" href="javascript:void(0)"><i class="fas fa-trash"></i> Hapus</a> ';

          }
        }]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
          'Berhasil menambahkan anggota!',
          'success'
        )
      else if (status == 'updated')
        Swal.fire(
          'Berhasil!',
          'Berhasil mengubah anggota!',
          'success'
        )
    }

    function editMember(id) {
      $.ajax({
        type: "POST",
        url: "/api/member.php",
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
          $("input[name=identity_number]").val(data.nisn);
          $("input[name=birth_place]").val(data.birth_place);
          $("input[name=birth_date]").val(data.birth_date);
          $("select[name=class_type] option[value='" + data.class_type + "']").attr("selected", "selected");
          $("select[name=gender_id] option[value='" + data.gender_id + "']").attr("selected", "selected");
          $("select[name=religion ] option[value='" + data.religion + "']").attr("selected", "selected");
          $("textarea[name=address]").val(data.address);
          $("input[name=weight]").val(data.weight);
          $("input[name=height]").val(data.height);
          $("input[name=phone_number]").val(data.phone_number);
          $("textarea[name=reason]").val(data.reason);
          $("input[name=position]").val(data.position);
          $("textarea[name=notes]").val(data.notes);

        }
      });
    }

    function deleteMember(id) {
      Swal.fire({
        title: 'Apakah anda yakin hapus anggota ini?',
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
            url: "/api/member.php",
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
                  'Anggota berhasil dihapus.',
                  'success'
                )
              else
                Swal.fire(
                  'Gagal!',
                  'Gagal menghapus anggota.',
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

  <!-- bs-custom-file-input -->
  <script src="/server/plugins/bs-custom-file-input/bs-custom-file-input.min.js" wfd-invisible="true"></script>

  <script wfd-invisible="true">
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

</body>

</html>