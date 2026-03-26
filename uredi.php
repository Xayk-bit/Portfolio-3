<?php
include "auth.php";
include "db.php";

if ($_SESSION['role'] != 'admin') {
    die("Nemate pristup!");
}

$id = $_GET['id'];
$s = $conn->query("SELECT * FROM studenti WHERE id=$id")->fetch_assoc();

if ($_POST) {
    $conn->query("UPDATE studenti SET
        ime='$_POST[ime]',
        prezime='$_POST[prezime]',
        email='$_POST[email]'
        WHERE id=$id
    ");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Uredi studenta</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="login-box">
    <h2>
        <i class="fa-solid fa-user-pen"></i>
        Uredi studenta
    </h2>

    <form method="post" id="studentForm">

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input 
                type="text" 
                name="ime" 
                value="<?php echo $s['ime']; ?>" 
                placeholder="Ime"
                required
            >
        </div>

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input 
                type="text" 
                name="prezime" 
                value="<?php echo $s['prezime']; ?>" 
                placeholder="Prezime"
                required
            >
        </div>

        <div class="input-group">
            <i class="fa-solid fa-envelope"></i>
            <input 
                type="email" 
                name="email" 
                value="<?php echo $s['email']; ?>" 
                placeholder="Email"
                required
            >
        </div>

        <button type="submit">
            <i class="fa-solid fa-floppy-disk"></i> Spremi
        </button>

        <a href="index.php" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Povratak
        </a>

    </form>
</div>

<script src="script.js"></script>
</body>
</html>

