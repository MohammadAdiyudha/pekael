<?php 

    session_start();
    // Jika ada login, tidak bisa akses registrasi
    if (isset($_SESSION["level"])) {
        // Jika session user
        if ($_SESSION["level"]=="user"){
            header("Location: ../user/dashboard.php");
            exit;
        } else if($_SESSION["level"]=="admin") {
            header("Location: ../Admin/dashboard.php");
        }
        exit;
    }

    require_once ('../init.php');
    $con = new akunclass();


    // Cek apakah tombol registrasi sudah ditekan
    if ( isset($_POST["register"])) {

        if ( $con->registrasi($_POST) > 0) {
            echo "<script>
                    alert('User baru berhasil ditambahkan');
                </script>";
        } else {
            echo mysqli_error($con->db);
        }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo.ico" type="image/ico">
</head>
<body id="loginpage">
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form action="" method="post" class="form" id="login-form">
                            <h3 class="text-center">Registrasi</h1>
                            <div class="form-group">
                                <label for="username">Username :</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <!-- Konfirmasi pass -->
                                <label for="password2">Konfirmasi password :</label>
                                <input type="password" name="password2" id="password2" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register" class="btn btn-info">Register</button>
                            </div>
                            <div id="login-link" class="text-right">
                                <a href="login.php" class="btn btn-outline-secondary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>