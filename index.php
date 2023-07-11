<!DOCTYPE html>
<html>
<head>
    <title>Proyek PHP - Input Data</title>
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
        <h1 class="text-center mt-5">Form Input Data</h1>

        <?php
        // Membuat ID acak 5 angka
        $random_id = rand(10000, 99999);
        ?>

        <form action="insert.php" method="POST" class="mt-5">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" id="id" class="form-control" value="<?php echo $random_id; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <input type="submit" value="Simpan Data" class="btn btn-primary">
        </form>
    </div>

    <!-- Data Pengguna -->
    <div class="container mt-5">
        <h3 class="text-center">Data Pengguna</h3>
        <table class="table table-striped table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>

                <?php
                require 'koneksi.php';
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                        echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                }

                $conn->close();
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>
