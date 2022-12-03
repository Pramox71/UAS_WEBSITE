<?php session_start(); 
    if ($_SESSION['priv'] != 'ADMIN'){
      header("Location: ../");
    }
    require "Koneksi.php";
    
    $result = mysqli_query($db, "SELECT * FROM transaksi JOIN biodata ON biodata.ID_User=transaksi.ID_User JOIN kapal ON kapal.ID_Kapal=transaksi.ID_kapal");
    $bus = [];
    while ($row = mysqli_fetch_assoc($result)){
      $bus[] = $row;    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/Konfirm.css">
    <title>Kelola Data</title>
</head>
<body>
<nav>
    <div class="layar-dalam">
      <div class="logo">
        <a href=""><img src="asset/Kapal.png" class="hitam"/></a>
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
        <div class="posisi">
          <?php foreach ($bus as $data):?>
          <div class="card">
            <div class="img-card">
              <img src="Kapal_img/<?= $data['Foto_kapal'];?>" class ="img"/>
            </div>
            <div class="content-text">
              <h2><?php echo $data['Nama_Kapal'];?></h2>
              <h2>Pemesan : <?php echo $data['Nama'];?><h2>
              <h2>Status  : <?php echo $data['Status'];?></h2>
              <h2 class="harga">Rp. <?php echo number_format($data['Biaya'],0,'.','.');?></h2>
              <small class="alamat"><?php echo $data['Pelabuhan'];echo' Tujuan '; echo $data['Tujuan'];?></small>
              <br>
              <div class="btn-block">
                <a href="Konfirmasi.php?id=<?php echo $data['ID_kapal'];?> class="btn-order">Konfirmasi</a>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>
</html>