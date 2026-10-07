<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Edit Produk</title>

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

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column; /* Menyusun input secara vertikal ke bawah */
            box-sizing: border-box;
        }

        .judul {
            color: #333;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .inputuser {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        .inputuser:focus {
            border-color: brown;
        }

        /* Tombol */
        .tombol {
            width: 100%;
            background-color: brown;
            color: white;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .tombol:hover {
            background-color: #5c1d1d;
        }

    </style>
</head>
<body>
    
    <div class="header">
        <img src="assets/logo.jpg" alt="Logo Cafe" class="logo">
        <h1 class="nama-cafe">Kopi Kebun Baru</h1>
        <a href="produk.php" class="btn-kembali">Kembali</a>
    </div>

    <div class='main'>
        <?php 
        include("api/produk/selectproduk.php");
        ?>

        <form action="api/produk/updateproduk.php" method="post">
            <div class="card">
                <p class="judul">Form Edit Produk</p>

                <input name='nama' class="inputuser" type="text" placeholder="Nama Produk" value='<?php echo $datas[0]['nama']?>'/>
                <input name='harga' class="inputuser" type="integer" placeholder="Harga" value='<?php echo $datas[0]['harga']?>'/>
                <input name='stok' class="inputuser" type="integer" placeholder="Stok" value='<?php echo $datas[0]['stok']?>'/>
                <input hidden name='id' class="inputuser" type="text" placeholder="ID Produk" value='<?php echo $datas[0]['id']?>'/>
                <button class="tombol">Edit Produk</button>
            </div>
        </form>
    </div>
    
    

</body>
</html>