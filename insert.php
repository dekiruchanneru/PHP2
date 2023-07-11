<?php
require 'koneksi.php';

// Mendapatkan data dari formulir
$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];

// Memeriksa apakah data yang sama sudah ada di database
$check_sql = "SELECT * FROM users WHERE nama='$nama' AND email='$email'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    // Data yang sama ditemukan, tampilkan pesan kesalahan
    $pesan = "Data dengan nama dan email yang sama sudah ada.";
} else {
    // Data belum ada, simpan data baru
    $sql = "INSERT INTO users (id, nama, email) VALUES ('$id', '$nama', '$email')";

    if ($conn->query($sql) === TRUE) {
        $pesan = "Data berhasil disimpan.";
    } else {
        $pesan = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Proyek PHP - Hasil Penyimpanan Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            background-image: url('https://w7.pngwing.com/pngs/1012/665/png-transparent-sky-cloud-blue-blue-background-s-text-computer-wallpaper-color.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.7); /* Putih transparan */
            border-radius: 10px;
            padding: 20px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5"><?php echo $pesan; ?></h1>
        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-primary">Kembali ke Form Input</a>
        </div>
    </div>
</body>
</html>
