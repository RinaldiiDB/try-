<?php
include "koneksi.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password != $konfirmasi) {
        echo "<script>alert('Konfirmasi password tidak sama!');</script>";
    } else {
        $query = "INSERT INTO user(username, password) VALUES('$username', '$password')";
        mysqli_query($koneksi, $query);

        echo "<script>alert('Registrasi berhasil!');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
</head>
<body>
    <h2>Halaman Registrasi Akun Mahasiswa</h2>

    <form method="POST">
        Username : <input type="text" name="username"><br><br>
        Password : <input type="password" name="password"><br><br>
        Konfirmasi Password : <input type="password" name="konfirmasi"><br><br>
        <input type="submit" name="register" value="Register">
    </form>

    <br>
    <a href="login.php">Sudah memiliki akun?</a>
</body>
</html>
