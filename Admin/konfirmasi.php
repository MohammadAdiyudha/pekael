<?php 
    // cek session (jika tidak ada login, tendang ke login)
    session_start();
    if ( !isset ($_SESSION["level"])) {
        header("Location: akun/login.php");
        exit;
    }
    if ($_SESSION["level"]!=="admin"){
        header("Location: ../user/dashboard.php");
        exit;
    }
    
    require_once ('../init.php');
    $con = new aksi();

    $id = $_GET["id"];

    if ( $con->konfirmasi ($id) > 0 ) { //Jika hapus berhasil
        echo "
        <script>
            alert('Konfirmasi Data Berhasil!');
            document.location.href = 'daftardata.php'
        </script>
        ";
        } else {
        echo "
            <script>
                alert('Konfirmasi Data Gagal!');
                document.location.href = 'daftardata.php'
            </script>";
        }