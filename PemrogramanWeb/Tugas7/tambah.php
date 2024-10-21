<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['level']) || $_SESSION['level'] != '2') {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $sql = "INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) VALUES ('$npm', '$nama', '$alamat', '$jk', '$tgl_lhr', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: tampil_admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label>NPM: </label><input type="text" name="npm" required><br>
    <label>Nama: </label><input type="text" name="nama" required><br>
    <label>Alamat: </label><input type="text" name="alamat" required><br>
    <label>JK: </label><input type="text" name="jk" required><br>
    <label>Tanggal Lahir: </label><input type="date" name="tgl_lhr" required><br>
    <label>Email: </label><input type="email" name="email" required><br>
    <input type="submit" value="Tambah Data">
</form>
