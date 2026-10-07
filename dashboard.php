<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
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

        .btn-keluar {
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

        .btn-keluar:hover {
            background-color: white;
            color: brown;
        }

        
        .container-pesan {
            padding: 20px;
        }

        .pesan {
            text-align: center; 
            color: white; 
            background-color: rgba(0, 0, 0, 0.6); 
            padding: 10px 20px; 
            border-radius: 10px; 
            width: fit-content; 
            margin: 0 auto;
        }

    </style>
</head>
<body>
    
    <div class="header">
        <img src="assets/logo.jpg" alt="Logo Cafe" class="logo">
        <h1 class="nama-cafe">Kopi Kebun Baru</h1>
        <a href="index.php" class="btn-keluar" onclick="return confirm('Apakah Anda yakin ingin keluar?');">Keluar</a>
    </div>

    <div class="container-pesan">
        <!-- Teks 'Selamat Datang' disesuaikan agar lebih menyatu dengan background gelap -->
        <h2 class="pesan">
            Selamat Datang di Halaman Dashboard Kopi Kebun Baru
        </h2>
    </div>
    
    <div class="container-tombol">
        <button onclick="window.location.href='produk.php'">PRODUK</button>
    </div>
    <div class="container-tombol">
        <button onclick="window.location.href='pengguna.php'">PENGGUNA</button>
    </div>
    
</body>
</html>