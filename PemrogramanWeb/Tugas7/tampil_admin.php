<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login dan levelnya admin
if (!isset($_SESSION['level']) || $_SESSION['level'] != '2') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM identitas"; // Ambil semua data dari tabel identitas
$result = $conn->query($sql);

echo "<a href='tambah.php'>Tambah Data</a> | <a href='logout.php'>Logout</a>";
echo "<table border='1'>
<tr>
    <th>NPM</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>JK</th>
    <th>Tanggal Lahir</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['npm'] . "</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['alamat'] . "</td>
                <td>" . $row['jk'] . "</td>
                <td>" . $row['tgl_lhr'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>
                    <a href='edit.php?npm=" . $row['npm'] . "'>Edit</a> |
                    <a href='hapus.php?npm=" . $row['npm'] . "' onclick=\"return confirm('Yakin?');\">Hapus</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
}
echo "</table>";
?>
