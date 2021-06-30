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
            <!-- FORM CREATE MEMBER -->
            <?php if (!empty($_GET['page']) == 'create') { ?>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data Official Tim</h3>
                  </div>
                  <!-- /.card-header -->
                  <form>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label for="namaklub">Nama Klub</label>
                            <input name="club-name" type="text" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label for="lisensi">Lisensi</label>
                            <input name="license" type="text" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label for="emailklub">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label for="notelfonklub">No Telfon</label>
                            <input name="phone-number" type="number" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label for="alamatklub">Alamat</label>
                            <textarea name="address" rows="2" class="form-control" placeholder="Enter ..."></textarea>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label for="customFile">Upload Logo Klub</label>
                            <div class="custom-file">
                              <input name="photo" type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png. Uk: 4x6 cm</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                              <label for="manager-name">Nama Manajer</label>
                              <input name="manager-name" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            <div class="col-sm-4">
                              <label for="manager-telp">No Telfon Manajer</label>
                              <input name="manager-phone" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                            <div class="col-sm-4">
                              <label for="manager-files">Upload Foto Manajer</label>
                              <div class="custom-file">
                                <input name="manager-photo" type="file" class="custom-file-input" id="manager-files">
                                <label class="custom-file-label" for="manager-files">Choose file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group row">
                            <div class="col-sm-6">
                              <label for="pelatihkepala">Nama Pelatih</label>
                              <input name="coach" type="text" class="form-control" id="pelatihkepala" placeholder="" required>
                            </div>
                            <div class="col-sm-6">
                              <label for="customFile">Upload Foto Pelatih</label>
                              <div class="custom-file">
                                <input name="photo" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data Individu Pemain</h3>
                  </div>
                  <!-- /.card-header -->
                  <form>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <div class="input-group">
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-plus"></i>&nbsp; Tambah
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="players-table" class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Nama</th>
                              <th>TTL</th>
                              <th>Posisi</th>
                              <th>No. Punggung</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Trident</td>
                              <td>Internet
                                Explorer 4.0
                              </td>
                              <td>Win 95+</td>
                              <td> 4</td>
                              <td>X</td>
                              <td>
                                <a class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash"></i> Delete
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <form>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
              </div>
            <?php } else { ?>
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
                        <?php
                        $sql = 'SELECT * FROM `teams`';
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['licenses'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['telp'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td>
                              <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye"></i> Lihat
                              </a>
                              <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i> Ubah
                              </a>
                              <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash"></i> Hapus
                              </a>
                            </td>
                          </tr>
                        <?php } ?>
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
              <input name=identity-number type="number" class="form-control" id="kartu" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="namapemain">Nama</label>
              <input name="full-name" type="text" class="form-control" id="namapemain" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="tempatlahir">Tempat Lahir</label>
              <input name="birth-place" type="text" class="form-control" id="tempatlahir" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="tanggallahir">Tanggal Lahir</label>
              <input name="birth-date" type="date" class="form-control" id="tanggallahi" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="alamatpemain">Alamat</label>
              <textarea name="address" type="text" rows="2" class="form-control" id="alamatpemain" placeholder=""></textarea>
            </div>
            <div class="form-group">
              <label for="agamapemain">Agama</label>
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
            <div class="form-group">
              <label for="agamapemain">Jenis Kelamin</label>
              <select name="gender" class="custom-select">
                <option selected disabled value="">Choose...</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tinggibadanpemain">Tinggi Badan</label>
              <input name="height" type="number" class="form-control" id="tinggibadanpemain" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="beratbadanpemain">Berat Badan</label>
              <input name="weight" type="number" class="form-control" id="beratbadanpemain" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="posisipemain">Posisi Bermain</label>
              <input name="position" type="text" class="form-control" id="posisipemain" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="nopemain">Nomor Punggung</label>
              <input name="back-number" type="number" class="form-control" id="nopemain" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="namapunggungpemain">Nama Punggung</label>
              <input name="back-name" type="text" class="form-control" id="namapunggungpemain" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="photo-file">Upload Foto</label>
              <div class="custom-file">
                <input name="photo" type="file" class="custom-file-input" id="photo-file">
                <label class="custom-file-label" for="photo-file">Choose file</label>
                <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png. Uk: 4x6 cm</small>
              </div>
            </div>
            <div class="form-group">
              <label for="identity-file">Upload Kartu Identitas</label>
              <div class="custom-file">
                <input name="card-identity" type="file" class="custom-file-input" id="identity-file">
                <label class="custom-file-label" for="identity-file">Choose file</label>
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
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>