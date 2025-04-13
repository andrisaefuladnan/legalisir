<?php
$host = 'localhost';
$db = 'legalisir';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

/**
 * Fungsi untuk mendapatkan koneksi MySQLi
 * @return mysqli
 */
function getMySQLiConnection() {
    global $host, $user, $pass, $db;
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    return $conn;
}

/**
 * Fungsi untuk mendapatkan koneksi PDO
 * @return PDO
 */
function getPDOConnection() {
    global $host, $user, $pass, $db, $charset;
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>