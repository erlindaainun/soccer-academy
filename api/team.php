<?php

function exists_in_db($str)
{
    include '../connection.php';

    $sql = 'SELECT `registration_number` FROM `teams` WHERE `registration_number` = "' . $str . '"';

    $result = $conn->query($sql);

    if ($result->num_rows == 0)
        return false;
    else
        return true;
}

function generate_registration_number()
{
    $str = substr(md5(microtime()), 0, 5);
    if (exists_in_db($str)) $str = generate_registration_number();
    return $str;
}

function checkRegistrationNumber()
{
    include '../connection.php';

    $nomorRegistrasi = $_POST['noreg'];

    // Check team id in database
    $sql = 'SELECT * FROM `teams` WHERE registration_number = "' . $nomorRegistrasi . '"';
    // echo $sql;
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if ($row['status'] == 'draft')
        return json_encode(['status' => true]);
    else
        return json_encode(['status' => false, 'msg' => "Team sudah didaftarkan dan sedang/sudah diverifikasi"]);
}

function store()
{
    include '../connection.php';

    $target_dir = "../server/uploads/";
    // Buat nama file unik 
    $date = DateTime::createFromFormat('U.u', microtime(TRUE));
    $filename = md5($date->format('Y-m-d H:i:s:u'));

    // Cek jika kolom file tidak diupload
    if ($_POST["club_logo"] ?? '' == 'undefined' || ($_POST["manager_photo"] ?? '') == 'undefined' || ($_POST["coach_photo"]  ?? '') == 'undefined')
        return json_encode([
            'status' => false,
            'msg' => 'Gagal, file belum dipilih untuk diunggah!'
        ]);

    $uploadOk = 1;

    $club_logo = $target_dir . 'team/' . basename($filename . '_' . $_FILES["club_logo"]["name"]);
    $clubImageFileType = strtolower(pathinfo($club_logo, PATHINFO_EXTENSION));

    $manager_photo = $target_dir . 'manager/' . basename($filename . '_' . $_FILES["manager_photo"]["name"]);
    $managerImageFileType = strtolower(pathinfo($manager_photo, PATHINFO_EXTENSION));

    $coach_photo = $target_dir . 'coach/' . basename($filename . '_' . $_FILES["coach_photo"]["name"]);
    $coachImageFileType = strtolower(pathinfo($coach_photo, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["club_logo"]["size"] > 1000000 || $_FILES["manager_photo"]["size"] > 1000000 || $_FILES["coach_photo"]["size"] > 1000000) {
        // $message['file_size'] = "Sorry, your file is too large.";
        // header("Location:/registration-team.php?page=create&errorMsg=file_size");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($clubImageFileType != "jpg" && $clubImageFileType != "png" && $clubImageFileType != "jpeg") {
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        // header("Location:/registration-team.php?page=create&errorMsg=file_format");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($managerImageFileType != "jpg" && $managerImageFileType != "png" && $managerImageFileType != "jpeg") {
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        // header("Location:/registration-team.php?page=create&errorMsg=file_format");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($coachImageFileType != "jpg" && $coachImageFileType != "png" && $coachImageFileType != "jpeg") {
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        // header("Location:/registration-team.php?page=create&errorMsg=file_format");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return json_encode([
            'status' => false,
            'msg' => 'Sorry, your file was not uploaded.'
        ]);        // echo "Sorry, your file was not uploaded.";
        // return header("Location:/server/gallery.php?page=edit&id=" . $_POST['id'] . '&errorMsg=');
    } else {
        if (move_uploaded_file($_FILES["club_logo"]["tmp_name"], $club_logo)) {
            move_uploaded_file($_FILES["manager_photo"]["tmp_name"], $manager_photo);
            move_uploaded_file($_FILES["coach_photo"]["tmp_name"], $coach_photo);

            $sql = 'INSERT INTO `managers` (`name`, `image_path`, `phone_number`, `created_at`, `updated_at`) VALUES (' .
                '"' . $_POST['manager_name'] . '",' .
                '"' . $manager_photo . '",' .
                '"' . $_POST['manager_phone_number'] . '",' .
                'NOW(), NOW());';
            $result = $conn->query($sql);
            $manager_id = $conn->insert_id;

            $sql = 'INSERT INTO `coaches` (`name`, `image_path`, `created_at`, `updated_at`) VALUES (' .
                '"' . $_POST['coach_name'] . '",' .
                '"' . $coach_photo . '",' .
                'NOW(), NOW());';
            $result = $conn->query($sql);

            $coach_id = $conn->insert_id;

            $reg_number = generate_registration_number();
            $sql = 'INSERT INTO `teams` (`name`, `address`, `manager_id`, `coach_id`, `licenses`, `email`, `telp`, `photo`, `registration_number`, `type`, `created_at`, `updated_at`) VALUES (' .
                '"' . $_POST['name'] . '",' .
                '"' . $_POST['address'] . '",' .
                '"' . $manager_id . '",' .
                '"' . $coach_id . '",' .
                '"' . $_POST['licenses'] . '",' .
                '"' . $_POST['email'] . '",' .
                '"' . $_POST['phone_number'] . '",' .
                '"' . $club_logo . '",' .
                '"' . $reg_number . '",' .
                '"' . $_POST['team_type'] . '",' .
                'NOW(), NOW());';

            $result = $conn->query($sql);

            // Jika team berhasil dibuat
            if ($result) {
                if ($_POST['team_type'] == 'turnamen') {
                    // Insert into team_has_league
                    $sql = 'INSERT INTO `team_has_tournaments` (`team_id`, `tournament_id`) VALUES (' .
                        '"' . $conn->insert_id . '",' .
                        '"' . $_POST['tournament_id'] . '")';
                    $conn->query($sql); // Execute sql

                    return json_encode([
                        'status' => true,
                        'msg' => 'Nama tim: xxx berhasil dibuat!',
                        'noreg' => $reg_number,
                    ]);
                } else if ($_POST['team_type'] == 'liga') {
                    // Insert into team_has_league
                    $sql = 'INSERT INTO `team_has_leagues` (`team_id`, `league_id`) VALUES (' .
                        '"' . $conn->insert_id . '",' .
                        '"' . $_POST['tournament_id'] . '")';
                    $conn->query($sql); // Execute sql

                    return json_encode([
                        'status' => true,
                        'msg' => 'Nama tim: xxx berhasil dibuat!',
                        'noreg' => $reg_number,
                    ]);
                }
            } else {
                return json_encode([
                    'status' => false,
                    'msg' => 'Text gagal input'
                ]);
            }
        } else {
            return json_encode([
                'status' => false,
                'msg' => 'Sorry, your file was not uploaded.'
            ]);
        }
    }
}

function submitTeam()
{
    include '../connection.php';

    $sql = 'UPDATE `teams` SET `status` = "pending" WHERE `id` = ' . $_POST['team_id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Berhasil mengirimkan data team!']);
    else
        return json_encode(['status' => true, 'msg' => 'Terjadi kesalahan, silahkan coba beberapa saat lagi.']);
}

function deleteTeam()
{

    include '../connection.php';

    // Delete relation first
    $sql = 'SELECT * FROM `teams` WHERE `id` = ' . $_POST['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $team_id = $row['id'];

    // Hapus file logo teams
    if (file_exists($row['photo']))
        unlink($row['photo']);

    // Hapus profil manager
    $sql = 'SELECT * FROM `managers` WHERE `id` = ' . $row['manager_id'];
    $result_manager = $conn->query($sql);
    if (file_exists($manager_photo = $result_manager->fetch_assoc()['image_path']))
        unlink($manager_photo);
    $conn->query('DELETE FROM `managers` WHERE `id` = ' . $row['manager_id']);


    // Hapus profil image coach
    $sql = 'SELECT * FROM `coaches` WHERE `id` = ' . $row['coach_id'];
    $result_coach = $conn->query($sql);
    if (file_exists($coach_photo = $result_coach->fetch_assoc()['image_path']))
        unlink($coach_photo);
    $conn->query('DELETE FROM `coaches` WHERE `id` = ' . $row['coach_id']);

    // Hapus semua gambar profil pemain dengan team id ini
    $sql = 'SELECT * FROM `players` WHERE `team_id` = "' . $team_id . '"';
    $result_players = $conn->query($sql);
    $rows = $result_players->fetch_all();
    foreach ($rows as $key => $player) {
        if (file_exists($player[11]))
            unlink($player[11]);
        if (file_exists($player[12]))
            unlink($player[12]);
    }

    // Hapus 

    // Hapus semua pemain dengan team id ini
    $sql = 'DELETE FROM `players` WHERE `team_id` = "' . $team_id . '"';
    $result = $conn->query($sql);

    $sql = 'DELETE FROM `teams` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Tim berhasil dihapus!']);
    else
        return json_encode(['status' => false, 'msg' => 'Tim tidak dapat dihapus!']);
}

function index()
{
    include '../connection.php';

    $sql = 'SELECT `name`, `licenses`, `email`, `telp`, `address`, `id` FROM `teams` ORDER BY `id` DESC';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function getTeamAsParticipant()
{
    include '../connection.php';

    $participant = $_POST['participant'];

    $participant_team_name = [];
    foreach ($participant as $team_id) {
        $sql = 'SELECT * FROM `teams` WHERE id = ' . $team_id;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // var_dump($row['name']);
        $participant_team_name[] = $row['name'];
    }

    // print_r($participant_team_name);
    return json_encode($participant_team_name);
}

if (isset($_POST['tipe'])) {
    if ($_POST['tipe'] == 'checkRegistrationNumber')
        echo checkRegistrationNumber();
    else if ($_POST['tipe'] == 'store')
        echo store();
    else if ($_POST['tipe'] == 'submitTeam')
        echo submitTeam();
    else if ($_POST['tipe'] == 'deleteTeam')
        echo deleteTeam();
    else if ($_POST['tipe'] == 'getTeamAsParticipant')
        echo getTeamAsParticipant();
} else
    echo index();
