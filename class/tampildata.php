<?php 

class tampildata extends config {
    
    public function tampildata_semua() {
        $result = mysqli_query($this->db, "SELECT*FROM pengaju ORDER BY nama"); // Full lemari
        $rows = []; // Buat wadah (beda dengan row dibawah)
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows; // Kembalikan kotak
    }

    public function tampildata_user() {
        $namaakun = $_SESSION["username"];
        $result = mysqli_query($this->db, "SELECT*FROM pengaju where username='$namaakun' ORDER BY nama"); // Full lemari
        $rows = []; // Buat wadah (beda dengan row dibawah)
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows; // Kembalikan kotak
    }

    public function parentquery($q) {
        return parent::query($q);
    }

}


?>