-- Création de la base de données
DROP DATABASE IF EXISTS ajax_crud;
CREATE DATABASE IF NOT EXISTS ajax_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Utilisation de la base de données
USE ajax_crud;

-- Création de la table des produits
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(100) NOT NULL
);

-- Insertion de quelques produits
INSERT INTO products (name, price, category) VALUES
('Laptop Lenovo', 7999.99, 'Informatique'),
('Téléviseur Samsung', 5999.00, 'Électronique'),
('Smartphone Xiaomi', 3499.50, 'Téléphonie');
