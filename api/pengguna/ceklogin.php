<?php
include('koneksi.php');

$query="SELECT * FROM pengguna where del = 0 and username =? and password = ?";
$stmt = mysqli_prepare($conn, $query);



if ($stmt) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    mysqli_stmt_bind_param($stmt,'ss',$username,$password);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result)>0){
            //$datas = array();
            //while($row = mysqli_fetch_assoc($result)){
            //    $datas[]=$row;
                //echo 'nama'. $row['nama']. '<br>';
            //}
            //echo json_encode(['STATUS'=>'BERHASIL', 'PESAN'=>'','DATA'=>$datas], JSON_PRETTY_PRINT);
            //header("location:../../dashboard.php");
            echo "<script>
            alert('Selamat datang');
            window.location.href='../../dashboard.php';
            </script>";
            //echo " ada data";
            }else{
            // echo 'Data Kosong';
            //echo json_encode(['STATUS'=>'GAGAL','PESAN'=>'DATA KOSONG','DATA'=>[]]);
            //header("location:../../index.php");
            //echo "kosong bg";
            echo "<script>
            alert('Username dan password salah');
            window.location.href='../../index.php';
            </script>";
            }
    } else {
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
    }

} else {
echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>