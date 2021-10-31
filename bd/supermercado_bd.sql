create database supermercado_bd;
use supermercado_bd;

create table produtos(
cod_prod int unsigned auto_increment not null primary key,
nome varchar(80) not null,
cod_barras int not null,
dt_fabr date not null,
dt_venc date not null,
lote int not null,
quantidade int not null,
foto varchar(115) not null,
preco double(9,2) not null
)engine=innoDB;

create table funcionario(
cod_funcionario int unsigned auto_increment not null primary key,
nome varchar(80) not null,
cpf char(11) not null,
telefone char(11) not null,
email varchar(100) not null,
senha varchar(16) not null
)engine=innoDB;

create table cliente(
cod_cliente int unsigned auto_increment not null primary key,
nome varchar(80) not null,
cpf char(11) not null,
email varchar(100) not null,
telefone char(11) not null,
endereco varchar(200) not null
)engine=innoDB;

create table venda(
cod_venda int unsigned auto_increment not null primary key,
valor double(9,2) not null,
data date not null,
cliente_cod_cliente int unsigned not null,
produtos_cod_prod int unsigned not null,
funcionario_cod_funcionario int unsigned not null,
foreign key(cliente_cod_cliente) references cliente(cod_cliente),
foreign key(produtos_cod_prod) references produtos(cod_prod),
foreign key(funcionario_cod_funcionario) references funcionario(cod_funcionario)
)engine=innoDB;




drop database supermercado_bd;



select * from funcionario;
select * from produtos;


















































