-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para multimedia
CREATE DATABASE IF NOT EXISTS `multimedia` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `multimedia`;

-- Volcando estructura para tabla multimedia.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla multimedia.categoria: ~4 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'MAQUINARIA Y EQUIPOS', 'A', '2023-12-06 13:02:40', '2023-12-06 13:02:43'),
	(2, 'METODOS', 'A', '2023-12-06 13:02:41', '2023-12-12 00:11:53'),
	(3, 'CALIDAD', 'A', '2023-12-06 13:02:41', '2023-12-12 14:21:11'),
	(4, 'INDUCCION', 'A', '2023-12-11 17:54:42', '2023-12-12 14:23:28');

-- Volcando estructura para tabla multimedia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla multimedia.migrations: ~0 rows (aproximadamente)

-- Volcando estructura para tabla multimedia.subcategoria
CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT '0',
  `categoria_id` int(11) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla multimedia.subcategoria: ~9 rows (aproximadamente)
INSERT INTO `subcategoria` (`id`, `nombre`, `categoria_id`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'como preparar maruchan de queso', 5, 'A', '2023-12-06 19:56:43', '2023-12-06 19:56:43'),
	(2, 'intrucciones para tomar agua', 5, 'A', '2023-12-06 19:57:43', '2023-12-06 19:57:43'),
	(3, 'MANUAL DE USUARIOS', 5, 'A', '2023-12-06 20:00:07', '2023-12-06 20:00:07'),
	(4, 'PARTES', 1, 'A', '2023-12-06 20:01:38', '2023-12-06 20:01:38'),
	(5, 'ENHEBRADO', 1, 'A', '2023-12-06 20:02:04', '2023-12-06 20:02:04'),
	(6, 'TENSIONES', 1, 'A', '2023-12-06 22:46:36', '2023-12-06 22:46:36'),
	(7, 'PARTES DE LA AGUJA Y COLOCACION', 1, 'A', '2023-12-06 22:46:49', '2023-12-06 22:46:49'),
	(8, 'TUTIRUALES', 6, 'A', '2023-12-06 22:52:29', '2023-12-06 22:52:29'),
	(9, 'TUTIRUALES', 2, 'A', '2023-12-06 23:01:08', '2023-12-06 23:01:08');

-- Volcando estructura para tabla multimedia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `no_empleado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puesto` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inactivo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_ultimo_acceso` datetime DEFAULT NULL,
  `fecha_ultima_notificacion` datetime DEFAULT NULL,
  `usuario_creacion_id` bigint(20) unsigned DEFAULT NULL,
  `usuario_actualizacion_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  UNIQUE KEY `users_no_empleado_unique` (`no_empleado`) USING BTREE,
  KEY `users_usuario_creacion_id_foreign` (`usuario_creacion_id`) USING BTREE,
  KEY `users_usuario_actualizacion_id_foreign` (`usuario_actualizacion_id`) USING BTREE,
  KEY `Índice 6` (`password`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla multimedia.users: 6 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `no_empleado`, `password`, `puesto`, `inactivo`, `remember_token`, `fecha_ultimo_acceso`, `fecha_ultima_notificacion`, `usuario_creacion_id`, `usuario_actualizacion_id`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador del Sistema', 'admin@hotmail.com', '1', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'administrador', '0', NULL, '2023-03-23 12:22:49', '2023-02-01 00:00:00', NULL, NULL, '2020-11-04 19:34:26', '2023-03-23 18:22:49'),
	(2, 'Gerardo Vergara Mendoza', 'gvm7506@gmail.com', '2', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'Administrador', '0', '67Lk0rgb5QhXXk3lP6M66NjY7gy8SFOvXtxiUCuR6F7peKsNaEVOMNjOFJiv', '2023-10-25 11:05:16', '2023-02-01 00:00:00', NULL, NULL, '2020-11-04 19:34:26', '2023-10-25 17:05:16'),
	(1001, 'INVITADO', 'invitado@invitado.com', '0', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'invitado', '0', NULL, '2023-12-12 10:23:21', NULL, NULL, NULL, NULL, NULL),
	(1002, 'Miaurcio', 'miauricio@intimark.com', '', '$2y$10$UpDQKPNpY4qGOYc1s9cUmuEoQggL9xxrgGYHmLdWSXKqxvocTuPJG', NULL, NULL, 'JVoBYMFyAgwZqZD0UYWQYNO09apcsxjzmY0pXi8g9bO1akTsIzDUL2inaEbS', NULL, NULL, NULL, NULL, '2023-12-13 14:55:03', '2023-12-13 14:55:12'),
	(489, 'ANASTACIO CHAVARRIA MATEO', 'prueba1000@intimark.com.mx', '3213', '$2y$10$BQusApvC139EXGbcgKSduutMlfbdmw58lc7pdCG/lIdevYqKk7X9e', 'PERSONAL ADMINISTRATIVO', NULL, NULL, '2023-09-20 19:24:58', NULL, NULL, NULL, '2023-09-21 01:22:01', '2023-09-21 01:24:58'),
	(1000, 'BRAYAM TEOFILO JIMENEZ', 'bteofilo@intimark.com.mx', '18080', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'Administrador', '0', NULL, '2023-11-22 09:45:16', '2023-11-22 09:45:17', NULL, NULL, '2023-11-22 15:45:21', '2023-11-22 15:45:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla multimedia.video
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` text DEFAULT NULL,
  `categoria_id` varchar(50) DEFAULT NULL,
  `subcategoria_id` varchar(50) DEFAULT NULL,
  `estatus` varchar(10) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla multimedia.video: ~3 rows (aproximadamente)
INSERT INTO `video` (`id`, `titulo`, `descripcion`, `categoria_id`, `subcategoria_id`, `estatus`, `link`, `created_at`, `updated_at`) VALUES
	(5, 'MAQUINA OVER LOOK', 'escencia de la animacion ademas que es una forma de comprobar el funcionamiento de la carga de los videos', '1', '4', 'A', 'videos/XDVIehp72ScXsvMUIGKWhZzPN44DqNbiCfQNKNYz.mp4', '2023-12-05 19:03:14', '2023-12-07 14:39:27'),
	(6, 'COLOCACION DE LA AGUJA', 'es mucho texto pero es importante para mostrar en la base de datos', '1', '5', 'A', 'videos/6OOT9NPkrEwrtqY4iGGEEXUn8g5nAhMBWUBLgfO1.mp4', '2023-12-05 19:13:20', '2023-12-05 19:13:20'),
	(7, 'AJOLOTE', 'Un ajolote adulto, a la edad de dieciocho a veintisiete meses, tiene una longitud entre 15 y 35 cm, siendo más común que tengan un tamaño cercano a los 23 cm y es raro que lleguen a medir más de 30 cm. Los ajolotes poseen características típicas de los renacuajos y las salamandras, que incluyen tres pares de branquias externas y una aleta caudal que se extiende desde detrás de la cabeza hasta la cloaca.', '2', '9', 'A', 'videos/XuQrWfmq37IDEYzS5zZVOqoC2zEnW4ZLGwjQYl6y.mp4', '2023-12-05 19:35:12', '2023-12-05 19:35:12'),
	(28, 'ROBOT DYNAMICS BOSTON', 'Boston Dynamics1​ es una empresa estadounidense de ingeniería y robótica que se especializa en la construcción de robots. La compañía fue fundada en 1992 por el ingeniero Marc Raibert, exprofesor del Instituto de Tecnología de Massachusetts.2​\r\n\r\nEn diciembre del 2013, fue comprada por Google.2​3​4​5​6​ El 9 de junio del 2017, fue comprada por la empresa japonesa SoftBank.7​ El 10 de diciembre del 2020, la empresa fue vendida a Hyundai.8​\r\n\r\nAl principio de la historia de la compañía, trabajó con la American Systems Corporation bajo un contrato de la División de Sistemas de Entrenamiento del Centro de Guerra Aérea Naval (NAWCTSD) para reemplazar los videos de entrenamiento navales para operaciones de lanzamiento de aeronaves con simulaciones interactivas en 3D con personajes de DI Guy.[cita requerida]\r\n\r\nEl 13 de diciembre del 2013, la compañía fue adquirida por Google X (una filial de Alphabet Inc.) por un precio desconocido, donde fue manejado por Andy Rubin hasta su salida de Google en 2014. Inmediatamente antes de la adquisición, Boston Dynamics transfirió su línea de productos de software DI-Guy a MAK Technologies Inc. (anteriormente VT MAK, Inc.), un proveedor de software de simulación con oficinas centrales en Cambridge, Massachusetts.[cita requerida]\r\n\r\nEl 17 de marzo del 2016, Bloomberg News reveló que Alphabet Inc. estaba planeando vender la compañía con Toyota y Amazon.', '1', '4', 'A', 'videos/RFEdTtifLbpTZDHA8W3NGchG9d4g40WfjGuACjUh.mp4', '2023-12-12 00:04:22', '2023-12-12 00:04:22'),
	(29, 'BOSTON DYNAMICS PRO', 'The world’s most dynamic humanoid robot, Atlas is a research platform that allows us to push the limits of whole-body mobility and bimanual manipulation. An advanced control system and state-of-the-art hardware give the robot the power and balance to demonstrate advanced athletics and agility.\r\n\r\n \r\n\r\nWe use Atlas to explore the potential of the humanoid form factor, leveraging the robot’s whole body to move with grace, speed, and dexterity. Atlas demonstrates our efforts to develop the next generation of robots with the mobility, perception, and intelligence needed to be commonplace in our lives.', '1', '4', 'A', 'videos/tx856NDcMYzx4ZOYtptSMKAKAjWGIsUTOIysskSQ.mp4', '2023-12-12 17:08:13', '2023-12-12 17:08:13');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
