<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['login_time'] = time();

        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>

<h2>Halaman Login User yang Terdaftar!</h2>

<form method="POST">
    Username : <input type="text" name="username" required><br><br>
    Password : <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

<br>
<a href="register.php">Buat akun baru!</a>

</body>
</html>
