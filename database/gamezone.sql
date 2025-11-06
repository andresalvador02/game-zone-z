-- default SQL (create tables)
CREATE DATABASE IF NOT EXISTS gamezone CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gamezone;
CREATE TABLE IF NOT EXISTS videojuegos (id INT AUTO_INCREMENT PRIMARY KEY, titulo VARCHAR(150), descripcion TEXT, precio DECIMAL(10,2), imagen VARCHAR(255), stock INT DEFAULT 999);
