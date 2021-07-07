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

    $test = "test/file.img";

    $sql = 'INSERT INTO `managers` (`name`, `image_path`, `phone_number`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['manager_name'] . '",' .
        '"' . $test . '",' .
        '"' . $_POST['manager_phone_number'] . '",' .
        'NOW(), NOW());';

    $result = $conn->query($sql);

    $manager_id = $conn->insert_id;

    $reg_number = generate_registration_number();
    $sql = 'INSERT INTO `teams` (`name`, `address`, `manager_id`, `licenses`, `email`, `telp`, `photo`, `registration_number`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['name'] . '",' .
        '"' . $_POST['address'] . '",' .
        '"' . $manager_id . '",' .
        '"' . $_POST['licenses'] . '",' .
        '"' . $_POST['email'] . '",' .
        '"' . $_POST['phone_number'] . '",' .
        '"' . $_POST['photo'] . '",' .
        '"' . $reg_number . '",' .
        'NOW(), NOW());';

    $result = $conn->query($sql);

    // Jika team berhasil dibuat
    if ($result) {
        // Insert into team_has_league
        $sql = 'INSERT INTO `team_has_leagues` (`team_id`, `league_id`) VALUES (' .
            '"' . $conn->insert_id . '",' .
            '"' . $_POST['league_id'] . '")';
        $conn->query($sql); // Execute sql

        return json_encode([
            'status' => true,
            'msg' => 'Nama tim: xxx berhasil dibuat!',
            'noreg' => $reg_number,
        ]);
    } else {
        return json_encode([
            'status' => false,
            'msg' => 'Text gagal input'
        ]);
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

    $sql = 'SELECT `name`, `licenses`, `email`, `telp`, `address`, `id` FROM `teams`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();


    return json_encode(['data' => $data]);
}

function getTeamAsParticipant()
{
    include '../connection.php';

    $participant = $_POST['participant'];

    $participant_team_name = [];
    foreach($participant as $team_id){
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
