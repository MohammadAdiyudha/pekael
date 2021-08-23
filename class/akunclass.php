<?php 

    class akunclass extends config {
        public function registrasi ($data) {

            // stripslashes menghilangkan backslash
            $username = strtolower ( stripslashes ($data ["username"]));
            // mysqli_real_escape_string untuk membolehkan petik pada pass
            $password = mysqli_real_escape_string($this->db, $data["password"]);
            $password2 = mysqli_real_escape_string($this->db, $data["password2"]);
    
            // Cek username sudah ada atau belum
            $result = mysqli_query($this->db, "SELECT username FROM user WHERE username ='$username' ");
            if (mysqli_fetch_assoc($result)) {
                echo "<script> alert('Username sudah terdaftar'); </script>";
                return false;
            }
    
            // Cek konfirmasi pass
            if ( $password !== $password2) {
                echo "<script>
                        alert('Konfirmasi password tidak sesuai');
                    </script>";
                return false;
            }
    
            // Enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);
    
    
            // Tambah ke database
            mysqli_query($this->db, "INSERT INTO user VALUES ('','$username','$password','user')");
    
            return mysqli_affected_rows($this->db);
        }

        public function login(){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $result = mysqli_query ($this->db, "SELECT * FROM user WHERE username='$username'");

            // cek username (kalau ketemu dapet nilai 1)
            if (mysqli_num_rows($result) === 1) {
                
                // cek password
                $row = mysqli_fetch_assoc($result);
                
                if($row['level']=="admin") {
                    if (password_verify($password, $row["password"])) {
                        // set session
                        $_SESSION["username"] = $username;
                        $_SESSION["level"] = "admin";


                        header("Location: ../Admin/dashboard.php");
                        exit;
                    }
                } else if($row['level']=="user") {
                    if (password_verify($password, $row["password"])) {
                        // set session
                        $_SESSION["username"] = $username;
                        $_SESSION["level"] = "user";

                        header("Location: ../user/dashboard.php");
                        exit;
                    }
                } else {
                    header("Location: login.php");
                    exit;
                }
                    
            } else {
                echo "<script>
                    alert ('Username / Password Salah');
                </script>";
            }

        }
    }
    


?>