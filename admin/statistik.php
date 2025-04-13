<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
include 'includes/db.php';

// Fetch data counts
$query_arsip = "SELECT COUNT(*) AS total_arsip FROM arsip";
$result_arsip = $conn->query($query_arsip)->fetch_assoc();

$query_user = "SELECT COUNT(*) AS total_user FROM user";
$result_user = $conn->query($query_user)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Statistik</title>
</head>
<body>
    <h1>Statistik</h1>
    <p>Total Arsip: <?= $result_arsip['total_arsip'] ?></p>
    <p>Total User: <?= $result_user['total_user'] ?></p>
</body>
</html>