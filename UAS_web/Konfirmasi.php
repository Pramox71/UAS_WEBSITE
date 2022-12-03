<?php 
    session_start();
    require "Koneksi.php";
    $ID = $_GET['id'];
    $Jenis = $_GET['jenis'];
    $status = 'Lunas';
        $sql = "UPDATE transaksi SET Status = '$status' WHERE ID_kapal = '$ID'";
        $result = mysqli_query($db, $sql);
        if ($result){
            echo
            "<script>
            alert('Data Berhasil Di Update . . .');
            document.location.href = 'Admin.php';
            </script>";
        }else{
            echo"
                <script>
                    alert('Data Gagal Di Update . . .');
                    document.location.href = 'Konfirmasi_Hotel.php';
                </script>
            ";
        }

?>