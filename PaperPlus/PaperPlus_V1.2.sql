/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - paperplus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`paperplus` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `paperplus`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `Idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(100) DEFAULT NULL,
  `Psswd` varchar(100) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apaterno` varchar(100) DEFAULT NULL,
  `Amaterno` varchar(100) DEFAULT NULL,
  `Telefono` varchar(30) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Idcliente`),
  UNIQUE KEY `Usuario` (`Usuario`,`Psswd`,`Telefono`,`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `IdCompras` int(11) NOT NULL AUTO_INCREMENT,
  `IdProv` int(11) DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`IdCompras`),
  KEY `IdProv` (`IdProv`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`IdProv`) REFERENCES `proveedores` (`IdProv`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `detallecompra` */

DROP TABLE IF EXISTS `detallecompra`;

CREATE TABLE `detallecompra` (
  `IdDC` int(11) NOT NULL AUTO_INCREMENT,
  `IdCompra` int(11) DEFAULT NULL,
  `IdProd` int(11) DEFAULT NULL,
  `CantProd` int(11) DEFAULT NULL,
  `PrecioProv` float DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  PRIMARY KEY (`IdDC`),
  KEY `IdCompra` (`IdCompra`),
  KEY `IdProd` (`IdProd`),
  CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`IdCompra`) REFERENCES `compras` (`IdCompras`),
  CONSTRAINT `detallecompra_ibfk_2` FOREIGN KEY (`IdProd`) REFERENCES `productos` (`IdProd`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `detalleventa` */

DROP TABLE IF EXISTS `detalleventa`;

CREATE TABLE `detalleventa` (
  `IdDetalleV` int(11) NOT NULL AUTO_INCREMENT,
  `IdProducto` int(11) DEFAULT NULL,
  `IdPedido` int(11) DEFAULT NULL,
  `PrecioProd` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `SubTotal` float DEFAULT NULL,
  PRIMARY KEY (`IdDetalleV`),
  KEY `IdProducto` (`IdProducto`),
  KEY `IdPedido` (`IdPedido`),
  CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProd`),
  CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `NomUsuario` varchar(100) DEFAULT NULL,
  `Apaterno` varchar(200) DEFAULT NULL,
  `Amaterno` varchar(200) DEFAULT NULL,
  `Psswd` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `RFC` varchar(20) DEFAULT NULL,
  `Tipo` enum('Admin','Empleado') DEFAULT NULL,
  PRIMARY KEY (`IdEmpleado`),
  UNIQUE KEY `NomUsuario` (`NomUsuario`,`Psswd`,`Telefono`,`Email`,`RFC`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `inventario` */

DROP TABLE IF EXISTS `inventario`;

CREATE TABLE `inventario` (
  `IdInventario` int(11) NOT NULL AUTO_INCREMENT,
  `IdProv` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `FechaCompra` date DEFAULT NULL,
  `IdProd` int(11) DEFAULT NULL,
  `IdComp` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdInventario`),
  KEY `IdProd` (`IdProd`),
  KEY `IdProv` (`IdProv`),
  CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`IdProd`) REFERENCES `productos` (`IdProd`),
  CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`IdProv`) REFERENCES `proveedores` (`IdProv`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `IdMarca` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `IdPedido` int(11) NOT NULL AUTO_INCREMENT,
  `Total` float DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPedido`),
  KEY `IdCliente` (`IdCliente`),
  KEY `IdEmpleado` (`IdEmpleado`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`Idcliente`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleados` (`IdEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `IdProd` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(300) DEFAULT NULL,
  `Descripcion` varchar(400) DEFAULT NULL,
  `StockActual` int(11) DEFAULT NULL,
  `PrecioVenta` float DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `IdMarca` int(11) DEFAULT NULL,
  `Imagen` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`IdProd`),
  UNIQUE KEY `Imagen` (`Imagen`),
  KEY `IdCategoria` (`IdCategoria`),
  KEY `IdMarca` (`IdMarca`),
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`),
  CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`IdMarca`) REFERENCES `marca` (`IdMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `IdProv` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) DEFAULT NULL,
  `Telefono` varchar(30) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdProv`),
  UNIQUE KEY `Nombre` (`Nombre`,`Telefono`,`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `IdUsers` varchar(20) NOT NULL,
  `Usuario` varchar(200) DEFAULT NULL,
  `Passw` varchar(200) DEFAULT NULL,
  `Tipo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdUsers`),
  UNIQUE KEY `Usuario` (`Usuario`,`Passw`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/* Trigger structure for table `clientes` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `Tgr_Alt_UsersC` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `Tgr_Alt_UsersC` AFTER UPDATE ON `clientes` FOR EACH ROW BEGIN
    
    	UPDATE usuarios SET Usuario = new.Usuario, Passw = MD5(new.Psswd)
	WHERE IdUsers = CONCAT(New.Idcliente, 'C');

    END */$$


DELIMITER ;

/* Trigger structure for table `clientes` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `Tgr_Del_UsserC` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `Tgr_Del_UsserC` BEFORE DELETE ON `clientes` FOR EACH ROW BEGIN
    
    DELETE FROM usuarios WHERE IdUsers = CONCAT(old.Idcliente, 'C');


    END */$$


DELIMITER ;

/* Trigger structure for table `detallecompra` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `Tgr_Add_Inv` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `Tgr_Add_Inv` AFTER INSERT ON `detallecompra` FOR EACH ROW BEGIN
    
    declare IDP int;
    DECLARE STC INT;
    DECLARE FCH INT;
    DECLARE IDPR INT;
    DECLARE IDC INT;
    
    set IDP = (SELECT IdProv FROM compras WHERE IdCompras = (SELECT IdCompra FROM detallecompra
    WHERE IdDC = (SELECT MAX(IdDC) FROM detallecompra)));
    SET STC = new.CantProd;
    SET IDPR = new. IdProd;
    SET FCH = (Select Fecha from compras where IdCompras = (Select IdCompra from detallecompra
    where IdDC = (Select max(IdDC) from detallecompra)));
    SET IDC = new.IdCompra;
    
    insert into inventario(IdProv, Stock, FechaCompra, IdProd, IdComp)
    values(IDP, STC, FCH, IDPR, IDC);

    END */$$


DELIMITER ;

/* Trigger structure for table `empleados` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `Tgr_Alt_Usser` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `Tgr_Alt_Usser` AFTER UPDATE ON `empleados` FOR EACH ROW BEGIN
	
	update usuarios set Usuario = new.NomUsuario, Passw = MD5(new.Psswd), Tipo = new.Tipo
	where IdUsers = Concat(New.IdEmpleado, 'E');
	
    END */$$


DELIMITER ;

/* Trigger structure for table `empleados` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `Tgr_Del_UsserE` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `Tgr_Del_UsserE` BEFORE DELETE ON `empleados` FOR EACH ROW BEGIN
    
    Delete from usuarios where IdUsers = Concat(old.IdEmpleado, 'E');

    END */$$


DELIMITER ;

/* Trigger structure for table `inventario` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `Tgr_Add_Stock` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `Tgr_Add_Stock` AFTER INSERT ON `inventario` FOR EACH ROW BEGIN
    
    Declare STC int;
    
    Set STC = new.Stock;
    
    update productos set StockActual = (StockActual + STC) where IdProd = new.IdProd;

    END */$$


DELIMITER ;

/* Procedure structure for procedure `Sp_Add_Buys` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Add_Buys` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Add_Buys`(
      IN NProv INT, IN ttl float, IN fch date)
BEGIN
	
	iNSERT INTO compras (IdProv, Total, Fecha) VALUES (Nprov, ttl, fch);

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Add_Client` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Add_Client` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Add_Client`(IN usser VARCHAR(100), IN Psswrd VARCHAR(100), IN NameC VARCHAR(100),
	IN APatern VARCHAR(100), IN AMatern VARCHAR(100), IN Number VARCHAR(30), IN correo VARCHAR(100))
BEGIN
	
		DECLARE Id Varchar(20);

	INSERT INTO clientes(Usuario, Psswd, Nombre, Apaterno, Amaterno, Telefono, Email)
	VALUES(usser, MD5(Psswrd), NameC, APatern, AMatern, Number, correo);
	
	SELECT MAX(IdCliente) INTO Id FROM clientes;
	
	INSERT INTO usuarios(IdUsers, Usuario, Passw, Tipo)
	VALUES (CONCAT(Id, 'C'), usser, MD5(Psswrd), 'Cliente');

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_add_DetBuy` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_add_DetBuy` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_add_DetBuy`(in IDP int, in Cant int, in Prv float, in Subt float)
BEGIN
	
	declare IDC int;
	
	Select Max(IdCompras) into IDC from compras;
	
	insert into detallecompra (IdCompra, IdProd, CantProd, PrecioProv, Subtotal)
	values (IDC, IDP, Cant, Prv, Subt);

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Add_Fab` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Add_Fab` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Add_Fab`(in NombreF varchar(200), in numero varchar (30), in correo varchar (100))
BEGIN
	
	INSERT INTO proveedores(Nombre,Telefono,Email) 
	VALUES(NombreF, numero, correo);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Add_Product` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Add_Product` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Add_Product`(in NameP varchar(100), in Dsc varchar(300), IN PrecioV FLOAT,
	 in Cod_Cat int, IN MarcaP INT, in img varchar(150))
BEGIN
	insert into productos(Nombre, Descripcion, StockActual, PrecioVenta, IdCategoria, IdMarca, Imagen)
	values(NameP, Dsc, 0, PrecioV, Cod_Cat, MarcaP, img);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Add_User` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Add_User` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Add_User`(IN NameC VARCHAR(100), in usser varchar(100), in APatern varchar(100), in AMatern varchar(100),
	 IN Psswrd VARCHAR(100), in Number varchar(30), in correo varchar(100), in RFCC varchar(30),
	 IN tpo ENUM('Admin','Empleado'))
BEGIN
	
	declare Id int;

	insert into empleados(Nombre, NomUsuario, Apaterno, Amaterno, Psswd, Telefono, Email, RFC, Tipo)
	values(NameC, usser, APatern, AMatern, MD5(Psswrd), Number, correo, RFCC, tpo);

	SELECT MAX(IdEmpleado) INTO Id FROM empleados;
	
	INSERT INTO usuarios(IdUsers, Usuario, Passw, Tipo)
	VALUES (CONCAT(Id, 'E'), usser, MD5(Psswrd), tpo);
	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Alt_Client` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Alt_Client` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Alt_Client`(in usser varchar(100), in Psswrd varchar(100), in NameC varchar(100),
	in APa varchar(100), in AMa varchar(100), in Number varchar(30), in correo varchar(100), in ID int)
BEGIN
		update clientes set Usuario = usser, Psswd= MD5(Psswrd), Nombre= NameC, Apaterno= APa, Amaterno= AMa, Telefono=number, Email =correo
		where IdCliente = ID;
   END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Alt_Prods` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Alt_Prods` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Alt_Prods`(in ID int, IN NameP VARCHAR(100), IN Dsc VARCHAR(300), IN PrecioV FLOAT,
	 IN Cod_Cat INT, IN MarcaP INT, IN img VARCHAR(150))
BEGIN
	
	UPDATE productos SET Nombre = NameP, Descripcion = Dsc , PrecioVenta = PrecioV,
	IdCategoria = Cod_Cat, IdMarca = MarcaP, Imagen = img WHERE IdProd = ID;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Alt_Provs` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Alt_Provs` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Alt_Provs`(IN ID INT, in Namec varchar(100), IN Numero VARCHAR(100), IN correo VARCHAR(100))
BEGIN

	UPDATE proveedores SET Nombre = Namec,  Telefono = Numero  , Email = correo  WHERE IdProv = ID;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Alt_UserE` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Alt_UserE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Alt_UserE`(IN NameC VARCHAR(100), IN usser VARCHAR(100),
	 IN Number VARCHAR(30), IN correo VARCHAR(100), IN tpo ENUM('Admin','Empleado'), in ID int)
BEGIN
	
	update empleados set Nombre = NameC, NomUsuario = usser, Telefono = Number, Email = correo, Tipo = tpo
	where IdEmpleado = ID;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Cons_Cats` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Cons_Cats` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cons_Cats`()
BEGIN

	select * from Categoria;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Cons_Inv` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Cons_Inv` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cons_Inv`()
BEGIN

	select * from invview;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Cons_Marca` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Cons_Marca` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cons_Marca`()
BEGIN

	select * from marca;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Cons_Prods` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Cons_Prods` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cons_Prods`()
BEGIN
	
	select * from viewproducts order by IdProd;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Cons_Provs` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Cons_Provs` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cons_Provs`()
BEGIN
	
	SELECT * FROM proveedores order by IdProv;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Cons_tpo` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Cons_tpo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cons_tpo`()
BEGIN
	
	SELECT DISTINCT Tipo FROM empleados;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Cons_Users` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Cons_Users` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cons_Users`()
BEGIN
	
		SELECT * FROM Empleados order by IdEmpleado;
	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_Del_Client` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Del_Client` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Del_Client`(in Cod_Client int)
BEGIN
	
	Delete from clientes where IdCliente = Cod_Client;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Del_Fab` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Del_Fab` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Del_Fab`(in CProv int)
BEGIN
	
	delete from proveedores where IdProv=CProv;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Del_Product` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Del_Product` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Del_Product`(in Cod_Prod int)
BEGIN
	Delete from productos where IdProd = Cod_Prod;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Del_UserE` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Del_UserE` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Del_UserE`(in Id int)
BEGIN
	
	Delete from empleados where IdEmpleado = Id;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_GetProd_Id` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_GetProd_Id` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_GetProd_Id`(in ID int)
BEGIN
		
			select * from viewproducts where IdProd = ID;
		
	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Get_Access` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Get_Access` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Get_Access`(in usser varchar(100), in psswrd varchar(100))
BEGIN

		SELECT * FROM usuarios WHERE Usuario = usser AND Passw= MD5(psswrd);
		
	END */$$
DELIMITER ;

/* Procedure structure for procedure `Sp_Get_ProdsCat` */

/*!50003 DROP PROCEDURE IF EXISTS  `Sp_Get_ProdsCat` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Get_ProdsCat`(in ID int)
BEGIN
	
	SELECT * FROM viewproducts WHERE IdCategoria = ID;

	END */$$
DELIMITER ;

/*Table structure for table `invview` */

DROP TABLE IF EXISTS `invview`;

/*!50001 DROP VIEW IF EXISTS `invview` */;
/*!50001 DROP TABLE IF EXISTS `invview` */;

/*!50001 CREATE TABLE  `invview`(
 `IdInventario` int(11) ,
 `Proveedor` varchar(200) ,
 `Producto` varchar(300) ,
 `Stock` int(11) ,
 `FechaCompra` date 
)*/;

/*Table structure for table `viewproducts` */

DROP TABLE IF EXISTS `viewproducts`;

/*!50001 DROP VIEW IF EXISTS `viewproducts` */;
/*!50001 DROP TABLE IF EXISTS `viewproducts` */;

/*!50001 CREATE TABLE  `viewproducts`(
 `IdProd` int(11) ,
 `Nombre` varchar(300) ,
 `Descripción` varchar(400) ,
 `Stock` int(11) ,
 `PrecioVenta` float ,
 `IdCategoria` int(11) ,
 `Categoria` varchar(200) ,
 `IdMarca` int(11) ,
 `Marca` varchar(100) ,
 `IMG` varchar(150) 
)*/;

/*View structure for view invview */

/*!50001 DROP TABLE IF EXISTS `invview` */;
/*!50001 DROP VIEW IF EXISTS `invview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invview` AS (select `i`.`IdInventario` AS `IdInventario`,`p`.`Nombre` AS `Proveedor`,`pr`.`Nombre` AS `Producto`,`i`.`Stock` AS `Stock`,`i`.`FechaCompra` AS `FechaCompra` from ((`inventario` `i` join `proveedores` `p`) join `productos` `pr`) where `i`.`IdProv` = `p`.`IdProv` and `i`.`IdProd` = `pr`.`IdProd`) */;

/*View structure for view viewproducts */

/*!50001 DROP TABLE IF EXISTS `viewproducts` */;
/*!50001 DROP VIEW IF EXISTS `viewproducts` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewproducts` AS (select `p`.`IdProd` AS `IdProd`,`p`.`Nombre` AS `Nombre`,`p`.`Descripcion` AS `Descripción`,`p`.`StockActual` AS `Stock`,`p`.`PrecioVenta` AS `PrecioVenta`,`c`.`IdCategoria` AS `IdCategoria`,`c`.`Nombre` AS `Categoria`,`m`.`IdMarca` AS `IdMarca`,`m`.`Nombre` AS `Marca`,`p`.`Imagen` AS `IMG` from ((`productos` `p` join `categoria` `c` on(`p`.`IdCategoria` = `c`.`IdCategoria`)) join `marca` `m` on(`p`.`IdMarca` = `m`.`IdMarca`)) order by `p`.`IdProd`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
