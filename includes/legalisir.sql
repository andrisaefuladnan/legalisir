-- Buat database
CREATE DATABASE IF NOT EXISTS legalisir;
USE legalisir;

-- Tabel untuk akun admin (gunakan MD5 untuk password)
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL -- MD5 menghasilkan string 32 karakter
);

-- Tambahkan user admin dengan password yang sudah di-hash (Password: 123)
INSERT INTO admin_users (username, password) 
VALUES ('admin', MD5('123'));

-- Tabel untuk data masuk dari formulir legalisir
CREATE TABLE requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nisn VARCHAR(20) NOT NULL,
    graduation_year INT NOT NULL,
    ijazah_front_path VARCHAR(255) NOT NULL,
    ijazah_back_path VARCHAR(255) NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);