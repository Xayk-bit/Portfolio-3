<?php
include "auth.php";
include "db.php";

if ($_SESSION['role'] != 'admin') {
    die("Nemate pristup!");
}

$conn->query("DELETE FROM studenti WHERE id=$_GET[id]");
header("Location: index.php");
