<?php
session_start();
include "db.php";

$greska = "";
$error = "";

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $rez = $conn->query("SELECT * FROM users WHERE username='$username'");

    if ($rez->num_rows === 1) {
        $user = $rez->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: index.php");
            } else {
                header("Location: pregled.php");
            }
            exit;
        } else {
            $error = "Pogrešna lozinka.";
        }
    } else {
        $error = "Korisnik ne postoji.";
    }
}
?>

?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="login-box">
    <h2><i class="fa-solid fa-right-to-bracket"></i> Prijava</h2>
    
    <?php if ($error): ?>
    <div class="error-msg">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <?php echo $error; ?>
    </div>
<?php endif; ?>


  <form method="post">
    <div class="input-group">
        <i class="fa-solid fa-user"></i>
        <input name="username" placeholder="Korisničko ime" required>
    </div>

    <div class="input-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Lozinka" required>
    </div>

    <label>
        <input type="checkbox" onclick="togglePassword()"> 
    </label>

   <button type="submit" class="login-btn">Prijava</button>
</form>


    <p class="error"><?= $greska ?></p>
</div>
<script src="script.js"></script>
</body>
</html>
