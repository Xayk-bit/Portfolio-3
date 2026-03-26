<?php
include "auth.php";
include "db.php";
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Studenti</title>
    <link rel="stylesheet" href="style.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
<div class="container">

    <div class="top-bar">
        <div>
            <i class="fa-solid fa-user"></i>
            <?= $_SESSION['user'] ?> (<?= $_SESSION['role'] ?>)
        </div>
        <div>
            <a href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i> Odjava
            </a>
        </div>
    </div>

    <h1><i class="fa-solid fa-users"></i> Studenti</h1>

    <?php if ($_SESSION['role'] == 'admin'): ?>
        <a href="dodaj.php" class="btn">
            <i class="fa-solid fa-user-plus"></i> Dodaj studenta
        </a>
    <?php endif; ?>

    <table>
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <th>Akcije</th>
            <?php endif; ?>
        </tr>

        <?php
        $r = $conn->query("SELECT * FROM studenti");
        while($s = $r->fetch_assoc()):
        ?>
        <tr>
            <td><?= $s['ime'] ?></td>
            <td><?= $s['prezime'] ?></td>
            <td><?= $s['email'] ?></td>

            <?php if ($_SESSION['role'] == 'admin'): ?>
            <td class="actions">
                <a href="uredi.php?id=<?= $s['id'] ?>">
                    <i class="fa-solid fa-pen"></i> Uredi
                </a>
                <a href="obrisi.php?id=<?= $s['id'] ?>" onclick="return potvrda()">
                    <i class="fa-solid fa-trash"></i> Obriši
                </a>
            </td>
            <?php endif; ?>
        </tr>
        <?php endwhile; ?>

    </table>
</div>
<script src="script.js"></script>
</body>
</html>
