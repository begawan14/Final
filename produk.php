<?php
// Pastikan koneksi ke database sudah di-include jika belum ada di file utama
// include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - Kopi Kebun Baru</title>
    <style>
        /* Base Styling */
        * {
            box-sizing: border-box;
        }

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

        /* Header Layout */
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 20px;
            background-color: brown;
            color: white;
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
            transition: all 0.3s ease;
        }

        .btn-kembali:hover {
            background-color: white;
            color: brown;
        }

        /* Container & Table Layout */
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

         .btn-edit {
            background-color: #f39c12;
        }

        .btn-edit:hover {
            background-color: #d68910;
        }

        /* Custom Action Buttons (Opsional jika ingin digunakan) */
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

        .btn-hapus {
            background-color: #ff0000;
        }

        .btn-hapus:hover {
            background-color: #c0392b;
        }
        
    </style>
</head>
<body>

    <!-- Section Header -->
    <header class="header">
        <img src="assets/logo.jpg" alt="Logo Cafe" class="logo">
        <h1 class="nama-cafe">Kopi Kebun Baru</h1>
        <a href="dashboard.php" class="btn-kembali">Kembali</a>
    </header>
    <!-- Main Content Container -->
    <main class="container">
    <?php include("api/produk/selectproduk.php");
    ?>
        <table>
            <h1 style="text-align: center">DATA PRODUK</h1>
            <thead>
                <tr>
                    <th style="width: 8%;">No</th>
                    <th>Nama Produk</th>
                    <th style="width: 15%;">Stok</th>
                    <th style="width: 25%;">Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
        for ($i=0; $i < count($datas); $i++) {
            ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $datas[$i]['nama'] ?></td>
                <td><?php echo $datas[$i]['stok'] ?></td>
                <td><?php echo $datas[$i]['harga'] ?></td>
                <td>
                    <a href="editproduk.php?id=<?php echo $datas[$i]['id']; ?>" class="btn-aksi btn-edit">Edit</a>
                    <a href="api/produk/hapusproduk.php?id=<?php echo $datas [$i]['id']; ?>"onclick="return confirm('Apakah Anda yakin ingin menghapus Data ini?');" class="btn-aksi btn-hapus">Hapus</a>
                </td>
            </tr>
                <?php
            }
            ?>
            <a href="tambahproduk.php" class="btn-aksi btn-edit" style="float:right; ">Tambah</a>
        </table>
    </main>

</body>
</html>