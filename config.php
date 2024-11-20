<?php
// Mendefinisikan konstanta untuk nama database
DEFINE("DB_ADD", "db_pinjaman.sqlite");

function database() {
    $db = new SQLite3(DB_ADD);
    
    // Mengecek apakah database berhasil dibuka
    if (!$db) {
        echo $db->lastErrorMsg();
        exit();
    } else {
        // echo 'Data Berhasil';
    }
    return $db;
}

function buat_table() {
    $db = database();

    // Membuat tabel jika belum ada
    $table = $db->exec("CREATE TABLE IF NOT EXISTS peminjaman_barang 
    (id INTEGER PRIMARY KEY AUTOINCREMENT, 
    nama_peminjam TEXT NOT NULL,
    barang TEXT NOT NULL, 
    foto TEXT NOT NULL, 
    sudah_belum TEXT NOT NULL, 
    tanggal TEXT NOT NULL )");

    if (!$table) {
        echo $db->lastErrorMsg(); // Jika ada kesalahan dalam pembuatan tabel
    } else {
        // echo "Tabel berhasil dibuat atau sudah ada.";
    }

    return $table;
}

// Memanggil fungsi buat_table untuk memastikan tabel dibuat
buat_table();
