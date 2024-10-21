<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // Using sha1 for encryption

    $conn = new mysqli('localhost', 'root', '', 'mhs');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['level'] = $user['level'];
        $_SESSION['npm'] = $user['npm'];

        if ($user['level'] == '1') {
            header("Location: tampil_data.php"); // Redirect regular user
        } else if ($user['level'] == '2') {
            header("Location: tampil_admin.php"); // Redirect admin
        }
    } else {
        echo "Login failed. Invalid username or password.";
    }
    $conn->close();
}
?>

<!-- Login form -->
<form method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <input type="submit" value="Login">
</form>
