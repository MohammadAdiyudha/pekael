<?php 

    // cek session (jika tidak ada login, tendang ke login)
    session_start();
    if ( !isset ($_SESSION["username"])) {
        header("Location: akun/login.php");
        exit;
    }

    if ($_SESSION["level"] == "admin") {
        header("Location: Admin/dashboard.php");
    } else if ($_SESSION["level"] == "user") {
        header("Location: user/dashboard.php");
    } else {
        header("Location: ");
    }


?>