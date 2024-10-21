<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['npm'])) {
    header("Location: index.php");
    exit();
}

// Proses input data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_SESSION['npm']; // Ambil NPM dari session
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    // Cek apakah identitas dengan NPM ini sudah ada di database
    $check_sql = "SELECT * FROM identitas WHERE npm='$npm'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 0) {
        // Jika identitas belum ada, insert data baru
        $sql = "INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) VALUES ('$npm', '$nama', '$alamat', '$jk', '$tgl_lhr', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Identitas berhasil ditambahkan!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Identitas sudah ada, tidak bisa menambahkan lagi.";
    }
}
?>

<form method="POST" action="">
    <label>Nama: </label><input type="text" name="nama" required><br>
    <label>Alamat: </label><input type="text" name="alamat" required><br>
    <label>Jenis Kelamin (L/P): </label><input type="text" name="jk" required><br>
    <label>Tanggal Lahir: </label><input type="date" name="tgl_lhr" required><br>
    <label>Email: </label><input type="email" name="email" required><br>
    <input type="submit" value="Simpan Identitas">
</form>
