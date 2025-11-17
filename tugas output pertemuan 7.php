<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Tampilan Output</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .output-box {
            border: 1px solid black;
            padding: 20px;
            width: 400px;
            margin: 20px auto;
            text-align: left;
        }
        h1 {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <?php
        // 1. Definisikan nilai input
        $nilai_a = 5; // Nilai A
        $nilai_b = 6; // Nilai B
        $rumus_dipilih = "Persegi Panjang"; // Rumus yang dipilih

        // 2. Lakukan perhitungan (Luas Persegi Panjang = a * b)
        $hasil_perhitungan = $nilai_a * $nilai_b;
    ?>

    <h1>Tampilan Output</h1>

    <div class="output-box">
        <h2>HASIL HITUNG RUMUS</h2>
        <hr>
        <p>Nilai a adalah = **<?php echo $nilai_a; ?>**</p>
        <p>Nilai b adalah = **<?php echo $nilai_b; ?>**</p>
        <p>Rumus Yang Dipilih adalah = **<?php echo $rumus_dipilih; ?>**</p>
        <p>Hasil Perhitungan Rumus = **<?php echo $hasil_perhitungan; ?>**</p>
    </div>

</body>
</html>