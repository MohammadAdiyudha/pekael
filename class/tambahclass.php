<?php 

    class tambahclass extends config {
    
        public function parentquery($q) {
            return parent::query($q);
        }
        // FUNGSI TAMBAH
        public function tambah($data) {

            // Ambil data dari tiap elemen dari form
            // htmlspecialcharas agar tidak bisa input tag html / css pada input data
            $nama = htmlspecialchars($data["nama"]);
            $tgl_mulai = $data["tgl_mulai"];
            $tgl_selesai = $data["tgl_selesai"];
            $pendidikan = htmlspecialchars($data["pendidikan"]);
            $referral = htmlspecialchars($data["referral"]);
            $uname = $_SESSION["username"];
    
            // Upload Gambar
            $surat = self::upload();
            // Jika gambar tidak diupload, akan gagal
            if ( !$surat ) {
                return false;
            }
    
            // Query insert data
            $query = "INSERT INTO pengaju VALUES
                        ('', '$nama','$tgl_mulai','$tgl_selesai','$pendidikan','$referral', '$surat', 'Menunggu', '$uname')
                        ";
            mysqli_query($this->db, $query);
    
            return mysqli_affected_rows($this->db);
        }

        // FUNGSI UPLOAD
        public function upload() {
            $namaFile = $_FILES['surat']['name']; // Akan mengambil nama gambar
            $ukuranFile = $_FILES['surat']['size'];
            $error = $_FILES['surat']['error'];
            $tmpName = $_FILES['surat']['tmp_name'];


            // Cek apakah tidak ada gambar yang diupload
            if ($error == 4) { // Error 4 = tidak ada gambar diupload
                echo "<script>
                        alert ('Pilih file terlebih dahulu');
                    </script>
                ";
                return false;
            }

            // Cek apakah yang diupload adalah gambar
            $extensiValid = ['pdf'];
            $extensi = explode ('.', $namaFile); // . sebagai pemisah 
            $extensi = strtolower(end($extensi)); // Diambil dari array explode terakhir
            // strtolower untuk mengubah semua menjadi lowercaps
            if (!in_array($extensi, $extensiValid)) { 
                echo "<script>
                        alert ('Extensi File salah');
                    </script>
                ";
                return false;
            }

            // Cek jika ukuran file terlalu besar
            if ($ukuranFile > 1000000) {
                echo "<script>
                        alert ('Ukuran File terlalu besar');
                    </script>
                ";
            }

            // lolos pengecekan, gambar siap upload
            // Generate nama baru
            $namaFilebaru = uniqid();
            $namaFilebaru.= '.';
            $namaFilebaru.= $extensi;

            move_uploaded_file($tmpName, "../file/" . $namaFilebaru);

            return $namaFilebaru;
        } 

        // FUNGSI UBAH
        public function ubah($data) {

            $id = $data["id"];

            // Ambil data dari tiap elemen dari form
            // htmlspecialcharas agar tidak bisa input tag html / css pada input data
            $nama = htmlspecialchars($data["nama"]);
            $tgl_mulai = $data["tgl_mulai"];
            $tgl_selesai = $data["tgl_selesai"];
            $pendidikan = htmlspecialchars($data["pendidikan"]);
            $referral = htmlspecialchars($data["referral"]);
            $uname = $_SESSION["username"];
            $suratLama = htmlspecialchars($data["suratLama"]);

            // Cek apakah user pilih gambar baru atau tidak
            if ($_FILES["surat"]['error'] === 4) {
                $surat = $suratLama;
            } else {
                $surat = self::upload();
            }

            // Query Ubah data
            $query = "UPDATE mahasiswa SET
                        nama = '$nama',
                        tgl_mulai = '$tgl_mulai',
                        tgl_selesai = '$tgl_selesai',
                        pendidikan = '$pendidikan',
                        referral = '$referral',
                        surat = '$surat',
                        status = 'Menunggu'
                        WHERE id = $id;
                    ";
            mysqli_query($this->db, $query);

            return mysqli_affected_rows($this->db);
        }
    
    }

?>