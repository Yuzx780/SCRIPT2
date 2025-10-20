<?php
// ====================================================================
// BAGIAN 1: LOGIKA PEMROSESAN FORM PHP (Terletak di atas HTML)
// ====================================================================

$pesan_status = "";

// Cek apakah form sudah disubmit
if (isset($_POST['kirim'])) {
    // 1. Ambil data dari form
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $komentar = trim($_POST['komentar']);
    $tanggal = date("Y-m-d H:i:s");

    // 2. Validasi sederhana
    if (empty($nama) || empty($email) || empty($komentar)) {
        $pesan_status = '<div class="alert error">Mohon lengkapi semua kolom.</div>';
    } else {
        // --- 3. PROSES KE DATABASE (Jika Anda ingin menyimpan data) ---
        // Catatan: Bagian ini harus di-uncomment dan dikonfigurasi 
        // jika Anda benar-benar ingin menyimpan data ke database (MySQLi).

        /*
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "db_bukutamu"; 

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        if ($conn->connect_error) {
            $pesan_status = '<div class="alert error">Koneksi Database Gagal: ' . $conn->connect_error . '</div>';
        } else {
            // Prepared Statement untuk keamanan
            $stmt = $conn->prepare("INSERT INTO komentar (nama, email, komentar, tanggal) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nama, $email, $komentar, $tanggal);

            if ($stmt->execute()) {
                $pesan_status = '<div class="alert success"><b>✅ Sukses!</b> Terima kasih atas komentar dan saran Anda.</div>';
                // Kosongkan input setelah sukses
                $nama = $email = $komentar = ""; 
            } else {
                $pesan_status = '<div class="alert error">Gagal menyimpan data: ' . $stmt->error . '</div>';
            }

            $stmt->close();
            $conn->close();
        }
        */

        // Jika tidak menggunakan database, tampilkan pesan sukses simulasi
        if (empty($pesan_status)) {
            $pesan_status = '<div class="alert success"><b>✅ Sukses!</b> Data formulir berhasil diproses. (Database dinonaktifkan dalam demo ini)</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Komentar - BUKU TAMU</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 5px;
            font-size: 28px;
            text-align: center;
        }

        p.slogan {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            /* Jarak antar baris */
        }

        td {
            padding: 5px 0;
            vertical-align: top;
        }

        td:first-child {
            width: 120px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .buttons input[type="submit"],
        .buttons input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            margin-right: 10px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="reset"] {
            background-color: #6c757d;
            color: white;
        }

        input[type="reset"]:hover {
            background-color: #5a6268;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>FORM KOMENTAR & BUKU TAMU</h1>

        <p class="slogan">Komentar dan Saran Anda Sangat Kami Butuhkan Untuk Meningkatkan Kualitas Situs Kami.</p>

        <?php echo $pesan_status; // Tampilkan pesan status (sukses/gagal) 
        ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nama Anda</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama" value="<?php echo isset($nama) ? htmlspecialchars($nama) : ''; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Email Anda</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Komentar Anda</td>
                    <td>:</td>
                    <td>
                        <textarea name="komentar" rows="6" required><?php echo isset($komentar) ? htmlspecialchars($komentar) : ''; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="buttons">
                        <input type="submit" name="kirim" value="Kirim">
                        <input type="reset" name="batal" value="Batal">
                    </td>
                </tr>
            </table>
        </form>

    </div>

</body>

</html>