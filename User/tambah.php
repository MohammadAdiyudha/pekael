<?php
    // cek session (jika tidak ada login, tendang ke login)
    session_start();
    require_once('../init.php');
    $con = new tambahclass();

    if ( !isset ($_SESSION["level"])) {
        header("Location: ../akun/login.php");
        exit;
    }if ($_SESSION["level"]!=="user"){
        header("Location: ../admin/dashboard.php");
        exit;
    }

    
    // Cek apakah tombol sudah ditekan atau belum
    if ( isset ( $_POST["submit"] ) ) {

        
        // Cek apakah data berhasil ditambahkan atau gagal
        if ( $con->tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Berhasil ditambahkan!');
                    document.location.href = 'daftardata.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'daftardata.php'
                </script>
            ";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Mahasiswa</title>
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
            <a href="dashboard.php">Dashboard</a>
            <a href="tambah.php" class="active">Daftar PKL</a>
            <a href="daftardata.php">Hasil</a>
            <a href="../akun/logout.php">Logout</a>
        </div>
    </div>

    <!-- Page Content -->
    <div class="main text-justify">
        <h3 class="font-weight-bold">Tambah data mahasiswa</h3>
        <br>
        <!-- Enctype untuk mengelola banyak jenis superglobal ($_POST dan $_FILE)-->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                    <label for="nama">Nama Lengkap : </label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                
                <div class="form-group col-md-6 mb-3">    
                    <label for="tgl_mulai">Tanggal Mulai : </label>
                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
                </div>    
            </div>


            <div class="form-row">
                <div class="form-group col-md-6 mb-3"> 
                    <label for="pendidikan">Pendidikan : </label>
                    <input type="text" name="pendidikan" id="pendidikan" class="form-control" required>
                </div>   

                <div class="form-group col-md-6 mb-3">
                    <label for="tgl_selesai">Tanggal Selesai :</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" required>
                </div>     
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                    <!-- <label for="jurusan">Jurusan : </label>
                    <input type="text" name="jurusan" id="jurusan" required> -->
                    <label for="referral">Referral : </label>
                    <input type="text" name="referral" id="referral" class="form-control" required>
                </div> 

                <div class="form-group col-md-6 mb-3">
                    <label for="surat">Surat Pengajuan : </label>
                    <input type="file" name="surat" id="surat" class="form-control-file" required>
                </div> 
            </div>   
            <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Yakin?');">Tambah Data</button>    
        </form>    
    </div>

    
</body>
</html>