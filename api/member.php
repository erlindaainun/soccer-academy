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
        '"' . $_POST['image_path'] . '", ' .
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
        'image_path = "' . $_POST['image_path'] . '",' .
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

function delete()
{
    include '../connection.php';

    $sql = 'DELETE FROM `members` WHERE id = ' . $_POST['id'];
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
    else if ($_POST['tipe'] == 'view')
        echo view();
    else if ($_POST['tipe'] == 'update')
        echo update();
    else if ($_POST['tipe'] == 'delete')
        echo delete();
} else
    echo index();
