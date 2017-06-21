SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `SCVC` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `SCVC` ;

-- -----------------------------------------------------
-- Table `SCVC`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Usuario` (
  `codigo_usario` INT(3) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(150) NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL ,
  PRIMARY KEY (`codigo_usario`) ,
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Fecha_cierre`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Fecha_cierre` (
  `codigo` INT(6) NOT NULL AUTO_INCREMENT ,
  `fecha_ini` DATE NOT NULL ,
  `fecha_fin` DATE NULL ,
  `codigo_usario` INT(3) NOT NULL ,
  PRIMARY KEY (`codigo`) ,
  INDEX `fk_Fecha_cierre_Usuario_idx` (`codigo_usario` ASC) ,
  CONSTRAINT `fk_Fecha_cierre_Usuario`
    FOREIGN KEY (`codigo_usario` )
    REFERENCES `SCVC`.`Usuario` (`codigo_usario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Vendedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Vendedor` (
  `codigo_vendedor` INT(6) NOT NULL AUTO_INCREMENT ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `Apellido` VARCHAR(45) NOT NULL ,
  `correo` VARCHAR(100) NOT NULL ,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL ,
  `foto` VARCHAR(70) NULL ,
  `codigo_usuario` INT(3) NOT NULL ,
  PRIMARY KEY (`codigo_vendedor`) ,
  INDEX `fk_Vendedor_Usuario1_idx` (`codigo_usuario` ASC) ,
  CONSTRAINT `fk_Vendedor_Usuario1`
    FOREIGN KEY (`codigo_usuario` )
    REFERENCES `SCVC`.`Usuario` (`codigo_usario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Telefono`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Telefono` (
  `codigo_telefono` INT(2) NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(15) NOT NULL ,
  `tipo` ENUM('CASA','CELULAR','OFICINA') NOT NULL ,
  `codigo_vendedor` INT(6) NOT NULL ,
  PRIMARY KEY (`codigo_telefono`) ,
  INDEX `fk_telefono_Vendedor1_idx` (`codigo_vendedor` ASC) ,
  CONSTRAINT `fk_telefono_Vendedor1`
    FOREIGN KEY (`codigo_vendedor` )
    REFERENCES `SCVC`.`Vendedor` (`codigo_vendedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = big5;


-- -----------------------------------------------------
-- Table `SCVC`.`Articulo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Articulo` (
  `codigo_articulo` VARCHAR(20) NOT NULL ,
  `descripcion` VARCHAR(100) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `estado` ENUM('ACTIVO','INACTIVO') NOT NULL ,
  `codigo_usuario` INT(3) NOT NULL ,
  PRIMARY KEY (`codigo_articulo`) ,
  INDEX `fk_Articulo_Usuario1_idx` (`codigo_usuario` ASC) ,
  CONSTRAINT `fk_Articulo_Usuario1`
    FOREIGN KEY (`codigo_usuario` )
    REFERENCES `SCVC`.`Usuario` (`codigo_usario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Articulo_costo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Articulo_costo` (
  `codigo_articulo_costo` INT(6) NOT NULL AUTO_INCREMENT ,
  `costo` DOUBLE NOT NULL ,
  `fecha` DATE NOT NULL ,
  `codigo_articulo` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`codigo_articulo_costo`) ,
  INDEX `fk_articulo_costo_Articulo1_idx` (`codigo_articulo` ASC) ,
  CONSTRAINT `fk_articulo_costo_Articulo1`
    FOREIGN KEY (`codigo_articulo` )
    REFERENCES `SCVC`.`Articulo` (`codigo_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Articulo_imagen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Articulo_imagen` (
  `codigo_articulo_imagen` INT(3) NOT NULL AUTO_INCREMENT ,
  `imagen` VARCHAR(80) NOT NULL ,
  `tamano` INT(2) NOT NULL ,
  `codigo_articulo` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`codigo_articulo_imagen`) ,
  INDEX `fk_articulo_imagen_Articulo1_idx` (`codigo_articulo` ASC) ,
  CONSTRAINT `fk_articulo_imagen_Articulo1`
    FOREIGN KEY (`codigo_articulo` )
    REFERENCES `SCVC`.`Articulo` (`codigo_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Articulo_porcentaje`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Articulo_porcentaje` (
  `codigo_articulo_porcentaje` INT(3) NOT NULL AUTO_INCREMENT ,
  `porcentaje` DOUBLE NOT NULL ,
  `codigo_articulo` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`codigo_articulo_porcentaje`) ,
  INDEX `fk_articulo_porcentaje_Articulo1_idx` (`codigo_articulo` ASC) ,
  CONSTRAINT `fk_articulo_porcentaje_Articulo1`
    FOREIGN KEY (`codigo_articulo` )
    REFERENCES `SCVC`.`Articulo` (`codigo_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Articulo_cantidad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Articulo_cantidad` (
  `codigo_articulo_cantidad` INT(6) NOT NULL AUTO_INCREMENT ,
  `cantidad` INT(10) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `codigo_articulo` VARCHAR(20) NOT NULL ,
  `codigo_usuario` INT(3) NOT NULL ,
  PRIMARY KEY (`codigo_articulo_cantidad`) ,
  INDEX `fk_articulo_cantidad_Articulo1_idx` (`codigo_articulo` ASC) ,
  INDEX `fk_articulo_cantidad_Usuario1_idx` (`codigo_usuario` ASC) ,
  CONSTRAINT `fk_articulo_cantidad_Articulo1`
    FOREIGN KEY (`codigo_articulo` )
    REFERENCES `SCVC`.`Articulo` (`codigo_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulo_cantidad_Usuario1`
    FOREIGN KEY (`codigo_usuario` )
    REFERENCES `SCVC`.`Usuario` (`codigo_usario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Articulo_vendedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Articulo_vendedor` (
  `codigo_articulo_vendedor` INT(10) NOT NULL AUTO_INCREMENT ,
  `cantidad` INT(3) NOT NULL ,
  `fecha_entrega` DATE NOT NULL ,
  `codigo_articulo` VARCHAR(20) NOT NULL ,
  `codigo_vendedor` INT(6) NOT NULL ,
  PRIMARY KEY (`codigo_articulo_vendedor`) ,
  INDEX `fk_Articulo_vendedor_Articulo1_idx` (`codigo_articulo` ASC) ,
  INDEX `fk_Articulo_vendedor_Vendedor1_idx` (`codigo_vendedor` ASC) ,
  CONSTRAINT `fk_Articulo_vendedor_Articulo1`
    FOREIGN KEY (`codigo_articulo` )
    REFERENCES `SCVC`.`Articulo` (`codigo_articulo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Articulo_vendedor_Vendedor1`
    FOREIGN KEY (`codigo_vendedor` )
    REFERENCES `SCVC`.`Vendedor` (`codigo_vendedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Cliente` (
  `idCliente` INT(10) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idCliente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Articulo_vendido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Articulo_vendido` (
  `codigo_articulo_vendido` INT(10) NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `estado` ENUM('ACTIVO','INACTIVO','CANCELADO','DEVUELTO') NOT NULL ,
  `cantidad` INT(2) NOT NULL ,
  `codigo_vendedor` INT(10) NOT NULL ,
  `idCliente` INT(10) NOT NULL ,
  PRIMARY KEY (`codigo_articulo_vendido`) ,
  INDEX `fk_Articulo_vendido_Cliente1_idx` (`idCliente` ASC) ,
  CONSTRAINT `fk_Articulo_vendido_Cliente1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `SCVC`.`Cliente` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Articulo_vendido_Vendedor1`
    FOREIGN KEY (`codigo_vendedor` )
    REFERENCES `SCVC`.`Vendedor` (`codigo_vendedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`Cuotas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`Cuotas` (
  `codigo_cuotas` INT(10) NOT NULL ,
  `monto` DOUBLE NOT NULL ,
  `fecha_pago` DATE NOT NULL ,
  `codigo_articulo_vendido` INT(10) NOT NULL ,
  `idCliente` INT(10) NOT NULL ,
  PRIMARY KEY (`codigo_cuotas`) ,
  INDEX `fk_Cuotas_Articulo_vendido1_idx` (`codigo_articulo_vendido` ASC) ,
  INDEX `fk_Cuotas_Cliente1_idx` (`idCliente` ASC) ,
  CONSTRAINT `fk_Cuotas_Articulo_vendido1`
    FOREIGN KEY (`codigo_articulo_vendido` )
    REFERENCES `SCVC`.`Articulo_vendido` (`codigo_articulo_vendido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cuotas_Cliente1`
    FOREIGN KEY (`idCliente` )
    REFERENCES `SCVC`.`Cliente` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SCVC`.`articulo_devuelto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SCVC`.`articulo_devuelto` (
  `codigo_articulo_devuelto` INT(10) NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `observacion` VARCHAR(100) NOT NULL ,
  `codigo_articulo_vendedor` INT(10) NOT NULL ,
  PRIMARY KEY (`codigo_articulo_devuelto`) ,
  INDEX `fk_articulo_devuelto_Articulo_vendedor1_idx` (`codigo_articulo_vendedor` ASC) ,
  CONSTRAINT `fk_articulo_devuelto_Articulo_vendedor1`
    FOREIGN KEY (`codigo_articulo_vendedor` )
    REFERENCES `SCVC`.`Articulo_vendedor` (`codigo_articulo_vendedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `SCVC` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
