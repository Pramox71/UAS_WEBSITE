<?php 
    session_start(); 
    require "Koneksi.php";
    $result = mysqli_query($db, "SELECT ID_Kapal, Nama_Kapal AS nama, Pelabuhan AS alamat, Tujuan AS daerah, Harga, Foto_kapal AS Gambar FROM kapal");
    $kapal = [];
    while ($row = mysqli_fetch_assoc($result)){
      $kapal[] = $row;    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/admin.css">
    <title>Pesan</title>
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
          <li><a href="index.php#aboutus">About Us</a></li>
          <li><a href="index.php#gallery">Gallery</a></li>
          <li><a href="index.php#team">Team</a></li>
          <li><a href="index.php#blog">Blog</a></li>
          <li><a href="index.php#contact">Contact</a></li>
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
                    echo("<a href='biodata.php'>Data Diri</a>");
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
      <div class="posisi">
        <div class="card">
        <a href="Pesan_kapal.php" class="btn-order">
            <div class="btn-block">
              Pesan Kapal
            </div>
          </a>
          <a href="Riwayat_kapal.php" class="btn-order">
            <div class="btn-block">
              Riwayat Pesan Kapal
            </div>
          </a>
        </div>
      </div>
    </div>
    <footer id="contact">
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