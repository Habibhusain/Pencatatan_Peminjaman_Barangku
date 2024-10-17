<?php

require "functions.php";

$get_id = $_GET['id'];

// Ambil data pinjaman berdasarkan ID dari database
$pinjaman = ambil_pinjaman_barang($get_id);

if (isset($_POST['nama_peminjam']) && $_POST['nama_peminjam'] != '') {
    $get_nama_peminjam = $_POST['nama_peminjam'];
    $get_barang = $_POST['barang'];
    $get_foto = $pinjaman['foto']; // Gunakan foto lama sebagai default

    // Jika ada file yang diunggah, lakukan pengunggahan
    if ($_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
        $upload_foto = upload_pinjaman_barang();
        if ($upload_foto) {
            $get_foto = $upload_foto; // Ganti foto lama dengan yang baru jika ada
        }
    }

    // Pengecekan apakah variabel 'sudah_belum' di POST
    $get_sudah_belum = isset($_POST['sudah_belum']) ? $_POST['sudah_belum'] : $pinjaman['sudah_belum'];

    $get_tanggal = $_POST['tanggal'];

    // Update data pinjaman
    $update = update_pinjaman_barang($get_id, $get_nama_peminjam, $get_barang, $get_foto, $get_sudah_belum, $get_tanggal);

    if ($update) {
        echo "<script>
        alert('Data Berhasil di Edit');
        window.location='index.php';
        </script>";
    } else {
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
            <form action="edit_pinjaman.php?id=<?php echo $pinjaman['id']; ?>" method="POST" enctype="multipart/form-data">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" value="<?php echo $pinjaman['nama_peminjam']; ?>" required>
                <label>Barang</label>
                <input type="text" name="barang" value="<?php echo $pinjaman['barang']; ?>" required>
                <img src="image/<?php echo $pinjaman['foto']; ?>" alt="Foto Bukti" width="100">
                <input type="file" name="foto">
                <small>Biarkan kosong jika tidak ingin mengganti foto</small>
                <label>Sudah/Belum dikembalikan</label>
                <div class="select-wrapper">
                    <select name="sudah_belum">
                        <option value="Sudah dikembalikan" <?php echo ($pinjaman['sudah_belum'] == 'Sudah dikembalikan') ? 'selected' : ''; ?>>Sudah dikembalikan</option>
                        <option value="Belum dikembalikan" <?php echo ($pinjaman['sudah_belum'] == 'Belum dikembalikan') ? 'selected' : ''; ?>>Belum dikembalikan</option>
                    </select>
                </div>
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="<?php echo $pinjaman['tanggal']; ?>" required>
                <div class="button-content">
                    <input type="submit" name="submit" value="Update">
                    <a href="index.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
