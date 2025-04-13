<?php include '../includes/header.php'; ?>

<section class="login-section">
    <div class="login-container">
        <h1>Admin Login</h1>
        <p>Masukkan kredensial Anda untuk mengakses panel admin.</p>
        <form action="proses-login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username Anda" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
            
            <button type="submit" class="button lux">Login</button>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>