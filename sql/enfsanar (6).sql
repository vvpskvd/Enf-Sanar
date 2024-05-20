-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2024 a las 03:53:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `enfsanar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `id_atencion` varchar(100) NOT NULL,
  `fecha_programada` date DEFAULT NULL,
  `inicio_cita` time DEFAULT NULL,
  `fin_cita` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`id_atencion`, `fecha_programada`, `inicio_cita`, `fin_cita`) VALUES
('A1', '2024-05-01', '16:27:27', '16:40:20'),
('A10', '2024-05-12', '10:50:22', '10:57:23'),
('A2', '2024-03-02', '17:05:03', '17:15:21'),
('A3', '2024-01-03', '15:34:43', '15:45:21'),
('A4', '2024-05-10', '09:25:30', '09:40:01'),
('A5', '2024-05-05', '17:50:22', '17:59:23'),
('A6', '2024-05-10', '14:40:41', '14:57:23'),
('A7', '2024-03-05', '15:56:55', '16:12:23'),
('A8', '2024-01-07', '08:20:43', '08:38:23'),
('A9', '2024-05-15', '09:50:22', '09:57:23');

--
-- Disparadores `atencion`
--
DELIMITER $$
CREATE TRIGGER `before_insert_atencion` BEFORE INSERT ON `atencion` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_atencion INTO last_id FROM atencion ORDER BY id_atencion DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 2) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'A';

    SET NEW.id_atencion = CONCAT(prefix, new_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_horario_cita` BEFORE INSERT ON `atencion` FOR EACH ROW BEGIN
    IF NEW.inicio_cita >= NEW.fin_cita THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La hora de inicio de la cita debe ser antes de la hora de fin.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_consulta`
--

CREATE TABLE `cita_consulta` (
  `id_cita_consulta` varchar(100) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `id_consulta` varchar(100) DEFAULT NULL,
  `id_atencion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita_consulta`
--

INSERT INTO `cita_consulta` (`id_cita_consulta`, `id_paciente`, `fecha_solicitud`, `id_consulta`, `id_atencion`) VALUES
('CC1', 1091234567, '2024-04-20', 'C1', 'A1'),
('CC2', 1092345678, '2024-02-25', 'C2', 'A2'),
('CC3', 1093456789, '2023-12-15', 'C3', 'A3'),
('CC4', 1094567890, '2024-04-23', 'C4', 'A4'),
('CC5', 1095678901, '2024-04-05', 'C5', 'A5');

--
-- Disparadores `cita_consulta`
--
DELIMITER $$
CREATE TRIGGER `before_insert_cita_consulta` BEFORE INSERT ON `cita_consulta` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_cita_consulta INTO last_id FROM cita_consultas ORDER BY id_cita_consulta DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'CC';

    SET NEW.id_cita_consulta = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_procedimiento`
--

CREATE TABLE `cita_procedimiento` (
  `id_cita_procedimiento` varchar(100) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `id_procedimiento` varchar(100) DEFAULT NULL,
  `id_atencion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita_procedimiento`
--

INSERT INTO `cita_procedimiento` (`id_cita_procedimiento`, `id_paciente`, `fecha_solicitud`, `id_procedimiento`, `id_atencion`) VALUES
('CP1', 1091234567, '2024-02-25', 'PR1', 'A6'),
('CP2', 1092345678, '2024-05-05', 'PR2', 'A7'),
('CP3', 1093456789, '2024-05-03', 'PR3', 'A8'),
('CP4', 1094567890, '2024-01-05', 'PR4', 'A9'),
('CP5', 1095678901, '2024-05-10', 'PR5', 'A10');

--
-- Disparadores `cita_procedimiento`
--
DELIMITER $$
CREATE TRIGGER `before_insert_cita_procedimientos` BEFORE INSERT ON `cita_procedimiento` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_cita_procedimiento INTO last_id FROM cita_procedimientos ORDER BY id_cita_procedimiento DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'CP';

    SET NEW.id_cita_procedimiento = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` varchar(100) NOT NULL,
  `id_enfermera` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `diagnostico_principal` text DEFAULT NULL,
  `motivo_consulta` text DEFAULT NULL,
  `id_atencion` varchar(100) DEFAULT NULL,
  `id_herida` varchar(100) DEFAULT NULL,
  `insumos_requeridos` text DEFAULT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_enfermera`, `id_paciente`, `diagnostico_principal`, `motivo_consulta`, `id_atencion`, `id_herida`, `insumos_requeridos`, `notas`) VALUES
('C1', 1076580427, 1091234567, 'W010', 'Caída en el mismo nivel por deslizamiento, tropezón y traspié', 'A1', 'H1', 'Agua oxigenada, Vendaje', 'La costra se está desprendiendo, aplicar vendaje estéril.'),
('C2', 1086343168, 1092345678, 'S610', 'Herida de dedo(s) de la mano, sin daño de la(s) uña(s)', 'A2', 'H2', 'Apósito adhesivo, Tijeras', 'Mantener el área limpia y aplicar presión sobre la herida si sangra.'),
('C3', 1060234767, 1093456789, 'T232', 'Quemadura de la muñeca y de la mano, de segundo grado', 'A3', 'H3', 'Crema hidratante, Apósito', 'Evitar exponer la quemadura al sol y mantener hidratada.'),
('C4', 1060234767, 1094567890, 'W540', 'Mordedura o ataque de perro', 'A4', 'H4', 'Agua y jabón, Gasas', 'Revisar vacunación antitetánica y limpieza adecuada.'),
('C5', 1086343168, 1095678901, 'N61X', 'Transtorno inflamatorio de la mama (absceso)', 'A5', 'H5', 'Colchón antiescaras, Apósito', 'No mojar aposito, retirar solo por necesidad del exudado en caso de ser abundante');

--
-- Disparadores `consulta`
--
DELIMITER $$
CREATE TRIGGER `before_insert_consultas` BEFORE INSERT ON `consulta` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_consulta INTO last_id FROM consultas ORDER BY id_consulta DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 2) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'C';

    SET NEW.id_consulta = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermera`
--

CREATE TABLE `enfermera` (
  `identificacion` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermera`
--

INSERT INTO `enfermera` (`identificacion`, `nombres`, `apellidos`, `correo`, `fecha_nacimiento`, `telefono`) VALUES
(1060234767, 'Juana', 'Marco Herrera', 'juanito_marco@gmail.com', '1988-12-10', '310 567 1234'),
(1076580427, 'Ana Esther', 'Ramirez Vega', 'ana_ramirez@gmail.com', '1990-07-15', '315 123 4562'),
(1086343168, 'Gabriela', 'Gómez Rodriguez', 'gabby_gomez@hotmail.com', '1985-04-23', '300 987 6543');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herida`
--

CREATE TABLE `herida` (
  `id_herida` varchar(100) NOT NULL,
  `caracteristica_herida` text DEFAULT NULL,
  `largo` int(11) DEFAULT NULL,
  `ancho` int(11) DEFAULT NULL,
  `profundidad` text DEFAULT NULL,
  `forma` varchar(100) DEFAULT NULL,
  `olor` varchar(100) DEFAULT NULL,
  `bordes_herida` varchar(100) DEFAULT NULL,
  `infeccion_diseminada` char(2) DEFAULT NULL,
  `infeccion_local` char(2) DEFAULT NULL,
  `exudado_tipo` varchar(100) DEFAULT NULL,
  `exudado_nivel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herida`
--

INSERT INTO `herida` (`id_herida`, `caracteristica_herida`, `largo`, `ancho`, `profundidad`, `forma`, `olor`, `bordes_herida`, `infeccion_diseminada`, `infeccion_local`, `exudado_tipo`, `exudado_nivel`) VALUES
('H1', 'Costra amarillenta', 2, 3, 'Superficial', 'Ovalada', 'Sí', 'Regulares', 'No', 'No', 'Seroso', 'Bajo'),
('H2', 'Hemorragia leve', 4, 4, 'Superficial', 'Irregular', 'No', 'Irregulares', 'No', 'Sí', 'Purulento', 'Medio'),
('H3', 'Enrojecimiento, leve dolor', 5, 2, 'Superficial', 'Redonda', 'No', 'Elevados', 'No', 'Sí', 'Seroso', 'Alto'),
('H4', 'Marcas lineales, irritación', 2, 4, 'Superficial', 'Irregular', 'No', 'Elevados', 'No', 'Sí', 'Serosanguinolento', 'Medio'),
('H5', 'Aguda', 3, 6, 'Superficial', 'Ovalada', 'Si', 'Elevados', 'No', 'Sí', 'Purulento', 'Alto');

--
-- Disparadores `herida`
--
DELIMITER $$
CREATE TRIGGER `before_insert_herida` BEFORE INSERT ON `herida` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_herida INTO last_id FROM herida ORDER BY id_herida DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 2) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'H';

    SET NEW.id_herida = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_e`
--

CREATE TABLE `login_e` (
  `id_login` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `id_enfermera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login_e`
--

INSERT INTO `login_e` (`id_login`, `usuario`, `contraseña`, `id_enfermera`) VALUES
('LE1', 'ana_ramirez@gmail.com', 'anaramirezle1', 1076580427),
('LE2', 'gabby_gomez@hotmail.com', 'gabbygomezle2', 1086343168),
('LE3', 'juanito_marco@gmail.com', 'juanitomarcole3', 1060234767);

--
-- Disparadores `login_e`
--
DELIMITER $$
CREATE TRIGGER `before_insert_login_e` BEFORE INSERT ON `login_e` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_login INTO last_id FROM login_e ORDER BY id_login DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'LE';

    SET NEW.id_login = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_r`
--

CREATE TABLE `login_r` (
  `id_login` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `id_recepcionista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login_r`
--

INSERT INTO `login_r` (`id_login`, `usuario`, `contraseña`, `id_recepcionista`) VALUES
('LR1', 'diana_juarez@gmail.com', 'dianajuarezlr1', 1094582932),
('LR2', 'sofia_correa@gmail.com', 'sofiacorrealr2', 1576314782),
('LR3', 'johana_perez@gmail.com', 'johanaperezlr3', 1459763852);

--
-- Disparadores `login_r`
--
DELIMITER $$
CREATE TRIGGER `before_insert_login_r` BEFORE INSERT ON `login_r` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_login INTO last_id FROM login_r ORDER BY id_login DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'LR';

    SET NEW.id_login = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `identificacion` int(11) NOT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `barrio` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `tipo_sangre` varchar(3) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `entidad` varchar(100) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `comorbilidades` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`identificacion`, `tipo_documento`, `nombres`, `apellidos`, `telefono`, `direccion`, `barrio`, `municipio`, `fecha_nacimiento`, `nacionalidad`, `sexo`, `tipo_sangre`, `correo`, `ocupacion`, `entidad`, `estado_civil`, `comorbilidades`) VALUES
(1091234567, 'Cédula de extranjería', 'Juan Pablo', 'García Rodríguez', '57 310 123 4567', 'Carrera 5 # 10-15', 'Villa Nueva', 'Cúcuta', '1965-09-23', 'Colombiana', 'Masculino', 'A+', 'juanpablo.gr@gmail.com', 'Profesor', 'COOMEVA', 'Casado', 'Hipertension arterial'),
(1092345678, 'Tarjeta de identidad', 'María Fernanda', 'Martínez López', '57 314 345 6789', 'Calle 8 # 20-25', 'San Rafael', 'Villa del Rosario', '2008-07-15', 'Colombiana', 'Femenino', 'O-', 'mariafernanda.ml@hotmail.com', 'Matematico', 'EMS', 'Union Libre', 'Ninguna'),
(1093456789, 'Cédula de ciudadanía', 'Carlos Andrés', 'Rodríguez Hernández', '57 317 567 8901', 'Avenida 3 # 15-30', 'Villa del Carmen', 'Los Patios', '1968-11-04', 'Colombiana', 'Masculino', 'B+', 'carlosandresrh@outlook.com', 'Ingeniero Mecanico', 'SISBEN - III', 'Casado', 'Ninguna'),
(1094567890, 'Tarjeta de identidad', 'Ana Sofía', 'López Pérez', '57 321 789 0123', 'Calle 12 # 25-20', 'El Contento', 'Los Patios', '2008-05-29', 'Colombiana', 'Femenino', 'AB-', 'anasofia.lp@gmail.com', 'Ingeniero Quimico', 'SISBEN - II', 'Casado', 'Ninguna'),
(1095678901, 'Cédula de ciudadanía', 'Luis Miguel', 'Hernández González', '57 318 901 2345', 'Avenida 7 # 10-35', 'El Salado', 'Cúcuta', '1967-03-12', 'Colombiana', 'Masculino', 'A-', 'luismiguel.hg@hotmail.com', 'Juez', 'COOMEVA', 'Soltero', 'Obesidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `id_procedimiento` varchar(100) NOT NULL,
  `id_enfermera` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_consulta` varchar(100) DEFAULT NULL,
  `id_atencion` varchar(100) DEFAULT NULL,
  `analisis` text DEFAULT NULL,
  `evolucion` text DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `plan_de_cuidado` text DEFAULT NULL,
  `recomendacion` text DEFAULT NULL,
  `finalidad_procedimiento` varchar(255) DEFAULT NULL,
  `cups` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`id_procedimiento`, `id_enfermera`, `id_paciente`, `id_consulta`, `id_atencion`, `analisis`, `evolucion`, `diagnostico`, `plan_de_cuidado`, `recomendacion`, `finalidad_procedimiento`, `cups`) VALUES
('PR1', 1076580427, 1091234567, 'C1', 'A6', 'Examinar la piel en la zona afectada.', 'Cicatrización natural en pocos días, evitar fricción.', 'Herida superficial, sin signos de infección.', 'Limpieza suave con agua y jabón, aplicación de vendaje estéril.', 'Evitar rascarse la zona afectada.', 'Promover la cicatrización de la herida.', '965202'),
('PR2', 1086343168, 1092345678, 'C2', 'A7', 'Evaluar la profundidad y extensión de la herida.', 'Hemostasia y cierre de la herida, seguimiento de la cicatrización.', 'Cortadura en piel, sin afectación de tejidos profundos.', 'Limpieza con solución salina, cierre con suturas o apósitos adhesivos.', 'Revisar la vacunación antitetánica si es necesario.', 'Promover la cicatrización y prevenir infecciones.', '965201'),
('PR3', 1060234767, 1093456789, 'C3', 'A8', 'Evaluar el grado y extensión de la quemadura.', 'Alivio del dolor, formación de costra y cicatrización.', 'Quemadura superficial de primer grado, sin ampollas.', 'Enfriar la zona con agua fría, aplicación de crema hidratante.', 'Evitar exponer la quemadura al sol, mantener hidratada la piel.', 'Aliviar el dolor y prevenir infecciones.', '965202'),
('PR4', 1076580427, 1094567890, 'C4', 'A9', 'Inspeccionar la zona afectada en busca de signos de infección.', 'Resolución en pocos días con formación de costras.', 'Arañazo superficial, leve irritación en la piel.', 'Limpieza con agua y jabón, aplicación de gasas estériles si es necesario.', 'Mantener la zona limpia y evitar rascarse.', 'Promover la cicatrización y prevenir infecciones.', '965202'),
('PR5', 1086343168, 1095678901, 'C5', 'A10', 'Absceso con antecedente de hace 6 años aproximadamente, con drenaje realizado hace 15 dias y recidivas del mismo.', 'Previa asepsia y antisepsia, se descubre herida, se observa apósito secundario con exudado baja cantidad.', 'Deficit de la integridad de la piel herida aguda absceso en seno izquierdo.', 'Control de la infeccion con mechas de alginato de plata.', 'Cambiar apositos secundarios segun necesidad, es decir si se observan mojados de exudado.', 'Terapéutico.', '965201');

--
-- Disparadores `procedimiento`
--
DELIMITER $$
CREATE TRIGGER `before_insert_procedimientos` BEFORE INSERT ON `procedimiento` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    -- Obtener el último id_procedimiento
    SELECT id_procedimiento INTO last_id FROM Procedimientos ORDER BY id_procedimiento DESC LIMIT 1;

    -- Verificar si last_id es nulo (tabla vacía)
    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        -- Extraer el número del último id_procedimiento
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    -- Asignar el prefijo
    SET prefix = 'PR';

    -- Asignar el nuevo id_procedimiento
    SET NEW.id_procedimiento = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

CREATE TABLE `recepcionista` (
  `identificacion` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recepcionista`
--

INSERT INTO `recepcionista` (`identificacion`, `nombres`, `apellidos`, `correo`, `fecha_nacimiento`, `telefono`) VALUES
(1094582932, 'Diana Paola', 'Juarez Ramirez', 'diana_juarez@gmail.com', '1952-07-25', '57 301 579 3547'),
(1459763852, 'Johana Maria', 'Perez Galindo', 'johana_perez@gmail.com', '1979-06-24', '57 310 369 4521'),
(1576314782, 'Sofia', 'Correa Prieto', 'sofia_correa@gmail.com', '1993-08-24', '57 301 569 3347');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`id_atencion`);

--
-- Indices de la tabla `cita_consulta`
--
ALTER TABLE `cita_consulta`
  ADD PRIMARY KEY (`id_cita_consulta`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_consulta` (`id_consulta`),
  ADD KEY `id_atencion` (`id_atencion`);

--
-- Indices de la tabla `cita_procedimiento`
--
ALTER TABLE `cita_procedimiento`
  ADD PRIMARY KEY (`id_cita_procedimiento`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_procedimiento` (`id_procedimiento`),
  ADD KEY `id_atencion` (`id_atencion`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_enfermera` (`id_enfermera`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_atencion` (`id_atencion`),
  ADD KEY `id_atencion_2` (`id_atencion`),
  ADD KEY `id_herida` (`id_herida`);

--
-- Indices de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `herida`
--
ALTER TABLE `herida`
  ADD PRIMARY KEY (`id_herida`);

--
-- Indices de la tabla `login_e`
--
ALTER TABLE `login_e`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_enfermera` (`id_enfermera`);

--
-- Indices de la tabla `login_r`
--
ALTER TABLE `login_r`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_recepcionista` (`id_recepcionista`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`id_procedimiento`),
  ADD KEY `id_enfermera` (`id_enfermera`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_consulta` (`id_consulta`),
  ADD KEY `id_atencion` (`id_atencion`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`identificacion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita_consulta`
--
ALTER TABLE `cita_consulta`
  ADD CONSTRAINT `cita_consulta_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_consulta_ibfk_2` FOREIGN KEY (`id_atencion`) REFERENCES `atencion` (`id_atencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_consulta_ibfk_3` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id_consulta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita_procedimiento`
--
ALTER TABLE `cita_procedimiento`
  ADD CONSTRAINT `cita_procedimiento_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_procedimiento_ibfk_2` FOREIGN KEY (`id_procedimiento`) REFERENCES `procedimiento` (`id_procedimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_procedimiento_ibfk_3` FOREIGN KEY (`id_atencion`) REFERENCES `atencion` (`id_atencion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_atencion`) REFERENCES `atencion` (`id_atencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_herida`) REFERENCES `herida` (`id_herida`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_4` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_5` FOREIGN KEY (`id_enfermera`) REFERENCES `enfermera` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `login_e`
--
ALTER TABLE `login_e`
  ADD CONSTRAINT `login_e_ibfk_1` FOREIGN KEY (`id_enfermera`) REFERENCES `enfermera` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `login_r`
--
ALTER TABLE `login_r`
  ADD CONSTRAINT `login_r_ibfk_1` FOREIGN KEY (`id_recepcionista`) REFERENCES `recepcionista` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD CONSTRAINT `procedimiento_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procedimiento_ibfk_4` FOREIGN KEY (`id_atencion`) REFERENCES `atencion` (`id_atencion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procedimiento_ibfk_5` FOREIGN KEY (`id_enfermera`) REFERENCES `enfermera` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procedimiento_ibfk_6` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id_consulta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
