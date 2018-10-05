create database if not exists Maquinas_Ramenzoni;

use Maquinas_Ramenzoni;

create table if not exists Nota_Fiscal(
	Nota_Fiscal varchar(44) not null primary key,
	Emissao date not null,
	Empresa varchar(100) not null,
	Nota_Nome varchar(50) not null default 'NULL',
	Nota_PDF mediumblob
);

create table if not exists Setor(
	Setor_ID int not null auto_increment primary key,
	Setor varchar(40) not null
);

create table if not exists Funcionario (
	Chapa int not null primary key,
	Nome varchar(100) not null,
	Setor_ID_Externo int not null,
	foreign key (Setor_ID_Externo) references Setor(Setor_ID) on delete cascade
);

create table if not exists Maquina (
	Maquina_Serial varchar(44) not null primary key,
	Nota_Fiscal_Ex varchar(44) not null,
	Marca varchar(100) not null,
	Modelo varchar(100) not null,
	ID_setor_ex int not null,
	Chapa_func int not null,
	foreign key (ID_setor_ex) references Setor(Setor_ID),
	foreign key (Chapa_func) references Funcionario(Chapa),
	foreign key (Nota_Fiscal_Ex) references Nota_Fiscal(Nota_Fiscal) on delete cascade
);

create table if not exists Windows(
	Nota_Fiscal varchar(44) not null,
	Serial_W varchar(25) not null default "0000000000000000000000000",
	Versao varchar(100) not null,
	ID_setor_ex int not null,
	Chapa_func int not null,
	foreign key (ID_setor_ex) references Setor(Setor_ID),
	foreign key (Chapa_func) references Funcionario(Chapa),
	foreign key (Nota_Fiscal) references Nota_Fiscal(Nota_Fiscal)
);

create table if not exists Office(
	Nota_Fiscal varchar(44) not null,
	Serial_O varchar(25) not null default "0000000000000000000000000",
	Versao varchar(100) not null,
	Ano int(4) not null,
	ID_setor_ex int not null,
	Chapa_func int not null,
	foreign key (ID_setor_ex) references Setor(Setor_ID),
	foreign key (Chapa_func) references Funcionario(Chapa),
	foreign key (Nota_Fiscal) references Nota_Fiscal(Nota_Fiscal)
);

insert into Setor values (default, "Diretoria"),
	(default, "RH"),
	(default, "Segurança"),
	(default, "Financeiro"),
	(default, "Contabilidade"),
	(default, "Fiscal"),
	(default, "Custos"),
	(default, "Comercial"),
	(default, "CPD"),
	(default, "Sala de reuniao"),
	(default, "Antendimento"),
	(default, "Aparas"),
	(default, "Faturamento"),
	(default, "Portaria"),
	(default, "Maquina 4"),
	(default, "Láboratorio M4"),
	(default, "Sala ISO"),
	(default, "Cortadeira M3"),
	(default, "Expedicacao M3"),
	(default, "Maquina 3"),
	(default, "Sala gerente Producao"),
	(default, "Laboratorio central"),
	(default, "Maquina 1"),
	(default, "Maquina 2"),
	(default, "Expedicacao M12"),
	(default, "Sala de treinamento"),
	(default, "Mecanica"),
	(default, "Eletrica"),
	(default, "Técnicno"),
	(default, "Almoxarifado"),
	(default, "Compras"),
	(default, "Aparas - Patio"),
	(default, "Sede"),
	(default, "Alcatrazes"),
	(default, "Nada");

insert into Funcionario values (1111111111, "teste", 1);

#usuario
create user "maquinas"@"%" identified by "rr";
create user "maquinas"@"localhost" identified by "rr";
grant all privileges on Maquinas_Ramenzoni . * to "maquinas"@"%";
grant all privileges on Maquinas_Ramenzoni . * to "maquinas"@"localhost";
flush privileges;