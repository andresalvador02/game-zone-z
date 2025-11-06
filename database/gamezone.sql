-- database/gamezone.sql
CREATE DATABASE IF NOT EXISTS gamezone CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gamezone;

-- Usuarios
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  correo VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  rol ENUM('user','admin') DEFAULT 'user',
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Videojuegos
CREATE TABLE IF NOT EXISTS videojuegos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150) NOT NULL,
  descripcion TEXT,
  precio DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  imagen VARCHAR(255) DEFAULT NULL,
  stock INT DEFAULT 999,
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Carritos (opcional, si quieres persistir)
CREATE TABLE IF NOT EXISTS carritos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Compras
CREATE TABLE IF NOT EXISTS compras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  creado_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Datos de ejemplo: videojuegos
INSERT INTO videojuegos (titulo, descripcion, precio, imagen, stock) VALUES
('Aventura Galáctica','Un juego de aventura espacial','79.99','space_adventure.jpg',50),
('Carrera Extrema','Juego de carreras con físicas realistas','59.99','racing_extreme.jpg',40),
('RPG Legendario','RPG con mundo abierto','99.99','rpg_legend.jpg',30);
