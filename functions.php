<?php
require "config.php";

// Define table name
DEFINE("TABLE_PEMINJAMAN", "peminjaman_barang");

// Fungsi untuk menampilkan data pinjaman barang
function tampil_pinjaman_barang() {

    $tampil_pinjaman_barang = "SELECT * FROM " . TABLE_PEMINJAMAN;
    $tampil_pinjaman = database()->query($tampil_pinjaman_barang);

    $tampil = [];
    while($row = $tampil_pinjaman->fetchArray()) {
        $tampil[]=$row;
    }

    return $tampil;
}

// Fungsi untuk mengunggah file foto
function upload_pinjaman_barang() {
    $ambil_ukuran_file = $_FILES['foto']['size'];
    $ukuran_diizinkan = 10000000; // 10 MB

    if ($ambil_ukuran_file > $ukuran_diizinkan) {
        echo 'Ukuran file maksimal 10 MB!';
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

    $tambah_pinjaman_barang = "INSERT INTO " . TABLE_PEMINJAMAN . " (nama_peminjam, barang, foto,sudah_belum, tanggal) VALUES ('$nama_peminjam', '$barang', '$foto', '$sudah_belum', '$tanggal')";
    $tambah_pinjaman = database()->query($tambah_pinjaman_barang);
   

    return $tambah_pinjaman;
}

// Fungsi untuk memperbarui data pinjaman barang
function update_pinjaman_barang($get_id, $nama_peminjam, $barang, $foto,$sudah_belum, $tanggal) {
     
    $update_pinjaman_barang = "UPDATE " . TABLE_PEMINJAMAN . " SET nama_peminjam = '$nama_peminjam', barang = '$barang', foto = '$foto', sudah_belum = '$sudah_belum', tanggal = '$tanggal' WHERE id = '$get_id'";
    $update_pinjaman = database()->query($update_pinjaman_barang);

    return $update_pinjaman;
}

// Fungsi untuk mengambil data pinjaman barang berdasarkan ID
function ambil_pinjaman_barang($get_id) {

    $ambil_pinjaman_barang = "SELECT * FROM " . TABLE_PEMINJAMAN . " WHERE id = '$get_id'";
    $ambil_pinjaman = database()->query($ambil_pinjaman_barang);

    $result = $ambil_pinjaman;
    return $result->fetchArray();
}

// Fungsi untuk menghapus data pinjaman barang
function delete_pinjaman($get_id) {

    $delete_pinjaman_barang = "DELETE FROM " . TABLE_PEMINJAMAN . " WHERE id = '$get_id'";
    $delete_pinjaman = database()->query($delete_pinjaman_barang);

    return $delete_pinjaman;
}
