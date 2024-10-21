<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['level']) || $_SESSION['level'] != '2') {
    header("Location: index.php");
    exit();
}

$npm = $_GET['npm'];
$sql = "SELECT * FROM identitas WHERE npm='$npm'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $sql = "UPDATE identitas SET nama='$nama', alamat='$alamat', jk='$jk', tgl_lhr='$tgl_lhr', email='$email' WHERE npm='$npm'";
    if ($conn->query($sql) === TRUE) {
        header("Location: tampil_admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label>Nama: </label><input type="text" name="nama" value="<?= $row['nama'] ?>" required><br>
    <label>Alamat: </label><input type="text" name="alamat" value="<?= $row['alamat'] ?>" required><br>
    <label>JK: </label><input type="text" name="jk" value="<?= $row['jk'] ?>" required><br>
    <label>Tanggal Lahir: </label><input type="date" name="tgl_lhr" value="<?= $row['tgl_lhr'] ?>" required><br>
    <label>Email: </label><input type="email" name="email" value="<?= $row['email'] ?>" required><br>
    <input type="submit" value="Update Data">
</form>
