<?php
include('koneksi.php');

$query="UPDATE pengguna SET del =1, dtm=NOW() WHERE id =?";

$stmt = mysqli_prepare($conn, $query);

if ($stmt){
    $id=$_GET['id'];

    mysqli_stmt_bind_param($stmt,'i',$id);

    if(mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data berhasil di Hapus');
                window.location.href = '../../pengguna.php';
                </script>";
    } else{
        echo "<script>
        alert('Data Gagal dihapus');
        window.location.href = '../../pengguna.php';
        </script>";
    } 
} else{
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>