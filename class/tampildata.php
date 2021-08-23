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


    //  FUNGSI CARI
    public function cariuser($keyword) {
        // Query tampil data dengan keyword tertentu
        $namaakun = $_SESSION["username"];
        $query = "SELECT*FROM pengaju
                    WHERE username='$namaakun' AND
                    (nama LIKE '%$keyword%' OR
                    tgl_mulai LIKE '%$keyword%' OR
                    tgl_selesai LIKE '%$keyword%' OR
                    pendidikan LIKE '%$keyword%' OR
                    referral LIKE '%$keyword%' OR
                    statusdata LIKE '%$keyword%') 
                ";

        return self::parentquery($query); // Memanggil fungsi query paling atas dengan parameter variabel query diatas ini
    }

    public function cariadmin($keyword) {
        // Query tampil data dengan keyword tertentu
        $query = "SELECT*FROM pengaju
                    WHERE
                    nama LIKE '%$keyword%' OR
                    tgl_mulai LIKE '%$keyword%' OR
                    tgl_selesai LIKE '%$keyword%' OR
                    pendidikan LIKE '%$keyword%' OR
                    referral LIKE '%$keyword%' OR
                    statusdata LIKE '%$keyword%'
                ";

        return self::parentquery($query); // Memanggil fungsi query paling atas dengan parameter variabel query diatas ini
    }
}


?>