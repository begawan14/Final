<?php 
include('koneksi.php');

$query="UPDATE pengguna SET nama =? , username=?, password=?, alamat=? , jenis_kelamin=? , noHP=? WHERE id =? ";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $noHP=$_POST['noHP'];
    $id=$_POST['id'];

    mysqli_stmt_bind_param($stmt, 'ssssssi' ,$nama, $username, $password, $alamat, $jenis_kelamin, $noHP, $id);

    if (mysqli_stmt_execute($stmt)){
        echo "<script>
                alert('Data berhasil di update');
                window.location.href = '../../pengguna.php';
                </script>";
    } else{
        echo "<script>
        alert('Data Gagal Ditambahkan');
        window.location.href = '../../editpengguna.php';
        </script>";
    } 
} else{
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}

?>