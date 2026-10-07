<?php 
include('koneksi.php');

$query="INSERT INTO pengguna (nama, username, password, alamat, jenis_kelamin, noHP) VALUES (?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $noHP=$_POST['noHP'];

    mysqli_stmt_bind_param($stmt, 'ssssss' ,$nama, $username, $password, $alamat, $jenis_kelamin, $noHP);

    if (mysqli_stmt_execute($stmt)){
        echo "<script>
                alert('Data berhasil Ditambahkan');
                window.location.href = '../../pengguna.php';
                </script>";
    } else{
        echo "<script>
        alert('Data Gagal Ditambahkan');
        window.location.href = '../../tambahpengguna.php';
        </script>";
    } 
} else{
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}

?>