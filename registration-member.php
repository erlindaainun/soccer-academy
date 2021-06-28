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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
          <h2>Registrasi Anggota</h2>
        </div>

        <form class="row g-3 needs-validation" novalidate data-aos="fade-up">
          <div class="col-md-6">
            <label class="form-label"><strong>NISN / NIK</strong></label>
            <input name="nisn" type="number" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Nama Lengkap</strong></label>
            <input name="fullname" type="text" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Kelas</strong></label>
            <select name="class" class="form-select" required>
              <option selected disabled value="">Choose...</option>
              <option value="U6-U8">U6-U8</option>
              <option value="U9-U11">U9-U11</option>
              <option value="U12-U15">U12-U15</option>
              <option value="U16-U18">U16-U18</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Tempat Lahir</strong></label>
            <input name="birth-place" type="text" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Tanggal Lahir</strong></label>
            <input name="birth-date" type="date" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Jenis Kelamin</strong></label>
            <select name="gender" class="form-select" required>
              <option selected disabled value="">Choose...</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label"><strong>Agama</strong></label>
            <select class="form-select" required>
              <option selected disabled value="">Choose...</option>
              <option value="Islam">Islam</option>
              <option value="Protestan">Protestan</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Khonghucu">Khonghucu</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Alamat</strong></label>
            <textarea name="address" rows="1" class="form-control" required></textarea>
          </div>
          <div class="col-md-2">
            <label class="form-label"><strong>No Telfon</strong></label>
            <input name="phone-number" type="number" class="form-control" required>
          </div>
          <div class="col-md-2">
            <label class="form-label"><strong>Berat Badan</strong></label>
            <input name="weight" type="number" class="form-control" required>
          </div>
          <div class="col-md-2">
            <label class="form-label"><strong>Tinggi Badan</strong></label>
            <input name="height" type="number" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Alasan Ingin Bergabung</strong></label>
            <textarea name="reason" rows="1" class="form-control" required></textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label"><strong>Upload Foto</strong></label>
            <input type="file" class="form-control" required>
            <small>Max. file size: 1 MB. Allowed: jpg, jpeg, png. Uk: 4x6 cm</small>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
              </label>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>