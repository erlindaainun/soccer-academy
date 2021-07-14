<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `schedules`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function store()
{
    include '../connection.php';

    // Check if liga id tersebut sudah ada maka reset semua yang berhubungan dengan liga id tsb
    $sql = 'SELECT * FROM `schedules` WHERE `league_id`=' . $_POST['id'];
    $result = $conn->query($sql);
    if ($result) {
        $sql = 'DELETE FROM `schedules` WHERE `league_id`=' . $_POST['id'];
        $conn->query($sql);
    }

    $schedules = $_POST['data'];
    $fail_status = false;
    foreach ($schedules as $key => $schedule) {
        $sql = 'INSERT INTO `schedules` (`team_id1`, `score_team_id1`, `score_team_id2`, `team_id2`, `date`, `location`, `league_id`, `created_at`, `updated_at`) VALUES (' .
            $schedule . ', ' .
            'NOW(), NOW()' .
            ')';
        echo ($sql . '<br>');
        $result = $conn->query($sql);

        if (!$result)
            $fail_status = true;
    }


    if (!$fail_status)
        return header("Location:/server/league.php?status=stored");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

if (isset($_POST['tipe'])) {
    if ($_POST['tipe'] == 'store')
        echo store();
} else
    echo index();
