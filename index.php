<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
    <link rel="stylesheet" href="style.css"> <!-- Opsional untuk CSS styling -->
</head>
<body>
    <h1>Daftar Kegiatan</h1>

    <!-- Form untuk menambahkan kegiatan -->
    <form action="tambah.php" method="POST">
        <label for="judul">Judul Kegiatan:</label>
        <input type="text" id="judul" name="judul" required><br>

        <label for="deskripsi">Deskripsi Kegiatan:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" required></textarea><br>

        <button type="submit">Tambahkan Kegiatan</button>
    </form>

    <h2>Daftar Kegiatan:</h2>
    <ul>
        <?php
        // Cek apakah file kegiatan.txt ada
        if (file_exists('kegiatan.txt')) {
            // Baca file kegiatan.txt
            $file = fopen('kegiatan.txt', 'r');
            while ($line = fgets($file)) {
                // Setiap baris format: judul|deskripsi
                list($judul, $deskripsi) = explode('|', $line);
                echo "<li><a href='detail.php?judul=" . urlencode($judul) . "'>$judul</a></li>";
            }
            fclose($file);
        } else {
            echo "<li>Belum ada kegiatan yang ditambahkan.</li>";
        }
        ?>
    </ul>
</body>
</html>
