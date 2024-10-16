<?php

require "functions.php";

$get_id = $_GET['id'];

    $delete = delete_pinjaman($get_id);

    if($delete)
    {
        echo "<script>
        alert('Data Berhasil di Hapus');
        window.location= 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Gagal di Hapus');
        window.location= 'index.php';
        </script>";
    }