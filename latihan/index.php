<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$waktu_login = $_SESSION['login_time'];
if (time() - $waktu_login > 10) {
    session_destroy();
    header("Location: login.php?expired=1");
    exit;
}

$username = $_SESSION['username'];
$password = $_SESSION['password']; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>
</head>
<body>

<h2>Hallo <?php echo $username; ?> 👋,</h2>
<p>Selamat Datang Di Halaman Latihan Belajar Session dan User Authentication!</p>
<p>password anda adalah : <b><?php echo $password; ?></b></p>

<br>
<a href="logout.php">Logout</a>

</body>
</html>
