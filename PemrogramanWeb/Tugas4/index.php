<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Form Tugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: auto;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Form Input Mahasiswa</h2>

    <form action="process.php" method="POST" onsubmit="return validateForm()">
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" rows="3" required></textarea>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" required>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="hobi">Hobi:</label>
        <input type="text" id="hobi" name="hobi" required>

        <input type="submit" value="Submit">
    </form>

    <script>
        function validateForm() {
            const npm = document.getElementById('npm').value;
            const nama = document.getElementById('nama').value;
            if (npm === '' || nama === '') {
                alert('NPM dan Nama wajib diisi!');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
