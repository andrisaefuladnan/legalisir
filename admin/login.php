<?php
session_start();

// Include koneksi database
include '../includes/db.php';
include 'includes/header.php'; // Header umum untuk halaman admin

$pdo = getPDOConnection(); // Membuat koneksi database menggunakan PDO

$error_message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi password menggunakan MD5

    // Query untuk memeriksa username dan password
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :username AND password = :password");
    $stmt->execute([
        ':username' => $username,
        ':password' => $password,
    ]);

    $user = $stmt->fetch();

    if ($user) {
        // Simpan informasi pengguna di session
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $user['username'];

        // Redirect ke halaman dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        $error_message = "Username atau password salah!";
    }
}
?>

<div class="login-container">
    <h1>Login</h1>
    <?php if ($error_message): ?>
        <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    <form method="POST" class="login-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username Anda" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password Anda" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php
include 'includes/footer.php'; // Footer umum untuk halaman admin
?>