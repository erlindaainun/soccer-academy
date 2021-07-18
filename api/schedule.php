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

function update()
{
    include '../connection.php';

    $sql = 'UPDATE `schedules` SET ' .
        '`date` = "' . $_POST['date'] . '", ' .
        '`time` = "' . $_POST['time'] . '", ' .
        '`location` = "' . $_POST['location'] . '", ' .
        '`updated_at` = NOW() WHERE `id` = "' . $_POST['id'] . '"';
    // return $sql;
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Berhasil mengubah jadwal']);
    else
        return json_encode(['status' => false, 'msg' => 'Gagal mengubah jadwal']);
}

function updateScore()
{
    include '../connection.php';

    $goal_scorer_team1 = $_POST['goal_scorer_team1'];
    // $goal_scorer_team2 = $_POST['goal_scorer_team2'];

    $extras = json_encode(['goal_scorer_team1' => $goal_scorer_team1 ?? [], 'goal_scorer_team2' => $goal_scorer_team2 ?? []]);

    $sql = 'UPDATE `schedules` SET ' .
        '`score_team_id1` =\'' . count($goal_scorer_team1) . '\', ' .
        '`extras` = \'' . $extras . '\', ' .
        '`updated_at` = NOW() WHERE `id` = "' . $_POST['id'] . '"';
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Berhasil mengubah jadwal']);
    else
        return json_encode(['status' => false, 'msg' => 'Gagal mengubah jadwal']);
}

function getScorerTeam1()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `schedules` WHERE `id` = ' . $_POST['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $extras = $row['extras'];
    $goal_scorer_team1 = json_decode($extras)->goal_scorer_team1;

    $scorer = [];
    foreach($goal_scorer_team1 as $key => $player_id){
        $sql = 'SELECT * FROM `players` WHERE `id` = ' . $player_id;
        $result = $conn->query($sql); 

        $scorer[] = $result->fetch_assoc();
    }

    return json_encode($scorer);
}

if (isset($_POST['tipe'])) {
    if ($_POST['tipe'] == 'store')
        echo store();
    else if ($_POST['tipe'] == 'update')
        echo update();
    else if ($_POST['tipe'] == 'getScorerTeam1')
        echo getScorerTeam1();
    else if ($_POST['tipe'] == 'updateScore')
        echo updateScore();
} else
    echo index();
