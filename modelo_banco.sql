create database if not exists Maquinas_Ramenzoni;

use Maquinas_Ramenzoni;

create table if not exists Nota_Fiscal(
	Nota_Fiscal varchar(44) not null primary key,
	Emissao date not null
);

create table if not exists Setor(
	Setor_ID int not null auto_increment primary key,
	Setor varchar(40) not null
);

insert into Setor values 
	(default, "Diretoria"),
	(default, "RH"),
	(default, "Segurança"),
	(default, "Financeiro"),
	(default, "Contabilidade"),
	(default, "Fiscal"),
	(default, "Custos"),
	(default, "Comercial"),
	(default, "CPD"),
	(default, "Sala de reunião"),
	(default, "Antendimento"),
	(default, "Aparas"),
	(default, "Faturamento"),
	(default, "Portaria"),
	(default, "Máquina 4"),
	(default, "Láboratório M4"),
	(default, "Sala ISO"),
	(default, "Cortadeira M3"),
	(default, "Expedicação M3"),
	(default, "Máquina 3"),
	(default, "Sala gerente Produção"),
	(default, "Laboratório central"),
	(default, "Máquina 1"),
	(default, "Máquina 2"),
	(default, "Expedicação M12"),
	(default, "Sala de treinamento"),
	(default, "Mecânica"),
	(default, "Elétrica"),
	(default, "Técnicno"),
	(default, "Almoxarifado"),
	(default, "Compras"),
	(default, "Aparas - Pátio"),
	(default, "Sede"),
	(default, "Alcatrazes");

create table if not exists Funcionario (
	Chapa int not null primary key,
	Nome varchar(100) not null,
	Setor_ID_Externo int not null,
	foreign key (Setor_ID_Externo) references Setor(Setor_ID)
);

insert into Funcionario values (1111111111, "teste", 1);

create table if not exists Maquina (
	Maquina_Serial varchar(44) not null primary key,
	Marca varchar(100) not null,
	Modelo varchar(100) not null,
	Chapa_func int not null,
	foreign key (Chapa_func) references Funcionario(Chapa) 
);

#usuario
create user "maquinas"@"%" identified by "rr";
create user "maquinas"@"localhost" identified by "rr";
grant all privileges on Maquinas_Ramenzoni . * to "maquinas"@"%";
grant all privileges on Maquinas_Ramenzoni . * to "maquinas"@"localhost";
flush privileges;