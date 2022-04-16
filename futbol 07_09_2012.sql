-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2012 a las 19:45:23
-- Versión del servidor: 5.5.25a
-- Versión de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--
-- Creación: 20-07-2012 a las 14:03:25
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `usu` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `administrador`:
--   `usu`
--       `socio` -> `usuario`
--

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usu`) VALUES
('elkangri23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amonestacion`
--
-- Creación: 20-07-2012 a las 13:37:01
--

DROP TABLE IF EXISTS `amonestacion`;
CREATE TABLE IF NOT EXISTS `amonestacion` (
  `id_amon` int(8) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_amon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `amonestacion`
--

INSERT INTO `amonestacion` (`id_amon`, `nombre`, `precio`) VALUES
(1, '1 amarilla', 4),
(2, '1 roja', 10),
(3, '2 amarilla+1roja', 20),
(4, 'No asiste a reunión', 10),
(5, 'roja directa', 15),
(6, 'Cuota mes', 20),
(7, 'Loteria navidad', 50),
(8, 'Llegar tarde', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--
-- Creación: 20-07-2012 a las 14:36:21
--

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE IF NOT EXISTS `incidencias` (
  `fecha` date NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `golam` int(2) NOT NULL DEFAULT '0',
  `color` enum('am','az') COLLATE utf8_spanish_ci NOT NULL,
  `amon` int(8) NOT NULL DEFAULT '0',
  `puntos` int(1) NOT NULL DEFAULT '0',
  `golaz` int(2) NOT NULL DEFAULT '0',
  `amam` int(2) NOT NULL DEFAULT '0',
  `roam` int(2) NOT NULL DEFAULT '0',
  `amaz` int(2) NOT NULL DEFAULT '0',
  `roaz` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fecha`,`usuario`),
  KEY `incidencias_usuario_sociousuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `incidencias`:
--   `usuario`
--       `socio` -> `usuario`
--

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`fecha`, `usuario`, `golam`, `color`, `amon`, `puntos`, `golaz`, `amam`, `roam`, `amaz`, `roaz`) VALUES
('2012-02-01', 'socio14', 0, 'az', 1, 0, 0, 0, 0, 0, 0),
('2012-03-01', 'socio14', 0, 'am', 1, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio1', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio10', 0, 'am', 0, 2, 0, 0, 0, 0, 0),
('2012-09-01', 'socio11', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio12', 1, 'am', 0, 1, 0, 0, 0, 0, 0),
('2012-09-01', 'socio13', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio14', 0, 'az', 1, 2, 0, 0, 0, 1, 0),
('2012-09-01', 'socio15', 0, 'az', 2, 0, 0, 0, 0, 0, 1),
('2012-09-01', 'socio16', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio17', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio18', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio19', 0, 'az', 1, 1, 0, 0, 0, 1, 0),
('2012-09-01', 'socio2', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio20', 0, 'az', 0, 0, 3, 0, 0, 0, 0),
('2012-09-01', 'socio21', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio25', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio3', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio4', 0, 'am', 0, 3, 0, 0, 0, 0, 0),
('2012-09-01', 'socio5', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio6', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio7', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-01', 'socio8', 0, 'az', 0, 3, 0, 0, 0, 0, 0),
('2012-09-01', 'socio9', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio1', 0, 'az', 0, 2, 0, 0, 0, 0, 0),
('2012-09-07', 'socio10', 0, 'az', 0, 0, 1, 0, 0, 0, 0),
('2012-09-07', 'socio11', 0, 'az', 1, 0, 0, 0, 0, 1, 0),
('2012-09-07', 'socio12', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio13', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio14', 0, 'am', 1, 0, 0, 1, 0, 0, 0),
('2012-09-07', 'socio15', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio16', 0, 'am', 0, 3, 0, 0, 0, 0, 0),
('2012-09-07', 'socio17', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio18', 0, 'az', 0, 3, 1, 0, 0, 0, 0),
('2012-09-07', 'socio19', 3, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio2', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio20', 0, 'am', 0, 1, 0, 0, 0, 0, 0),
('2012-09-07', 'socio21', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio25', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio3', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio4', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio5', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio6', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio7', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-07', 'socio8', 0, 'am', 0, 2, 0, 0, 0, 0, 0),
('2012-09-07', 'socio9', 0, 'az', 0, 1, 0, 0, 0, 0, 0),
('2012-09-14', 'socio1', 0, 'am', 0, 2, 0, 0, 0, 0, 0),
('2012-09-14', 'socio10', 0, 'am', 0, 1, 0, 0, 0, 0, 0),
('2012-09-14', 'socio11', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio12', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio13', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio14', 0, 'az', 0, 0, 1, 0, 0, 0, 0),
('2012-09-14', 'socio15', 0, 'az', 0, 2, 0, 0, 0, 0, 0),
('2012-09-14', 'socio16', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio17', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio18', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio19', 0, 'az', 0, 3, 0, 0, 0, 0, 0),
('2012-09-14', 'socio2', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio20', 0, 'az', 0, 0, 1, 0, 0, 0, 0),
('2012-09-14', 'socio21', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio25', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio3', 0, 'am', 0, 3, 0, 0, 0, 0, 0),
('2012-09-14', 'socio4', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio5', 0, 'am', 1, 0, 0, 1, 0, 0, 0),
('2012-09-14', 'socio6', 0, 'az', 0, 0, 1, 0, 0, 0, 0),
('2012-09-14', 'socio7', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-14', 'socio8', 0, 'az', 0, 1, 0, 0, 0, 0, 0),
('2012-09-14', 'socio9', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio1', 0, 'am', 0, 3, 0, 0, 0, 0, 0),
('2012-09-21', 'socio10', 0, 'am', 0, 1, 0, 0, 0, 0, 0),
('2012-09-21', 'socio11', 0, 'az', 0, 0, 1, 0, 0, 0, 0),
('2012-09-21', 'socio12', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio14', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio15', 0, 'az', 0, 0, 2, 0, 0, 0, 0),
('2012-09-21', 'socio16', 0, 'az', 0, 0, 1, 0, 0, 0, 0),
('2012-09-21', 'socio17', 2, 'am', 0, 2, 0, 0, 0, 0, 0),
('2012-09-21', 'socio19', 3, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio2', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio20', 0, 'az', 0, 0, 1, 0, 0, 0, 0),
('2012-09-21', 'socio21', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio22', 0, 'az', 0, 0, 3, 0, 0, 0, 0),
('2012-09-21', 'socio25', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio3', 0, 'az', 0, 2, 0, 0, 0, 0, 0),
('2012-09-21', 'socio4', 0, 'az', 0, 1, 0, 0, 0, 0, 0),
('2012-09-21', 'socio5', 0, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio6', 1, 'am', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio7', 0, 'az', 0, 0, 0, 0, 0, 0, 0),
('2012-09-21', 'socio8', 0, 'az', 0, 3, 0, 0, 0, 0, 0),
('2012-09-21', 'socio9', 1, 'am', 0, 0, 0, 0, 0, 0, 0);

--
-- Disparadores `incidencias`
--
DROP TRIGGER IF EXISTS `borrarpartidogol`;
DELIMITER //
CREATE TRIGGER `borrarpartidogol` BEFORE DELETE ON `incidencias`
 FOR EACH ROW BEGIN
update partido SET tgolam= tgolam-OLD.golam,tgolaz= tgolaz-OLD.golaz,tamam= tamam-OLD.amam,tamaz= tamaz-OLD.amaz,troam= troam-OLD.roam,troaz= troaz-OLD.roaz  WHERE fecha=OLD.fecha;
update socio SET gol= gol-(OLD.golam+OLD.golaz),tr= tr-(OLD.roaz+OLD.roam),ta= ta-(OLD.amam+OLD.amaz) WHERE usuario=OLD.usuario;
if (OLD.amon>0) THEN DELETE FROM pagos WHERE usuario=OLD.usuario AND fecha=OLD.fecha;
END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `insertarpartidogol`;
DELIMITER //
CREATE TRIGGER `insertarpartidogol` AFTER INSERT ON `incidencias`
 FOR EACH ROW BEGIN
update partido SET tgolam= tgolam+NEW.golam,tgolaz= tgolaz+NEW.golaz,tamam= tamam+NEW.amam,tamaz= tamaz+NEW.amaz,troam= troam+NEW.roam,troaz= troaz+NEW.roaz  WHERE fecha=NEW.fecha;
update socio SET gol= gol+(NEW.golam+NEW.golaz), tr= tr+(NEW.roam+NEW.roaz),ta=ta+(NEW.amam+NEW.amaz) WHERE usuario=NEW.usuario;
if (NEW.amon>0) THEN insert into pagos values (NEW.usuario,NEW.fecha,month(NEW.fecha),year(NEW.fecha),NEW.amon,'n');
END IF; 
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `modificarpartidogol`;
DELIMITER //
CREATE TRIGGER `modificarpartidogol` AFTER UPDATE ON `incidencias`
 FOR EACH ROW BEGIN
update partido SET tgolam= tgolam+(NEW.golam-OLD.golam),tgolaz= tgolaz+(NEW.golaz-OLD.golaz),tamam= tamam+(NEW.amam-OLD.amam),tamaz= tamaz+(NEW.amaz-OLD.amaz),troam= troam+(NEW.roam-OLD.roam),troaz= troaz+(NEW.roaz-OLD.roaz)  WHERE fecha=NEW.fecha;
update socio SET gol= gol+((NEW.golam+NEW.golaz)-(OLD.golam+OLD.golaz)),tr= tr+((NEW.roam+NEW.roaz)-(OLD.roam+OLD.roaz)),ta= ta+((NEW.amam+NEW.amaz)-(OLD.amam+OLD.amaz))  WHERE usuario=NEW.usuario;
if (NEW.amon>0) THEN update pagos SET fecha=NEW.fecha,mes=month(NEW.fecha),ano=year(NEW.fecha),id_amon=NEW.amon WHERE usuario=OLD.usuario AND fecha=OLD.fecha; END IF;
if (NEW.amon>0 AND OLD.amon=0)  THEN insert into pagos values (NEW.usuario,NEW.fecha,month(NEW.fecha),year(NEW.fecha),NEW.amon,'n');
ELSE IF (NEW.amon=0) THEN DELETE FROM pagos WHERE usuario=OLD.usuario AND fecha=OLD.fecha; END IF;
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeenv`
--
-- Creación: 08-08-2012 a las 11:09:08
--

DROP TABLE IF EXISTS `mensajeenv`;
CREATE TABLE IF NOT EXISTS `mensajeenv` (
  `idmen` int(8) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `destinatario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idmen`,`fecha`),
  KEY `mensajeenv_usuario_sociousuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- RELACIONES PARA LA TABLA `mensajeenv`:
--   `usuario`
--       `socio` -> `usuario`
--

--
-- Volcado de datos para la tabla `mensajeenv`
--

INSERT INTO `mensajeenv` (`idmen`, `fecha`, `usuario`, `destinatario`, `mensaje`) VALUES
(1, '2012-08-08 06:33:26', 'socio1', 'socio1', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-4'),
(2, '2012-08-08 08:33:26', 'socio1', 'socio2', 'Mensaje mandado de Socio1 a socio 2 un unico destinatario'),
(3, '2012-08-08 06:33:26', 'socio2', 'socio1', 'Mensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\n'),
(4, '2012-08-08 08:33:26', 'socio1', 'socio2', 'Segundo mensaje mandado de socio1 a socio2 unico destinatario;'),
(5, '2012-08-08 08:33:26', 'socio1', 'socio2', 'Tercer mensaje mandado de socio1 a socio2 unico destinatario;'),
(6, '2012-08-08 11:31:25', 'socio1', 'socio2', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-5'),
(7, '2012-08-08 11:31:25', 'socio1', 'socio3', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-5'),
(8, '2012-08-08 11:31:25', 'socio1', 'socio4', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-5'),
(9, '2012-08-08 11:31:25', 'socio1', 'socio5', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-5'),
(11, '2012-08-09 14:38:28', 'socio11', '0', '<adx'),
(12, '2012-08-09 14:40:07', 'socio11', '0', ''),
(13, '2012-08-09 14:41:02', 'socio11', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajerec`
--
-- Creación: 20-07-2012 a las 13:58:09
--

DROP TABLE IF EXISTS `mensajerec`;
CREATE TABLE IF NOT EXISTS `mensajerec` (
  `idmen` int(8) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `destinatario` text COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `leido` enum('s','n') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n',
  PRIMARY KEY (`idmen`,`fecha`),
  KEY `mensaje_usuario_sociousuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- RELACIONES PARA LA TABLA `mensajerec`:
--   `usuario`
--       `socio` -> `usuario`
--

--
-- Volcado de datos para la tabla `mensajerec`
--

INSERT INTO `mensajerec` (`idmen`, `fecha`, `usuario`, `destinatario`, `mensaje`, `leido`) VALUES
(1, '2012-08-08 06:33:26', 'socio1', 'socio1', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-4', 's'),
(2, '2012-08-08 08:33:26', 'socio1', 'socio2', 'Mensaje mandado de Socio1 a socio 2 un unico destinatario', 'n'),
(3, '2012-08-08 06:33:26', 'socio2', 'socio1', 'Mensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\nMensaje mandado de Socio2 a socio 1 un unico destinatario.\n', 'n'),
(4, '2012-08-08 08:33:26', 'socio1', 'socio2', 'Segundo mensaje mandado de socio1 a socio2 unico destinatario;', 'n'),
(5, '2012-08-08 08:33:26', 'socio1', 'socio2', 'Tercer mensaje mandado de socio1 a socio2 unico destinatario;', 'n'),
(6, '2012-08-08 11:31:25', 'socio1', 'socio2', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-6\n', 'n'),
(7, '2012-08-08 11:31:25', 'socio1', 'socio3', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-5', 'n'),
(8, '2012-08-08 11:31:25', 'socio1', 'socio4', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-5', 'n'),
(9, '2012-08-08 11:31:25', 'socio1', 'socio5', 'Hola, esto es un mensaje comunitario mandado desde socio a socio 1-5', 'n');

--
-- Disparadores `mensajerec`
--
DROP TRIGGER IF EXISTS `mandarmensaje`;
DELIMITER //
CREATE TRIGGER `mandarmensaje` AFTER INSERT ON `mensajerec`
 FOR EACH ROW insert into mensajeenv VALUES(NEW.idmen,NEW.fecha,NEW.usuario,NEW.destinatario,NEW.mensaje)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--
-- Creación: 20-07-2012 a las 13:31:44
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `usu` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('p','s') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`,`usu`,`fecha`),
  KEY `noticias_usu_sociousuario` (`usu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- RELACIONES PARA LA TABLA `noticias`:
--   `usu`
--       `socio` -> `usuario`
--

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `usu`, `fecha`, `titulo`, `contenido`, `tipo`) VALUES
(1, 'elkangri23', '2012-07-29 22:49:37', 'Abrimos la web', 'desde el día de hoy comenzamos a rodar la web, ya activa con todas las páginas activas y botones, listos para empezar a usarse cuanto antes y prevenir errores, log y demás cosas que se le hayan pasado por alto al administrador de la página web.', 'p'),
(2, 'elkangri23', '2012-08-01 08:18:27', 'Comienzo a rodar', 'Comineza a rodar la página web la cual será una grata sorpresa para todo el mundo que sea socio y pueda disfrutart de la experiencia web 2.0 la que nos hace que todo sea dinámico y divertido, actrualizando conetenidos al instante y siendo de gran utilidad a la hora de programar.', 'p'),
(3, 'elkangri23', '2012-07-31 09:11:19', 'comienza la temporada', 'desde el día de hoy comenzamos a rodar la web, ya activa con todas las páginas activas y botones, listos para empezar a usarse cuanto antes y prevenir errores, log y demás cosas que se le hayan pasado por alto al administrador de la página web.', 'p'),
(6, 'elkangri23', '2012-08-02 07:20:21', 'noticia solo para socios', 'desde el día de hoy comenzamos a rodar la web, ya activa con todas las páginas activas y botones, listos para empezar a usarse cuanto antes y prevenir errores, log y demás cosas que se le hayan pasado por alto al administrador de la página web.', 's'),
(7, 'elkangri23', '2012-07-26 22:00:00', 'titulo 1', 'Comineza a rodar la página web la cual será una grata sorpresa para todo el mundo que sea socio y pueda disfrutart de la experiencia web 2.0 la que nos hace que todo sea dinámico y divertido, actrualizando conetenidos al instante y siendo de gran utilidad a la hora de programar.', 'p'),
(8, 'elkangri23', '2012-07-25 22:00:00', 'titulo 2', 'Comineza a rodar la página web la cual será una grata sorpresa para todo el mundo que sea socio y pueda disfrutart de la experiencia web 2.0 la que nos hace que todo sea dinámico y divertido, actrualizando conetenidos al instante y siendo de gran utilidad a la hora de programar.', 'p'),
(9, 'elkangri23', '2012-07-24 22:00:00', 'titulo 3', 'Comineza a rodar la página web la cual será una grata sorpresa para todo el mundo que sea socio y pueda disfrutart de la experiencia web 2.0 la que nos hace que todo sea dinámico y divertido, actrualizando conetenidos al instante y siendo de gran utilidad a la hora de programar.', 'p'),
(10, 'elkangri23', '2012-07-23 22:00:00', 'titulo 4', 'Comineza a rodar la página web la cual será una grata sorpresa para todo el mundo que sea socio y pueda disfrutart de la experiencia web 2.0 la que nos hace que todo sea dinámico y divertido, actrualizando conetenidos al instante y siendo de gran utilidad a la hora de programar.', 'p'),
(11, 'elkangri23', '2012-07-22 22:00:00', 'titulo 5', 'Comineza a rodar la página web la cual será una grata sorpresa para todo el mundo que sea socio y pueda disfrutart de la experiencia web 2.0 la que nos hace que todo sea dinámico y divertido, actrualizando conetenidos al instante y siendo de gran utilidad a la hora de programar.', 'p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--
-- Creación: 20-07-2012 a las 13:42:25
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` year(4) NOT NULL,
  `id_amon` int(8) NOT NULL,
  `pagado` enum('s','n') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usuario`,`fecha`),
  KEY `pagos_id_amon_amonestacionid_amon` (`id_amon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `pagos`:
--   `id_amon`
--       `amonestacion` -> `id_amon`
--   `usuario`
--       `socio` -> `usuario`
--

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`usuario`, `fecha`, `mes`, `ano`, `id_amon`, `pagado`) VALUES
('socio11', '2012-09-07', 9, 2012, 1, 'n'),
('socio14', '2012-02-01', 2, 2012, 1, 's'),
('socio14', '2012-03-01', 3, 2012, 1, 'n'),
('socio14', '2012-09-01', 9, 2012, 1, 'n'),
('socio14', '2012-09-07', 9, 2012, 1, 'n'),
('socio15', '2012-09-01', 9, 2012, 2, 'n'),
('socio19', '2012-09-01', 9, 2012, 1, 'n'),
('socio5', '2012-09-14', 9, 2012, 1, 'n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--
-- Creación: 20-07-2012 a las 14:30:35
--

DROP TABLE IF EXISTS `partido`;
CREATE TABLE IF NOT EXISTS `partido` (
  `id` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `local` enum('am','az') COLLATE utf8_spanish_ci NOT NULL,
  `visitante` enum('am','az') COLLATE utf8_spanish_ci NOT NULL,
  `caplocal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capvisitante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tgolam` int(2) NOT NULL DEFAULT '0',
  `tgolaz` int(2) NOT NULL DEFAULT '0',
  `tamam` int(2) NOT NULL DEFAULT '0',
  `troam` int(2) NOT NULL DEFAULT '0',
  `tamaz` int(2) NOT NULL DEFAULT '0',
  `troaz` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id`, `fecha`, `local`, `visitante`, `caplocal`, `capvisitante`, `tgolam`, `tgolaz`, `tamam`, `troam`, `tamaz`, `troaz`) VALUES
(6, '2011-03-04', 'am', 'az', 'socio1', 'socio2', 4, 3, 0, 0, 0, 0),
(5, '2011-11-08', 'am', 'az', 'asd', 'asd', 0, 0, 0, 0, 0, 0),
(4, '2012-09-01', 'am', 'az', 'socio1', 'socio2', 4, 3, 0, 0, 2, 1),
(2, '2012-09-07', 'az', 'am', 'socio3', 'socio6', 5, 2, 1, 0, 1, 0),
(3, '2012-09-14', 'az', 'am', 'socio4', 'socio7', 4, 3, 1, 0, 0, 0),
(1, '2012-09-21', 'am', 'az', 'socio14', 'socio16', 7, 8, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--
-- Creación: 01-08-2012 a las 10:41:02
--

DROP TABLE IF EXISTS `posicion`;
CREATE TABLE IF NOT EXISTS `posicion` (
  `id` int(2) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`id`, `nombre`) VALUES
(0, 'portero'),
(1, 'defensa'),
(2, 'centrocampista'),
(3, 'delantero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--
-- Creación: 20-07-2012 a las 14:20:40
--

DROP TABLE IF EXISTS `socio`;
CREATE TABLE IF NOT EXISTS `socio` (
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT '',
  `apellidos` varchar(20) COLLATE utf8_spanish_ci DEFAULT '',
  `direccion` varchar(60) COLLATE utf8_spanish_ci DEFAULT '',
  `telefono1` int(9) DEFAULT NULL,
  `telefono2` int(9) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `localidad` varchar(20) COLLATE utf8_spanish_ci DEFAULT '',
  `provincia` varchar(20) COLLATE utf8_spanish_ci DEFAULT '',
  `dni` varchar(9) COLLATE utf8_spanish_ci DEFAULT '',
  `gol` int(4) DEFAULT '0',
  `tr` int(4) DEFAULT '0',
  `ta` int(4) DEFAULT '0',
  `activo` enum('s','n') COLLATE utf8_spanish_ci DEFAULT NULL,
  `posicion` int(2) DEFAULT NULL,
  `dorsal` int(2) DEFAULT '0',
  PRIMARY KEY (`usuario`),
  KEY `socio_posicion_posicionid` (`posicion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `socio`:
--   `posicion`
--       `posicion` -> `id`
--

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`usuario`, `contrasena`, `nombre`, `apellidos`, `direccion`, `telefono1`, `telefono2`, `cp`, `localidad`, `provincia`, `dni`, `gol`, `tr`, `ta`, `activo`, `posicion`, `dorsal`) VALUES
('elkangri23', 'SantafE4', 'Antonio', 'Moles Leiva', '  c alcalde enrique muñoz arevalo nº40 portal 1 casa 19', 677781271, 123456789, 18320, 'Santa Fé', 'Granada', '75486070R', 0, 0, 0, 's', 1, 0),
('socio1', 'socio1', 'Nombre Socio', 'Apellidos Socio', 'c\\ socio nº1', 123456789, 0, 18001, 'granada', 'Granada', '12345679E', 0, 0, 0, 's', 1, 1),
('socio10', 'socio10', 'nombre socio10', 'apellidos socio10', 'c\\del socio10', 145632587, NULL, 18789, 'granada', 'Granada', '22222222T', 1, 0, 0, 's', 2, 10),
('socio11', 'socio11', 'nombre socio11', ' apellidos socio11', 'c\\ del socio11', 565478987, NULL, 18365, 'granada', 'granada', '33333333Y', 2, 0, 1, 's', 2, 11),
('socio12', 'socio12', 'nombre socio12', 'apellidos socio12', 'c\\ del socio12', 444444444, NULL, 18569, 'granada', 'Granada', '77777777Q', 2, 0, 0, 's', 2, 12),
('socio13', 'socio13', 'nombre socio13', 'apellidos socio13', 'c\\del socio13', 123698569, NULL, 18569, 'granada', 'granada', '88888888G', 1, 0, 0, 's', 2, 13),
('socio14', 'socio14', 'nombre socio14', 'apellidos socio14', 'c\\del socioº4', 154789632, NULL, 18523, 'granada', 'Granada', '99999998T', 1, 0, 2, 's', 2, 14),
('socio15', 'socio15', 'nombre socio15', 'apellidos socio15', 'c\\del socio15', 1234546787, NULL, 18325, 'granada', 'granada', '11111112E', 3, 1, 0, 's', 2, 15),
('socio16', 'socio16', 'nombre socio16', 'apellidos socio16', 'c\\del socio16', 147258369, NULL, 18320, 'granada', 'Granada', '2222223F', 1, 0, 0, 's', 2, 16),
('socio17', 'socio17', 'nombre socio17', 'apellidos socio17', 'c\\del socio17', 987456333, NULL, 18256, 'granada', 'Granada', '44444444U', 4, 0, 0, 's', 3, 17),
('socio18', 'socio18', 'nombre socio18', 'apellidos socio18', ' cdel socio18', 145236987, 0, 18456, 'granada', 'Jaén', '55555555D', 3, 0, 0, 's', 3, 18),
('socio19', 'socio19', 'nombre socio19', 'Apellidos socio19', 'c\\del socio19', 478569874, NULL, 18563, 'granada', 'Granada', '33333334V', 6, 0, 1, 's', 3, 19),
('socio2', 'socio2', 'Nombre socio2', 'Apellidos Socio2', 'c\\ del Socio nº 2', 123456789, 0, 18002, 'granada', 'granada', '12345679S', 0, 0, 0, 's', 1, 2),
('socio20', 'socio20', 'nombre socio20', 'apellidos socio20', 'c\\del socio 20', 457896321, NULL, 18547, 'granada', 'granada', '4444445Y', 5, 0, 0, 's', 3, 20),
('socio21', 'socio21', 'nombre socio21', 'apellidos socio21', 'c\\ del socio21', 458796326, NULL, 18541, 'granada', 'Granada', '55555556T', 0, 0, 0, 's', 0, 21),
('socio22', 'socio22', 'nombre socio22', 'apellidos socio22', 'c\\del socio22', 444444444, NULL, 18369, 'granada', 'granada', '66666667F', 3, 0, 0, 's', 3, 22),
('socio23', 'socio23', 'nombre socio23', 'apellidos socio23', 'c\\del socio23', 123698547, NULL, 18256, 'granada', 'Granada', '7777778U', 0, 0, 0, 'n', 1, 0),
('socio24', 'socio24', 'nombre socio24', 'apellidos socio24', 'c\\del socio24', 547896358, NULL, 18478, 'granada', 'granada', '75486089R', 0, 0, 0, 'n', 3, 0),
('socio25', 'socio25', 'nombre socio25', 'apellidos socio25', 'c\\del socio25', 658987412, NULL, 18369, 'granada', 'Granada', '11111114R', 0, 0, 0, 's', 0, 25),
('socio3', 'socio3', 'nombre socio3', 'apellidos socio3', 'c\\del socio3', 123456789, 0, 18011, 'granada', 'granada', '14523678D', 0, 0, 0, 's', 1, 3),
('socio4', 'socio4', 'nombre socio4', 'apellidos socio4', 'c\\del socio4', 123456789, 0, 18011, 'granada', 'granada', '12345678U', 0, 0, 0, 's', 1, 4),
('socio5', 'socio5', 'nombre socio5', 'apellidos socio5', 'c\\ del socio5', 254789632, NULL, 18023, 'granada', 'Granada', '12345698D', 0, 0, 1, 's', 1, 5),
('socio6', 'socio6', 'nombre socio6', 'apellidos socio6', 'c\\del socio6', 125463879, 0, 14023, 'granada', 'Granada', '98564754T', 2, 0, 0, 's', 1, 6),
('socio7', 'socio7', 'nombre del socio7', 'apellidos socio7', 'c\\del socio7', 824563258, NULL, 18065, 'granada', 'Granada', '63216587R', 0, 0, 0, 's', 1, 7),
('socio8', 'socio8', 'nombre socio8', 'apellidos socio8', 'c\\del socio8', 456897512, 0, 18541, 'granada', 'granada', '47852369F', 0, 0, 0, 's', 1, 8),
('socio9', 'socio9', 'nombre socio9', 'apellidos socio9', ' c del socio 9', 547854569, 0, 18563, 'granada', 'granada', '11111111I', 2, 0, 0, 's', 2, 9);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_usu_sociousuario` FOREIGN KEY (`usu`) REFERENCES `socio` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_usuario_sociousuario` FOREIGN KEY (`usuario`) REFERENCES `socio` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajeenv`
--
ALTER TABLE `mensajeenv`
  ADD CONSTRAINT `mensajeenv_usuario_sociousuario` FOREIGN KEY (`usuario`) REFERENCES `socio` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajerec`
--
ALTER TABLE `mensajerec`
  ADD CONSTRAINT `mensaje_usuario_sociousuario` FOREIGN KEY (`usuario`) REFERENCES `socio` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_usu_sociousuario` FOREIGN KEY (`usu`) REFERENCES `socio` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_id_amon_amonestacionid_amon` FOREIGN KEY (`id_amon`) REFERENCES `amonestacion` (`id_amon`),
  ADD CONSTRAINT `pagos_usuario_sociousuario` FOREIGN KEY (`usuario`) REFERENCES `socio` (`usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `socio_posicion_posicionid` FOREIGN KEY (`posicion`) REFERENCES `posicion` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
