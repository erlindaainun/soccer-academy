<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registrasi Anggota | SSB Tunas Jaya Duriangkang Official Website</title>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="/">Beranda</a></li>
            <li>Registrasi Anggota</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Registrasi Tim</h2>
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
                  <div class="form-group">
                    <label for="namaklub">Nama Klub</label>
                    <input type="text" class="form-control" id="namaklub" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="lisensi">Lisensi</label>
                    <input type="text" class="form-control" id="lisensi" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="emailklub">Email</label>
                    <input type="email" class="form-control" id="emailklub" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="notelfonklub">No Telfon</label>
                    <input type="number" class="form-control" id="notelfonklub" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="alamatklub">Alamat</label>
                    <textarea rows="2" class="form-control" id="alamatklub" placeholder=""></textarea>
                  </div>
                  <div class="form-group">
                    <label for="manajer">Manajer</label>
                    <input type="text" class="form-control" id="manajer" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="pelatihkepala">Pelatih Kepala</label>
                    <input type="text" class="form-control" id="pelatihkepala" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="asistenpelatih">Asisten Pelatih</label>
                    <input type="text" class="form-control" id="asistenpelatih" placeholder="" required>
                  </div>
                  <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                </div>
                <div id="player-part" class="content" role="tabpanel" aria-labelledby="player-part-trigger">
                  <div class="form-group">
                    <div class="input-group">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i>&nbsp; Tambah
                      </button>
                    </div>
                  </div>
                  <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                  <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                </div>
                <div id="confirmation" class="content" role="tabpanel" aria-labelledby="confirmation-trigger">
                  <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Individu Pemain</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="kartu">No.Kartu Identitas</label>
                <input type="number" class="form-control" id="kartu" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="namapemain">Nama</label>
                <input type="text" class="form-control" id="namapemain" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="tempatlahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempatlahir" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="tanggallahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggallahi" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="alamatpemain">Alamat</label>
                <textarea rows="2" class="form-control" id="alamatpemain" placeholder=""></textarea>
              </div>
              <div class="form-group">
                <label for="agamapemain">Agama</label>
                <select class="custom-select">
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
                <label for="tinggibadanpemain">Tinggi Badan</label>
                <input type="number" class="form-control" id="tinggibadanpemain" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="beratbadanpemain">Berat Badan</label>
                <input type="number" class="form-control" id="beratbadanpemain" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="posisipemain">Posisi Bermain</label>
                <input type="text" class="form-control" id="posisipemain" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="nopemain">Nomor Punggung</label>
                <input type="number" class="form-control" id="nopemain" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="namapunggungpemain">Nama Punggung</label>
                <input type="text" class="form-control" id="namapunggungpemain" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="namapunggungpemain">Nama Punggung</label>
                <input type="text" class="form-control" id="namapunggungpemain" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="customFile">Upload Foto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png. Uk: 4x6 cm</small>
                </div>
              </div>
              <div class="form-group">
                <label for="customFile">Upload Kartu Identitas</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png.</small>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
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

  <script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code End
  </script>

</body>

</html>