<?php 
    session_start();
    if ( !isset ($_SESSION["level"])) {
        header("Location: ../akun/login.php");
        exit;
    }
    if ($_SESSION["level"]!=="admin"){
        header("Location: ../User/dashboard.php");
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo.ico" type="image/ico">
</head>
<body>
    <!-- Navbar -->
    <div class="navigasi">
        <nav class="navbar fixed-top navbar-dark">
            <a href="" class="navbar-brand ml-auto font-weight-bold">
                Selamat Datang <?= $_SESSION["username"]; ?>
            </a>
        </nav>
    </div>

    <!-- Fixed Sidebar -->
    <div class="sidenav">
        <img src="../img/logo.png" alt="logo" class="mx-auto d-block">
        <div class="sidetext">
            <h4>Navigasi</h4>
            <a href="" class="active">Dashboard</a>
            <a href="daftardata.php">List Data</a>
            <a href="../akun/logout.php">Logout</a>
        </div>
    </div>

    <!-- Page Content -->
    <div class="main text-justify">
        <h3 class="font-weight-bold">Dashboard</h3>
        <br>
        <p>Selamat Datang Admin</p>
        
        <p>Silakan melakukan pemantauan data yang bisa dilihat pada menu List Data pada Navigasi Bar sebelah kiri, untuk konfirmasi kevalidan data,
            gunakan 2 pilihan dalam Tabel Daftar Data PKL kolom Aksi
        </p>
        <p>
            Terdapat 3 Status dalam kolom status tabel List Data PKL :
            <ol>
                <li>Menunggu&emsp;&emsp;: berarti dalam tahap pemantauan data oleh admin</li>
                <li>Terkonfirmasi&emsp;: berarti data sudah melalui tahap pemantauan admin dan data dianggap VALID</li>
                <li>Tertolak&emsp;&emsp;&emsp;&nbsp;: berarti data sudah melalui tahap pemantauan admin dan data dianggap TIDAK VALID</li>
            </ol>
        </p>
        <p>Sekian dan Terima Kasih</p>

    </div>

    
</body>
</html>