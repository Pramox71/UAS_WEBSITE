<?php 
    session_start();
    require "Koneksi.php";
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $query = mysqli_query($db, "SELECT * FROM akun_kapal WHERE username = '$user' or email = '$user'");
        $result = mysqli_fetch_assoc($query);
        $username = $result['username'];
        $akun = $result['Role'];
        $ID = $result['ID'];
        if (password_verify($password, $result['Password'])){
            $_SESSION['username'] = $user;
            $_SESSION['ID'] = $ID;
            $_SESSION['priv'] = $akun;
            echo "
            <script>
                alert('Selamat Datang $username');
                document.location.href='index.php'
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Username dan Password Salah');
            </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/Login.css">
    <title>Login Traveling</title>
</head>
<body>
    <section class="Back">
        <div class="container">
            <h1>Login</h1>
                <form action="" method="POST" class="login-email">
                    <label>Username or Email</label><br>
                    <input type="text" placeholder="Username or Email" name="user" require><br>
                    <label>Password</label><br>
                    <input type="password" placeholder="Password" name="password" require><br>
                    <button type="submit" name="submit" value="Login">Log in</button>
                </form>
            <p>apakah anda belum mempunyai akun? <a href="Register.php" style="text-decoration:none">Daftar</a></p>    
        </div>
    </section>
</body>
</html>
</html>