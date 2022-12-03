<?php
require 'Koneksi.php';

$ID = $_GET['id'];
$Jenis =$_GET['jenis'];
if($Jenis == 'kapal'){
    $result = mysqli_query($db, "DELETE FROM kapal WHERE ID_Kapal = $ID");
}

if ($result) {
    header('location: Admin.php');
}else{
    echo "
    <script>
    allert('Data Gagal di Hapus');
    document.location.href = 'Admin.php?id=$ID';
    </script>";
}
?>  