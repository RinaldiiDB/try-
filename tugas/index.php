<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$remaining = 10 - (time() - $_SESSION['start_time']);

if ($remaining <= 0) {
    header("Location: logout.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <!-- Refresh halaman tiap 1 detik -->
    <meta http-equiv="refresh" content="1">
</head>
<body>

<h1>Selamat datang, <?php echo $_SESSION['user']; ?></h1>
<p>Kamu akan logout dalam <?php echo $remaining; ?> detik</p>

</body>
</html>
