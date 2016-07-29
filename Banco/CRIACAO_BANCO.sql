/* 
* Criacao e configuracao do banco de dados do sistema INFO VOLUNTARIO
* Executar os scripts individualmente
*/

/* cria o banco de dados */
CREATE SCHEMA `info_voluntario` DEFAULT CHARACTER SET utf8 ;

/* cria o usuario para acesso via PHP */
CREATE USER 'infovoluntario'@'localhost' IDENTIFIED BY 'info voluntario';

/* concede os privilegios basicos */
GRANT SELECT, UPDATE, DELETE, INSERT 
ON info_voluntario.* TO 'infovoluntario'@'localhost';

/* criacao das tabela */
CREATE TABLE `info_voluntario`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE INDEX `idusuarios_UNIQUE` (`idusuarios` ASC));

CREATE TABLE `info_voluntario`.`organizacoes` (
  `idorganizacoes` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `cnpj` VARCHAR(15) NULL,
  `descricao` VARCHAR(500) NULL,
  PRIMARY KEY (`idorganizacoes`));


