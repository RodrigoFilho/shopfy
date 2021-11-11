create database supermercado_bd;
use supermercado_bd;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`cliente` (
  `cod_cliente` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `cpf` CHAR(12) NOT NULL,
  `email` VARCHAR(100) NULL,
  `telefone` CHAR(14) NOT NULL,
  `endereco` VARCHAR(200) NULL,
  PRIMARY KEY (`cod_cliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`funcionario` (
  `cod_funcionario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `senha` VARCHAR(45) NOT NULL, 
  `email` VARCHAR(100) NOT NULL,   
  `nome` VARCHAR(80) NOT NULL,
  `cpf` CHAR(12) NOT NULL,
  `telefone` CHAR(14) NOT NULL,
  `foto` VARCHAR(150) NOT NULL,  
  PRIMARY KEY (`cod_funcionario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`categoria` (
  `cod_categoria` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`cod_categoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`fornecedor` (
  `cod_fornecedor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cnpj` INT NOT NULL,
  PRIMARY KEY (`cod_fornecedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`produtos` (
  `cod_prod` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cod_barras` INT NOT NULL,
  `dt_fabr` DATE NOT NULL,
  `dt_venc` DATE NOT NULL,
  `lote` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `preco` DOUBLE(9,2) NOT NULL,
  `foto` VARCHAR(115) NOT NULL,
  `categoria_cod_categoria` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cod_prod`),
  CONSTRAINT `fk_produtos_categoria1`
    FOREIGN KEY (`categoria_cod_categoria`)
    REFERENCES `supermercado_bd`.`categoria` (`cod_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`carrinho` (
  `codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cliente_cod_cliente` INT UNSIGNED NOT NULL,
  `produtos_cod_prod` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`codigo`),
  CONSTRAINT `fk_carrinho_cliente1`
    FOREIGN KEY (`cliente_cod_cliente`)
    REFERENCES `supermercado_bd`.`cliente` (`cod_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carrinho_produtos1`
    FOREIGN KEY (`produtos_cod_prod`)
    REFERENCES `supermercado_bd`.`produtos` (`cod_prod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`venda` (
  `cod_venda` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `valor` DOUBLE(9,2) NOT NULL,
  `data` DATE NOT NULL,
  `cliente_cod_cliente` INT UNSIGNED NOT NULL,
  `produtos_cod_prod` INT UNSIGNED NOT NULL,
  `funcionario_cod_funcionario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cod_venda`),
  CONSTRAINT `fk_venda_cliente`
    FOREIGN KEY (`cliente_cod_cliente`)
    REFERENCES `supermercado_bd`.`cliente` (`cod_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_produtos1`
    FOREIGN KEY (`produtos_cod_prod`)
    REFERENCES `supermercado_bd`.`produtos` (`cod_prod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_funcionario1`
    FOREIGN KEY (`funcionario_cod_funcionario`)
    REFERENCES `supermercado_bd`.`funcionario` (`cod_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `supermercado_bd`.`fornecedor_has_produtos` (
  `fornecedor_cod_fornecedor` INT UNSIGNED NOT NULL,
  `produtos_cod_prod` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`fornecedor_cod_fornecedor`, `produtos_cod_prod`),
  CONSTRAINT `fk_fornecedor_has_produtos_fornecedor1`
    FOREIGN KEY (`fornecedor_cod_fornecedor`)
    REFERENCES `supermercado_bd`.`fornecedor` (`cod_fornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fornecedor_has_produtos_produtos1`
    FOREIGN KEY (`produtos_cod_prod`)
    REFERENCES `supermercado_bd`.`produtos` (`cod_prod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

drop table categoria;
drop database `supermercado_bd`;
delete from `produtos` where `cod_prod` = 3;
select * from funcionario;
select * from `produtos`;
select * from categoria;
set sql_safe_updates = 0;
update produtos set preco = preco * 1.20;
select nome, email from funcionario;

select * from funcionario where email = 'juliana@gmail.com' and senha = 1234;




-- C:/Users/rodri/Downloads/painel_supermercado/painel_supermercado/Resources/login_icon.png



















































