<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Liga | SSB Tunas Jaya Duriangkang Official Website</title>
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

  <link rel="stylesheet" type="text/css" href="/server/dist/css/jquery.bracket.min.css" />

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
            <li>Liga</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Skema Pertandingan</h2>
        </div>

        <?php
        $id = $_GET['id'] ?? '';

        if ($id === '') {
        ?>
          <div class="row">
            <?php
            // Ambil semua tournamen
            $sql = 'SELECT * FROM `tournaments`';
            $result = $conn->query($sql);

            foreach ($result->fetch_all() as $key => $league) {
            ?>
              <div class="col-3 pb-4">
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
        } else {
          // Ambil data liga
          $sql = 'SELECT * FROM `tournaments` WHERE `id` = ' . $id;
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();

          // TODO rapikan ini
          echo '<div class="row" data-aos="fade-up" align="center">';
          echo '<h4>' . $row['name'] . '</h4>';
          echo '<h4>' . $row['date'] . '</h4>';
          echo '<h4>' . $row['location'] . '</h4>';
          echo '</div><br>';

        ?>
          <div class="row" data-aos="fade-up">
            <div class="bracketGenerated"></div>
          </div>
        <?php
          echo '<script>document.addEventListener("DOMContentLoaded", function() {viewMatchScheme(' . $id . ')})</script>';
        }
        ?>

      </div>
    </section><!-- End Portfolio Section -->

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
  <!-- jQuery -->
  <script src="/server/plugins/jquery/jquery.min.js"></script>

  <script type="text/javascript" src="/server/dist/js/jquery.bracket.min.js"></script>

  <script>
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

    function viewMatchScheme(id) {
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
            container.bracket({
              teamWidth: 350, // Lebar bracket tim
              matchMargin: 50,
              skipConsolationRound: third_place_winner_status,
              init: saveData2,
              onMatchClick: void(0),
              onMatchHover: void(0),
              userData: "http://myapi",
            })
            var data = container.bracket('data')
          }

          // End for bracket
        }
      });
    }
  </script>

</body>

</html>