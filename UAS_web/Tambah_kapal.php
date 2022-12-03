<?php
    session_start();
    require "Koneksi.php";
    if(isset($_POST['submit'])){
        $Kapal = $_POST['kapal'];
        $Daerah = $_POST['daerah'];
        $Tujuan = $_POST['tujuan'];
        $Harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $cek = explode('.', $gambar);
        $extensi = strtolower(end($cek));
        $gambar_new = "$Kapal.$extensi";
        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, 'Kapal_img/'.$gambar_new)){
            $sql = "INSERT INTO kapal VALUES ('', '$Kapal', '$Daerah', '$Tujuan','$Harga', '$gambar_new')";
            $result = mysqli_query($db, $sql);
            if ($result){
                echo
                "<script>
                alert('Data Berhasil Di Tambahkan . . .');
                document.location.href = 'Admin.php';
                </script>";
            }else{
                echo"
                    <script>
                        alert('Data Gagal Di Tambahkan . . .');
                        document.location.href = 'Tambah.php';
                    </script>
                ";
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
    <title>Tambah Hotel</title>
    <link rel="stylesheet" type="text/CSS" href="Styling/crud.css">
</head>
<body>
<nav>
    <div class="layar-dalam">
      <div class="logo">
        <a href=""><img src="asset/Traveling.png" class="hitam"/></a>
      </div>
      <div class="menu">
        <a href="#" class="tombol-menu">
          <span class="garis"></span>
          <span class="garis"></span>
          <span class="garis"></span>
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><?php
            if (isset($_SESSION['username'])){
              echo "<a href='Logout.php'>Log Out</a>";
            }else{
              echo "<a href='Login.php'>Log In</a>";
            }
          ?></li>
          <li><?php
                if ($_SESSION['priv'] == 'ADMIN') {
                    echo("<a href='Admin.php'>Kelola Data</a>");
                }else if($_SESSION['priv'] == 'member'){
                    echo("<a href='user.php'>Data Diri</a>");
                }
                ?>
          </li>
          <?php
          if (isset($_SESSION['username'])){
            $user = $_SESSION['username'];
            $query = mysqli_query($db, "SELECT * FROM akun_kapal WHERE username = '$user'");
            if ($nama_user = mysqli_fetch_assoc ($query)){
              echo "<li><a href='#'>$user</a></li>";}
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="layar-penuh">
    <div class="tampilan">
    <img src="asset/Bg_kapal.png">
    <div class="container">
            <h1>Tambah Bus</h1>
                <form action="" method="POST" class="login-email" enctype="multipart/form-data">
                    <label>Kapal</label>
                    <br>
                    <input type="text" placeholder="Nama Kapal" name="kapal" require>
                    <br>
                    <label>Pelabuhan</label>
                    <br>
                    <input type="text" placeholder="Pelabuhan" name="daerah" require>
                    <br>
                    <label>Tujuan Kapal</label>
                    <br>
                    <input type="text" placeholder="Tujuan Kapal" name="tujuan" require>
                    <label>Harga Tiket</label>
                    <br>
                    <input type="number" placeholder="Rp. xx.xxx" name="harga" require>
                    <label>Gambar Kapal</label>
                    <br>
                    <input type="file" name="gambar" accept="img/*" required>
                    <button name="submit">Tambah Data</button>
                </form>
            </div>
    </div>
    <footer id="contact">
      <div class="layar-dalam">
        <div><h5>Info</h5>
          Informasi lebih lanjut mengenai pengembangan WebSite ini dapat menghubungi mahasiswa Web yang terkait.
        </div>
        <div><h5>Contact</h5>
          Jika ada yang ingin disampaikan kalian dapat menghubungi Kami melalui email berikut ini Data_kapal@gmail.com
        </div>
        <div><h5>Help</h5>
          Perlu Bantuan? Silahkan hubungi kami di call center berikut 085346816962 atau kirim email ke Data_kapal@gmail.com.
        </div>
      </div>
      <div class="layar-dalam">
        <div class="copy">
        © Copyright, Dhimas Pramudya T. Kelas B'21 Universitas Mulawarman
        </div>
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>
</html>