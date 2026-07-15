CREATE DATABASE IF NOT EXISTS sa4_user_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sa4_user_management;

CREATE TABLE IF NOT EXISTS users (
    ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Firstname VARCHAR(80) NOT NULL,
    Lastname VARCHAR(80) NOT NULL,
    Middlename VARCHAR(80) NOT NULL DEFAULT '',
    Contactno VARCHAR(30) NOT NULL DEFAULT '',
    Email VARCHAR(150) NOT NULL UNIQUE,
    Birthday DATE NOT NULL,
    username VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    accesslevel ENUM('user', 'administrator') NOT NULL DEFAULT 'user',
    status ENUM('active', 'disabled') NOT NULL DEFAULT 'active',
    image VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (Firstname, Lastname, Middlename, Contactno, Email, Birthday, username, password, accesslevel, status, image) VALUES
('Elena', 'Reyes', 'Santos', '09171234567', 'elena.reyes@example.com', '1992-05-01', 'admin', '$2y$10$iByn0YzFRKQ2FJOsLJvsmuklY51UJQgi6/CiBLAKTUMG5E50UrPue', 'administrator', 'active', NULL),
('Maria', 'Gonzales', 'Cruz', '09182345678', 'maria.gonzales@example.com', '1998-03-20', 'maria', '$2y$10$iByn0YzFRKQ2FJOsLJvsmuklY51UJQgi6/CiBLAKTUMG5E50UrPue', 'user', 'active', NULL),
('Juan', 'Dela Cruz', 'Bautista', '09193456789', 'juan.delacruz@example.com', '2000-08-16', 'juan', '$2y$10$iByn0YzFRKQ2FJOsLJvsmuklY51UJQgi6/CiBLAKTUMG5E50UrPue', 'user', 'active', NULL),
('Ana', 'Mendoza', 'Lim', '09204567890', 'ana.mendoza@example.com', '1999-12-04', 'ana', '$2y$10$iByn0YzFRKQ2FJOsLJvsmuklY51UJQgi6/CiBLAKTUMG5E50UrPue', 'administrator', 'active', NULL),
('Paolo', 'Santos', 'Garcia', '09215678901', 'paolo.santos@example.com', '2001-06-11', 'disabled_user', '$2y$10$iByn0YzFRKQ2FJOsLJvsmuklY51UJQgi6/CiBLAKTUMG5E50UrPue', 'user', 'disabled', NULL)
ON DUPLICATE KEY UPDATE username = VALUES(username);
