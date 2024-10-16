<?php

require "functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjaman Barangku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="navbar-header">
        <nav>
            <div class="navbar">
                <h1>Pinjaman Barangku</h1>
            </div>
        </nav>
    </header>
    
    <section>
        <div class="container">
            <div class="container-judul">
                <h2>Pencatatan Peminjaman Barang</h2>
                <a href="tambah_pinjaman.php">Tambah Pinjaman</a>
            </div>
            <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Peminjam</th>
                        <th>Barang</th>
                        <th>Foto Bukti</th>
                        <th colspan=2>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $tampil = tampil_pinjaman_barang();
                    $no=1;
                    foreach($tampil as $row):
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                        <td><?php echo $row['nama_peminjam']; ?></td>
                        <td><?php echo $row['barang']; ?></td>
                        <td><img src="image/<?php echo $row['foto']; ?>" alt="Foto Bukti"></td>
                        <td><a href="edit_pinjaman.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                        <td><a href="hapus_pinjaman.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Mau Hapus Data Pinjaman Ini???')">Hapus</a></td>
                    </tr>
                    <?php
                    $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 by Habib Husain Nurrohim. All rights reserved.</p>
    </footer>
</body>
</html>
