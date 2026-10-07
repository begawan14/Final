<?php
include('koneksi.php');
$id=$_GET['id'];
$query="SELECT * FROM pengguna where id=? and del =0";
$stmt = mysqli_prepare($conn, $query);

if($stmt) {
    mysqli_stmt_bind_param($stmt, 'i',$id);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result)>0){
            $datas = array();
            while($row = mysqli_fetch_assoc($result)){
                $datas[] = $row;
            }
        } else{
            echo 'Data Kosong';
        }
    }else{
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
    }
} else {
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}

?>