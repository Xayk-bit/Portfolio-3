<?php
include "auth.php";
include "db.php";
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Pregled studenata</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="login-box" style="width: 700px;">
    <h2>
        <i class="fa-solid fa-users"></i>
        Pregled studenata
    </h2>

    <table class="user-table">
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
        </tr>

        <?php
        $rez = $conn->query("SELECT * FROM studenti");
        while ($s = $rez->fetch_assoc()):
        ?>
        <tr>
            <td><?php echo $s['ime']; ?></td>
            <td><?php echo $s['prezime']; ?></td>
            <td><?php echo $s['email']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="logout.php" class="back-link">
        <i class="fa-solid fa-right-from-bracket"></i> Odjava
    </a>
</div>
<script src="script.js"></script>
</body>
</html>
