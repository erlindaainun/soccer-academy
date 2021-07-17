<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT `name`, `date`, `location`, `status`, `id` FROM `leagues`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function store()
{
    include '../connection.php';

    $sql = 'INSERT INTO `leagues` (`name`, `date`, `location`, `image_path`, `status`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['name'] . '", ' .
        '"' . $_POST['date'] . '", ' .
        '"' . $_POST['location'] . '", ' .
        '"' . $_POST['image_path'] . '", ' .
        '"' . $_POST['status'] . '", ' .
        'NOW(), NOW())';

    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/league.php?status=stored");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function edit()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `leagues` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Berhasil', 'data' => $row]);
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function update()
{
    include '../connection.php';

    $sql = 'UPDATE `leagues` SET ' .
        'name = "' . $_POST['name'] . '",' .
        'date = "' . $_POST['date'] . '",' .
        'location = "' . $_POST['location'] . '",' .
        'image_path = "' . $_POST['image_path'] . '",' .
        'status = "' . $_POST['status'] . '",' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/league.php?status=updated");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function delete()
{
    include '../connection.php';

    $sql = 'DELETE FROM `leagues` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Tim berhasil dihapus!']);
    else
        return json_encode(['status' => false, 'msg' => 'Tim tidak dapat dihapus!']);
}

function manage($id = null)
{
    include '../connection.php';

    $sql = 'SELECT * FROM `leagues` WHERE id = ' . $_POST['id'] ?? $id;
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $extras = json_decode($row['extras']);

    $teams = implode(', ', $extras->teams);
    $sql = 'SELECT * FROM `teams` WHERE `id` IN (' . $teams . ')';
    $result = $conn->query($sql);

    if ($extras->teams != [])
        $extras->teams = $result->fetch_all();

    // echo json_encode($extras);

    if ($result) {
        return json_encode(['data' => json_encode($extras)]);
    } else {
        return json_encode(['status' => false, 'msg' => 'Data Team tidak ada', 'data' => json_encode($extras)]);
    }
}

function postManage()
{
    include '../connection.php';

    $teams = $_POST['teams'] ?? [];

    $extras = json_encode(['teams' => $teams]);
    $sql = 'UPDATE `leagues` SET ' .
        'extras = \'' . $extras . '\',' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
    $conn->query($sql); // Execute update extras

    $manage = json_decode(manage($_POST['id']));
    $team2 = json_decode($manage->data)->teams;

    $schedules = [];
    if (count($team2) >= 2) {
        for ($i = 0; $i < count($team2); $i++) {
            $team = $teams[$i];

            for ($j = ($i + 1); $j < count($team2); $j++) {
                $schedules[] = $team2[$i][0] . ',0,0,' . $team2[$j][0] . ',NULL,NULL,' . $_POST['id'];
            }
        }
    } else {
        $sql = 'DELETE FROM `schedules` WHERE `league_id`=' . $_POST['id'];
        $conn->query($sql);
    }


    if ($schedules != []) {
        // Check if liga id tersebut sudah ada maka reset semua yang berhubungan dengan liga id tsb
        $sql = 'SELECT * FROM `schedules` WHERE `league_id`=' . $_POST['id'];
        $result = $conn->query($sql);
        if ($result) {
            $sql = 'DELETE FROM `schedules` WHERE `league_id`=' . $_POST['id'];
            $conn->query($sql);
        }

        // $schedules = $_POST['data'];
        $fail_status = false;
        foreach ($schedules as $key => $schedule) {
            $sql = 'INSERT INTO `schedules` (`team_id1`, `score_team_id1`, `score_team_id2`, `team_id2`, `date`, `location`, `league_id`, `created_at`, `updated_at`) VALUES (' .
                $schedule . ', ' .
                'NOW(), NOW()' .
                ')';
            // return ($sql . '<br>');
            $result = $conn->query($sql);

            if (!$result)
                $fail_status = true;
        }
    }

    return header("Location:/server/league.php?page=manage&id=" . $_POST['id'] . '&generate=' . $round_one_generate);
}


function setResultsToLeagueExtrasColumn()
{
    include '../connection.php';

    $json = json_decode($_POST['json']);
    $results = $json->results;

    $sql = 'UPDATE `leagues` SET ' .
        'results = \'' . json_encode($results) . '\',' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
    echo ($sql);
    $conn->query($sql); // Execute update extras

    return json_encode($results);
}

function show()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `leagues` WHERE `id`="' . $_POST['id'] . '"';
    $result = $conn->query($sql);

    return json_encode($result->fetch_assoc());
}


if (isset($_POST['tipe'])) {
    if ($_POST['tipe'] == 'store')
        echo store();
    else if ($_POST['tipe'] == 'edit')
        echo edit();
    else if ($_POST['tipe'] == 'update')
        echo update();
    else if ($_POST['tipe'] == 'delete')
        echo delete();
    else if ($_POST['tipe'] == 'show')
        echo show();
    else if ($_POST['tipe'] == 'manage')
        echo manage();
    else if ($_POST['tipe'] == 'postManage')
        echo postManage();
    else if ($_POST['tipe'] == 'setResultsToLeagueExtrasColumn')
        echo setResultsToLeagueExtrasColumn();
} else
    echo index();
