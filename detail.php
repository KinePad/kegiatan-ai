<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan</title>
</head>
<body>
    <h1>Detail Kegiatan</h1>

    <?php
    // Ambil judul dari URL
    if (isset($_GET['judul'])) {
        $judulDicari = urldecode($_GET['judul']);
        
        // Baca file kegiatan.txt untuk mencari deskripsi berdasarkan judul
        if (file_exists('kegiatan.txt')) {
            $file = fopen('kegiatan.txt', 'r');
            $found = false;

            while ($line = fgets($file)) {
                list($judul, $deskripsi) = explode('|', $line);
                if ($judul == $judulDicari) {
                    echo "<h2>Judul: $judul</h2>";
                    echo "<p>Deskripsi: $deskripsi</p>";
                    $found = true;
                    break;
                }
            }
            fclose($file);

            if (!$found) {
                echo "<p>Kegiatan tidak ditemukan!</p>";
            }
        } else {
            echo "<p>File kegiatan.txt tidak ditemukan!</p>";
        }
    } else {
        echo "<p>Judul tidak diberikan!</p>";
    }
    ?>

    <a href="index.php">Kembali ke Daftar Kegiatan</a>
</body>
</html>
