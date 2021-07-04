<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT `name`, `date`, `description`, `images`, `id` FROM `news`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function store()
{
    include '../connection.php';

    $target_dir = "../server/uploads/news/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
        header("Location:/server/news.php?page=create&errorMsg=already_exist");
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        // $message['file_size'] = "Sorry, your file is too large.";
        header("Location:/server/news.php?page=create&errorMsg=file_size");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        header("Location:/server/news.php?page=create&errorMsg=file_format");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // return header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=');
    } else { // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            $sql = 'INSERT INTO `news` (`name`, `description`, `date`, `images`, `created_at`, `updated_at`) VALUES (' .
                '"' . $_POST['title'] . '", ' .
                '"' . $_POST['description'] . '", ' .
                '"' . $_POST['date'] . '", ' .
                '"' . $target_file . '", ' .
                'NOW(), NOW())';

            $result = $conn->query($sql);

            if ($result)
                return header("Location:/server/news.php?status=stored");
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

    $sql = 'SELECT * FROM `news` WHERE id = ' . $_POST['id'];
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

    $target_dir = "../server/uploads/news/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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
        header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=already_exist');
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        // $message['file_size'] = "Sorry, your file is too large.";
        header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=file_size');
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        // $message['file_format'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=file_format');
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // return header("Location:/server/news.php?page=edit&id=" . $_POST['id'] . '&errorMsg=');
    } else { // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            $sql = 'UPDATE `news` SET ' .
                'name = "' . $_POST['title'] . '",' .
                'description = "' . $_POST['description'] . '",' .
                'date = "' . $_POST['date'] . '",' .
                'images = "' . $target_file . '",' .
                'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

            $result = $conn->query($sql);

            if ($result)
                return header("Location:/server/news.php?status=updated");
            else
                return json_encode(['status' => false, 'msg' => 'Gagal']);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function delete()
{
    include '../connection.php';

    $sql = 'DELETE FROM `news` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Tim berhasil dihapus!']);
    else
        return json_encode(['status' => false, 'msg' => 'Tim tidak dapat dihapus!']);
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
