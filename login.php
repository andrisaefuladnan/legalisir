<?php include '../includes/header.php'; ?>

<section class="form-section">
    <h1>Admin Login</h1>
    <p>Masukkan kredensial Anda untuk mengakses panel admin.</p>
    <form action="proses-login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Masukkan username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Masukkan password" required>
        
        <button type="submit">Login</button>
    </form>
</section>

<?php include '../includes/footer.php'; ?>