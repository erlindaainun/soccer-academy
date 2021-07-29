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

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="server/plugins/fontawesome-free/css/all.min.css">

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
            <li>Jadwal Pertandingan</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Klasemen</h2>
        </div>

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
          $sql = 'SELECT * FROM `leagues` WHERE `id` = ' . $id;
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();

          // TODO rapikan ini
          echo '<div class="row" data-aos="fade-up" align="center">';
          echo '<h4>' . $row['name'] . '</h4>';
          echo '<h4>' . $row['date'] . '</h4>';
          echo '<h4>' . $row['location'] . '</h4>';
          echo '</div><br>';
        ?>
          <div class="row">
            <table id="standings" class="table table-striped" data-aos="fade-up">
              <thead>
                <tr>
                  <th style="width: 3%">#</th>
                  <th style="width: 40%">Tim</th>
                  <th style="width: 5%" title="Main">M</th>
                  <th style="width: 5%" title="Menang">M</th>
                  <th style="width: 5%" title="Seri">S</th>
                  <th style="width: 5%" title="Kalah">K</th>
                  <th style="width: 5%" title="Gol Maker">GM</th>
                  <th style="width: 5%" title="Gol Away">GA</th>
                  <th style="width: 5%" title="Selisih Gol">SG</th>
                  <th style="width: 5%" title="Poin">Poin</th>
                  <th style="width: 17%">5 Pertandingan Terakhir</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = 'SELECT * FROM `leagues` WHERE `id`=' . $id;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $teams = json_decode($row['extras'])->teams;

                // $sql_teams                                 
                ?>
              </tbody>
            </table>
          </div>
        <?php
          echo '<script>document.addEventListener("DOMContentLoaded", function() {showStandings(' . $id . ')})</script>';
        }
        ?>
      </div>

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

  <!-- jQuery -->
  <script src="/server/plugins/jquery/jquery.min.js"></script>

  <script>
    function showStandings(id) {
      var schedules = []

      $.ajax({
        type: "POST",
        url: "/api/league.php",
        async: false,
        data: {
          'tipe': 'manage',
          'id': id
        },
        success: function(response) {
          var res = JSON.parse(response)
          var data = res.data
          var standings = JSON.parse(res.standings)

          if (data) {
            var extras = JSON.parse(data);
            var teams = extras.teams;

            // Show no data info if team is null
            if (teams.length == 0)
              $("#standings tbody").append('<tr><td colspan="11" style="text-align: center;">Belum ada tim</td></tr>')

            // Klasemen
            for (i = 0; i < teams.length; i++) {
              var team = teams[i]
              var match_count = 0
              var match_win = 0
              var match_draw = 0
              var match_lose = 0
              var goal_maker = 0
              var goal_away = 0

              // 5 Pertandingan terakhir
              var last_five_match = [0, 0, 0, 0, 0];

              for (j = 0; j < standings.length; j++) {

                var score_team1 = parseInt(standings[j][2]);
                var score_team2 = parseInt(standings[j][3]);

                // Checking from team_id1 side
                if (standings[j][1] == team[0]) {

                  if (standings[j][2] != null || standings[j][3] != null) {
                    match_count = match_count + 1;

                    // Jika skore tim 1 sama dengan tim 2, tambah jumlah seri tim 1
                    if (score_team1 == score_team2)
                      match_draw = match_draw + 1;

                    // Jumlahkan semua gol masuk tim 1
                    goal_maker = goal_maker + score_team1

                    // Jumlahkan semua gol kebobolan tim 1
                    goal_away = goal_away + score_team2

                    last_five_match.pop()
                    if (score_team1 > score_team2)
                      last_five_match.unshift('win')
                    else if (score_team1 < score_team2)
                      last_five_match.unshift('lose')
                    else if (score_team1 == score_team2)
                      last_five_match.unshift('draw')
                    else
                      last_five_match.push(0)
                  }

                  // Jika skor tim 1 lebih besar dari tim 2, tambah jumlah menang tim 1
                  if (score_team1 > score_team2)
                    match_win = match_win + 1;

                  // Jika skor tim 1 lebih kecil dari tim 2, tambah jumlah kalah tim 1
                  if (score_team1 < score_team2)
                    match_lose = match_lose + 1;
                }

                // Checking from team_id2 side
                if (standings[j][4] == team[0]) {
                  if (standings[j][2] != null || standings[j][3] != null) {
                    match_count = match_count + 1;

                    // Jika skore tim 2 sama dengan tim 1, tambah jumlah seri tim 2
                    if (score_team1 == score_team2)
                      match_draw = match_draw + 1;

                    // Jumlahkan semua gol masuk tim 2
                    goal_maker = goal_maker + score_team2

                    // Jumlahkan semua gol kebobolan tim 2
                    goal_away = goal_away + score_team1

                    last_five_match.pop()
                    if (score_team1 < score_team2)
                      last_five_match.unshift('win')
                    else if (score_team1 > score_team2)
                      last_five_match.unshift('lose')
                    else if (score_team1 == score_team2)
                      last_five_match.unshift('draw')
                    else
                      last_five_match.push(0)
                  }

                  // Jika skor tim 2 lebih besar dari tim 1, tambah jumlah menang tim 2
                  if (score_team1 < score_team2)
                    match_win = match_win + 1;

                  // Jika skor tim 2 lebih kecil dari tim 1, tambah jumlah kalah tim 2
                  if (score_team1 > score_team2)
                    match_lose = match_lose + 1;
                }
              }
              console.log(last_five_match)

              var last_five_match_result = [];
              for (k = 0; k < last_five_match.length; k++) {
                if (last_five_match[k] == 'win')
                  last_five_match_result.push('<i class="fas fa-check-circle text-success"></i>')
                else if (last_five_match[k] == 'lose')
                  last_five_match_result.push('<i class="fas fa-times-circle text-danger"></i>')
                else if (last_five_match[k] == 'draw')
                  last_five_match_result.push('<i class="fas fa-minus-circle text-secondary"></i>')
                else
                  last_five_match_result.push('<i class="far fa-circle"></i>')
              }
              goal_maker = isNaN(goal_maker) ? parseInt(0) : goal_maker;
              goal_away = isNaN(goal_away) ? parseInt(0) : goal_away;

              $("#standings tbody").append(
                '<tr>' +
                '<td>' + (i + 1) + '</td>' +
                '<td>' + team[1] + '</td>' +
                '<td>' + match_count + '</td>' +
                '<td>' + match_win + '</td>' +
                '<td>' + match_draw + '</td>' +
                '<td>' + match_lose + '</td>' +
                '<td>' + goal_maker + '</td>' +
                '<td>' + goal_away + '</td>' +
                '<td>' + (goal_maker - goal_away) + '</td>' +
                '<td>' + ((match_win * 3) + match_draw) + '</td>' +
                '<td>' + last_five_match_result.join("") + '</td>' +
                '</tr>'
              )
            }
          }

        }
      });
    }
  </script>

</body>

</html>