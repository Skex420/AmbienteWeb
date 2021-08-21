-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2021 a las 06:30:58
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `letech`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizar_Producto` (IN `pIdProducto` INT(11), IN `pProducto` VARCHAR(100), IN `pValor` DOUBLE, IN `pDescripcion` VARCHAR(500), IN `pIdTipo` INT(11), IN `pImagen` VARCHAR(500))  BEGIN

UPDATE producto
SET PRODUCTO = pProducto, VALOR = pValor, DESCRIPCION = pDescripcion, ID_TIPO = pIdTipo, IMAGEN = pImagen
WHERE ID_PRODUCTO = pIdProducto and ID_TIPO = pIdTipo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Buscar_Usuario` (IN `V_USUARIO` VARCHAR(50))  BEGIN
SELECT * FROM USUARIO WHERE USUARIO=V_USUARIO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Comprar_Producto` (IN `pID_PRODUCTO` INT(11), IN `pID_TIPO` INT(11), IN `pID_USUARIO` INT(11), IN `pTOTAL_COMPRA` DOUBLE(10,2), IN `pCANTIDAD_PRODUCTOS` TINYINT(10))  BEGIN

INSERT INTO compra (ID_PRODUCTO, ID_TIPO, ID_USUARIO, TOTAL_COMPRA, CANTIDAD_PRODUCTOS, FECHA_COMPRA) VALUES (pID_PRODUCTO, pID_TIPO, pID_USUARIO, pTOTAL_COMPRA, pCANTIDAD_PRODUCTOS, now());

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Consultar_Producto` (IN `v_id_tipo` INT)  BEGIN

SELECT * FROM producto 

WHERE ID_TIPO = v_id_tipo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Consultar_Producto_Especifico` (IN `V_ID_TIPO` INT, IN `V_ID_PRODUCTO` INT)  BEGIN
SELECT pro.PRODUCTO, pro.VALOR, pro.DESCRIPCION, pro.IMAGEN, ti.TIPO, ti.ID_TIPO FROM PRODUCTO pro
INNER JOIN TIPO ti ON ti.ID_TIPO=pro.ID_TIPO
WHERE pro.ID_TIPO = V_ID_TIPO AND pro.ID_PRODUCTO=V_ID_PRODUCTO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Consultar_Tipos` ()  BEGIN

	SELECT  T.ID_TIPO, T.TIPO
    FROM	tipo T;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Consultar_TodosProductos` (IN `pIdProducto` BIGINT)  BEGIN

IF pIdProducto = -1 THEN
	SET pIdProducto = null;
END IF;

SELECT P.*, T.TIPO FROM producto P
INNER JOIN tipo T ON P.ID_TIPO = T.ID_TIPO
WHERE P.ID_PRODUCTO = IFNULL(pIdProducto,P.ID_PRODUCTO);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Eliminar_Producto` (IN `pIdPro` INT, IN `pIdTipo` INT)  BEGIN

	DELETE FROM producto
    WHERE ID_PRODUCTO = pIdPro and ID_TIPO = pIdTipo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_Usuario` (IN `V_CORREO` VARCHAR(30), IN `V_USUARIO` VARCHAR(50), IN `V_PASS` VARCHAR(30), IN `V_ID_ROL` INT(11))  BEGIN
INSERT usuario SET CORREO=V_CORREO, USUARIO=V_USUARIO, PASS=V_PASS, ID_ROL=V_ID_ROL;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Producto` (IN `pIdProducto` INT(11), IN `pProducto` VARCHAR(100), IN `pValor` DOUBLE, IN `pDescripcion` VARCHAR(500), IN `pIdTipo` INT(11), IN `pImagen` VARCHAR(500))  BEGIN

INSERT producto
SET ID_PRODUCTO = pIdProducto, PRODUCTO = pProducto, VALOR = pValor, DESCRIPCION = pDescripcion, ID_TIPO = pIdTipo, IMAGEN = pImagen;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Validar_Usuario` (IN `pUsuario` VARCHAR(100), IN `pPass` VARCHAR(100))  BEGIN

SELECT u.ID_USUARIO FROM USUARIO u
INNER JOIN ROL r on r.ID_ROL=u.ID_ROL

WHERE u.USUARIO=pUsuario AND u.PASS=pPass;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Verificacion_Login_Permisos` (IN `V_USER` VARCHAR(100), IN `V_PASS` VARCHAR(100))  BEGIN
SELECT r.ID_ROL FROM USUARIO u
INNER JOIN ROL r on r.ID_ROL=u.ID_ROL
WHERE u.USUARIO=V_USER AND u.PASS=V_PASS;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canton`
--

CREATE TABLE `canton` (
  `ID_CANTON` int(11) NOT NULL,
  `CANTON` varchar(100) NOT NULL,
  `ID_PROVINCIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_COMPRA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_TIPO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `TOTAL_COMPRA` double(10,2) NOT NULL,
  `CANTIDAD_PRODUCTOS` tinyint(10) NOT NULL,
  `FECHA_COMPRA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`ID_COMPRA`, `ID_PRODUCTO`, `ID_TIPO`, `ID_USUARIO`, `TOTAL_COMPRA`, `CANTIDAD_PRODUCTOS`, `FECHA_COMPRA`) VALUES
(2, 1, 1, 1, 2.00, 2, '2021-08-20 21:59:36'),
(6, 1, 1, 1, 500000.00, 4, '2021-08-20 22:21:07'),
(7, 1, 1, 1, 500000.00, 4, '2021-08-20 22:28:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `ID_DETALLE_FACTURA` int(11) NOT NULL,
  `ID_FACTURA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `ID_DIRECCION` int(11) NOT NULL,
  `ID_PROVINCIA` int(11) NOT NULL,
  `ID_CANTON` int(11) NOT NULL,
  `DIRECCION_GENERAL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_FACTURA` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_VENDEDOR` int(11) NOT NULL,
  `ID_SUCURSAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `PRODUCTO` varchar(100) NOT NULL,
  `VALOR` double NOT NULL,
  `DESCRIPCION` varchar(500) NOT NULL,
  `ID_TIPO` int(11) NOT NULL,
  `IMAGEN` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `PRODUCTO`, `VALOR`, `DESCRIPCION`, `ID_TIPO`, `IMAGEN`) VALUES
(1, 'BIOSTAR RADEON RX 560 4 GB', 125000, '/Fabricante: Biostar/GPU: AMD Radeon RX 560/Memoria: 4 GB GDDR5/Boost Clock: 1176 MHz', 1, 'imgs/Tarjetas Video/BIOSTAR RADEON RX 560 4 GB.png'),
(1, 'ASUS PRIME A320M-K', 48000, '/Plataforma: AMD/Socket: AM4/Chipset: AMD A320/Formato: ATX/Memoria: DDR4 2133-3200(OC) MHz', 2, 'imgs/Tarjetas Madres/ASUS PRIME A320M-K.png'),
(1, 'GOOGLE CHROMECAST 3', 25000, '/Resolución: Hasta 1080p (60 fps)/Inalámbrico: Wi-Fi 802.11ac (2,4 GHz/5 GHz)/SO compatibles: Android 4.4+ y iOS 9.1+/Requisitos: Televisor con puerto HDMI./Puertos y conectores: HDMI.', 9, 'imgs/Accesorios/GOOGLE CHROMECAST 3.png'),
(2, 'ASUS TUF GEFORCE GTX 1660 SUPER OC 6 GB', 293000, '/Fabricante: Asus/GPU: NVIDIA GeForce GTX 1660 Super/Memoria: 6 GB GDDR5/Boost Clock: 1845 MHz', 1, 'imgs/Tarjetas Video/ASUS TUF GEFORCE GTX 1660 SUPER OC 6 GB.png'),
(2, 'GIGABYTE H410M H V2', 52000, '/Plataforma: Intel/Socket: 1200/Chipset: H41+B390/Formato: Micro-ATX/Memoria:  DDR4 2133-2933 MHz', 2, 'imgs/Tarjetas Madres/GIGABYTE H410M H V2.png'),
(2, 'ASUS RAPTURE GT-AC2900 DUAL BAND', 160000, '/Acelerador de juego de tres niveles: optimiza tus paquetes de juegos en línea desde tu PC al servidor de juegos./Funciona con routers compatibles con Asus AiMesh para crear un sistema Wi-Fi potente, flexible y sin costuras./Asus Aura Lighting: múltiples efectos para un ambiente elegante y también se puede configurar para reflejar el estado de tu red.', 9, 'imgs/Accesorios/ASUS RAPTURE GT-AC2900 DUAL BAND.png'),
(3, 'AORUS GEFORCE RTX 3070TI MASTER 8 GB', 735000, '/Fabricante: Gigabyte/GPU: NVIDIA GeForce RTX 3070Ti/Memoria: 8 GB GDDR6X/Boost Clock: 1875 MHz', 1, 'imgs/Tarjetas Video/AORUS GEFORCE RTX 3070TI MASTER 8 GB.png'),
(3, 'MSI B450 TOMAHAWK MAX II', 85000, '/Plataforma: AMD/Socket: AM4/Chipset: AMD B550/Formato: Micro-ATX/Memoria: DDR4 2133-4000(OC) MHz', 2, 'imgs/Tarjetas Madres/MSI B450 TOMAHAWK MAX II.png'),
(3, 'ASUS ROG RAPTURE AX11000 TRI-BAND WI-FI 6', 311000, '/Puerto 2.5G/banda DFS/wtfast/QoS adaptable/AiMesh para sistema wifi en malla', 9, 'imgs/Accesorios/ASUS ROG RAPTURE AX11000 TRI-BAND WI-FI 6.png'),
(4, 'ZOTAC GEFORCE RTX 2060 6 GB', 329000, '/Fabricante: Zotac/GPU: NVIDIA GeForce RTX 2060/Memoria: 6 GB GDDR6/Boost Clock: 1680 MHz', 1, 'imgs/Tarjetas Video/ZOTAC GEFORCE RTX 2060 6 GB.png'),
(4, 'GIGABYTE B550M AORUS ELITE', 88000, '/Plataforma: AMD/Socket: AM4/Chipset: AMD B550/Formato: Micro-ATX/Memoria: DDR4 2133-4000(OC) MHz', 2, 'imgs/Tarjetas Madres/GIGABYTE B550M AORUS ELITE.png'),
(4, 'CORSAIR T1 RACE - NEGRO/AZUL', 165000, '/Estructura de acero sólido con cojín de espuma densa/Reposabrazos ajustables de movimiento 4D/Asiento con altura ajustable/Respaldo reclinable/Función de inclinación con bloqueo', 9, 'imgs/Accesorios/CORSAIR T1 RACE - NEGROAZUL.png'),
(5, 'MSI GEFORCE RTX3060 VENTUS 2X OC 12G', 375000, '/Fabricante: MSI/GPU: NVIDIA GeForce RTX 3060/Memoria: 12 GB GDDR6/Core Clock: 1807 MHz', 1, 'imgs/Tarjetas Video/MSI GEFORCE RTX3060 VENTUS 2X OC 12G.png'),
(5, 'ASUS PRIME Z590 A', 209000, '/Plataforma: Intel/Socket: 1200/Chipset: Z590/Formato: ATX/Memoria: 2133-5133(OC) MHz', 2, 'imgs/Tarjetas Madres/ASUS PRIME Z590 A.png'),
(5, 'NOBLECHAIRS EPIC - CUERO GENUINO - NEGRO', 265000, '/Cuero genuino de 1.7 mm de espesor/Descansa brazos ajustables 4D/Espuma fría de poros abiertos, anti-deformante/Base metálica premium de Alumiunio/Diseño e ingeniería Alemana', 9, 'imgs/Accesorios/NOBLECHAIRS EPIC - CUERO GENUINO - NEGRO.png'),
(6, 'ASUS TUF GEFORCE RTX 3080TI OC 12 GB', 1299000, '/Fabricante: Asus/GPU: NVIDIA GeForce RTX 3080Ti/Memoria: 12 GB GDDR6X/Boost Clock: 1785 MHz', 1, 'imgs/Tarjetas Video/ASUS TUF GEFORCE RTX 3080TI OC 12 GB.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `ID_PROVINCIA` int(11) NOT NULL,
  `PROVINCIA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `ROL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `ROL`) VALUES
(1, 'Admin'),
(2, 'Usuario'),
(3, 'Invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `ID_SUCURSAL` int(11) NOT NULL,
  `ID_DIRECCION` int(11) NOT NULL,
  `TELEFONO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `ID_TIPO` int(11) NOT NULL,
  `TIPO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`ID_TIPO`, `TIPO`) VALUES
(1, 'Tarjeta Video'),
(2, 'Tarjeta Madre'),
(3, 'Memoria RAM'),
(4, 'Procesador'),
(5, 'Almacenamiento'),
(6, 'Teclado'),
(7, 'Mouse'),
(8, 'Headset'),
(9, 'Accesorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `PASS` varchar(30) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `CORREO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `USUARIO`, `PASS`, `ID_ROL`, `CORREO`) VALUES
(1, 'admin01', 'admin01', 1, ''),
(2, 'user01', 'user01', 2, ''),
(3, 'invitado', 'invitado', 3, ''),
(4, 'LuisFelipe01', ' LuisFelipe01', 2, ''),
(5, 'LuisFelipe02', 'LuisFelipe02', 2, ''),
(6, 'LuisFelipe03', 'LuisFelipe03', 2, ''),
(19, 'ledezma09@hotmail.es', 'ledezma09@hotmail.es', 2, 'ledezma09@hotmail.es'),
(20, 'a', 'a', 2, 'a'),
(21, 'aa', 'aa', 2, 'sadjksandsajkn'),
(22, 'si', 'si', 2, 'si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canton`
--
ALTER TABLE `canton`
  ADD PRIMARY KEY (`ID_CANTON`),
  ADD KEY `ID_PROVINCIA` (`ID_PROVINCIA`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_COMPRA`),
  ADD KEY `compra_fk_1` (`ID_PRODUCTO`),
  ADD KEY `compra_fk_2` (`ID_TIPO`),
  ADD KEY `compra_fk_3` (`ID_USUARIO`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`ID_DETALLE_FACTURA`),
  ADD KEY `ID_FACTURA` (`ID_FACTURA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`ID_DIRECCION`),
  ADD KEY `ID_PROVINCIA` (`ID_PROVINCIA`),
  ADD KEY `ID_CANTON` (`ID_CANTON`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `ID_SUCURSAL` (`ID_SUCURSAL`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`,`ID_TIPO`) USING BTREE,
  ADD KEY `FK_ID_TIPO` (`ID_TIPO`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`ID_PROVINCIA`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID_SUCURSAL`),
  ADD KEY `ID_DIRECCION` (`ID_DIRECCION`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID_TIPO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canton`
--
ALTER TABLE `canton`
  ADD CONSTRAINT `canton_ibfk_1` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `provincia` (`ID_PROVINCIA`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_fk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `compra_fk_2` FOREIGN KEY (`ID_TIPO`) REFERENCES `producto` (`ID_TIPO`),
  ADD CONSTRAINT `compra_fk_3` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `factura` (`ID_FACTURA`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `provincia` (`ID_PROVINCIA`),
  ADD CONSTRAINT `direccion_ibfk_2` FOREIGN KEY (`ID_CANTON`) REFERENCES `canton` (`ID_CANTON`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`ID_SUCURSAL`) REFERENCES `sucursal` (`ID_SUCURSAL`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_ID_TIPO` FOREIGN KEY (`ID_TIPO`) REFERENCES `tipo` (`ID_TIPO`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`ID_DIRECCION`) REFERENCES `direccion` (`ID_DIRECCION`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
