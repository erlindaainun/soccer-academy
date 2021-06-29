<?php

function exists_in_db($str)
{
    include '../connection.php';

    $sql = 'SELECT `registration_number` FROM `teams` WHERE `registration_number` = "' . $str . '"';

    $result = $conn->query($sql);

    if ($result->num_rows == 0)
        return false;
    else
        return true;
}

function generate_registration_number()
{
    $str = substr(md5(microtime()), 0, 5);
    if (exists_in_db($str)) $str = generate_registration_number();
    return $str;
}

function checkRegistrationNumber()
{
    include '../connection.php';

    $nomorRegistrasi = $_POST['noreg'];

    // Check team id in database
    $sql = 'SELECT * FROM `teams` WHERE registration_number = "' . $nomorRegistrasi . '"';
    // echo $sql;
    $result = $conn->query($sql);

    $isExist = $result->fetch_assoc() ? true : false;

    if ($result)
        return $isExist;
}

function store()
{
    include '../connection.php';

    $test = "test/file.img";

    $sql = 'INSERT INTO `managers` (`name`, `image_path`, `phone_number`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['manager_name'] . '",' .
        '"' . $test . '",' .
        '"' . $_POST['manager_phone_number'] . '",' .
        'NOW(), NOW());';

    $result = $conn->query($sql);

    $manager_id = $conn->insert_id;

    $reg_number = generate_registration_number();
    $sql = 'INSERT INTO `teams` (`name`, `address`, `manager_id`, `licenses`, `registration_number`, `created_at`, `updated_at`) VALUES (' .
        '"' . $_POST['name'] . '",' .
        '"' . $_POST['address'] . '",' .
        '"' . $manager_id . '",' .
        '"' . $_POST['licenses'] . '",' .
        '"' . $reg_number . '",' .
        'NOW(), NOW());';

    $result = $conn->query($sql);

    if ($result) {
        return json_encode([
            'status' => true,
            'msg' => 'Nama tim: xxx berhasil dibuat!',
            'noreg' => $reg_number,
        ]);
    } else {
        return json_encode([
            'status' => false,
            'msg' => 'Text gagal input'
        ]);
    }
}

if (isset($_POST['tipe'])) {
    if ($_POST['tipe'] == 'checkRegistrationNumber')
        echo checkRegistrationNumber();
    else if ($_POST['tipe'] == 'store')
        echo store();
}
