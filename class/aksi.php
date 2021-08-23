<?php 

class aksi extends config {
    
    // Fungsi untuk menjembatani query milik parent dan class ini
    public function parentquery($q) {
        return parent::query($q);
    }

    // FUNGSI HAPUS
    public function hapus($id) {

        $uname = $_SESSION["username"];
        mysqli_query($this->db, "DELETE FROM pengaju WHERE id = $id AND username='$uname'");
    
        return mysqli_affected_rows($this->db);
    }
    

    public function tolak($id) {

        $query = "UPDATE pengaju SET status='Tertolak'  WHERE id = $id";
        mysqli_query($this->db, $query);
    
        return mysqli_affected_rows($this->db);
    }

    public function konfirmasi($id) {

        $query = "UPDATE pengaju SET status='Terkonfirmasi'  WHERE id = $id";
        mysqli_query($this->db, $query);
    
        return mysqli_affected_rows($this->db);
    }
}


?>