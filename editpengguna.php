<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>

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
        
        /* Header */
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

        /* Container Card Form */
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

        /* Input Fields */
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
        <a href="pengguna.php" class="btn-kembali">Kembali</a>
    </div>
    
    <div class='main'>
        <?php 
        include("api/pengguna/selectonepengguna.php");
        ?>

        <form action="api/pengguna/updatepengguna.php" method="post">
            <div class="card">
                <p class="judul">Form Edit Pengguna</p>

                <input name='nama' class="inputuser" type="text" placeholder="Nama Pengguna" value='<?php echo $datas[0]['nama']?>'/>
                <input name='username' class="inputuser" type="text" placeholder="Username" value='<?php echo $datas[0]['username']?>'/>
                <input name='password' class="inputuser" type="password" placeholder="Password" value='<?php echo $datas[0]['password']?>'/>
                <input name='alamat' class="inputuser" type="text" placeholder="Alamat" value='<?php echo $datas[0]['alamat']?>'/>
                <select name="jenis_kelamin" class="inputuser" id=""> 
                <option value="" disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki" <?php echo ($datas[0]['jenis_kelamin']== 'Laki-laki') ? 'selected':''?>>Laki-Laki</option>
                <option value="Perempuan"<?php echo ($datas[0]['jenis_kelamin']== 'Perempuan') ? 'selected':''?>>Perempuan</option>
                </select>
                <input name='noHP' class="inputuser" type="text" placeholder="Nomor HP" value='<?php echo $datas[0]['noHP']?>'/>
                <input hidden name='id' class="inputuser" type="text" placeholder="ID" value='<?php echo $datas[0]['id']?>'/>
                <button class="tombol">Edit Pengguna</button>
            </div>
        </form>
    </div>

</body>
</html>