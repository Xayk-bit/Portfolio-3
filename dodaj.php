<?php
include "auth.php";
include "db.php";


if ($_SESSION['role'] != 'admin') {
    die("Nemate pristup!");
}

if ($_POST) {
    $conn->query("INSERT INTO studenti (ime, prezime, email)
    VALUES ('$_POST[ime]', '$_POST[prezime]', '$_POST[email]')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Dodaj studenta</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container">
    <h2><i class="fa-solid fa-user-plus"></i> Dodaj studenta</h2>

    <form method="post" id="studentForm">
        <input name="ime" placeholder="Ime" required>
        <input name="prezime" placeholder="Prezime" required>
        <input name="email" type="email" placeholder="Email" required>

        <button>
            <i class="fa-solid fa-floppy-disk"></i> Spremi
        </button>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>
