<?php

require "config.php";

// Define table name
DEFINE("TABLE_PEMINJAMAN", "peminjaman_barang");

// Fungsi untuk menampilkan data pinjaman barang
function tampil_pinjaman_barang() {
    $db = database();

    $tampil_pinjaman_barang = "SELECT * FROM " . TABLE_PEMINJAMAN;
    $tampil_pinjaman = $db->prepare($tampil_pinjaman_barang);
    $tampil = $tampil_pinjaman->execute();

    $pinjaman_barang = [];
    while ($row = $tampil->fetchArray()) { 
        $pinjaman_barang[] = $row;
    }

    return $pinjaman_barang;
}

// Fungsi untuk mengunggah file foto
function upload_pinjaman_barang() {
    $ambil_ukuran_file = $_FILES['foto']['size'];
    $ukuran_diizinkan = 10000000; // 10 MB

    if ($ambil_ukuran_file > $ukuran_diizinkan) {
        echo 'Ukuran file maksimal 10 MB!';
        exit();
    }

    $ambil_nama_file = $_FILES['foto']['name'];
    $ambil_extensi_file = pathinfo($ambil_nama_file, PATHINFO_EXTENSION);
    $extensi_diizinkan = ['jpg', 'jpeg', 'png', 'svg', 'avif', 'JPG'];

    if (in_array($ambil_extensi_file, $extensi_diizinkan)) {
        $ambil_tmp_file = $_FILES['foto']['tmp_name'];
        $tujuan_folder = "image/";
        $target_file = $tujuan_folder . basename($ambil_nama_file);

        $foto_file = move_uploaded_file($ambil_tmp_file, $target_file);

        if ($foto_file) {
            return $ambil_nama_file;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Fungsi untuk menambah pinjaman barang
function tambah_pinjaman_barang($nama_peminjam, $barang, $foto,$sudah_belum, $tanggal) {
    $db = database();

    $tambah_pinjaman_barang = "INSERT INTO " . TABLE_PEMINJAMAN . " (nama_peminjam, barang, foto,sudah_belum, tanggal) VALUES (:nama_peminjam, :barang, :foto, :sudah_belum, :tanggal)";
    $tambah_pinjaman = $db->prepare($tambah_pinjaman_barang);

    // Mengikat nilai ke parameter
    $tambah_pinjaman->bindValue(':nama_peminjam', $nama_peminjam);
    $tambah_pinjaman->bindValue(':barang', $barang);
    $tambah_pinjaman->bindValue(':foto', $foto);
    $tambah_pinjaman->bindValue(':sudah_belum', $sudah_belum);
    $tambah_pinjaman->bindValue(':tanggal', $tanggal);

    return $tambah_pinjaman->execute();
}

// Fungsi untuk memperbarui data pinjaman barang
function update_pinjaman_barang($get_id, $get_nama_peminjam, $get_barang, $get_foto,$get_sudah_belum, $get_tanggal) {
    $db = database();

     // Ambil data pinjaman sebelumnya
     $existing_data = ambil_pinjaman_barang($get_id);

     // Cek apakah ada gambar baru yang diunggah
     if ($_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
         // Jika tidak ada file baru yang diunggah, gunakan gambar lama
         $get_foto = $existing_data['foto'];
     } else {
         // Jika ada gambar baru, unggah dan ganti dengan yang baru
         $get_foto = upload_pinjaman_barang();
         if (!$get_foto) {
             echo "Gagal mengunggah foto.";
             exit();
         }
     }
     
    $update_pinjaman_barang = "UPDATE " . TABLE_PEMINJAMAN . " SET nama_peminjam = :nama_peminjam, barang = :barang, foto = :foto, sudah_belum = :sudah_belum, tanggal = :tanggal WHERE id = :id";
    $update_pinjaman = $db->prepare($update_pinjaman_barang);

    $update_pinjaman->bindValue(':nama_peminjam', $get_nama_peminjam);
    $update_pinjaman->bindValue(':barang', $get_barang);
    $update_pinjaman->bindValue(':foto', $get_foto);
    $update_pinjaman->bindValue(':sudah_belum', $get_sudah_belum);
    $update_pinjaman->bindValue(':tanggal', $get_tanggal);
    $update_pinjaman->bindValue(':id', $get_id);

    return $update_pinjaman->execute();
}

// Fungsi untuk mengambil data pinjaman barang berdasarkan ID
function ambil_pinjaman_barang($get_id) {
    $db = database();

    $ambil_pinjaman_barang = "SELECT * FROM " . TABLE_PEMINJAMAN . " WHERE id = :id";
    $ambil_pinjaman = $db->prepare($ambil_pinjaman_barang);
    $ambil_pinjaman->bindValue(':id', $get_id);

    $result = $ambil_pinjaman->execute();
    return $result->fetchArray();
}

// Fungsi untuk menghapus data pinjaman barang
function delete_pinjaman($get_id) {
    $db = database();

    $delete_pinjaman_barang = "DELETE FROM " . TABLE_PEMINJAMAN . " WHERE id = :id";
    $delete_pinjaman = $db->prepare($delete_pinjaman_barang);
    $delete_pinjaman->bindValue(':id', $get_id);

    return $delete_pinjaman->execute();
}
