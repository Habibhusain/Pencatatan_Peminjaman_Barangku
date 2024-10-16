# Pencatatan Peminjaman Barang

**Pencatatan Peminjaman Barang** adalah aplikasi berbasis web sederhana yang dibuat menggunakan PHP, CSS, dan SQLite. Aplikasi ini dirancang untuk mencatat barang-barang yang dipinjam dengan menyertakan nama peminjam, barang yang dipinjam, bukti dalam bentuk gambar, dan tanggal peminjaman. Pengguna dapat menambah, mengedit, atau menghapus data peminjaman dengan mudah.

## Fitur

1. **Melihat Catatan Peminjaman**:
   - Tabel yang menampilkan seluruh catatan peminjaman dengan kolom-kolom berikut:
     - **No**: Nomor urut catatan.
     - **Tanggal**: Tanggal peminjaman.
     - **Nama Peminjam**: Nama peminjam barang.
     - **Barang**: Barang yang dipinjam.
     - **Foto Bukti**: Gambar yang diunggah sebagai bukti.
     - **Aksi**: Tombol untuk mengedit atau menghapus catatan.

2. **Menambah Catatan Peminjaman**:
   - Formulir untuk menambah catatan peminjaman baru, meliputi:
     - **Nama Peminjam**: Mengisi nama orang yang meminjam barang.
     - **Barang**: Nama barang yang dipinjam.
     - **Foto Bukti**: Upload gambar sebagai bukti peminjaman.
     - **Tanggal**: Mengisi tanggal peminjaman barang.

3. **Mengedit Catatan Peminjaman**:
   - Mengedit data peminjaman yang sudah ada, termasuk memperbarui nama peminjam, barang, foto bukti, dan tanggal.

4. **Menghapus Catatan Peminjaman**:
   - Menghapus catatan peminjaman secara permanen dari sistem.

## Cara Penggunaan

1. **Melihat Catatan**:
   - Di halaman utama, tabel catatan peminjaman akan ditampilkan dengan semua detail terkait.
   - Anda dapat melihat data peminjam, barang yang dipinjam, dan gambar bukti.

2. **Menambah Catatan**:
   - Klik tombol "Tambah Pinjaman" untuk membuka formulir penambahan catatan.
   - Isi semua kolom yang diminta (Nama Peminjam, Barang, Foto Bukti, dan Tanggal).
   - Setelah selesai, klik "Tambah" untuk menyimpan catatan atau "Kembali" untuk kembali ke halaman utama tanpa menyimpan.

3. **Mengedit Catatan**:
   - Di tabel catatan, klik tombol hijau "Edit" pada catatan yang ingin diubah.
   - Edit informasi yang diperlukan dan klik "Update" untuk menyimpan perubahan atau "Kembali" untuk batal.

4. **Menghapus Catatan**:
   - Klik tombol merah "Hapus" untuk menghapus catatan peminjaman dari sistem.

## Teknologi yang Digunakan

- **Backend**: PHP
- **Database**: SQLite (database berbasis file yang ringan dan mudah digunakan)
- **Frontend**: CSS untuk gaya dan tata letak

## Struktur Proyek

- `index.php`: Halaman utama untuk melihat semua catatan peminjaman.
- `add.php`: Halaman untuk menambah catatan peminjaman baru.
- `edit.php`: Halaman untuk mengedit catatan peminjaman yang ada.
- `delete.php`: Fungsi untuk menghapus catatan peminjaman.
- `database.db`: File database SQLite yang menyimpan data peminjaman.

## Screenshot

### Halaman Utama Catatan Peminjaman
![Halaman Utama](/screenshoot/tampilan.png)

### Halaman Tambah Catatan Peminjaman
![Tambah Catatan](/screenshot/tambah.png)

### Halaman Edit Catatan Peminjaman
![Edit Catatan](/screenshot/edit.png)

## Lisensi

© 2024 oleh Habib Husain Nurrohim. Hak cipta dilindungi.
