<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Visi Misi | SSB Tunas Jaya Duriangkang Official Website</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include 'connection.php'; ?>

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
                <?php
                $id = $_GET['id'];
                $sql = 'SELECT * FROM `news` WHERE `id` = ' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $num_rows = $result ? $result->num_rows : 0;

                // jika result ada maka tampilkan form dengan value yang ada didatabase
                if ($num_rows > 0 && $id != "")
                ?>

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Berita</h2>
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li><?php echo $row['name'] ?></li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="more-services" class="more-services">
            <div class="container">

                <div class="col-lg-8" data-aos="fade-up">
                    <h2 class="portfolio-title"><?php echo $row['name'] ?></h2>

                    <?php
                    // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    $image_path = str_replace('..', '', $row['images']);
                    $src = 'http://' . $_SERVER['HTTP_HOST'] . $image_path;
                    ?>
                    <div class="owl-carousel portfolio-details-carousel">
                        <img src="<?php echo $src ?>" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-8 portfolio-info" data-aos="fade-up">
                    <h5 class="text-justify"></h5>
                </div>
                <div class="col-lg-8" data-aos="fade-up">
                    <p class="lead"><?php echo $row['description'] ?></p>
                    <p class="lead">SSB TUNAS JAYA DURIANGKANG sebuah yayasan dan organisasi yang bergerak dibidang sepak bola yang menaungi SSB Tunas Jaya Duriangkang. SSB Tunas Jaya Duriangkang sendiri adalah sekolah sepak bola yangbertujuan untuk pembinaan bola anak-anak di usia dini. Perlu disadari bersama bahwa upaya peningkatan kualitas persepak bolaan Nasional haruslah di awali dari pembinaan sepak bola usia muda mulai dari usia 6 hingga usia 18 tahun sebagai awal pembentukan pesepakbola masa depan. Tunas Jaya Duriangkang terbentuk pada tanggal 21 Januari 2017. SSB Tunas Jaya Duriangkang atau yang di sebut juga dengan TJD (Tunas Jaya Duriangkang) memiliki julukan Laskar Kalajengking. </p>
                    <p class="lead">Pada masa-masa awal terbentuknya SSB Tunas Jaya Duriangkang banyak sekali rintangan-rintangan yang di hadapi oleh TJD, terutama masalah pendanaan untuk biaya operasional pembayaran honor pelatih, Perawatan Lapangan dll. Pemasukan kas hanya berasal dari iuran para siswa. Namun tidak semua siswa sanggup membayar iuran, sehingga mereka harus di berikan subsidi atau beasiswa. Tak jarang pendiri SSB Tunas Jaya Duriangkang harus mengeluarkan dana pribadi demi keberlangsungan SSB Tunas Jaya Duriangkang dan cita-cita para siswa yang ingin menjadi pemain sepak bola profesional. Selain masalah pendanaan masalah kepengurus juga masih belum di kelola dengan baik, sebagai pelatih juga merangkap sebagai pengurus SSB. Suatu itikad dan niat yang baik demi kemajuan persepak bolaan di Indonesia, para pemerhati sepak bola di wilayah Kota Batam bersatu untuk merintis sebuah wadah pembinaan sepak bola usia dini yang lebih terarah, terpadu dan berkesinambungan dengan nama TUNAS JAYA DURIANGKANG berada dibawah naungan Yayasan Tunas Jaya.</p>
                </div>

                <?php ?>
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