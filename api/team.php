<?php
include '../connection.php';

$nomorRegistrasi = $_POST['noreg'];

// Check team id in database
$sql = 'SELECT * FROM `teams` WHERE registration_number = "' . $nomorRegistrasi . '"';
// echo $sql;
$result = $conn->query($sql);

$isExist = $result->fetch_assoc() ? true : false;

if ($result)
    echo $isExist;
