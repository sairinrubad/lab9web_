CREATE DATABASE IF NOT EXISTS db_latihan;
USE db_latihan;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    nim VARCHAR(20) NOT NULL,
    kelas VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (nama, email, nim, kelas) VALUES
('Sairin Bin Rubad', 'sairin@pelitabangsa.ac.id', '312510134', 'I.25.2A'),
('Rina Marlina', 'rina@pelitabangsa.ac.id', '312510135', 'I.25.2A');
