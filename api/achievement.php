<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT `name`, `description`, `image_path`, `id` FROM `achievements`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function store()
{
    include '../connection.php';

    $sql = 'INSERT INTO `achievements` (`name`, `description`, `image_path`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['name'] . '", ' .
        '"' . $_POST['description'] . '", ' .
        '"' . $_POST['image_path'] . '", ' .
        'NOW(), NOW())';

    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/achievement.php?status=stored");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function edit()
{
    include '../connection.php';

    $sql = 'SELECT * FROM `achievements` WHERE id = ' . $_POST['id'];
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

    $sql = 'UPDATE `achievements` SET ' .
        'name = "' . $_POST['name'] . '",' .
        'description = "' . $_POST['description'] . '",' .
        'image_path = "' . $_POST['image_path'] . '",' .
        'updated_at = NOW() WHERE `id` = ' . $_POST["id"];

    var_dump($sql);
    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/achievement.php?status=updated");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function delete()
{
    include '../connection.php';

    $sql = 'DELETE FROM `achievements` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Prestasi berhasil dihapus!']);
    else
        return json_encode(['status' => false, 'msg' => 'Prestasi tidak dapat dihapus!']);
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
