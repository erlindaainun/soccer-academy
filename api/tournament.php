<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT `name`, `date`, `location`, `status`, `id` FROM `tournaments`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function store()
{
    include '../connection.php';

    $sql = 'INSERT INTO `tournaments` (`name`, `date`, `location`, `image_path`, `status`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['name'] . '", ' .
        '"' . $_POST['date'] . '", ' .
        '"' . $_POST['location'] . '", ' .
        '"' . $_POST['image_path'] . '", ' .
        '"' . $_POST['status'] . '", ' .
        'NOW(), NOW())';

    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/tournament.php?status=stored");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function edit()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `tournaments` WHERE id = ' . $_POST['id'];
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

    $sql = 'UPDATE `tournaments` SET ' .
        'name = "' . $_POST['name'] . '",' .
        'date = "' . $_POST['date'] . '",' .
        'location = "' . $_POST['location'] . '",' .
        'image_path = "' . $_POST['image_path'] . '",' .
        'status = "' . $_POST['status'] . '",' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/tournament.php?status=updated");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function delete()
{
    include '../connection.php';

    $sql = 'DELETE FROM `tournaments` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Tim berhasil dihapus!']);
    else
        return json_encode(['status' => false, 'msg' => 'Tim tidak dapat dihapus!']);
}

function manage()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `tournaments` WHERE id = ' . $_POST['id'];
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
        return json_encode(['status' => true, 'msg' => 'Berhasil', 'data' => json_encode($extras)]);
    } else {
        return json_encode(['status' => false, 'msg' => 'Data Team tidak ada', 'data' => json_encode($extras)]);
    }
}

function postManage()
{
    include '../connection.php';

    $round_one = $_POST['round_one'];
    $teams = $_POST['teams'] ?? [];
    $third_place_winner = $_POST['third_place_winner'];
    $round_one_generate = "";

    $extras = json_encode(['round_one' => $round_one, 'teams' => $teams, 'third_place_winner' => $third_place_winner]);
    $sql = 'UPDATE `tournaments` SET ' .
        'extras = \'' . $extras . '\',' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
    $conn->query($sql); // Execute update extras

    // Cek jika team yang di update ada
    if ($teams != []) {
        if ($round_one == "Unggulan") {
            $team = implode(',', $teams);
            $count_team = count($teams);
            $sql = 'SELECT * FROM `teams` WHERE `id` IN (' . $team . ')';
            $result = $conn->query($sql);

            $row = $result->fetch_all();
            $match_count = $count_team / 2;

            // Jika jumlah team genap, membuat match sesuai dengan tipe round one "unggulan"
            if ($count_team % 2 == 0) {
                // Delete if exist match has tournament_id (because form has been submited again)
                $sql_delete = 'DELETE FROM `matches` WHERE `tournament_id` = ' . $_POST['id'];
                $conn->query($sql_delete);

                // reset results value if any edit to manage tournament
                $sql_reset_results = 'UPDATE `tournaments` SET ' .
                    'results = "[]",' .
                    'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
                $conn->query($sql_reset_results);

                for ($i = 0; $i < $match_count; $i++) {
                    $participant = $row[$i][0] . ', ' . $row[$count_team - ($i + 1)][0];
                    $sql = 'INSERT INTO `matches` (`participant`, `tournament_id`, `created_at`, `updated_at`) VALUES (' .
                        '' . json_encode($participant) . ', ' .
                        '"' . $_POST['id'] . '", ' .
                        'NOW(), NOW());';
                    $conn->query($sql);
                }
            } else { // Jika jumlah team ganjil
                // TODO
                // echo 'ganjil';
            }
            $round_one_generate = "unggulan";
        } else if ($round_one == "Acak") {

            $team = implode(',', $teams);
            $count_team = count($teams);
            $sql = 'SELECT * FROM `teams` WHERE `id` IN (' . $team . ')';
            $result = $conn->query($sql);

            $row = $result->fetch_all();
            $match_count = $count_team / 2;

            // Jika jumlah team genap, membuat match sesuai dengan tipe round one "Acak"
            if ($count_team % 2 == 0) {
                // Delete if exist match has tournament_id (because form has been submited again)
                $sql_delete = 'DELETE FROM `matches` WHERE `tournament_id` = ' . $_POST['id'];
                $conn->query($sql_delete);

                $team_id_arr = [];
                foreach ($row as $id => $team)
                    array_push($team_id_arr, $team[0]);

                for ($i = 0; $i < $match_count; $i++) {
                    shuffle($team_id_arr);
                    $team_one = array_pop($team_id_arr);
                    shuffle($team_id_arr);
                    $team_two = array_pop($team_id_arr);
                    // return json_encode($team_id_arr);
                    // $team_one = !in_array($test = rand(0, $match_count * 2), $team_id_arr) ? $test : array_push($team_id_arr, $test);
                    // $team_two = !in_array($test2 = rand(0, $match_count * 2), $team_id_arr) ? $test2 : array_push($team_id_arr, $test2);
                    $participant = $team_one . ', ' . $team_two;
                    $sql = 'INSERT INTO `matches` (`participant`, `tournament_id`, `created_at`, `updated_at`) VALUES (' .
                        json_encode($participant) . ', ' .
                        '"' . $_POST['id'] . '", ' .
                        'NOW(), NOW());';
                    $conn->query($sql);
                }
            }
            $round_one_generate = "acak";
        }
    } else {
        // Delete if exist match has tournament_id (because form has been submited again)
        $sql_delete = 'DELETE FROM `matches` WHERE `tournament_id` = ' . $_POST['id'];
        $conn->query($sql_delete);
    }

    return header("Location:/server/tournament.php?page=manage&id=" . $_POST['id'] . '&generate=' . $round_one_generate);
}


function setResultsToLeagueExtrasColumn()
{
    include '../connection.php';

    $json = json_decode($_POST['json']);
    $results = $json->results;

    $sql = 'UPDATE `tournaments` SET ' .
        'results = \'' . json_encode($results) . '\',' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
    echo ($sql);
    $conn->query($sql); // Execute update extras

    return json_encode($results);
}

function show(){
    include '../connection.php';

    $sql = 'SELECT * FROM `tournaments` WHERE `id`="' . $_POST['id'] . '"';
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
