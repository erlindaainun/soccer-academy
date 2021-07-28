<?php

function deletePlayer($id)
{
    include '../connection.php';

    // mengecek id player dan Hapus filenya juga jika query dihapus
    $sql = 'SELECT * FROM `players` WHERE `id` = ' . $id;
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    // Jika file ada maka hapus
    if (file_exists($row['image_path'])) {
        unlink($row['image_path']);
        unlink($row['files']);
    }

    // Jika tidak ada id player
    if (mysqli_num_rows($result) == 0) {
        return json_encode(['status' => false, 'msg' => 'Tidak dapat menghapus.']);
    } else { // Jika id player ada, makan dilakukan penghapusan 

        $sql = 'DELETE FROM `players` WHERE `id` = ' . $id;

        if (mysqli_query($conn, $sql)) {
            return json_encode(['status' => true, 'msg' => "Records were deleted successfully."]);
        } else {
            return "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}

function storePlayer()
{
    include '../connection.php';

    $target_dir = "../server/uploads/player/";

    // Cek jika kolom file tidak diupload
    if ($_POST["player_photo"] ?? '' == 'undefined' || ($_POST["card-identity"] ?? '') == 'undefined')
        return json_encode([
            'status' => false,
            'msg' => 'Gagal, file belum dipilih untuk diunggah!'
        ]);

    // Buat nama file unik 
    $date = DateTime::createFromFormat('U.u', microtime(TRUE));
    $filename = md5($date->format('Y-m-d H:i:s:u'));

    $player_photo = $target_dir . basename($filename . '_pp_' . $_FILES["player_photo"]["name"]);
    $card_identity = $target_dir . basename($filename . '_ci_' . $_FILES["card-identity"]["name"]);
    $uploadOk = 1;
    $playerImageFileType = strtolower(pathinfo($player_photo, PATHINFO_EXTENSION));
    $cardIdentityImageFileType = strtolower(pathinfo($card_identity, PATHINFO_EXTENSION));
    // return $player_photo;

    // Check if file already exists
    if (file_exists($player_photo) || file_exists($card_identity)) {
        // return 'exist';
        // $message['already_exist'] = "Sorry, file already exists.";
        // header("Location:/registration-team.php?page=create&errorMsg=already_exist");
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["player_photo"]["size"] > 1000000 || $_FILES["card-identity"]["size"] > 1000000) {
        // return 'size';
        // $message['file_size'] = "Sorry, your file is too large.";
        // header("Location:/registration-team.php?page=create&errorMsg=file_size");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($playerImageFileType != "jpg" && $playerImageFileType != "png" && $playerImageFileType != "jpeg") {
        // return 'type_pp';
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        // header("Location:/registration-team.php?page=create&errorMsg=file_format");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($cardIdentityImageFileType != "jpg" && $cardIdentityImageFileType != "png" && $cardIdentityImageFileType != "jpeg") {
        // return 'type_ci';
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
    } else { // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["player_photo"]["tmp_name"], $player_photo)) {
            move_uploaded_file($_FILES["card-identity"]["tmp_name"], $card_identity);
            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            if ($_POST['registration_number'] ?? '' != '' ? true : false) {
                $sql = 'SELECT * FROM `teams` WHERE `registration_number` = "' . $_POST['registration_number'] . '"';
                $team_id = $conn->query($sql)->fetch_assoc()['id'];
            } else {
                $team_id = $_POST['team_id'] ?? '';
            }

            $sql = 'INSERT INTO `players` (`full_name`, `birth_date`, `birth_place`, `address`, `identity_number`, `height`, `weight`, `position`, `back_number`, `back_name`, `image_path`, `files`, `religion`, `team_id`, `gender_id`, `created_at`, `updated_at`) VALUES (' .
                '"' . $_POST['full_name'] . '",' .
                '"' . $_POST['birth_date'] . '",' .
                '"' . $_POST['birth_place'] . '",' .
                '"' . $_POST['address'] . '",' .
                '"' . $_POST['identity_number'] . '",' .
                '"' . $_POST['height'] . '",' .
                '"' . $_POST['weight'] . '",' .
                '"' . $_POST['position'] . '",' .
                '"' . $_POST['back_number'] . '",' .
                '"' . $_POST['back_name'] . '",' .
                '"' . $player_photo .  '",' .
                '"' . $card_identity .  '",' .
                '"' . $_POST['religion'] . '",' .
                '"' . $team_id . '",' .
                '"' . $_POST['gender_id'] . '",' .
                'NOW(), NOW());';

            $result = $conn->query($sql);

            if ($result) {
                return json_encode([
                    'status' => true,
                    'msg' => 'Pemain dengan nama ' . $_POST['full_name'] . ' berhasil dibuat!',
                ]);
            } else {
                return json_encode([
                    'status' => false,
                    'msg' => 'Gagal membuat pemain.'
                ]);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function getPlayerByTeamId()
{

    include '../connection.php';

    $team_id = $_POST['id'];

    $sql = 'SELECT * FROM `players` WHERE `team_id` = "' . $team_id . '"';
    $result = $conn->query($sql);

    if ($result)
        return json_encode($result->fetch_all());
}

if (isset($_POST['tipe'])) {
    if ($_POST['tipe'] == 'callFuncDelete')
        echo deletePlayer($_POST['id']);
    else if ($_POST['tipe'] == 'callFuncStore')
        echo storePlayer();
    else if ($_POST['tipe'] == 'getPlayerByTeamId')
        echo getPlayerByTeamId();
}
