<?php
$conn = new mysqli("localhost", "root", "", "fakultet");
if ($conn->connect_error) {
    die("Greška: " . $conn->connect_error);
}
