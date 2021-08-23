<?php 
    // memulai session
    session_start();

    // cek jika sudah login tidak bisa ke login lagi
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

    require_once('../init.php');
    $con = new akunclass();

    // Cek apakah login sudah ditekan apa belum
    if (ISSET ($_POST["login"])) {
        $con->login();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo.ico" type="image/ico">
</head>
<body id="loginpage">
    <div id="login">
        <div class="container containerlogin">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">   
                    <div id="login-box" class="col-md-12">
                        <form action="" id="login-form" method="post" class="form">
                            
                            <h3 class="text-center">Login</h1>

                            <!-- Tampilan jika kode salah -->
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger text-center" role="alert">username / password salah</div>
                            <?php endif; ?>
                        
                            <div class="form-group">
                                <label for="username">Username :</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group"> 
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="forn-group">    
                                <button type="submit" name="login" class="btn btn-info btn-md">Login</button>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="registrasi.php" class="btn btn-outline-secondary">Registasi</a>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>