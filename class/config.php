<?php 
class config 
{
    public $db ="";

    public function __construct(){
        $this->db = mysqli_connect("localhost", "root", "", "pekael");
        if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

    protected function query ($query) {
        $result = mysqli_query($this->db, $query); // Full lemari
        $rows = []; // Buat wadah (beda dengan row dibawah)
        while ( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows; // Kembalikan kotak
    }
    
}
?>