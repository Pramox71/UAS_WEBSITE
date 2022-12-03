<?php
    session_start();
    date_default_timezone_set('asia/kuala_lumpur');
    require "Koneksi.php";
    $ID = $_SESSION['ID'];
    $ID_kapal = $_GET['id'];
    $waktu = date("l d-m-y - H:i:s");    
    $biaya = $_GET['harga'];
    $cek = mysqli_query($db, "SELECT * FROM biodata WHERE ID_User = $ID");
    if (mysqli_num_rows($cek)==0){
        echo
            "<script>
            alert('Isi BioData Terlebih Dahulu. . .');
            document.location.href = 'Biodata.php';
            </script>";
    }else{
        $sql = "INSERT INTO transaksi VALUES ('', '$ID', '$ID_kapal', '$biaya', 'Belum Lunas', '$waktu')";
        $result = mysqli_query($db, $sql);
        if ($result){
            echo
            "<script>
            alert('Data Transaksi Di Tambahkan . . .');
            document.location.href = 'index.php';
            </script>";
        }
        else{
            echo"
                <script>
                    alert('Data Gagal Di Tambahkan . . .');
                    document.location.href = 'Pemesanan.php';
                </script>
            ";
        }
    }
?>