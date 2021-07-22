<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT `nisn`, `name`, `class_type`, `address`, `status`, `id` FROM `members`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function store()
{
    include '../connection.php';

    $target_dir = "../server/uploads/member/";

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
        header("Location:/server/member.php?page=create&errorMsg=already_exist");
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        // $message['file_size'] = "Sorry, your file is too large.";
        header("Location:/server/member.php?page=create&errorMsg=file_size");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        $_POST['_previousUrl'] ? header('Location:' . $_POST['_previousUrl'] . "?page=create&errorMsg=file_format") : header("Location:/server/member.php?page=create&errorMsg=file_format");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // return header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=');
    } else { // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            $sql = 'INSERT INTO `members` (`name`, `nisn`, `birth_date`, `birth_place`, `class_type`, `gender_id`, `religion`, `address`, `height`, `weight`, `phone_number`, `image_path`, `position`, `reason`, `notes`, `status`, `created_at`, `updated_at`) VALUES (' .
                '"' . $_POST['name'] . '", ' .
                '"' . $_POST['identity_number'] . '", ' .
                '"' . $_POST['birth_date'] . '", ' .
                '"' . $_POST['birth_place'] . '", ' .
                '"' . $_POST['class_type'] . '", ' .
                '"' . $_POST['gender_id'] . '", ' .
                '"' . $_POST['religion'] . '", ' .
                '"' . $_POST['address'] . '", ' .
                '"' . $_POST['height'] . '", ' .
                '"' . $_POST['weight'] . '", ' .
                '"' . $_POST['phone_number'] . '", ' .
                '"' . $target_file . '", ' .
                '"' . $_POST['position'] . '", ' .
                '"' . $_POST['reason'] . '", ' .
                '"' . $_POST['notes'] . '", ' .
                '"' . 'draft' . '", ' .
                'NOW(), NOW())';

            $result = $conn->query($sql);

            if ($result)
                return header("Location:/server/member.php?status=stored");
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

    $sql = 'SELECT * FROM `members` WHERE id = ' . $_POST['id'];
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

        $target_dir = "../server/uploads/member/";

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
            header("Location:/server/member.php?page=edit&id=" . $_POST['id'] . '&errorMsg=already_exist');
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            // $message['file_size'] = "Sorry, your file is too large.";
            header("Location:/server/member.php?page=edit&id=" . $_POST['id'] . '&errorMsg=file_size');
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
            header("Location:/server/member.php?page=edit&id=" . $_POST['id'] . '&errorMsg=file_format');
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            // return header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=');
        } else { // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

                $sql = 'UPDATE `members` SET ' .
                    'name = "' . $_POST['name'] . '",' .
                    'nisn = "' . $_POST['identity_number'] . '",' .
                    'birth_date = "' . $_POST['birth_date'] . '",' .
                    'birth_place = "' . $_POST['birth_place'] . '",' .
                    'class_type = "' . $_POST['class_type'] . '",' .
                    'gender_id = "' . $_POST['gender_id'] . '",' .
                    'religion = "' . $_POST['religion'] . '",' .
                    'address = "' . $_POST['address'] . '",' .
                    'height = "' . $_POST['height'] . '",' .
                    'weight = "' . $_POST['weight'] . '",' .
                    'phone_number = "' . $_POST['phone_number'] . '",' .
                    'image_path = "' . $target_file . '",' .
                    'position = "' . $_POST['position'] . '",' .
                    'reason = "' . $_POST['reason'] . '",' .
                    'notes = "' . $_POST['notes'] . '",' .
                    'status = "' . 'draft' . '",' .
                    'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

                $result = $conn->query($sql);

                if ($result)
                    return header("Location:/server/member.php?status=updated");
                else
                    return json_encode(['status' => false, 'msg' => 'Gagal']);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $sql = 'UPDATE `members` SET ' .
            'name = "' . $_POST['name'] . '",' .
            'nisn = "' . $_POST['identity_number'] . '",' .
            'birth_date = "' . $_POST['birth_date'] . '",' .
            'birth_place = "' . $_POST['birth_place'] . '",' .
            'class_type = "' . $_POST['class_type'] . '",' .
            'gender_id = "' . $_POST['gender_id'] . '",' .
            'religion = "' . $_POST['religion'] . '",' .
            'address = "' . $_POST['address'] . '",' .
            'height = "' . $_POST['height'] . '",' .
            'weight = "' . $_POST['weight'] . '",' .
            'phone_number = "' . $_POST['phone_number'] . '",' .
            'position = "' . $_POST['position'] . '",' .
            'reason = "' . $_POST['reason'] . '",' .
            'notes = "' . $_POST['notes'] . '",' .
            'status = "' . 'draft' . '",' .
            'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

        $result = $conn->query($sql);

        if ($result)
            return header("Location:/server/member.php?status=updated");
        else
            return json_encode(['status' => false, 'msg' => 'Gagal']);
    }
}

function delete()
{
    include '../connection.php';

    // Hapus filenya juga jika query dihapus
    $sql = 'SELECT * FROM `members` WHERE `id` = ' . $_POST['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Jika file ada maka hapus
    if (file_exists($row['image_path']))
        unlink($row['image_path']);

    $sql = 'DELETE FROM `members` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Anggota berhasil dihapus!']);
    else
        return json_encode(['status' => false, 'msg' => 'Anggota tidak dapat dihapus!']);
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
} else
    echo index();
