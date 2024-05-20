-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2024 a las 21:58:02
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
-- Estructura de tabla para la tabla `cita_consulta`
--

CREATE TABLE `cita_consulta` (
  `id_cita_consulta` varchar(100) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `fecha_programada` date DEFAULT NULL,
  `hora_programada` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita_consulta`
--

INSERT INTO `cita_consulta` (`id_cita_consulta`, `id_paciente`, `fecha_solicitud`, `fecha_programada`, `hora_programada`) VALUES
('CC1', 1091234567, '2024-04-20', '2024-05-01', '16:30:00'),
('CC2', 1092345678, '2024-02-25', '2024-03-02', '17:00:00'),
('CC3', 1093456789, '2023-12-15', '2024-01-03', '15:30:00'),
('CC4', 1094567890, '2024-04-23', '2024-05-10', '09:30:00'),
('CC5', 1095678901, '2024-04-05', '2024-05-05', '18:00:00');

--
-- Disparadores `cita_consulta`
--
DELIMITER $$
CREATE TRIGGER `before_insert_cita_consulta` BEFORE INSERT ON `cita_consulta` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_cita_consulta INTO last_id FROM cita_consulta ORDER BY id_cita_consulta DESC LIMIT 1;

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
  `fecha_programada` date DEFAULT NULL,
  `hora_programada` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita_procedimiento`
--

INSERT INTO `cita_procedimiento` (`id_cita_procedimiento`, `id_paciente`, `fecha_solicitud`, `fecha_programada`, `hora_programada`) VALUES
('CP1', 1091234567, '2024-05-01', '2024-05-10', '14:40:00'),
('CP2', 1092345678, '2024-02-25', '2024-03-05', '15:50:00'),
('CP3', 1093456789, '2024-01-03', '2024-01-07', '08:20:00'),
('CP4', 1094567890, '2024-05-05', '2024-05-15', '09:50:00'),
('CP5', 1095678901, '2024-05-10', '2024-05-12', '10:50:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` varchar(100) NOT NULL,
  `id_enfermera` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `diagnostico_principal` varchar(10) DEFAULT NULL,
  `motivo_consulta` varchar(255) DEFAULT NULL,
  `id_herida` varchar(100) DEFAULT NULL,
  `insumos_requeridos` varchar(255) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `id_cita` varchar(100) DEFAULT NULL,
  `fecha_atencion` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_enfermera`, `id_paciente`, `diagnostico_principal`, `motivo_consulta`, `id_herida`, `insumos_requeridos`, `notas`, `id_cita`, `fecha_atencion`, `hora_inicio`, `hora_final`) VALUES
('C1', 1076580427, 1091234567, 'W010', 'Caída en el mismo nivel por deslizamiento, tropezón y traspié', 'H1', 'Agua oxigenada, Vendaje', 'La costra se está desprendiendo, aplicar vendaje estéril.', 'CC1', '2024-05-01', '16:42:00', '17:05:00'),
('C2', 1086343168, 1092345678, 'S610', 'Herida de dedo(s) de la mano, sin daño de la(s) uña(s)', 'H2', 'Apósito adhesivo, Tijeras', 'Mantener el área limpia y aplicar presión sobre la herida si sangra.', 'CC2', '2024-03-02', '17:03:00', '17:15:00'),
('C3', 1060234767, 1093456789, 'T232', 'Quemadura de la muñeca y de la mano, de segundo grado', 'H3', 'Crema hidratante, Apósito', 'Evitar exponer la quemadura al sol y mantener hidratada.', 'CC3', '2024-01-03', '15:45:00', '15:59:00'),
('C4', 1060234767, 1094567890, 'W540', 'Mordedura o ataque de perro', 'H4', 'Agua y jabón, Gasas', 'Revisar vacunación antitetánica y limpieza adecuada.', 'CC4', '2024-05-10', '09:25:00', '09:40:00'),
('C5', 1086343168, 1095678901, 'N61X', 'Transtorno inflamatorio de la mama (absceso)', 'H5', 'Colchón antiescaras, Apósito', 'No mojar aposito, retirar solo por necesidad del exudado en caso de ser abundante.', 'CC5', '2024-05-05', '18:05:00', '18:30:00');

--
-- Disparadores `consulta`
--
DELIMITER $$
CREATE TRIGGER `before_insert_consulta` BEFORE INSERT ON `consulta` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_consulta INTO last_id FROM consulta ORDER BY id_consulta DESC LIMIT 1;

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
DELIMITER $$
CREATE TRIGGER `before_insert_consulta_cita` BEFORE INSERT ON `consulta` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_cita INTO last_id FROM consulta ORDER BY id_cita DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'CC';

    SET NEW.id_cita = CONCAT(prefix, new_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_herida_consulta` BEFORE INSERT ON `consulta` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_herida INTO last_id FROM consulta ORDER BY id_herida DESC LIMIT 1;

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
-- Estructura de tabla para la tabla `enfermera`
--

CREATE TABLE `enfermera` (
  `identificacion` int(11) NOT NULL,
  `id_personal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermera`
--

INSERT INTO `enfermera` (`identificacion`, `id_personal`) VALUES
(1076580427, 'PE1'),
(1086343168, 'PE2'),
(1060234767, 'PE3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herida`
--

CREATE TABLE `herida` (
  `id_herida` varchar(100) NOT NULL,
  `caracteristica_herida` varchar(100) DEFAULT NULL,
  `largo` decimal(5,2) DEFAULT NULL,
  `ancho` decimal(5,2) DEFAULT NULL,
  `profundidad` varchar(20) DEFAULT NULL,
  `forma` varchar(20) DEFAULT NULL,
  `olor` varchar(20) DEFAULT NULL,
  `bordes_herida` varchar(20) DEFAULT NULL,
  `infeccion_diseminada` varchar(3) DEFAULT NULL,
  `infeccion_local` varchar(3) DEFAULT NULL,
  `exudado_tipo` varchar(20) DEFAULT NULL,
  `exudado_nivel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herida`
--

INSERT INTO `herida` (`id_herida`, `caracteristica_herida`, `largo`, `ancho`, `profundidad`, `forma`, `olor`, `bordes_herida`, `infeccion_diseminada`, `infeccion_local`, `exudado_tipo`, `exudado_nivel`) VALUES
('H1', 'Costra amarillenta', 2.00, 3.00, 'Superficial', 'Ovalada', 'Sí', 'Regulares', 'No', 'No', 'Seroso', 'Bajo'),
('H2', 'Hemorragia leve', 4.00, 4.00, 'Superficial', 'Irregular', 'No', 'Irregulares', 'No', 'Sí', 'Purulento', 'Medio'),
('H3', 'Enrojecimiento, leve dolor', 5.00, 2.00, 'Superficial', 'Redonda', 'No', 'Elevados', 'No', 'Sí', 'Seroso', 'Alto'),
('H4', 'Marcas lineales, irritación', 2.00, 4.00, 'Superficial', 'Irregular', 'No', 'Elevados', 'No', 'Sí', 'Serosanguinolento', 'Medio'),
('H5', 'Aguda', 3.00, 6.00, 'Superficial', 'Ovalada', 'Sí', 'Elevados', 'No', 'Sí', 'Purulento', 'Alto');

--
-- Disparadores `herida`
--
DELIMITER $$
CREATE TRIGGER `before_insert_herida_herida` BEFORE INSERT ON `herida` FOR EACH ROW BEGIN
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
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` varchar(100) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `id_personal` varchar(100) DEFAULT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `usuario`, `contraseña`, `id_personal`, `rol`) VALUES
('L1', 'ana_ramirez@gmail.com', 'anaramirezle1', 'PE1', 'enfermera'),
('L2', 'gabby_gomez@hotmail.com', 'gabbygomezle2', 'PE2', 'enfermera'),
('L3', 'juanito_marco@gmail.com', 'juanitomarcole3', 'PE3', 'enfermera'),
('L4', 'diana_juarez@gmail.com', 'dianajuarezlr1', 'PE4', 'recepcionista'),
('L5', 'sofia_correa@gmail.com', 'sofiacorrealr2', 'PE5', 'recepcionista'),
('L6', 'johana_perez@gmail.com', 'johanaperezlr3', 'PE6', 'recepcionista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `identificacion` int(11) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tipo_sangre` varchar(5) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `entidad` varchar(50) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `comorbilidades` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`identificacion`, `tipo_documento`, `nombre`, `apellido`, `telefono`, `direccion`, `barrio`, `municipio`, `fecha_nacimiento`, `nacionalidad`, `sexo`, `tipo_sangre`, `correo`, `ocupacion`, `entidad`, `estado_civil`, `comorbilidades`) VALUES
(1091234567, 'Cédula de extranjería', 'Juan', 'García', '310 123 4567', 'Carrera 5 # 10-15', 'Villa Nueva', 'Cúcuta', '1965-09-23', 'Colombiana', 'Masculino', 'A+', 'juanpablo.gr@gmail.com', 'Profesor', 'COOMEVA', 'Casado', 'Hipertension arterial'),
(1092345678, 'Tarjeta de identidad', 'María', 'Martínez', '314 345 6789', 'Calle 8 # 20-25', 'San Rafael', 'Villa del Rosario', '2008-07-15', 'Colombiana', 'Femenino', 'O-', 'mariafernanda.ml@hotmail.com', 'Matematico', 'EMS', 'Union Libre', 'Ninguna'),
(1093456789, 'Cédula de ciudadanía', 'Carlos', 'Rodríguez', '317 567 8901', 'Avenida 3 # 15-30', 'Villa del Carmen', 'Los Patios', '1968-11-04', 'Colombiana', 'Masculino', 'B+', 'carlosandresrh@outlook.com', 'Ingeniero Mecanico', 'SISBEN - III', 'Casado', 'Ninguna'),
(1094567890, 'Tarjeta de identidad', 'Ana', 'López', '321 789 0123', 'Calle 12 # 25-20', 'El Contento', 'Los Patios', '2008-05-29', 'Colombiana', 'Femenino', 'AB-', 'anasofia.lp@gmail.com', 'Ingeniero Quimico', 'SISBEN - II', 'Casado', 'Ninguna'),
(1095678901, 'Cédula de ciudadanía', 'Luis', 'Hernández', '318 901 2345', 'Avenida 7 # 10-35', 'El Salado', 'Cúcuta', '1967-03-12', 'Colombiana', 'Masculino', 'A-', 'luismiguel.hg@hotmail.com', 'Juez', 'COOMEVA', 'Soltero', 'Obesidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre`, `apellido`, `correo`, `fecha_nacimiento`, `telefono`) VALUES
('PE1', 'Ana', 'Ramirez', 'ana_ramirez@gmail.com', '1990-07-15', '315 123 4562'),
('PE2', 'Gabriela', 'Gómez', 'gabby_gomez@hotmail.com', '1985-04-23', '300 987 6543'),
('PE3', 'Juana', 'Marco', 'juanito_marco@gmail.com', '1988-12-10', '310 567 1234'),
('PE4', 'Diana', 'Juarez', 'diana_juarez@gmail.com', '1952-07-25', '301 579 3547'),
('PE5', 'Sofia', 'Correa', 'sofia_correa@gmail.com', '1993-08-24', '301 569 3347'),
('PE6', 'Johana', 'Perez', 'johana_perez@gmail.com', '1979-06-24', '310 369 4521');

--
-- Disparadores `personal`
--
DELIMITER $$
CREATE TRIGGER `before_insert_personal` BEFORE INSERT ON `personal` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_personal INTO last_id FROM personal ORDER BY id_personal DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'PE';

    SET NEW.id_personal = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `id_procedimiento` varchar(100) NOT NULL,
  `id_enfermera` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_consulta` varchar(100) DEFAULT NULL,
  `analisis` text DEFAULT NULL,
  `evolucion` text DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `plan_de_cuidado` text DEFAULT NULL,
  `recomendacion` text DEFAULT NULL,
  `finalidad_procedimiento` varchar(255) DEFAULT NULL,
  `cups` varchar(10) DEFAULT NULL,
  `id_cita` varchar(100) DEFAULT NULL,
  `fecha_atencion` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`id_procedimiento`, `id_enfermera`, `id_paciente`, `id_consulta`, `analisis`, `evolucion`, `diagnostico`, `plan_de_cuidado`, `recomendacion`, `finalidad_procedimiento`, `cups`, `id_cita`, `fecha_atencion`, `hora_inicio`, `hora_final`) VALUES
('P1', 1076580427, 1091234567, 'C1', 'Examinar la piel en la zona afectada.', 'Cicatrización natural en pocos días, evitar fricción.', 'Herida superficial, sin signos de infección.', 'Limpieza suave con agua y jabón, aplicación de vendaje estéril.', 'Evitar rascarse la zona afectada.', 'Promover la cicatrización de la herida.', '965202', 'CP1', '2024-05-10', '14:46:00', '15:00:00'),
('P2', 1086343168, 1092345678, 'C2', 'Evaluar la profundidad y extensión de la herida.', 'Hemostasia y cierre de la herida, seguimiento de la cicatrización.', 'Cortadura en piel, sin afectación de tejidos profundos.', 'Limpieza con solución salina, cierre con suturas o apósitos adhesivos.', 'Revisar la vacunación antitetánica si es necesario.', 'Promover la cicatrización y prevenir infecciones.', '965201', 'CP2', '2024-03-05', '15:52:00', '16:02:00'),
('P3', 1060234767, 1093456789, 'C3', 'Evaluar el grado y extensión de la quemadura.', 'Alivio del dolor, formación de costra y cicatrización.', 'Quemadura superficial de primer grado, sin ampollas.', 'Enfriar la zona con agua fría, aplicación de crema hidratante.', 'Evitar exponer la quemadura al sol, mantener hidratada la piel.', 'Aliviar el dolor y prevenir infecciones.', '965202', 'CP3', '2024-01-07', '08:24:00', '08:37:00'),
('P4', 1076580427, 1094567890, 'C4', 'Inspeccionar la zona afectada en busca de signos de infección.', 'Resolución en pocos días con formación de costras.', 'Arañazo superficial, leve irritación en la piel.', 'Limpieza con agua y jabón, aplicación de gasas estériles si es necesario.', 'Mantener la zona limpia y evitar rascarse.', 'Promover la cicatrización y prevenir infecciones.', '965202', 'CP4', '2024-05-15', '09:53:00', '09:59:00'),
('P5', 1086343168, 1095678901, 'C5', 'Absceso con antecedente de hace 6 años aproximadamente, con drenaje realizado hace 15 dias y recidivas del mismo.', 'Previa asepsia y antisepsia, se descubre herida, se observa apósito secundario con exudado baja cantidad.', 'Deficit de la integridad de la piel herida aguda absceso en seno izquierdo.', 'Control de la infeccion con mechas de alginato de plata.', 'Cambiar apositos secundarios segun necesidad, es decir si se observan mojados de exudado.', 'Terapéutico.', '965201', 'CP5', '2024-05-12', '10:48:00', '10:57:00');

--
-- Disparadores `procedimiento`
--
DELIMITER $$
CREATE TRIGGER `before_insert_procedimiento` BEFORE INSERT ON `procedimiento` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_procedimiento INTO last_id FROM Procedimiento ORDER BY id_procedimiento DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 2) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'P';

    SET NEW.id_procedimiento = CONCAT(prefix, new_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_procedimiento_cita` BEFORE INSERT ON `procedimiento` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_cita INTO last_id FROM Procedimiento ORDER BY id_cita DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 3) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'CP';

    SET NEW.id_cita = CONCAT(prefix, new_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_procedimiento_consulta` BEFORE INSERT ON `procedimiento` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(10);
    DECLARE prefix VARCHAR(2);
    DECLARE new_id INT;

    SELECT id_cita INTO last_id FROM Procedimiento ORDER BY id_cita DESC LIMIT 1;

    IF last_id IS NULL THEN
        SET new_id = 1;
    ELSE
        SET new_id = CAST(SUBSTRING(last_id, 2) AS UNSIGNED) + 1;
    END IF;

    SET prefix = 'C';

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
  `id_personal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recepcionista`
--

INSERT INTO `recepcionista` (`identificacion`, `id_personal`) VALUES
(1094582932, 'PE4'),
(1576314782, 'PE5'),
(1459763852, 'PE6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita_consulta`
--
ALTER TABLE `cita_consulta`
  ADD PRIMARY KEY (`id_cita_consulta`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `cita_procedimiento`
--
ALTER TABLE `cita_procedimiento`
  ADD PRIMARY KEY (`id_cita_procedimiento`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_enfermera` (`id_enfermera`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `fk_id_herida` (`id_herida`),
  ADD KEY `fk_id_cita` (`id_cita`);

--
-- Indices de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `herida`
--
ALTER TABLE `herida`
  ADD PRIMARY KEY (`id_herida`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `fk_id_personal` (`id_personal`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`id_procedimiento`),
  ADD KEY `id_enfermera` (`id_enfermera`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_consulta` (`id_consulta`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita_consulta`
--
ALTER TABLE `cita_consulta`
  ADD CONSTRAINT `cita_consulta_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita_procedimiento`
--
ALTER TABLE `cita_procedimiento`
  ADD CONSTRAINT `cita_procedimiento_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_enfermera`) REFERENCES `enfermera` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_cita` FOREIGN KEY (`id_cita`) REFERENCES `cita_consulta` (`id_cita_consulta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_herida` FOREIGN KEY (`id_herida`) REFERENCES `herida` (`id_herida`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD CONSTRAINT `enfermera_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_id_personal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD CONSTRAINT `procedimiento_ibfk_1` FOREIGN KEY (`id_enfermera`) REFERENCES `enfermera` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procedimiento_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`identificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procedimiento_ibfk_3` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id_consulta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `procedimiento_ibfk_4` FOREIGN KEY (`id_cita`) REFERENCES `cita_procedimiento` (`id_cita_procedimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD CONSTRAINT `recepcionista_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
