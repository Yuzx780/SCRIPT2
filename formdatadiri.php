<html>

<head>
    <title>Masukkan Data</title>
</head>

<body>
    <h1>Masukkan Identitas Anda</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <pre>
Isikan Nama
: <input type="text" name="nama"/>
Isikan No Telepon: <input type="text" name="telp"/></td>
Isikan Alamat
: <textarea name="alamat" rows="5" cols="40"></textarea>
<input type="submit" value="Tampil"/><input type="reset" value="Batal"/></td><tr>
</pre>
    </form>
    <?php
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    if (!empty($nama)) {
        echo "Nama : $nama <br>";
    }
    if (!empty($telp)) {
        echo "No Telepon: $telp <br>";
    }
    if (!empty($alamat)) {
        echo "Alamat: $alamat";
    }
    ?>
</body>

</html>