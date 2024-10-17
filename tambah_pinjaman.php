<?php

require "functions.php";


if(isset($_POST['nama_peminjam']) && $_POST['nama_peminjam'] !='')
{
    $nama_peminjam = $_POST['nama_peminjam'];
    $barang = $_POST['barang'];
    $foto = upload_pinjaman_barang();
    $sudah_belum = $_POST['sudah_belum'];
    $tanggal = $_POST['tanggal'];

    $tambah_peminjam = tambah_pinjaman_barang($nama_peminjam, $barang, $foto, $sudah_belum, $tanggal);
    
    if($tambah_peminjam)
    {
        echo "<script>
        alert('Data Berhasil di Tambah');
        window.location='index.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Gagal di Tambah');
        window.location='tambah_pinjaman.php';
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pinjaman Barang</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="box-judul">
        <h1>Tambah Pinjaman Barang</h1>
    </div>
    <div class="box">
        <div class="box-1">
            <form action="" method="POST" enctype="multipart/form-data">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" autofocus required>
                <label>Barang</label>
                <input type="text" name="barang" required>
                <label>Foto bukti</label>
                <input type="file" name="foto" required>
                <input type="text" name="sudah_belum" hidden value="Belum dikembalikan" required>
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
                <div class="button-container">
                <input type="submit" name="submit" value="Tambah">
                <a href="index.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>