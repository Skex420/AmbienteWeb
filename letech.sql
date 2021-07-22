-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 07:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letech`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Consultar_Producto` (IN `v_id_tipo` INT)  BEGIN

SELECT * FROM producto 

WHERE ID_TIPO = v_id_tipo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Consultar_Producto_Especifico` (IN `V_ID_TIPO` INT, IN `V_ID_PRODUCTO` INT)  BEGIN
SELECT pro.PRODUCTO, pro.VALOR, pro.DESCRIPCION, pro.IMAGEN, ti.TIPO FROM PRODUCTO pro
INNER JOIN TIPO ti ON ti.ID_TIPO=pro.ID_TIPO
WHERE pro.ID_TIPO = V_ID_TIPO AND pro.ID_PRODUCTO=V_ID_PRODUCTO;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `canton`
--

CREATE TABLE `canton` (
  `ID_CANTON` int(11) NOT NULL,
  `CANTON` varchar(100) NOT NULL,
  `ID_PROVINCIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `ID_DETALLE_FACTURA` int(11) NOT NULL,
  `ID_FACTURA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE `direccion` (
  `ID_DIRECCION` int(11) NOT NULL,
  `ID_PROVINCIA` int(11) NOT NULL,
  `ID_CANTON` int(11) NOT NULL,
  `DIRECCION_GENERAL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `factura`
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
-- Table structure for table `producto`
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
-- Dumping data for table `producto`
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
-- Table structure for table `provincia`
--

CREATE TABLE `provincia` (
  `ID_PROVINCIA` int(11) NOT NULL,
  `PROVINCIA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `ROL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

CREATE TABLE `sucursal` (
  `ID_SUCURSAL` int(11) NOT NULL,
  `ID_DIRECCION` int(11) NOT NULL,
  `TELEFONO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `ID_TIPO` int(11) NOT NULL,
  `TIPO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo`
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
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `PASS` varchar(30) NOT NULL,
  `ID_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canton`
--
ALTER TABLE `canton`
  ADD PRIMARY KEY (`ID_CANTON`),
  ADD KEY `ID_PROVINCIA` (`ID_PROVINCIA`);

--
-- Indexes for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`ID_DETALLE_FACTURA`),
  ADD KEY `ID_FACTURA` (`ID_FACTURA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`ID_DIRECCION`),
  ADD KEY `ID_PROVINCIA` (`ID_PROVINCIA`),
  ADD KEY `ID_CANTON` (`ID_CANTON`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `ID_SUCURSAL` (`ID_SUCURSAL`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`,`ID_TIPO`) USING BTREE,
  ADD KEY `FK_ID_TIPO` (`ID_TIPO`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`ID_PROVINCIA`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indexes for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID_SUCURSAL`),
  ADD KEY `ID_DIRECCION` (`ID_DIRECCION`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID_TIPO`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canton`
--
ALTER TABLE `canton`
  ADD CONSTRAINT `canton_ibfk_1` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `provincia` (`ID_PROVINCIA`);

--
-- Constraints for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `factura` (`ID_FACTURA`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Constraints for table `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `provincia` (`ID_PROVINCIA`),
  ADD CONSTRAINT `direccion_ibfk_2` FOREIGN KEY (`ID_CANTON`) REFERENCES `canton` (`ID_CANTON`);

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`ID_SUCURSAL`) REFERENCES `sucursal` (`ID_SUCURSAL`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_ID_TIPO` FOREIGN KEY (`ID_TIPO`) REFERENCES `tipo` (`ID_TIPO`);

--
-- Constraints for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`ID_DIRECCION`) REFERENCES `direccion` (`ID_DIRECCION`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
