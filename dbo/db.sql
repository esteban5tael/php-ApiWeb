-- Crear una base de datos llamada "apiweb" si no existe
CREATE DATABASE IF NOT EXISTS apiweb;

-- Cambiar al contexto de la base de datos "apiweb"
USE `apiweb`;

-- Eliminar la tabla "users" si existe, para evitar conflictos
DROP TABLE IF EXISTS `users`;

-- Crear la tabla "users" con sus columnas
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,    -- Columna para el ID único de usuario
  `name` varchar(255) NOT NULL,            -- Columna para el nombre del usuario
  `email` varchar(255) NOT NULL,           -- Columna para el correo electrónico del usuario
  `status` tinyint(1) NOT NULL DEFAULT 1,  -- Columna para el estado del usuario (por defecto, 1)
  PRIMARY KEY (`id`)                       -- Definir la columna "id" como clave primaria
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Insertar datos de ejemplo en la tabla "users"
INSERT INTO users (name, email, status)
VALUES
    ('Sofia', 'sofia@example.com', 1),
    ('Liam', 'liam@example.com', 0),
    ('Olivia', 'olivia@example.com', 1),
    ('Noah', 'noah@example.com', 0),
    ('Emma', 'emma@example.com', 1),
    ('Oliver', 'oliver@example.com', 0),
    ('Ava', 'ava@example.com', 1),
    ('Elijah', 'elijah@example.com', 0),
    ('Charlotte', 'charlotte@example.com', 1),
    ('Harper', 'harper@example.com', 0),
    ('Benjamin', 'benjamin@example.com', 1),
    ('Amelia', 'amelia@example.com', 0),
    ('Mia', 'mia@example.com', 1),
    ('Ethan', 'ethan@example.com', 0),
    ('Abigail', 'abigail@example.com', 1),
    ('Evelyn', 'evelyn@example.com', 0),
    ('Alexander', 'alexander@example.com', 1),
    ('William', 'william@example.com', 0),
    ('James', 'james@example.com', 1),
    ('Aria', 'aria@example.com', 0),
    ('Henry', 'henry@example.com', 1),
    ('Elizabeth', 'elizabeth@example.com', 0),
    ('Madison', 'madison@example.com', 1),
    ('Scarlett', 'scarlett@example.com', 0),
    ('Lucy', 'lucy@example.com', 1),
    ('Jackson', 'jackson@example.com', 0),
    ('Grace', 'grace@example.com', 1),
    ('Joseph', 'joseph@example.com', 0),
    ('Riley', 'riley@example.com', 1),
    ('Zoe', 'zoe@example.com', 0),
    ('Aiden', 'aiden@example.com', 1),
    ('Nora', 'nora@example.com', 0),
    ('Lily', 'lily@example.com', 1),
    ('Samantha', 'samantha@example.com', 0),
    ('Carter', 'carter@example.com', 1),
    ('Victoria', 'victoria@example.com', 0),
    ('Penelope', 'penelope@example.com', 1),
    ('Landon', 'landon@example.com', 0),
    ('Addison', 'addison@example.com', 1),
    ('Layla', 'layla@example.com', 0),
    ('David', 'david@example.com', 1),
    ('Leo', 'leo@example.com', 0),
    ('Michael', 'michael@example.com', 1),
    ('Audrey', 'audrey@example.com', 0),
    ('Wyatt', 'wyatt@example.com', 1),
    ('Chloe', 'chloe@example.com', 0),
    ('Daniel', 'daniel@example.com', 1);
