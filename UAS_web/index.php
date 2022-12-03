<?php session_start(); 
 require "Koneksi.php";
 ?>
<script>if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Styling/style.css">
  <?php
            if (!isset($_SESSION['username'])) {
                $_SESSION['priv'] ='default';
            }
        ?>
  <title>Travel</title>
</head>
<body>
  <nav>
    <div class="layar-dalam">
      <div class="logo">
        <a href=""><img src="asset/Traveling (1).png" class="putih"/></a>
        <a href=""><img src="asset/Traveling.png" class="hitam"/></a>
      </div>
      <div class="menu">
        <a href="#" class="tombol-menu">
          <span class="garis"></span>
          <span class="garis"></span>
          <span class="garis"></span>
        </a>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#aboutus">About Us</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
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
          <li><?php
                if ($_SESSION['priv'] == 'member') {
                  echo("<a href='Pemesanan.php'>Pesan</a>");
                }
                ?>
          </li>
          <li>
          <?php
          if (isset($_SESSION['username'])){
            $user = $_SESSION['username'];
            $query = mysqli_query($db, "SELECT * FROM akun_kapal WHERE username = '$user'");
            if ($nama_user = mysqli_fetch_assoc ($query)){
              echo "<a href='#'>$user</a>";}
            }
          ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="layar-penuh">
    <header id="home">
      <video autoplay muted loop>
        <source src="asset/video-indonesia.mp4">
      </video>
      <div class="intro">
        <h3>Visit Indonesia</h3>
        <p>
          Informasi Lebih Lanjut dapat diakses dengan mengklik tombol berikut
        </p>
        <p>
          <a href="" class="tombol">
            MORE INFO
          </a>
        </p>
      </div>
    </header>
    <main>
      <section id = "aboutus">
        <div class="layar-dalam">
          <h3>About Us</h3>
          <p class="ringkasan">
            WebSite ini merupakan sebuah project akhir dari sebuah praktikum <br> dan di kerjakan oleh sekelompok mahasiswa yang berasal dari Universitas Mulawarman.
          </p>
          <div class="konten-isi">
            <p>
              WebSite ini mengambil tema dari sebuah applikasi Traveloka yang memungkinkan pengguna untuk berlibur ke berbagai daerah hanya dengan mengklik sebuah tombol pesan pada layar kaca smartphone masing-masing.
            </p>
          </div>
        </div>
      </section>
      <section id="gallery">
          <div><img src="asset/foto1.jpg" /></div>
          <div><img src="asset/foto2.jpg" /></div>
          <div><img src="asset/foto3.jpg" /></div>
          <div><img src="asset/foto4.jpg" /></div>
          <div><img src="asset/foto5.jpg" /></div>
          <div><img src="asset/foto6.jpg" /></div>
          <div><img src="asset/foto7.jpg" /></div>
          <div><img src="asset/foto8.jpg" /></div>
        </section>
      <section class="quote">
        <div class="layar-dalam">
          <p>Pekerjaan Menjadi Mudah, Bila Tidak Di kerjakan.</p>
        </div>
      </section>
      <section id ="team">
        <div class="layar-dalam">
          <h3>Our Man</h3>
          <p class="ringkasan">Project UAS WebSite Semester 3</p>
          <div class="tim">
            <div>
              <img src="asset/tim1.jpg" />
              <h6>Dhimas Pramudya Tridharma</h6>
              <span>2109106071</span>
            </div>
          </div>
        </div>
      </section>
      <section id="blog" class="abu" >
        <div class="layar-dalam">
          <h3>Lastest Blog</h3>
          <p class="ringkasan">
            Akhir Kata Dari WebSite yang kami buat, kurang lebih nya <br> kami mohon maaf atas segala kekurangan, dari segi fitur maupun dari segi pelayanan yang kami berikan. <br> Terima Kasih
          </p>
          <div class="blog">
            <div class="area">
              <div class="gambar" style="background-image:url('asset/blog1.jpg');"></div>
              <div class="text">
                <article>
                  <h4><a href="#">What About Bromo?</a></h4>
                  <p>Gunung Bromo adalah salah satu gunung api yang masih aktif di Indonesia. Gunung yang memiliki ketinggian 2.392 meter di atas permukaan laut ini merupakan destinasi andalan Jawa Timur.</p>
                </article>
              </div>
            </div>
            <div class="area">
              <div class="gambar" style="background-image:url('asset/blog2.jpg');"></div>
              <div class="text">
                <article>
                  <h4><a href="#">What About Yogyakarta?</a></h4>
                  <p>Yogyakarta merupakan sebuah daerah istimewa dalam Negara Kesatuan Republik Indonesia yang masih mempertahankan tata pemerintahan berbentuk kesultanan dalam pemerintahan daerahnya.</p>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
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
  <script src="javascript.js"></script>
</body>
</html>