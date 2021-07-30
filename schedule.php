<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jadwal Pertandingan | SSB Tunas Jaya Duriangkang Official Website</title>
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
            <li>Jadwal Pertandingan</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Jadwal Pertandingan</h2>
        </div>

        <!-- Check jika tidak ada id schedule -->
        <?php
        $id = $_GET['id'] ?? '';

        if ($id === '') {
        ?>
          <div class="row">
            <?php
            // Ambil semua liga
            $sql = 'SELECT * FROM `leagues`';
            $result = $conn->query($sql);

            foreach ($result->fetch_all() as $key => $league) {
            ?>
              <div class="col-lg-2 col-sm-6 pb-4">
                <div class="card" data-aos="fade-up">
                  <a href="?id=<?php echo $league[0] ?>">
                    <img class="card-img-top" src="<?php echo $league[4] ?>" style="padding: 20px;">
                    <div class="card-body">
                      <p class="card-text" align="center"><strong><?php echo $league[1] ?></strong></p>
                    </div>
                  </a>
                </div>
              </div>
            <?php
            }
            ?>
          </div>

        <?php
        } else if (($_GET['id'] ?? '') != null && ($_GET['schedule'] ?? '') != null) {

          $sql = 'SELECT * FROM `leagues` WHERE `id` = ' . $id;
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          // TODO rapikan ini
          echo '<div class="row" data-aos="fade-up" align="center">';
          echo '<h4>' . $row['name'] . '</h4>';
          echo '<h4><img src="assets/img/stadium.png">  ' . $row['location'] . '</h4>';
          echo '</div>';

          // Tampilkan jadwal dengan template
          $sql = 'SELECT * FROM `schedules` WHERE `location` IS NOT NULL AND `id` = ' . $_GET['schedule'];
          $result_schedule = $conn->query($sql);
          $rows = $result_schedule->fetch_assoc();

          $sql = 'SELECT * FROM `teams` WHERE `id` IN (' . $rows['team_id1'] . ', ' . $rows['team_id2'] . ')';
          $result = $conn->query($sql);
          $teams = $result->fetch_all();

          $hari = ["", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
          $date_format = new DateTime($rows['date']);
          $date =     $rows['date'] ? $hari[$date_format->format('N')] . ', ' . $date_format->format('d M Y') : '';
          $location = $rows['location'] ?? '';
        ?>
          <div class="row middle faq-item d-flex" data-aos="fade-up">
            <div class="col-lg-3">
              <img src="<?php echo $teams[0][8]; ?>" width="100px">
              <h2><?php echo $teams[0][1]; ?></h2>
            </div>
            <div class="col-lg-2" style="padding-top: 50px">
              <?php
              $extras = $rows['extras'];
              if ($extras != null) {
                $goal_scorer_team1 = json_decode($extras)->goal_scorer_team1;
                foreach ($goal_scorer_team1 as $key => $player_id) {
                  $sql = 'SELECT `full_name` FROM `players` WHERE `id` = ' . $player_id;
                  // echo '<script>alert("' . $sql . '");</script>';
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();

                  echo '<small class="float-end">' . $row['full_name'] . '  <i class="fas fa-futbol"></i></small><br>';
                }
              }
              ?>
            </div>
            <div class="col-lg-2" style="padding-top: 50px">
              <h3><?php echo (($rows['score_team_id1'] ?? 0) . ' - ' . ($rows['score_team_id2'] ?? 0)); ?></h3>
            </div>
            <div class="col-lg-2" style="padding-top: 50px">
              <?php
              $extras = $rows['extras'];
              if ($extras != null) {
                $goal_scorer_team2 = json_decode($extras)->goal_scorer_team2;
                foreach ($goal_scorer_team2 as $key => $player_id) {
                  $sql = 'SELECT `full_name` FROM `players` WHERE `id` = ' . $player_id;
                  // echo '<script>alert("' . $sql . '");</script>';
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();

                  echo '<small class="float-start"><i class="fas fa-futbol"></i>  ' . $row['full_name'] . '</small><br>';
                }
              }
              ?>
            </div>
            <div class="col-lg-3">
              <img src="<?php echo $teams[1][8]; ?>" width="100px">
              <h2><?php echo $teams[1][1]; ?></h2>
            </div>
          </div>
          <?php
        } else { // Jika id ada
          // Ambil data liga
          $sql = 'SELECT * FROM `leagues` WHERE `id` = ' . $id;
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $date = date_create($row['date']);

          // TODO rapikan ini
          echo '<div class="row" data-aos="fade-up" align="center">';
          echo '<h4>' . $row['name'] . '</h4>';
          echo '<h4>' . date_format($date, "d-m-Y") . '</h4>';
          echo '<h4><img src="assets/img/stadium.png">  ' . $row['location'] . '</h4>';
          echo '</div>';

          // Tampilkan jadwal dengan template
          $sql = 'SELECT * FROM `schedules` WHERE `location` IS NOT NULL AND `league_id` = ' . $id;
          $result_schedule = $conn->query($sql);
          $rows = $result_schedule->fetch_all();

          // Jika belum ada jadwal
          if ($rows == [])
            echo '<div data-aos="fade-up">Belum ada jadwal sama sekali.</div>';
          else
            foreach ($rows as $key => $schedule) {
              $sql = 'SELECT * FROM `teams` WHERE `id` IN (' . $schedule[1] . ', ' . $schedule[4] . ')';
              $result = $conn->query($sql);
              $teams = $result->fetch_all();

              $hari = ["", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
              $date_format = new DateTime($schedule[5]);
              $date =     $schedule[5] ? $hari[$date_format->format('N')] . ', ' . $date_format->format('d M Y') : '';
              $location = $schedule[7] ?? '';
          ?>
            <div class="row middle faq-header d-flex" data-aos="fade-up">
              <div class="col-lg-12">
                <p><?php echo $date ?></p>
              </div>
            </div>
            <div class="row middle faq-item d-flex" data-aos="fade-up">
              <div class="col-lg-3">
                <a><?php echo $row['name']; ?></a>
              </div>
              <div class="col-lg-1">
                <p><?php echo $teams[0][1]; ?></p>
              </div>
              <div class="col-lg-1">
                <img src="<?php echo $teams[0][8]; ?>" width="50px">
              </div>
              <div class="col-lg-2">
                <a href="?id=<?php echo $schedule[8] ?>&schedule=<?php echo $schedule[0] ?>">
                  <h3><?php echo (($schedule[2] ?? 0) . ' - ' . ($schedule[3] ?? 0)); ?></h3>
                </a>
              </div>
              <div class="col-lg-1">
                <img src="<?php echo $teams[1][8]; ?>" width="50px">
              </div>
              <div class="col-lg-1">
                <p><?php echo $teams[1][1]; ?></p>
              </div>
              <div class="col-lg-3">
                <h5><img src="assets/img/stadium.png"> <?php echo $location ?></h5>
              </div>
            </div>
        <?php
            }
        }
        ?>
    </section>

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