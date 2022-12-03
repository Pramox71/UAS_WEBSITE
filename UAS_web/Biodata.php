<?php
    session_start();
    require "Koneksi.php";
    $ID = $_SESSION['ID'];
    $cek = mysqli_query($db, "SELECT * FROM biodata WHERE ID_User = $ID");
    if (mysqli_num_rows($cek)==0){
        if(isset($_POST['submit'])){
        $Nama = $_POST['nama'];
        $Umur = $_POST['umur'];
        $Alamat = $_POST['alamat'];
        $Hp = $_POST['HP'];
        $sql = "INSERT INTO biodata VALUES ('$ID', '$Nama', '$Umur', '$Alamat', '$Hp')";
        $result = mysqli_query($db, $sql);
            if ($result){
                echo
                "<script>
                alert('Data Berhasil Di Tambahkan . . .');
                document.location.href = 'index.php';
                </script>";
            }
            else{
                echo"
                    <script>
                        alert('Data Gagal Di Tambahkan . . .');
                        document.location.href = 'datadiri.php';
                    </script>
                ";
            }
        }
    }else{
        $data = [];
        while ($row = mysqli_fetch_assoc($cek)){
            $data[] = $row;    
          }
          $data_1 = $data[0];
          if(isset($_POST['submit'])){
            $Nama = $_POST['nama'];
            $Umur = $_POST['umur'];
            $Alamat = $_POST['alamat'];
            $Hp = $_POST['HP'];
            $sql = "UPDATE biodata SET Nama = '$Nama',
            Umur = '$Umur',
            Alamat = '$Alamat',
            No_Hp = '$Hp'";
            $result = mysqli_query($db, $sql);
                if ($result){
                    echo
                    "<script>
                    alert('Data Berhasil Di Update . . .');
                    document.location.href = 'Biodata.php';
                    </script>";
                }
                else{
                    echo"
                        <script>
                            alert('Data Gagal Di Update . . .');
                            document.location.href = 'Biodata.php';
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
                    echo("<a href='Biodata.php'>Data Diri</a>");
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
    <img src="asset/Biodata.png">
    <div class="container">
            <h1>Data Pengguna</h1>
                <form action="" method="POST" class="login-email">
                    <label>Nama Pengguna</label>
                    <br>
                    <input type="text" placeholder="<?php if (mysqli_num_rows($cek)==0){echo'Nama';}else{echo $data_1['Nama'];} ?>" value="<?php if (mysqli_num_rows($cek)==0){echo'';}else{echo $data_1['Nama'];} ?>"name="nama"  require>
                    <br>
                    <label>Umur</label>
                    <br>
                    <input type="text" placeholder="<?php if (mysqli_num_rows($cek)==0){echo'Umur';}else{echo $data_1['Umur'];} ?>" value="<?php if (mysqli_num_rows($cek)==0){echo'';}else{echo $data_1['Umur'];} ?>" name="umur" require>
                    <br>
                    <label>Alamat</label>
                    <br>
                    <input type="text" placeholder="<?php if (mysqli_num_rows($cek)==0){echo'Alamat';}else{echo $data_1['Alamat'];} ?>" value="<?php if (mysqli_num_rows($cek)==0){echo'';}else{echo $data_1['Alamat'];} ?>" name="alamat" require>
                    <br>
                    <label>No Telepon</label>
                    <br>
                    <input type="number" placeholder="<?php if (mysqli_num_rows($cek)==0){echo'No. Hp';}else{echo $data_1['No_Hp'];} ?>" value="<?php if (mysqli_num_rows($cek)==0){echo'';}else{echo $data_1['No_Hp'];} ?>" name="HP" require>
                    <br>
                    <button name="submit">Simpan Data</button>
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
</body>
</html>