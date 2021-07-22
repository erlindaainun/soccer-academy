<?php

function index()
{
    include '../connection.php';

    $sql = 'SELECT `name`, `username`, `id` FROM `users`';
    $result = $conn->query($sql);

    $data = $result->fetch_all();

    return json_encode(['data' => $data]);
}

function store()
{
    include '../connection.php';

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = 'INSERT INTO `users` (`username`, `password`, `name`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['username'] . '", ' .
        '"' . $password . '", ' .
        '"' . $_POST['name'] . '", ' .
        'NOW(), NOW())';
    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/setting.php?status=stored");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function edit()
{
    include '../connection.php';

    $sql = 'SELECT `id`, `username`, `name` FROM `users` WHERE id = ' . $_POST['id'];
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

    if ($_POST['password'] != null) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = 'UPDATE `users` SET ' .
            'name = "' . $_POST['name'] . '",' .
            'password = "' . $password . '", ' .
            'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
    } else {
        $sql = 'UPDATE `users` SET ' .
            'name = "' . $_POST['name'] . '",' .
            'updated_at = NOW() WHERE `id` = ' . $_POST["id"];
    }
    $result = $conn->query($sql);

    if ($result)
        return header("Location:/server/setting.php?status=updated");
    else
        return json_encode(['status' => false, 'msg' => 'Gagal']);
}

function delete()
{
    include '../connection.php';

    $sql = 'DELETE FROM `users` WHERE id = ' . $_POST['id'];
    $result = $conn->query($sql);

    if ($result)
        return json_encode(['status' => true, 'msg' => 'Pengguna berhasil dihapus!']);
    else
        return json_encode(['status' => false, 'msg' => 'Pengguna tidak dapat dihapus!']);
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
