<?php

include '../connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form 
    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `username` = '$myusername'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $result->num_rows;

    // Jika username di database ada
    if ($count == 1) {
        // Cek jika password sama
        if (password_verify($mypassword, $row['password'])) {
            $_SESSION['login_user'] = $myusername;

            // Ahlikan ke halaman index.php
            header("Location: index.php");
        } else {
            $_SESSION['error'] = "Kredensial ini tidak cocok dengan catatan kami.";
            header("Location: login.php");
        }
    } else {
        $_SESSION['error'] = "Kredensial ini tidak cocok dengan catatan kami.";
        header("Location: login.php");
    }
}
