<?php
include('koneksi.php');

$query="UPDATE produk SET nama =? , harga=?, stok=? WHERE id =? ";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $stok=$_POST['stok'];
    $id=$_POST['id'];
    mysqli_stmt_bind_param($stmt,'siii',$nama, $harga, $stok, $id);

     if (mysqli_stmt_execute($stmt)){
        echo "<script>
                alert('Data berhasil di update');
                window.location.href = '../../produk.php';
                </script>";
    } else{
        echo "<script>
        alert('Data Gagal Ditambahkan');
        window.location.href = '../../editproduk.php';
        </script>";
    } 
} else{
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>