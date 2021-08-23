<?php 
    // cek session (jika tidak ada login, tendang ke login)
    session_start();
    if ( !isset ($_SESSION["level"])) {
        header("Location: akun/login.php");
        exit;
    }
    if ($_SESSION["level"]!=="user"){
        header("Location: ../admin/dashboard.php");
        exit;
    }
    require_once ('../init.php');
    $con = new aksi();

    $id = $_GET["id"];

    if ( $con->hapus ($id) > 0 ) { //Jika hapus berhasil
        echo "
        <script>
            alert('Data Berhasil dihapus!');
            document.location.href = 'daftardata.php'
        </script>
        ";
        } else {
        echo "
            <script>
                alert('Data Gagal dihapus!');
                document.location.href = 'daftardata.php'
            </script>";
        }

?>