<?php
    session_start();
    require "Koneksi.php";
    if(isset($_POST['submit'])){
        $nama = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $jenis_akun = 'member';
        $query = mysqli_query($db, "SELECT * FROM akun_kapal WHERE username = '$nama'");
        if (mysqli_fetch_assoc($query)){
            echo "
            <script>
                alert('Username Telah di gunakan');
            </script>
            ";
        }else{
            if ($konfirmasi == $password){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = mysqli_query($db, "INSERT INTO akun_kapal (username, password, email, Role) VALUES ('$nama', '$password', '$email', '$jenis_akun') ");
                if ($query){
                    echo "
                    <script>
                        alert('Register Berhasil');
                    </script>
                    ";
                    header("location: Login.php");
                }
            }else{
                "<script>
                    alert('Password dan konfirmasi Password Berbeda');
                </script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/CSS" href="Styling/login.css">
</head>
<body>
<div class="container">
          <h1>Register</h1>
            <form action="" method="POST" class="login-email">
                <label>Username</label>
                <br>
                <input type="text" placeholder="Username" name="user">
                <br>
                <label>Email</label>
                <br>
                <input type="email" placeholder="Email" name="email">
                <br>
                <label>Password</label>
                <br>
                <input type="password" placeholder="Password" name="password">
                <br>
                <label>Cek Password</label>
                <br>
                <input type="password" placeholder="Ketik Ulang Password" name="konfirmasi">
                <button name="submit">Register</button>
                <p> Sudah punya akun?
                  <a href="Login.php">Login di sini</a>
                </p>
            </form>
        </div>
</body>
</html>