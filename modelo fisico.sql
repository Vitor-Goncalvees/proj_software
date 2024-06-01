create database porteiro_inteligente;
use porteiro_inteligente;

create table Clientes(
cliente_id int auto_increment primary key,
nome varchar (200),
cpf char(14),
email varchar(50),
telefone varchar(40),
username VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

create table pedidos(
id_pedido int auto_increment primary key,
nome varchar(200), -- nome do produto
numero int,
empresa varchar(200),
email varchar(50)
);

create or replace view view_resultado 
as 
SELECT * FROM PEDIDOS WHERE numero > 10;

desc view_resultado;
drop table clientes;
select * from clientes;
select* from pedidos;
