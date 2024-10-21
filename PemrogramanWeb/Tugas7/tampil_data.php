<?php
session_start();
if ($_SESSION['level'] != '1') {
    header("Location: index.php"); // Redirect if not a regular user
}

$npm = $_SESSION['npm'];
$conn = new mysqli('localhost', 'root', '', 'mhs');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM identitas WHERE npm='$npm'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "NPM: " . $row["npm"] . "<br>";
        echo "Name: " . $row["nama"] . "<br>";
        echo "Alamat: " . $row["alamat"] . "<br>";
        echo "Jenis Kelamin: " . $row["jk"] . "<br>";
        echo "Tanggal Lahir: " . $row["tgl_lhr"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
    }
} else {
    echo "No data found.";
}
$conn->close();
?>
