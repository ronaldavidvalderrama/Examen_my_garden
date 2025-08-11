-- Active: 1754049763299@@127.0.0.1@3306@garden
CREATE DATABASE IF NOT EXISTS `garden`;

USE `garden`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
);

INSERT INTO
    `users` (`name`, `email`, `password`)
VALUES (
        'adrian',
        'adrian@gmail.com',
        SHA2('h3ll0.', 512)
    );

INSERT INTO
    `users` (`name`, `email`, `password`)
VALUES (
        'ana',
        'ana@gmail.com',
        SHA2('h3ll0.', 512)
    );

DROP TABLE IF EXISTS `plantas`;
CREATE TABLE plantas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(20) NOT NULL CHECK (categoria IN ('cactus', 'ornamental', 'frutal')),
    familia VARCHAR(100) NOT NULL,
    proximo_riego DATE NOT NULL
);

INSERT INTO plantas (nombre, categoria, familia, proximo_riego) VALUES
('Aloe Vera', 'cactus', 'Asphodelaceae', '2025-08-14'),
('Lavanda', 'ornamental', 'Lamiaceae', '2025-08-07'),
('Fresa', 'frutal', 'Rosaceae', '2025-08-09'),
('Lengua de suegra', 'ornamental', 'Asparagaceae', '2025-08-11'),
('Nopal', 'cactus', 'Cactaceae', '2025-08-15'),
('Tomatera', 'frutal', 'Solanaceae', '2025-08-13'),
('Orquídea', 'ornamental', 'Orchidaceae', '2025-08-09'),
('Higuera', 'frutal', 'Moraceae', '2025-08-12'),
('Sansevieria', 'ornamental', 'Asparagaceae', '2025-08-10'),
('Pitahaya', 'cactus', 'Cactaceae', '2025-08-16');


DROP TABLE IF EXISTS riego;
CREATE TABLE riego (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_planta INT NOT NULL,
    fecha_riego DATE NOT NULL,
    FOREIGN KEY (id_planta) REFERENCES plantas(id) ON DELETE CASCADE
);


INSERT INTO riego (id_planta, fecha_riego) VALUES
(1, '2025-07-25'),
(1, '2025-08-04'),
(2, '2025-07-31'),
(3, '2025-08-01'),
(5, '2025-08-03'),
(6, '2025-08-08'),
(9, '2025-08-01');


DROP TABLE IF EXISTS frecuencia_riego;
CREATE TABLE frecuencia_riego (
    categoria VARCHAR(20) PRIMARY KEY,
    dias_frecuencia INT NOT NULL
);


INSERT INTO frecuencia_riego (categoria, dias_frecuencia) VALUES
('cactus', 10),
('ornamental', 3),
('frutal', 5);