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

    $target_dir = "../server/uploads/league/";

    // Buat nama file unik 
    $date = DateTime::createFromFormat('U.u', microtime(TRUE));
    $filename = md5($date->format('Y-m-d H:i:s:u'));

    $target_file = $target_dir . basename($filename . '_' . $_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $message = [];

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        // $message['already_exist'] = "Sorry, file already exists.";
        header("Location:/server/tournament.php?page=create&errorMsg=already_exist");
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        // $message['file_size'] = "Sorry, your file is too large.";
        header("Location:/server/tournament.php?page=create&errorMsg=file_size");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        header("Location:/server/tournament.php?page=create&errorMsg=file_format");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // return header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=');
    } else { // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            $sql = 'INSERT INTO `leagues` (`name`, `date`, `location`, `image_path`, `status`, `extras`, `created_at`, `updated_at`) VALUES (' .
                '"' . $_POST['name'] . '", ' .
                '"' . $_POST['date'] . '", ' .
                '"' . $_POST['location'] . '", ' .
                '"' . $target_file . '", ' .
                '"' . $_POST['status'] . '", ' .
                '"{\"teams\":[]}", ' .
                'NOW(), NOW())';
            $result = $conn->query($sql);

            if ($result)
                return header("Location:/server/league.php?status=stored");
            else
                return json_encode(['status' => false, 'msg' => 'Gagal']);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
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

    $check_file_to_upload = $_FILES["fileToUpload"] ?? 0;

    if ($check_file_to_upload['name'] != null) {
        $target_dir = "../server/uploads/league/";

        // Buat nama file unik 
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $filename = md5($date->format('Y-m-d H:i:s:u'));

        $target_file = $target_dir . basename($filename . '_' . $_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $message = [];

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            // $message['already_exist'] = "Sorry, file already exists.";
            header("Location:/server/league.php?page=edit&id=" . $_POST['id'] . '&errorMsg=already_exist');
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            // $message['file_size'] = "Sorry, your file is too large.";
            header("Location:/server/league.php?page=edit&id=" . $_POST['id'] . '&errorMsg=file_size');
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
            header("Location:/server/league.php?page=edit&id=" . $_POST['id'] . '&errorMsg=file_format');
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            // return header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=');
        } else { // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

                // Hapus filenya sebelumnya, sebelum update di images di database
                $sql = 'SELECT * FROM `leagues` WHERE `id` = ' . $_POST['id'];
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                // Jika file ada maka hapus
                if (file_exists($row['image_path']))
                    unlink($row['image_path']);

                $sql = 'UPDATE `leagues` SET ' .
                    'name = "' . $_POST['name'] . '",' .
                    'date = "' . $_POST['date'] . '",' .
                    'location = "' . $_POST['location'] . '",' .
                    'image_path = "' . $target_file . '",' .
                    'status = "' . $_POST['status'] . '",' .
                    'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

                var_dump($sql);
                $result = $conn->query($sql);

                if ($result)
                    return header("Location:/server/league.php?status=updated");
                else
                    return json_encode(['status' => false, 'msg' => 'Gagal']);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $sql = 'UPDATE `leagues` SET ' .
            'name = "' . $_POST['name'] . '",' .
            'date = "' . $_POST['date'] . '",' .
            'location = "' . $_POST['location'] . '",' .
            'status = "' . $_POST['status'] . '",' .
            'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

        var_dump($sql);
        $result = $conn->query($sql);

        if ($result)
            return header("Location:/server/league.php?status=updated");
        else
            return json_encode(['status' => false, 'msg' => 'Gagal']);
    }
}

function delete()
{
    include '../connection.php';

    // Hapus filenya juga jika query dihapus
    $sql = 'SELECT * FROM `leagues` WHERE `id` = ' . $_POST['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Jika file ada maka hapus
    if (file_exists($row['image_path']))
        unlink($row['image_path']);

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
        $sql = 'SELECT * FROM `schedules` WHERE `league_id` = ' . $_POST['id'];
        $result = $conn->query($sql);

        $standings = $result->fetch_all();

        return json_encode(['data' => json_encode($extras), 'standings' => json_encode($standings)]);
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
                $schedules[] = $team2[$i][0] . ',NULL,NULL,' . $team2[$j][0] . ',NULL,NULL,' . $_POST['id'];
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
