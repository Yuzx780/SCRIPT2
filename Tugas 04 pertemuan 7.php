<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tugas 04 - Perhitungan Rumus</title>
    <style>
        /* CSS untuk Penampilan */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            padding: 30px;
            background-color: #f4f4f4;
        }

        .container {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .box {
            border: 1px solid #ccc;
            padding: 15px;
            width: 300px;
            min-height: 180px;
            margin-top: 10px;
        }

        .input-group {
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 80px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 150px;
            padding: 5px;
            border: 1px solid #aaa;
        }

        .radio-group {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .output-line {
            margin: 5px 0;
        }

        button {
            padding: 8px 15px;
            margin-right: 10px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }

        strong {
            font-weight: 700;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Tampilan Input</h2>
        <div class="box">
            <h3>Rumus - Rumus</h3>
            <div class="input-group">
                <label for="nilai1">Nilai 1</label>
                <input type="text" id="nilai1" placeholder="Masukkan angka">
            </div>
            <div class="input-group">
                <label for="nilai2">Nilai 2</label>
                <input type="text" id="nilai2" placeholder="Masukkan angka">
            </div>

            <div class="radio-group">
                <input type="radio" id="segitiga" name="rumus" value="Segitiga" checked>
                <label for="segitiga">Segitiga</label><br>
                <input type="radio" id="persegipanjang" name="rumus" value="Persegi Panjang">
                <label for="persegipanjang">Persegi Panjang</label>
            </div>

            <button onclick="hitungRumus()">Hitung</button>
            <button onclick="batalInput()">Batal</button>
        </div>
    </div>

    <div class="container">
        <h2>Tampilan Output</h2>
        <div class="box">
            <h3>HASIL HITUNG RUMUS</h3>
            <div id="output-area">
                <p class="output-line" style="color: gray;">Silakan masukkan nilai dan klik Hitung.</p>
            </div>
        </div>
    </div>

    <script>
        function hitungRumus() {
            // 1. Ambil Nilai Input (dari ID)
            const nilai1Str = document.getElementById('nilai1').value.trim();
            const nilai2Str = document.getElementById('nilai2').value.trim();

            const outputArea = document.getElementById('output-area');
            let outputHTML = '';

            // --- Pengecekan Validasi Awal ---

            // Cek apakah ada input yang kosong (seperti yang disarankan oleh ketentuan soal: "Jika Nilai 1 dan 2 terisi nilai maka...")
            if (nilai1Str === "" || nilai2Str === "") {
                outputHTML = '<p style="color: red;"><strong>ERROR:</strong> Nilai 1 dan Nilai 2 harus diisi!</p>';
                outputArea.innerHTML = outputHTML;
                return;
            }

            // Konversi ke angka (wajib menggunakan parseFloat untuk perhitungan)
            const nilai1 = parseFloat(nilai1Str);
            const nilai2 = parseFloat(nilai2Str);

            // Cek apakah input valid sebagai angka
            if (isNaN(nilai1) || isNaN(nilai2)) {
                outputHTML = '<p style="color: red;"><strong>ERROR:</strong> Input harus berupa angka!</p>';
                outputArea.innerHTML = outputHTML;
                return;
            }

            // Dapatkan pilihan rumus yang dicentang
            const rumusElement = document.querySelector('input[name="rumus"]:checked');
            const rumusDipilih = rumusElement ? rumusElement.value : 'Tidak Ditemukan';

            let hasilPerhitungan = 0;

            // --- 2. Validasi Ketentuan Soal ---

            // Ketentuan 1: Jika Nilai 1 dan 2 = 0 maka tidak ada hasil perhitungan
            if (nilai1 === 0 && nilai2 === 0) {
                outputHTML = '<p class="output-line" style="color: orange;"><strong>Tidak ada hasil perhitungan</strong> (Nilai 1 dan Nilai 2 bernilai 0)</p>';
            }
            // Ketentuan 2: Jika Nilai 1 dan 2 terisi (dan bukan 0, karena kondisi 0 sudah ditangkap di atas)
            else {
                // Lakukan Perhitungan berdasarkan pilihan
                if (rumusDipilih === 'Segitiga') {
                    // Rumus Segitiga: (1/2 * (nilai 1 * nilai 2))
                    hasilPerhitungan = 0.5 * (nilai1 * nilai2);
                } else if (rumusDipilih === 'Persegi Panjang') {
                    // Rumus Persegi Panjang: (nilai 1 * nilai 2)
                    hasilPerhitungan = nilai1 * nilai2;
                }

                // Susun Tampilan Output
                outputHTML = `
                    <p class="output-line">Nilai a adalah = <strong>${nilai1}</strong></p>
                    <p class="output-line">Nilai b adalah = <strong>${nilai2}</strong></p>
                    <p class="output-line">Rumus Yang Dipilih adalah = <strong>${rumusDipilih}</strong></p>
                    <p class="output-line" style="font-size: 1.2em; color: green;">Hasil Perhitungan Rumus = <strong>${hasilPerhitungan}</strong></p>
                `;
            }

            // 3. Tampilkan Hasil
            outputArea.innerHTML = outputHTML;
        }

        // Fungsi untuk tombol Batal/Reset
        function batalInput() {
            // Kosongkan input
            document.getElementById('nilai1').value = '';
            document.getElementById('nilai2').value = '';

            // Reset pilihan radio ke Segitiga (default)
            document.getElementById('segitiga').checked = true;

            // Bersihkan/reset area output
            document.getElementById('output-area').innerHTML = '<p class="output-line" style="color: gray;">Input telah dibatalkan. Silakan masukkan nilai baru.</p>';
        }
    </script>

</body>

</html>