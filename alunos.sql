CREATE SCHEMA `ativ1` ;
CREATE TABLE `ativ1`.`alunos` (
  `idalunos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `matricula` INT NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idalunos`));