<?php 
    // cek session (jika tidak ada login, tendang ke login)
    session_start();
    if ( !isset ($_SESSION["level"])) {
        header("Location: ../akun/login.php");
        exit;
    }
    if ($_SESSION["level"]!=="user"){
        header("Location: ../admin/dashboard.php");
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
            <a href="tambah.php">Daftar PKL</a>
            <a href="daftardata.php">Hasil</a>
            <a href="../akun/logout.php">Logout</a>
        </div>
    </div>

    <!-- Page Content -->
    <div class="main text-justify">
        <h3 class="font-weight-bold">Dashboard</h3>
        <br>
        <h>Selamat Datang <?= $_SESSION["username"]; ?></p>
        
        <p>Web ini merupakan web pendaftaran Praktek Kerja Lapangan di Plasa Telkom Cilacap.</p>
        <p>Untuk melakukan pendaftaran PKL, silakan tekan "Daftar PKL" pada navigasi bar sebelah kiri,
            pendaftaran banyak data bisa dilakukan oleh satu akun, guna mempermudah instansi pendidikan membantu siswa / mahasiswanya. 
            Apabila sudah melakukan pendaftaran, anda bisa mengecek dan mengubah pada pilihan "Hasil" di navigasi bar sebelah kiri,
            anda juga bisa menghapus data yang sudah dimasukan dengan pilihan hapus pada tabel daftar mahasiswa kolom aksi.
        </p>
        <p>
            Terdapat 3 Status dalam kolom status tabel Daftar Mahasiswa :
            <ol>
                <li>Menunggu&emsp;&emsp;: berarti dalam tahap pemantauan data oleh admin</li>
                <li>Terkonfirmasi&emsp;: berarti data sudah melalui tahap pemantauan admin dan data dianggap VALID</li>
                <li>Tertolak&emsp;&emsp;&emsp;&nbsp;: berarti data sudah melalui tahap pemantauan admin dan data dianggap TIDAK VALID (Mohon untuk ubah atau hapus data)</li>
            </ol>
        </p>
        <p>Sekian, dan terima kasih, semoga anda dapat diterima di universitas kami.</p>
        
    </div>

</body>
</html>