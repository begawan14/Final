<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login - Kopi Kebun Baru</title>
    <style>
        /* Menggunakan font dan background yang sama dengan dashboard */
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

            /* -- TAMBAHAN UNTUK KE TENGAH LAYAR -- */
            display: flex;
            justify-content: center; /* Tengah horizontal */
            align-items: center;     /* Tengah vertikal *
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

        /* Desain kotak form login */
        .login-container {
            background-color: rgba(255, 255, 255, 0.95); /* Putih dengan sedikit transparan */
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .logo-login {
            height: 80px;
            margin-bottom: 10px;
        }

        .login-container h2 {
            color: brown; /* Mengikuti tema warna dashboard */
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box; /* Agar padding tidak melebihi lebar kotak */
        }

        /* Garis input berubah coklat saat diklik */
        .input-group input:focus {
            outline: none;
            border: 2px solid brown; 
        }

        /* Desain tombol sama persis dengan dashboard */
        .btn-login {
            background-color: brown;
            color: white;
            padding: 12px; 
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #8B0000; /* Coklat tua saat di-hover */
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Opsional: Menampilkan logo kafe di atas judul login -->
        <img src="assets/logo.jpg" alt="Logo Kopi Kebun Baru" class="logo-login" onerror="this.style.display='none'">
        
        <h2>Login Admin</h2>

        <!-- Form login sesuai dengan fungsi sistem Anda -->
        <form action='api/pengguna/ceklogin.php' method='POST'>
            <div class="input-group">
                <input name='username' type="text" placeholder='Username' required>
            </div>
            
            <div class="input-group">
                <input name='password' type="password" placeholder='Password' required>
            </div>
            
            <button type="submit" class="btn-login">LOGIN</button>
        </form>
    </div>

</body>
</html>