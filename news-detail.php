<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Berita | SSB Tunas Jaya Duriangkang Official Website</title>
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
                    <p class="lead"><strong>SSB Tunas Jaya Duringkang - </strong> <?php echo $row['description'] ?></p>
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