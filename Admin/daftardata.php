<?php 

    // cek session (jika tidak ada login, tendang ke login)
    session_start();
    require_once ('../init.php');
    $con = new tampildata();
    $mahasiswa = $con->tampildata_semua();

    if ( !isset ($_SESSION["level"])) {
        header("Location: ../akun/login.php");
        exit;
    }
    if ($_SESSION["level"]!=="admin"){
        header("Location: ../User/dashboard.php");
        exit;
    }

    // Jika Tombol cari diklik
    // Gunakan _POST karena method search menggunakan post
    if (isset ($_POST["cari"])) {
        $mahasiswa = $con->cariadmin($_POST["keyword"]);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Data</title>
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
            <a href="dashboard.php" >Dashboard</a>
            <a href="" class="active">Daftar Data</a>
            <a href="../akun/logout.php">Logout</a>
        </div>
    </div>

    <!-- Page Content -->
    <div class="main text-justify">
        <h3 class="font-weight-bold">Daftar Data PKL</h3>
        <br>

        <!-- Search form -->
        <form action="" method="post">
            <!-- Size untuk memperlebar kolom -->
            <!-- autofocus untuk auto active saat page load -->
            <!-- autocomplete="off" untuk menghilangkan rekomendasi history pencarian -->
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" size="40" autofocus
                placeholder="Masukkan keyword pencarian . ." autocomplete="off"> 
                <div class="input-group-append">
                    <button type="submit" name="cari" class="btn btn-dark">Cari</button>
                </div>
            </div>
        </form>

        

        <table class="table table-hover table-bordered">
            
            <tr class="thead-dark text-center">
                <th class="align-middle">No.</th>
                <th class="align-middle">Aksi</th>
                <th class="align-middle">Surat</th>
                <th class="align-middle">Nama</th>
                <th class="align-middle">Mulai</th>
                <th class="align-middle">Selesai</th>
                <th class="align-middle">Pendidikan</th>
                <th class="align-middle">Referral</th>
                <th class="align-middle">Status</th>
            </tr>


            <!-- Agar No. tetap urut, definisikan variable baru -->
            <?php $i = 1; ?> 
            <?php foreach($mahasiswa as $row) : ?>
                <tr>
                    <td class="text-center align-middle"><?= $i ?></td>
                    <td class="align-middle">
                        <a href="konfirmasi.php?id=<?= $row["id"];?>">Konfirmasi</a> 
                            <hr>
                        <a href="tolak.php?id=<?= $row["id"];?>">Tolak</a>
                    </td>
                    <!-- <td class="align-middle text-center"><img src="../img/<?= $row["gambar"];?>" width="50px"></td> -->
                    <td class="align-middle"><a href="../file/<?= $row["surat"]; ?>" download>Download</a></td>
                    <td class="align-middle"><?= $row["nama"]; ?></td>
                    <td class="align-middle"><?= $row["tgl_mulai"]; ?></td>
                    <td class="align-middle"><?= $row["tgl_selesai"]; ?></td>
                    <td class="align-middle"><?= $row["pendidikan"]; ?></td>
                    <td class="align-middle"><?= $row["referral"]; ?></td>
                    <td class="align-middle"><?= $row["status"]; ?></td>
                </tr>
            <!-- Agar variable i bertambah saat selesai while -->
            <?php $i++; ?>
            <?php endforeach; ?>

        </table>
    </div>

</body>
</html>