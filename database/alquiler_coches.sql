-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2021 a las 12:22:33
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler_coches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Monovolumen', '2020-12-20 15:46:07', NULL),
(2, 'Todoterreno', '2020-12-20 15:46:07', NULL),
(3, 'Berlina', '2020-12-20 15:46:07', NULL),
(4, 'Deportivos', '2020-12-20 15:46:07', NULL),
(5, 'SUV', '2020-12-20 15:46:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(255) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre_marca`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Fiat', '2020-12-12 15:50:03', NULL),
(3, 'Citroen', '2020-12-12 15:56:28', NULL),
(4, 'Seat', '2020-12-12 15:56:28', NULL),
(5, 'Kia', '2020-12-12 15:56:28', NULL),
(6, 'Peugeot', '2020-12-12 15:56:28', NULL),
(7, 'Opel', '2020-12-12 15:56:28', NULL),
(8, 'Volkswagen', '2020-12-12 15:56:28', NULL),
(9, 'Audi\r\n', '2020-12-21 22:23:13', '2021-01-04 15:38:29'),
(10, 'BMW', '2020-12-21 22:23:41', NULL),
(11, 'Jeep', '2020-12-21 22:23:47', NULL),
(12, 'Mercedes', '2020-12-21 22:24:04', NULL),
(13, 'Range Rover', '2021-01-04 11:57:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `reserva_id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `vehiculo_id` int(255) NOT NULL,
  `fecha_reserva` date NOT NULL DEFAULT current_timestamp(),
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `dias_totales` int(255) NOT NULL,
  `coste_total` float(100,2) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Por confirmar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`reserva_id`, `usuario_id`, `vehiculo_id`, `fecha_reserva`, `fecha_inicio`, `fecha_final`, `dias_totales`, `coste_total`, `estado`) VALUES
(33, 50, 14, '2021-01-18', '2021-01-21', '2021-01-27', 6, 840.00, 'Por confirmar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'admin', 'admin', '666666666', 'admin@admin.com', 'contraseña', 'admin', NULL),
(49, 'ANTONIO', 'RUBIO', '600031940', 'toni.salvado.rubio@gmail.com', '$2y$04$S1Jp.vmO.MBZf7J2oggunOvtGPO1PQQi2WGirMLT.iSp/hkO26KWS', 'admin', 'null'),
(50, 'usuario', 'usuario', '231213313', 'usuario@usuario.com', '$2y$04$fXXJPb3TFKlD9u0HUt41Ku2AKPH0sLJbLGptzXmgIWc3tr9RW8Cn6', 'user', 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(255) NOT NULL,
  `marca_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `stock` int(255) NOT NULL,
  `combustible` varchar(100) NOT NULL,
  `puertas` int(2) NOT NULL,
  `cambio` char(1) NOT NULL,
  `asientos` int(2) NOT NULL,
  `carga` int(2) NOT NULL,
  `matriculacion` int(6) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `descripcion` longtext NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` float(100,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `modelo`, `stock`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES
(1, 8, 1, 'Sharan', 10, 'Gasolina', 5, 'M', 7, 3, 2020, '2021-01-07 13:03:47', 'El Volkswagen Sharan es el mayor monovolumen de 7 plazas del grupo y se sitúa por encima del Volkswagen Touran, también de 7 plazas, pero aporta un interior todavía más espacioso y sobre todo dos plazas en la última fila de asientos mucho más utilizables que las dos plazas de emergencia del Touran.', 'vw-sharan.png', 60.00),
(2, 7, 1, 'Zafira', 10, 'Gasolina', 4, 'M', 7, 4, 2019, '2021-01-07 13:03:47', 'Es un cinco puertas con motor delantero transversal y tracción delantera. El Zafira fue el primer monovolumen moderno de su segmento en incorporar siete plazas. Su sistema de configuración de asientos, denominado comercialmente Flex 7, permite plegar los asientos de la tercera fila debajo del maletero.', 'op-zafira.png', 55.50),
(3, 8, 1, 'Touran', 10, 'Gasolina', 7, 'M', 7, 4, 2019, '2019-06-11 20:46:47', 'Es un monovolumen confortable, de manejo agradable y reacciones seguras, suficientemente espacioso para que viajen cinco adultos con comodidad o siete pasajeros eventualmente, ya que el espacio de la tercera fila es pequeño. Las siete plazas se distribuyen en tres filas de asientos, en configuración 2-3-2.', 'vw-touran.png', 60.50),
(4, 6, 3, '308', 10, 'Gasolina', 5, 'M', 5, 1, 2020, '2019-10-09 20:59:37', 'El Peugeot 308 es el coche compacto de Peugeot. Actualizado en 2017 (ver prueba del Peugeot 308 2018), en esta generación ha buscado posicionarse un peldaño por encima de las alternativas más generalistas con un diseño más sobrio y una apuesta global por mejorar en calidad.', 'pg-308.png', 45.00),
(5, 9, 3, 'A1 Sportback', 10, 'Gasolina', 5, 'M', 4, 1, 2020, '2021-01-07 13:03:47', 'El Audi A1 es un utilitario de 3,95 metros, que se presentó en el año 2010 con el objetivo claro de plantar cara al exitoso Mini. Cuenta con versiones de tres y 5 puertas (Sportback) que fueron actualizadas en 2014.', 'au-a1sport.png', 70.00),
(6, 12, 3, 'Clase A', 10, 'Gasolina', 5, 'M', 5, 1, 2019, '2019-01-14 22:41:03', 'El Mercedes-Benz Clase A (A 160) es un automóvil de lujo del segmento C (en anteriores generaciones fue un monovolumen del segmento B) producido por el fabricante alemán Mercedes-Benz desde el año 1997. Es el primer modelo de la marca con tracción delantera, y todos sus motores son de cuatro cilindros en línea. El Clase A tiene su motor en posición delantera transversal, algo también inusual en los modelos de Mercedes-Benz. El Clase A es el modelo de entrada a la marca.', 'mc-claseA.png', 80.00),
(7, 9, 4, 'R-8', 10, 'Gasolina', 2, 'A', 2, 1, 2020, '2021-01-07 13:03:47', 'Resultado de imagen de audi r8 descripcion\r\nEl Audi R8 es un deportivo de motor central trasero y tracción total. Aunque llegó al mercado en 2006, sigue sorprendiendo por su estética agresiva y su afinado comportamiento. Su objetivo principal es plantar cara a modelos tan reputados como el Porsche 911.', 'au-r8.png', 120.50),
(8, 9, 4, 'TT', 10, 'Gasolina', 3, 'A', 4, 1, 2010, '2021-01-07 13:03:47', 'Para cada una de las tres generaciones, el TT ha empleado generaciones consecutivas de la plataforma A del Grupo Volkswagen, comenzando con la PQ34 (A4). Como resultado de este uso compartido de plataforma, el Audi TT tiene un esquema de tren motriz y de suspensión idéntico al de sus compañeros de plataforma; incluyendo un motor delantero y transversal, tracción delantera o un sistema de tracción integral (quattro), así como suspensión independiente usando una suspensión MacPherson.', 'au-tt.png', 110.00),
(9, 10, 4, 'Serie 8 Cabrio', 10, 'Gasolina', 2, 'A', 4, 1, 2020, '2021-01-07 13:03:47', 'El BMW Serie 7 es un automóvil de turismo de gran lujo del segmento F (el más lujoso) producido por el fabricante de automóviles alemán BMW desde 1977. Es un sedán de cuatro puertas con motor delantero longitudinal que comenzó montando motores de gasolina y tracción trasera, pero que ahora puede ser también diésel o híbrido y montar tracción total.', 'bm-serie8.png', 120.00),
(10, 8, 5, 'Tiguan', 10, 'Gasolina', 5, 'M', 5, 2, 2020, '2021-01-07 13:03:47', 'El Volkswagen Tiguan es un automóvil del segmento C de cinco plazas producido por el fabricante alemán Volkswagen desde el año 2007. Tiene carrocería de cinco puertas y motor delantero transversal, disponible con tracción delantera o tracción a las cuatro ruedas conectable automáticamente 4motion.', 'vw-tiguan.png', 130.00),
(11, 3, 5, 'C4', 10, 'Diesel', 5, 'M', 5, 1, 2018, '2018-08-07 21:59:23', 'La denominación C4 nace en el año 2004 como parte de una reestructuración completa de la gama. La C viene por la inicia de Citroën, y el 4 porque hablamos del cuarto modelo, por escala, más grande de la casa. Hoy ya acumula tres generaciones sobre el asfalto. La última de ellas presentada en 2020 con cambios muy significativos adaptados a los tiempos que corren. El Citroën C4 se vuelve eléctrico.', 'ct-c4.png', 80.50),
(12, 6, 5, '3008', 6, 'Gasolina', 5, 'A', 5, 2, 2020, '2021-01-10 23:00:00', 'Las medidas del 3008 lo enclavan directamente en el segmento más popular del mercado europeo: 4,47 metros de largo, 1,84 metros de ancho y 1,62 metros de alto para una distancia entre ejes de 2,67 metros. Batalla más que suficiente para que cinco pasajeros se den cabida en su interior con comodidad, incluida una fila posterior con un modularidad heredada de la primera generación monovolumen del modelo.', 'pg-3008.png', 86.00),
(13, 11, 2, 'Cherokee', 10, 'Gasolina', 5, 'M', 5, 2, 2018, '2021-01-10 23:00:00', 'El Jeep Cherokee es un todoterreno de 4,62 metros de longitud, 1,86 de ancho y 1,67 de alto que, en función de la versión, puede estar más o menos preparado para la conducción por zonas no asfaltadas. ... El precio de la versión más asequible del Jeep Cherokee es de 47.400 € sin descuentos aplicados', 'jp-cherokee.png', 105.00),
(14, 12, 2, 'Clase G 500', 10, 'Gasolina', 5, 'A', 5, 2, 2020, '2021-01-10 23:00:00', 'El Mercedes Clase G 500 cuenta con un motor V8 de 4.0 litros, que desarrolla 422 CV de potencia y que estará asociado a un cambio 9G-TRONIC. A él hay que sumar el V8 de 585 CV de la versión AMG G 63.', 'mc-500g.png', 140.00),
(15, 11, 2, 'Wrangler', 10, 'Gasolina', 5, 'M', 5, 1, 2020, '2021-01-10 23:00:00', 'El Jeep Wrangler es un popular automóvil todoterreno fabricado por la compañía estadounidense FCA Group (Fiat Chrysler Automobiles) y vendido bajo la marca Jeep. Es el sucesor del Jeep CJ, la versión civil del Willys MB, un vehículo militar utilizado por el ejército de Estados Unidos en la Segunda Guerra Mundial.', 'jp-wrangler.png', 120.00),
(16, 13, 5, 'Evoque', 10, 'Gasolina', 5, 'A', 5, 2, 2021, '2021-01-10 23:00:00', 'El Range Rover Evoque es un automóvil todoterreno de lujo del segmento C que el fabricante británico Land Rover lanzó al mercado en julio del año 2011. Tiene motor delantero transversal, tracción delantera o a las cuatro ruedas y chasis monocasco. Existen carrocerías de tres y cinco puertas, de cuatro y cinco plazas respectivamente; la primera de ellas se denomina \"Coupé\". Algunos de los rivales del Evoque son el Audi Q3, el BMW X1, el Jaguar E-Pace, el Mercedes-Benz Clase GLA y el Volvo XC40. Las ventas han sido un gran éxito para Land Rover, vendiendo más de 520.000 unidades del modelo.', 'rv-evoque.png', 120.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_nombre` (`nombre_categoria`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_nombre` (`nombre_marca`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`reserva_id`),
  ADD KEY `fk_pedido_usuario` (`usuario_id`),
  ADD KEY `fk_pedido_vehiculo` (`vehiculo_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehiculo_marca` (`marca_id`),
  ADD KEY `fk_vehiculo_categoria` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `reserva_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_pedido_vehiculo` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculo_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_vehiculo_marca` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
