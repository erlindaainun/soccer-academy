<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registrasi Tim | SSB Tunas Jaya Duriangkang Official Website</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/server/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="server/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/server/dist/css/adminlte.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/server/plugins/fontawesome-free/css/all.min.css">

  <!-- =======================================================
  * Template Name: Vesperr - v4.2.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include 'header.php'; ?>
  <?php
  include 'connection.php';

  $TEAM_NAME = "";
  $TEAM_ADDRESS = "";
  $TEAM_LICENSE = "";
  $TEAM_MANAGER_ID = "";
  $REGISTRATION_NUMBER = "";
  $TEAM_ID = "";

  ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="/">Beranda</a></li>
            <li>Registrasi Tim</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <?php
          if ($noreg = $_GET['nomorRegistrasi'] ?? false) {
            $sql = 'SELECT * FROM `teams` WHERE `registration_number`="' . $noreg . '"';
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
          }
          $registration_type = $_GET['tipe'] ?? $row['type'];

          if ($registration_type == 'liga')
            echo '<h2>Registrasi Tim Liga</h2>';
          else if ($registration_type == 'turnamen')
            echo '<h2>Registrasi Tim Turnamen</h2>'
          ?>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-12">
            <div class="bs-stepper linear">
              <div class="bs-stepper-header" role="tablist">
                <!-- your steps here -->
                <div class="step active" data-target="#official-part">
                  <button type="button" class="step-trigger" role="tab" aria-controls="official-part" id="official-part-trigger" aria-selected="true">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Data Ofisial Tim</span>
                  </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#player-part">
                  <button type="button" class="step-trigger" role="tab" aria-controls="player-part" id="player-part-trigger" aria-selected="false" disabled="disabled">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Data Individu Pemain</span>
                  </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#confirmation">
                  <button type="button" class="step-trigger" role="tab" aria-controls="confirmation" id="confirmation-trigger" aria-selected="false" disabled="disabled">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Konfirmasi</span>
                  </button>
                </div>
              </div>
              <div class="bs-stepper-content">
                <!-- your steps content here -->
                <div id="official-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="official-part-trigger">
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Info Penting!</h5>
                    Setelah mengisi form "Data Ofisial Tim", anda akan mendapatkan No. Registrasi yang berguna untuk pengisian form selanjutnya. Jika sudah memiliki No. Registrasi sebelumnya silahkan klik <a class="text-primary" data-toggle="modal" data-target="#modal-no-reg" href="#">disini</a> untuk lanjut mengisi form.
                  </div>
                  <input type="hidden" name="team-type" value="<?php echo $_GET['tipe'] ?>">
                  <div class="form-group">
                    <?php
                    $registration_type = $_GET['tipe'] ?? $row['type'];

                    if ($registration_type == 'liga') {
                    ?>
                      <label for="agamapemain">Liga</label>
                      <select name="league" class="custom-select">
                        <option selected disabled value="">Pilih liga...</option>
                        <?php

                        $sql = "SELECT * FROM `leagues`";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    <?php
                    } else if ($registration_type == 'turnamen') {
                    ?>
                      <label for="agamapemain">Turnamen</label>
                      <select name="league" class="custom-select">
                        <option selected disabled value="">Pilih turnamen...</option>
                        <?php

                        $sql = "SELECT * FROM `tournaments`";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="namaklub">Nama Klub</label>
                    <input name="club-name" type="text" class="form-control" id="namaklub" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="lisensi">Lisensi</label>
                    <input name="license" type="text" class="form-control" id="lisensi" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="emailklub">Email</label>
                    <input name="email" type="email" class="form-control" id="emailklub" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="notelfonklub">No Telfon</label>
                    <input name="phone-number" type="number" class="form-control" id="notelfonklub" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="alamatklub">Alamat</label>
                    <textarea name="address" rows="2" class="form-control" id="alamatklub" placeholder=""></textarea>
                  </div>
                  <div class="form-group">
                    <label for="customFile">Upload Logo Klub</label>
                    <div class="custom-file">
                      <input name="photo" type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png. Uk: 4x6 cm</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <label for="manager-name">Nama Manajer</label>
                      <input name="manager-name" type="text" class="form-control" id="manager-name" placeholder="" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="manager-telp">No Telfon Manajer</label>
                      <input name="manager-phone" type="text" class="form-control" id="manager-telp" placeholder="" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="manager-files">Upload Foto Manajer</label>
                      <div class="custom-file">
                        <input name="manager-photo" type="file" class="custom-file-input" id="manager-files">
                        <label class="custom-file-label" for="manager-files">Choose file</label>
                        <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png. Uk: 4x6 cm</small>
                      </div>
                    </div>
                  </div>
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
                        <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png. Uk: 4x6 cm</small>
                      </div>
                    </div>
                  </div>
                  <button id="teamOfficialNextButton" class="btn btn-primary">Selanjutnya</button>
                </div>

                <div id="player-part" class="content" role="tabpanel" aria-labelledby="player-part-trigger">
                  <?php

                  $nomorRegistrasi = $_GET['nomorRegistrasi'] ?? null;

                  include 'connection.php';

                  // Check team id in database
                  $sql = 'SELECT * FROM `teams` WHERE registration_number = "' . $nomorRegistrasi . '"';
                  // echo $sql;
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();

                  $TEAM_NAME = $row['name'] ?? '';
                  $TEAM_ADDRESS = $row['address'] ?? '';
                  $TEAM_LICENSE = $row['licenses'] ?? '';
                  $TEAM_MANAGER_ID = $row['manager_id'] ?? '';
                  $TEAM_ID = $row['id'] ?? '';

                  if ($result->num_rows != 0) {
                    if ($row['status'] == 'draft') {
                  ?>
                      <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                        Silahkan simpan nomor registrasi untuk melakukan perubahan pada data tim
                      </div>
                      <div class="callout callout-warning">
                        <h5>INFO TIM</h5>
                        <p>
                          Nomor Registrasi: <strong><?php echo $row['registration_number'] ?></strong><br>
                          Nama Tim: <strong><?php echo $row['name'] ?></strong><br>
                        </p>
                      </div>
                      <input name="registration-number" type="hidden" value="<?php echo $row['registration_number'] ?>">
                      <div class="form-group">
                        <div class="input-group">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-plus"></i>&nbsp; Tambah
                          </button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Nama Pemain</h3>
                            </div>
                            <!-- /.card-header -->
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
                                  <?php

                                  $sql = 'SELECT * FROM `players` WHERE `team_id` = ' . $row['id'];
                                  $result = $conn->query($sql);

                                  if ($result->num_rows != 0)
                                    while ($row = mysqli_fetch_assoc($result)) {
                                      $ttl = $row['birth_place'] . ', ' . $row['birth_date'];
                                      echo '<tr>',
                                      '<td>' . $row['id'] . '</td>',
                                      '<td>' . $row['full_name'] . '</td>',
                                      '<td>' . $ttl . '</td>',
                                      '<td>' . $row['position'] . '</td>',
                                      '<td>' . $row['back_number'] . '</td>',
                                      '<td>
                                      <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="deletePlayer(' . $row['id'] . ');">
                                          <i class="fas fa-trash"></i> Hapus
                                      </a>
                                    </td>',
                                      '</tr>';
                                    }
                                  else
                                    echo '<tr><td colspan="6" class="text-secondary text-center">Belum ada pemain</td></tr>';

                                  ?>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                      <button class="btn btn-primary" onclick="goToStepThree()">Selanjutnya</button>
                    <?php } else { ?>
                      <div class="callout callout-warning">
                        <h5>Eits..!</h5>
                        <p>Sepertinya nomor registrasi <span class="text-primary text-uppercase text-bold"><?php echo $_GET['nomorRegistrasi'] ?? '' ?></span> sedang/sudah diverifikasi.</p>
                      </div>
                      <button class="btn btn-primary" onclick="backToStepOne()">Kembali</button>
                    <?php }
                  } else { ?>
                    <div class="callout callout-warning">
                      <h5>Eits..!</h5>
                      <p>Sepertinya nomor registrasi <span class="text-primary text-uppercase text-bold"><?php echo $_GET['nomorRegistrasi'] ?? '' ?></span> tidak ada.</p>
                    </div>
                    <button class="btn btn-primary" onclick="backToStepOne()">Kembali</button>
                  <?php } ?>
                </div>
                <div id="confirmation" class="content" role="tabpanel" aria-labelledby="confirmation-trigger">
                  <!-- Detail Team -->
                  <div class="row">
                    <div class="col-12 mt-3">
                      <div class="card">
                        <div class="card-horizontal" style="display:flex; flex: 1 1 auto;">
                          <div class="img-square-wrapper">
                            <img class="" src="http://via.placeholder.com/220x220" alt="Card image cap">
                          </div>
                          <div class="card-body">
                            <dl>
                              <dt>Nama Tim</dt>
                              <dd><?php echo $TEAM_NAME ?? '' ?></dd>
                              <dt>Alamat</dt>
                              <dd><?php echo $TEAM_ADDRESS ?? '' ?></dd>
                              <dt>Lisensi</dt>
                              <dd><?php echo $TEAM_LICENSE ?? '' ?></dd>
                            </dl>
                          </div>
                        </div>
                        <div class="card-footer">
                          <?php
                          $sql = 'SELECT `name` FROM `managers` WHERE `id` = ' . $TEAM_MANAGER_ID ?? '';
                          $result = $conn->query($sql);
                          if ($result)
                            $team_manager_name = $result->fetch_assoc()['name'];
                          ?>
                          <small class="text-muted">Manajer by <span class="text-bold"><?php echo $team_manager_name ?></span></small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--  Pemain -->
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-edit"></i>
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
                                              <img src="/assets/img/team/team-1.jpg" alt="user-avatar" class="img-circle img-fluid">
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
                  <?php if ($TEAM_ID != "") { ?>
                    <button class="btn btn-secondary" onclick="backToStepTwo()">Sebelumnya</button>
                    <button type="submit" onclick="finishCreateTeam(<?php echo $TEAM_ID ?>)" class="btn btn-success">Selesai</button>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
      <div class="modal fade" id="modal-no-reg" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Masukkan Nomor Registrasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="no-reg">No.Registrasi</label>
                <input type="text" class="form-control" id="no-reg" placeholder="" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button onclick="cariNomorRegistrasi(this);" type="button" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php'; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="/server/plugins/bs-stepper/js/bs-stepper.min.js"></script>

  <!-- jQuery -->
  <script src="/server/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/server/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/server/dist/js/adminlte.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Swal2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- bs-custom-file-input -->
  <script src="/server/plugins/bs-custom-file-input/bs-custom-file-input.min.js" wfd-invisible="true"></script>

  <script wfd-invisible="true">
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      console.log(findGetParameter('submitTeam'))
      if (findGetParameter('submitTeam')) {
        var submit_team_status = findGetParameter('submitTeam');

        if (submit_team_status == 'success') {
          Swal.fire(
            'Terkirim!',
            'Berhasil mengirimkan data tim!',
            'success'
          )
        }
      }

      if (findGetParameter('nomorRegistrasi')) {
        var no_reg = findGetParameter('nomorRegistrasi')

        $.ajax({
          type: "POST",
          url: "api/team.php",
          data: {
            'tipe': 'checkRegistrationNumber',
            'noreg': no_reg,
          },
          success: function(response) {
            var res = JSON.parse(response)

            if (res.status == true) {
              if (findGetParameter('step') == 3) {
                stepper.next()
              } else {
                let timerInterval
                Swal.fire({
                  title: 'Nomor Registrasi Terdaftar!',
                  text: 'Silahkan melanjutkan pengisian',
                  timer: 2000,
                  icon: 'success',
                  showConfirmButton: false,
                  timerProgressBar: true,
                  didOpen: () => {
                    // Swal.showLoading()
                    timerInterval = setInterval(() => {
                      const content = Swal.getHtmlContainer()
                      if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                          b.textContent = Swal.getTimerLeft()
                        }
                      }
                    }, 100)
                  },
                  willClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    // console.log('I was closed by the timer')
                  }
                })
              }
            } else if (res.status == false) {
              Swal.fire({
                title: 'Tim telah diajukan!',
                text: res.msg,
                timer: 5000,
                icon: 'info',
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: () => {
                  // Swal.showLoading()
                  timerInterval = setInterval(() => {
                    const content = Swal.getHtmlContainer()
                    if (content) {
                      const b = content.querySelector('b')
                      if (b) {
                        b.textContent = Swal.getTimerLeft()
                      }
                    }
                  }, 100)
                },
                willClose: () => {
                  clearInterval(timerInterval)
                }
              }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                  // Setelah swal ditutup otomatis
                  // window.location.href = "registration-team.php"
                }
              })
            }
          }
        });
        stepper.next();
      }
    })

    function backToStepOne() {
      window.location.href = 'registration-team.php'
    }

    // back to step 2
    function backToStepTwo() {
      var no_registrasi = $('input[name=registration-number]').val();
      window.history.pushState({}, '', '?nomorRegistrasi=' + no_registrasi);
      stepper.previous();
    }

    // Step 3
    function goToStepThree() {
      var no_registrasi = $('input[name=registration-number]').val();
      window.location.href = "registration-team.php?nomorRegistrasi=" + no_registrasi + "&step=3";
    }

    // Finish and submit team
    function finishCreateTeam(team_id) {
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Setelah klik selesai, maka team akan diverifikasi oleh admin!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Kirim!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "api/team.php",
            data: {
              'tipe': 'submitTeam',
              'team_id': team_id
            },
            success: function(response) {
              var res = JSON.parse(response);
              if (res.status) {
                window.location.href = "registration-team.php?submitTeam=success"
                // Swal.fire(
                //   'Terkirim!',
                //   res.msg,
                //   'success'
                // )
              } else {
                Swal.fire(
                  'Gagal!',
                  res.msg,
                  'error'
                )
              }
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

    function playerPartStep() {
      stepper.next();
    };

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

    function cariNomorRegistrasi() {
      var no_registrasi = $('#no-reg').val();
      window.location.href = "registration-team.php?nomorRegistrasi=" + no_registrasi;
    }

    function deletePlayer(player_id) {
      Swal.fire({
        title: 'Apakah anda yakin?',
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
            url: "api/player.php",
            data: {
              'tipe': 'callFuncDelete',
              'id': player_id
            },
            success: function(response) {
              $('#players-table').load(window.location.href + ' #players-table');
              var res = JSON.parse(response);
              if (res.status)
                Swal.fire(
                  'Dihapus!',
                  'Pemain berhasil dihapus.',
                  'success'
                )
              else
                Swal.fire(
                  'Gagal!',
                  'Gagal menghapus pemain.',
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

    function submitPemain() {
      var registration_number = $('input[name=registration-number]').val();
      var identity_number = $('input[name=identity-number]').val();
      var full_name = $('input[name=full-name]').val();
      var birth_place = $('input[name=birth-place]').val();
      var birth_date = $('input[name=birth-date]').val();
      var address = $('textarea#alamatpemain').val();
      var religion = $('select[name=religion]').val();
      var gender = $('select[name=gender]').val();
      var height = $('input[name=height]').val();
      var weight = $('input[name=weight]').val();
      var position = $('input[name=position]').val();
      var back_number = $('input[name=back-number]').val();
      var back_name = $('input[name=back-name]').val();
      var photo = $('#photo-file').prop('files')[0];
      var card_identity = $('input[name=card-identity]').val();

      // Submit all variable to database using ajax
      $.ajax({
        type: "POST",
        url: "api/player.php",
        // contentType: 'multipart/form-data',
        data: {
          'tipe': 'callFuncStore',
          'registration_number': registration_number,

          'full_name': full_name,
          'birth_date': birth_date,
          'birth_place': birth_place,
          'address': address,
          'identity_number': identity_number,
          'height': height,
          'weight': weight,
          'position': position,
          'back_number': back_number,
          'back_name': back_name,
          // 'image_path': photo,
          // 'files': files,
          'religion': religion,
          'gender_id': gender,
          // 'card_identity': card_identity,
        },
        success: function(response) {
          $('#players-table').load(window.location.href + ' #players-table');
          var res = JSON.parse(response);

          if (res.status) {
            $("#player-modal").click()
            reset_form_modal_pemain()
            Swal.fire('Berhasil!', res.msg, 'success')
          } else {
            Swal.fire('Gagal!', res.msg, 'error')
          }
        },
        fail: function(response) {
          Swal.fire(
            'Terjadi Kesalahan!',
            'Terjadi kesalahan, silahkan coba kembali.',
            'fail'
          )
        }
      });
    }

    function reset_form_modal_pemain() {
      // reset semua form modal jika sudah disubmit
      $('#modal-default')
        .find("input,textarea,select")
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
      // })
    }

    // Submit tim official data to database
    $('#teamOfficialNextButton').on('click', function() {
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Silahkan cek data kembali sebelum lanjut!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, lanjut!'
      }).then((result) => {
        // team
        var club_name = $('input[name=club-name]').val()
        var address = $('textarea[name=address]').val()
        var licenses = $('input[name=license]').val()
        var email = $('input[name=email]').val()
        var phone_number = $('input[name=phone-number]').val()
        var photo = $('input[name=photo]').val()
        var team_type = $('input[name=team-type]').val()

        console.log(team_type);

        // manager
        var manager_name = $('input[name=manager-name]').val();
        var manager_phone_number = $('input[name=manager-phone]').val();
        var manager_photo = $('input[name=manager-photo]').val();

        // Team has league
        var tournament_id = $('select[name=league]').val();

        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "api/team.php",
            data: {
              'tipe': 'store',
              'name': club_name,
              'address': address,
              'licenses': licenses,
              'email': email,
              'phone_number': phone_number,
              'photo': photo,
              'team_type': team_type,
              'manager_name': manager_name,
              'manager_phone_number': manager_phone_number,
              'manager_photo': manager_photo,
              'tournament_id': tournament_id,
            },
            success: function(response) {
              var res = JSON.parse(response)
              window.location.href = "registration-team.php?nomorRegistrasi=" + res.noreg;
            }
          });

        }
      })
    });
  </script>

</body>

</html>