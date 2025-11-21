<?php
session_start();

// Array username dan password kosong di awal
if (!isset($_SESSION['usernames'])) {
    $_SESSION['usernames'] = [];
}
if (!isset($_SESSION['passwords'])) {
    $_SESSION['passwords'] = [];
}

// Tambah username
if (isset($_POST['add_username'])) {
    $u = trim($_POST['new_username']);
    if ($u != "") {
        $_SESSION['usernames'][] = $u;
    }
}

// Tambah password
if (isset($_POST['add_password'])) {
    $p = trim($_POST['new_password']);
    if ($p != "") {
        $_SESSION['passwords'][] = $p;
    }
}

// Proses login
if (isset($_POST['login'])) {
    $u = trim($_POST['username']);
    $p = trim($_POST['password']);

    if (in_array($u, $_SESSION['usernames']) && in_array($p, $_SESSION['passwords'])) {
        $_SESSION['user'] = $u;
        $_SESSION['start_time'] = time();
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password belum terdaftar!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Tambahkan Username!</h2>
<form method="POST">
    <input type="text" name="new_username">
    <button name="add_username">Tambah Username</button>
</form>

<h2>Tambahkan Password!</h2>
<form method="POST">
    <input type="text" name="new_password">
    <button name="add_password">Tambah Password</button>
</form>

<h2>Silahkan Login!</h2>

<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button name="login">Login</button>
</form>

</body>
</html>
