SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

USE `tiempomaya`;

-- Agregar columna audio si no existe en `energia`
ALTER TABLE `energia`
ADD COLUMN IF NOT EXISTS `audio` VARCHAR(255) DEFAULT NULL AFTER `categoria`;

-- Agregar columna audio si no existe en `kin`
ALTER TABLE `kin`
ADD COLUMN IF NOT EXISTS `audio` VARCHAR(255) DEFAULT NULL AFTER `categoria`;

-- Agregar columna audio si no existe en `nahual`
ALTER TABLE `nahual`
ADD COLUMN IF NOT EXISTS `audio` VARCHAR(255) DEFAULT NULL AFTER `categoria`;

-- Agregar columna audio si no existe en `uinal`
ALTER TABLE `uinal`
ADD COLUMN IF NOT EXISTS `audio` VARCHAR(255) DEFAULT NULL AFTER `categoria`;

COMMIT;
