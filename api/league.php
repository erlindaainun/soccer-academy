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

function manage()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `leagues` WHERE id = ' . $_POST['id'];
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
    $sql = 'UPDATE `leagues` SET ' .
        'extras = \'' . $extras . '\',' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
    $conn->query($sql); // Execute update extras

    // Cek jika team yang di update ada
    if ($teams != [])
        if ($round_one == "Unggulan") {
            $team = implode(',', $teams);
            $count_team = count($teams);
            $sql = 'SELECT * FROM `teams` WHERE `id` IN (' . $team . ')';
            $result = $conn->query($sql);

            $row = $result->fetch_all();
            $match_count = $count_team / 2;

            // Jika jumlah team genap, membuat match sesuai dengan tipe round one "unggulan"
            if ($count_team % 2 == 0) {
                // Delete if exist match has league_id (because form has been submited again)
                $sql_delete = 'DELETE FROM `matches` WHERE `league_id` = ' . $_POST['id'];
                $conn->query($sql_delete);

                for ($i = 0; $i < $match_count; $i++) {
                    $participant = $row[$i][0] . ', ' . $row[$count_team - ($i + 1)][0];
                    $sql = 'INSERT INTO `matches` (`participant`, `league_id`, `created_at`, `updated_at`) VALUES (' .
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
        } else if ($round_one == "Manual") {
            // 
            $round_one_generate = "manual";
        } else if ($round_one == "Acak") {
            // 
            $round_one_generate = "acak";
        }

    return header("Location:/server/league.php?page=manage&id=" . $_POST['id'] . '&generate=' . $round_one_generate);
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
    else if ($_POST['tipe'] == 'manage')
        echo manage();
    else if ($_POST['tipe'] == 'postManage')
        echo postManage();
} else
    echo index();
