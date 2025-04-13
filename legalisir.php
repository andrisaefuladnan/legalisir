<?php include 'includes/header.php'; ?>

<section class="form-section">
    <h1>Formulir Legalisir</h1>
    <p>Silakan mengisi data berikut untuk permohonan legalisir.</p>
    <form action="proses-legalisir.php" method="POST">
        <label for="name">Nama Lengkap:</label>
        <input type="text" name="name" id="name" placeholder="Masukkan nama Anda" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
        
        <label for="file">Unggah Dokumen:</label>
        <input type="file" name="file" id="file" required>
        
        <button type="submit">Kirim</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>