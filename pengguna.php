<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGGUNA</title>
    
<style>    
         body {
            /* Ubah krim.jpg menjadi coffee.jpg di sini */
            background-image: url('assets/coffee.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed;       
            background-position: center; /* Tambahan agar posisi gambar di tengah */
            margin: 0; 
            font-family: Arial, sans-serif;
            color: white; 
            
            /* -- TAMBAHAN UNTUK MEMBUAT GELAP -- */
            position: relative; /* Penting untuk pseudo-element */
            min-height: 100vh;
        }

        /* Pseudo-element untuk overlay gelap */
        body::before {
            content: "";
            position: fixed; /* Menutupi seluruh layar */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Warna hitam dengan opasitas 50% (0.5) */
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: -1; /* Tempatkan di belakang konten, tapi di depan background image body */
        }

        .container-tombol {
            display: flex;
            justify-content: center; 
            margin-top: 20px;
        }

      
        button {
            background-color: brown;
            color: white;
            padding: 10px 30px; 
            font-size: 16px;
            font-weight: bold;
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
        }

        /* Menengahkan judul tabel */
        .judultabel {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 15px;
            
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            margin: 40px auto;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: brown;
            color: white;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 20px;
            
            
            background-color: brown; 
        }

        .logo {
            position: absolute;
            left: 20px; 
            height: 60px; 
        }

        .nama-cafe {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            
        }
        .tabel tr {
            color: black;
        }

        .btn-kembali {
            position: absolute;
            right: 20px;
            background-color: transparent;
            color: white;
            border: 2px solid white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-kembali:hover {
            background-color: white;
            color: brown;
        }

                /* Styling umum tombol aksi */
        .btn-aksi {
            display: inline-block;
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            margin: 2px;
            transition: background-color 0.2s;
        }

        /* Tombol Edit (Warna Kuning/Oranye) */
        .btn-edit {
            background-color: #f39c12;
        }

        .btn-edit:hover {
            background-color: #d68910;
        }

        /* Tombol Hapus (Warna Merah) */
        .btn-hapus {
            background-color: #ff0000;
        }

        .btn-hapus:hover {
            background-color: #c0392b;
        }
        
    </style>
</head>
<body>
    

<div class="header">
        <img src="assets/logo.jpg" alt="Logo Cafe" class="logo">
        <h1 class="nama-cafe">Kopi Kebun Baru</h1>
        <a href="dashboard.php" class="btn-kembali">Kembali</a>
    </div>
    <div class='container'>
        <p class='judultabel'>Daftar Pengguna</p>
   <?php
    include("api/pengguna/selectpengguna.php");
   ?>
   <table class='tabel'>
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Username</th>
        <th>alamat</th>
        <th>jenis_kelamin</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>
        <?php
        for ($i=0; $i < count($datas); $i++) {
            ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $datas[$i]['nama'] ?></td>
                <td><?php echo $datas[$i]['username'] ?></td>
                <td><?php echo $datas[$i]['alamat'] ?></td>
                <td><?php echo $datas[$i]['jenis_kelamin'] ?></td>
                <td><?php echo $datas[$i]['noHP'] ?></td>
                <td>
                    <a href="editpengguna.php?id=<?php echo $datas [$i]['id']; ?>" class="btn-aksi btn-edit">Edit</a>
                   
                    <a href="api/pengguna/hapuspengguna.php?id=<?php echo $datas [$i]['id']; ?>"onclick="return confirm('Apakah Anda yakin ingin menghapus Data ini?');" class="btn-aksi btn-hapus">Hapus</a>
                </td>
            </tr>
                <?php
            }
        ?>
        <a href="tambahpengguna.php" class="btn-aksi btn-edit" style="float:right; ">Tambah</a>
        </table>
</body>
</html>