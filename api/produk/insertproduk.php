<?php 
include('koneksi.php');

$query="INSERT INTO produk (nama, harga, stok) VALUES (?,?,?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $stok=$_POST['stok'];

    mysqli_stmt_bind_param($stmt, 'sii' ,$nama, $harga, $stok);

    if (mysqli_stmt_execute($stmt)){
        echo "<script>
                alert('Data berhasil Ditambahkan');
                window.location.href = '../../produk.php';
                </script>";
    } else{
        echo "<script>
        alert('Data Gagal Ditambahkan');
        window.location.href = '../../tambahproduk.php';
        </script>";
    } 
} else{
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}

?>