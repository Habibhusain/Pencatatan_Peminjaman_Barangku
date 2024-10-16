<?php

require "functions.php";

$get_id = $_GET ['id'];

if(isset($_POST['nama_peminjam']) && $_POST['nama_peminjam'] !='')
{
    $get_nama_peminjam = $_POST['nama_peminjam'];
    $get_barang = $_POST['barang'];
    $get_foto = $_POST['foto'];
    $get_tanggal = $_POST['tanggal'];

    $update = update_pinjaman_barang($get_id, $get_nama_peminjam, $get_barang, $get_foto, $get_tanggal);

    if($update)
    {
        echo "<script>
        alert('Data Berhasil di Edit');
        window.location='index.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Gagal di Edit');
        window.location='edit_pinjaman.php';
        </script>";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pinjaman Barang</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content-judul">
        <h1>Edit Pinjaman Barang</h1>
    </div>
    <div class="content edit-content">
        <div class="content-1">
            <form action="edit_pinjaman.php?id=<?php echo ambil_pinjaman_barang($get_id)['id']; ?>" method="POST" enctype="multipart/form-data">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" value="<?php echo ambil_pinjaman_barang($get_id)['nama_peminjam']; ?>" required>
                <label>Barang</label>
                <input type="text" name="barang" value="<?php echo ambil_pinjaman_barang($get_id)['barang']; ?>" required>
                <label>Foto bukti</label>
                <input type="file" name="foto" value="<?php echo ambil_pinjaman_barang($get_id)['foto']; ?>" required>
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="<?php echo ambil_pinjaman_barang($get_id)['tanggal']; ?>" required>
                <div class="button-content">
                    <input type="submit" name="submit" value="Update">
                    <a href="index.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>