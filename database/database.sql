/*Crear nueva base de datos para epmpresa de alquiler de coches*/
CREATE DATABASE alquiler_coches;
USE alquiler_coches;

/*Crear tabla usuarios*/
CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255) not null,
telefono        varchar(9) not null,  
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
imagen          varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

/*Crear tabla marcas*/
/*fecha_actualizacion  timestamp NULL DEFAULT NULL ON UPDATE current_timestamp() ===> Campo que se actualiza solo al modificar el registro*/
CREATE TABLE marcas(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
fecha_creacion  timestamp NOT NULL DEFAULT current_timestamp(),
fecha_actualizacion  timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
CONSTRAINT pk_marcas PRIMARY KEY(id),
CONSTRAINT uq_nombre UNIQUE(nombre)
)ENGINE=InnoDb;

/*Insert de varios registros de marcas*/
INSERT INTO marcas VALUES (NULL, 'Fiat' , NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Citroen', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Seat', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Kia', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Peugeot', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Opel', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'volkswagen', NULL, NULL);

CREATE TABLE categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
    fecha_creacion  timestamp NOT NULL DEFAULT current_timestamp(),
fecha_actualizacion  timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
CONSTRAINT pk_marcas PRIMARY KEY(id),
CONSTRAINT uq_nombre UNIQUE(nombre)
)ENGINE=InnoDb;


/*Crear tabla vehiculos*/
CREATE TABLE vehiculos(
id              int(255) auto_increment not null,
marca_id        int(255) not null,
categoria_id    int(255) not null,
precio          float(100,2) not null,
stock           int(255) not null,
modelo          varchar(150)    not null,
combustible     varchar(100) not null,
puertas         int(2) not null,
cambio          char(1) not null,
asientos        int(2) not null,
carga           int(2) not null,
matriculacion   int(6) not null,
descripcion     longtext not NULL,
imagen          varchar(255),
CONSTRAINT pk_vehiculos PRIMARY KEY(id),
CONSTRAINT fk_vehiculo_marca FOREIGN KEY (marca_id) REFERENCES marcas(id),
CONSTRAINT fk_vehiculo_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

/*Crear tabla alquiler*/
CREATE TABLE reservas(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
vehiculo_id     int(255) not null,
fecha_reserva   date not null,
fecha_inicio    date not null,
fecha_final     date not null,
dias_totales    int(255) not null,
coste_total     float(100,2) not null,
estado          varchar(20) not null,
CONSTRAINT pk_pedido PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_pedido_vehiculo FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
)ENGINE=InnoDb;



/*INSERTS*/
/*Insertar nuevo usuario administrador de prueba*/
INSERT INTO usuarios VALUES (NULL, 'admin', 'admin', 'admin@admin.com', 'admin1234', 'admin', null);
INSERT INTO usuarios VALUES (NULL, 'usuer', 'usuer', 'usuer@usuer.com', 'usuer1234', 'usuer', null);
/*Insert de varios registros de categorias*/
INSERT INTO categorias VALUES (NULL, 'Monovolumen' , NULL, NULL);
INSERT INTO categorias VALUES (NULL, 'Todoterreno', NULL, NULL);
INSERT INTO categorias VALUES (NULL, 'Berlina', NULL, NULL);
INSERT INTO categorias VALUES (NULL, 'Deportivos', NULL, NULL);
INSERT INTO categorias VALUES (NULL, 'SUV', NULL, NULL);

/*Insert de varios registros de marcas*/
INSERT INTO marcas VALUES (NULL, 'Fiat' , NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Citroen', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Seat', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Kia', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Peugeot', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'Opel', NULL, NULL);
INSERT INTO marcas VALUES (NULL, 'volkswagen', NULL, NULL);
INSERT INTO `marcas`(`id`, `nombre_marca`, `fecha_creacion`, `fecha_actualizacion`) VALUES (null, 'Range Rover', null, null)


/*Insert de varios registros de vehiculos*/
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '8', '1', '10', 'Sharan', 'Gasolina', '5', 'M', '7', '3', '2020' , NULL, 'El Volkswagen Sharan es el mayor monovolumen de 7 plazas del grupo y se sit??a por encima del Volkswagen Touran, tambi??n de 7 plazas, pero aporta un interior todav??a m??s espacioso y sobre todo dos plazas en la ??ltima fila de asientos mucho m??s utilizables que las dos plazas de emergencia del Touran.', 'vw-sharan.png', '60.00');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '7', '1', '10', 'Zafira', 'Gasolina', '4', 'M', '7', '4', '2019', NULL, 'Es un cinco puertas con motor delantero transversal y tracci??n delantera. El Zafira fue el primer monovolumen moderno de su segmento en incorporar siete plazas. Su sistema de configuraci??n de asientos, denominado comercialmente Flex 7, permite plegar los asientos de la tercera fila debajo del maletero.', 'op-zafira.png', '55.50');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '8', '1', '10', 'Touran', 'Gasolina', '7', 'M', '7', '4', '2019', '2019-06-11 22:46:47', 'Es un monovolumen confortable, de manejo agradable y reacciones seguras, suficientemente espacioso para que viajen cinco adultos con comodidad o siete pasajeros eventualmente, ya que el espacio de la tercera fila es peque??o. Las siete plazas se distribuyen en tres filas de asientos, en configuraci??n 2-3-2.', 'vw-touran.png', '60.50');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '6', '3', '10', '308', 'Gasolina', '5', 'M', '5', '1', '2020', '2019-10-09 22:59:37', 'El Peugeot 308 es el coche compacto de Peugeot. Actualizado en 2017 (ver prueba del Peugeot 308 2018), en esta generaci??n ha buscado posicionarse un pelda??o por encima de las alternativas m??s generalistas con un dise??o m??s sobrio y una apuesta global por mejorar en calidad.', 'pg-308.png', '45.00');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '9', '3', '10', 'A1 Sportback', 'Gasolina', '5', 'M', '4', '1', '2020', current_timestamp(), 'El Audi A1 es un utilitario de 3,95 metros, que se present?? en el a??o 2010 con el objetivo claro de plantar cara al exitoso Mini. Cuenta con versiones de tres y 5 puertas (Sportback) que fueron actualizadas en 2014.', 'au-a1sport.png', '70.00');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '12', '3', '10', 'Clase A', 'Gasolina', '5', 'M', '5', '1', '2019', '2019-01-14 23:41:03', 'El Mercedes-Benz Clase A (A 160) es un autom??vil de lujo del segmento C (en anteriores generaciones fue un monovolumen del segmento B) producido por el fabricante alem??n Mercedes-Benz desde el a??o 1997. Es el primer modelo de la marca con tracci??n delantera, y todos sus motores son de cuatro cilindros en l??nea. El Clase A tiene su motor en posici??n delantera transversal, algo tambi??n inusual en los modelos de Mercedes-Benz. El Clase A es el modelo de entrada a la marca.', 'mc-claseA.png', '80');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '9', '4', '10', 'R-8', 'Gasolina', '2', 'A', '2', '1', '2020', current_timestamp(), 'Resultado de imagen de audi r8 descripcion\r\nEl Audi R8 es un deportivo de motor central trasero y tracci??n total. Aunque lleg?? al mercado en 2006, sigue sorprendiendo por su est??tica agresiva y su afinado comportamiento. Su objetivo principal es plantar cara a modelos tan reputados como el Porsche 911.', 'au-r8.png', '120.5');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '9', '4', '10', 'TT', 'Gasolina', '3', 'A', '4', '1', '2010', current_timestamp(), 'Para cada una de las tres generaciones, el TT ha empleado generaciones consecutivas de la plataforma A del Grupo Volkswagen, comenzando con la PQ34 (A4). Como resultado de este uso compartido de plataforma, el Audi TT tiene un esquema de tren motriz y de suspensi??n id??ntico al de sus compa??eros de plataforma; incluyendo un motor delantero y transversal, tracci??n delantera o un sistema de tracci??n integral (quattro), as?? como suspensi??n independiente usando una suspensi??n MacPherson.', 'au-tt.png', '110');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '10', '4', '10', 'Serie 8 Cabrio', 'Gasolina', '2', 'A', '4', '1', '2020', current_timestamp(), 'El BMW Serie 7 es un autom??vil de turismo de gran lujo del segmento F (el m??s lujoso) producido por el fabricante de autom??viles alem??n BMW desde 1977. Es un sed??n de cuatro puertas con motor delantero longitudinal que comenz?? montando motores de gasolina y tracci??n trasera, pero que ahora puede ser tambi??n di??sel o h??brido y montar tracci??n total.', 'bm-serie8.png', '120');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '8', '5', '10', 'Tiguan', 'Gasolina', '5', 'M', '5', '2', '2020', current_timestamp(), 'El Volkswagen Tiguan es un autom??vil del segmento C de cinco plazas producido por el fabricante alem??n Volkswagen desde el a??o 2007. Tiene carrocer??a de cinco puertas y motor delantero transversal, disponible con tracci??n delantera o tracci??n a las cuatro ruedas conectable autom??ticamente 4motion.', 'vw-tiguan.png', '130');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '3', '5', '10', 'C4', 'Diesel', '5', 'M', '5', '1', '2018', '2018-08-07 23:59:23', 'La denominaci??n C4 nace en el a??o 2004 como parte de una reestructuraci??n completa de la gama. La C viene por la inicia de Citro??n, y el 4 porque hablamos del cuarto modelo, por escala, m??s grande de la casa. Hoy ya acumula tres generaciones sobre el asfalto. La ??ltima de ellas presentada en 2020 con cambios muy significativos adaptados a los tiempos que corren. El Citro??n C4 se vuelve el??ctrico.', 'ct-c4.png', '80.5');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '6', '5', '10', '3008', 'Gasolina', '5', 'A', '5', '2', '2020', current_timestamp(), 'Las medidas del 3008 lo enclavan directamente en el segmento m??s popular del mercado europeo: 4,47 metros de largo, 1,84 metros de ancho y 1,62 metros de alto para una distancia entre ejes de 2,67 metros. Batalla m??s que suficiente para que cinco pasajeros se den cabida en su interior con comodidad, incluida una fila posterior con un modularidad heredada de la primera generaci??n monovolumen del modelo.', 'pg-3008.png', '85');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '11', '2', '10', 'Cherokee', 'Gasolina', '5', 'M', '5', '2', '2018', '2018-05-22 00:05:41', 'El Jeep Cherokee es un todoterreno de 4,62 metros de longitud, 1,86 de ancho y 1,67 de alto que, en funci??n de la versi??n, puede estar m??s o menos preparado para la conducci??n por zonas no asfaltadas. ... El precio de la versi??n m??s asequible del Jeep Cherokee es de 47.400 ??? sin descuentos aplicados', 'jp-cherokee.png', '100');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '11', '2', '10', 'Clase G 500', 'Gasolina', '5', 'A', '5', '2', '2020', current_timestamp(), 'El Mercedes Clase G 500 cuenta con un motor V8 de 4.0 litros, que desarrolla 422 CV de potencia y que estar?? asociado a un cambio 9G-TRONIC. A ??l hay que sumar el V8 de 585 CV de la versi??n AMG G 63.', 'mc-500g.png', '120');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '11', '2', '10', 'Wrangler', 'Gasolina', '5', 'M', '5', '1', '2020', current_timestamp(), 'El Jeep Wrangler es un popular autom??vil todoterreno fabricado por la compa????a estadounidense FCA Group (Fiat Chrysler Automobiles) y vendido bajo la marca Jeep. Es el sucesor del Jeep CJ, la versi??n civil del Willys MB, un veh??culo militar utilizado por el ej??rcito de Estados Unidos en la Segunda Guerra Mundial.', 'jp-wrangler.png', '120');
INSERT INTO `vehiculos` (`id`, `marca_id`, `categoria_id`, `stock`, `modelo`, `combustible`, `puertas`, `cambio`, `asientos`, `carga`, `matriculacion`, `fecha`, `descripcion`, `imagen`, `precio`) VALUES (NULL, '13', '5', '10', 'Evoque', 'Gasolina', '5', 'A', '5', '2', '2021', current_timestamp(), 'El Range Rover Evoque es un autom??vil todoterreno de lujo del segmento C que el fabricante brit??nico Land Rover lanz?? al mercado en julio del a??o 2011. Tiene motor delantero transversal, tracci??n delantera o a las cuatro ruedas y chasis monocasco. Existen carrocer??as de tres y cinco puertas, de cuatro y cinco plazas respectivamente; la primera de ellas se denomina "Coup??". Algunos de los rivales del Evoque son el Audi Q3, el BMW X1, el Jaguar E-Pace, el Mercedes-Benz Clase GLA y el Volvo XC40. Las ventas han sido un gran ??xito para Land Rover, vendiendo m??s de 520.000 unidades del modelo.', 'rv-evoque.png', '120');