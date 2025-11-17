<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Luas Bangun Datar Sederhana</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        h2 {
            text-align: left;
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 0;
            margin-bottom: 15px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-group input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Agar padding tidak menambah lebar */
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
            /* Styling untuk meniru tampilan radio button di gambar */
        }

        .radio-group {
            margin-bottom: 20px;
        }

        .button-group button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            min-width: 80px;
        }

        .button-group button:first-child {
            background-color: #007bff;
            /* Biru */
            color: white;
        }

        .button-group button:last-child {
            background-color: #6c757d;
            /* Abu-abu/Batal */
            color: white;
        }

        #hasil-area {
            padding-top: 10px;
            border-top: 1px solid #eee;
            margin-top: 20px;
        }

        #hasil {
            font-weight: normal;
            color: #007bff;
            font-size: 1.2em;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Tampilan Input</h2>
        <div class="card">
            <h3>Rumus - Rumus</h3>
            <form id="calculatorForm">
                <div class="input-group">
                    <label for="nilai1">Nilai 1</label>
                    <input type="number" id="nilai1" placeholder="Masukkan angka" required>
                </div>
                <div class="input-group">
                    <label for="nilai2">Nilai 2</label>
                    <input type="number" id="nilai2" placeholder="Masukkan angka" required>
                </div>

                <div class="radio-group">
                    <input type="radio" id="segitiga" name="bentuk" value="segitiga" checked>
                    <label for="segitiga">Segitiga</label><br>

                    <input type="radio" id="persegipanjang" name="bentuk" value="persegipanjang">
                    <label for="persegipanjang">Persegi Panjang</label>
                </div>

                <div class="button-group">
                    <button type="button" onclick="hitungLuas()">Hitung</button>
                    <button type="reset" onclick="clearResult()">Batal</button>
                </div>
            </form>

            <div id="hasil-area">
                <h4>Luas yang Dihitung: <span id="nama-bangun"></span></h4>
                <h4>Hasil: <span id="hasil"></span></h4>
            </div>
        </div>
    </div>

    <script>
        function hitungLuas() {
            // 1. Ambil nilai dari input
            const nilai1 = parseFloat(document.getElementById('nilai1').value);
            const nilai2 = parseFloat(document.getElementById('nilai2').value);

            const hasilElement = document.getElementById('hasil');
            const namaBangunElement = document.getElementById('nama-bangun');

            // 2. Cek apakah input valid (angka dan terisi)
            if (isNaN(nilai1) || isNaN(nilai2) || nilai1 <= 0 || nilai2 <= 0) {
                alert("Masukkan angka yang valid dan positif.");
                hasilElement.textContent = "Input tidak valid";
                namaBangunElement.textContent = "";
                return;
            }

            // 3. Ambil pilihan bangun datar yang dipilih
            const bentuk = document.querySelector('input[name="bentuk"]:checked').value;

            let luas;
            let nama;

            // 4. Lakukan perhitungan berdasarkan bentuk
            if (bentuk === 'segitiga') {
                // Luas Segitiga: 0.5 * alas * tinggi
                luas = 0.5 * nilai1 * nilai2;
                nama = `Segitiga (Alas ${nilai1}, Tinggi ${nilai2})`;
            } else if (bentuk === 'persegipanjang') {
                // Luas Persegi Panjang: panjang * lebar
                luas = nilai1 * nilai2;
                nama = `Persegi Panjang (P ${nilai1}, L ${nilai2})`;
            } else {
                luas = "Pilihan tidak valid";
                nama = "";
            }

            // 5. Tampilkan hasil
            hasilElement.textContent = luas.toFixed(2); // Menampilkan 2 angka di belakang koma
            namaBangunElement.textContent = nama;
        }

        // Fungsi untuk membersihkan area hasil ketika tombol Batal ditekan
        function clearResult() {
            // Sedikit penundaan agar tombol reset HTML sempat bekerja
            setTimeout(() => {
                document.getElementById('hasil').textContent = "";
                document.getElementById('nama-bangun').textContent = "";
            }, 50);
        }
    </script>
</body>

</html>