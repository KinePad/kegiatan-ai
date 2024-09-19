<?php
// Ambil data dari form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

// Simpan data ke file kegiatan.txt
$file = fopen('kegiatan.txt', 'a'); // Mode 'a' untuk append data baru di akhir file
fwrite($file, $judul . '|' . $deskripsi . "\n");
fclose($file);

// Arahkan kembali ke halaman utama
header('Location: index.php');
exit();
?>
