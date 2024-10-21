<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['level']) || $_SESSION['level'] != '2') {
    header("Location: index.php");
    exit();
}

$npm = $_GET['npm'];
$sql = "DELETE FROM identitas WHERE npm='$npm'";

if ($conn->query($sql) === TRUE) {
    header("Location: tampil_admin.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
