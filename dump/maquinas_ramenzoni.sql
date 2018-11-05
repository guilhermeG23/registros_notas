create database Maquinas_Ramenzoni;

ALTER DATABASE `Maquinas_Ramenzoni` CHARSET = UTF8 COLLATE = utf8_general_ci;

use Maquinas_Ramenzoni;

create table if not exists Empresa(
	CNPJ varchar(14) not null primary key,
	Empresa varchar(100) not null
);

create table if not exists Nota (
	Numero int(9) not null primary key,
	Chave bigint(44) not null,
	Emissao date not null,
	CNPJ_Emitente varchar(14),
	PDF mediumblob not null,
	foreign key(CNPJ_Emitente) references Empresa(CNPJ)
);

create table if not exists Relacao (
	ID_Relacao int(2) not null auto_increment primary key,
	Relacao varchar(40) not null
);

create table if not exists Setor (
	Relacao int(2) not null,
	Centro_Custo varchar(6) not null primary key,
	Setor varchar(40),
	foreign key(Relacao) references Relacao(ID_Relacao)
);

create table if not exists Funcionario (
	Setor varchar(6) not null,
	Chapa int(9) not null primary key.
	Funcionario varchar(100),
	foreign key(Setor) references Setor(Centro_Custo)
);

create table if not exists Marca (
	ID_Marca int(3) not null primary key auto_increment,
	Marca varchar(100) not null
);

create table if not exists Modelo (
	ID_Modelo int(3) not null primary key auto_increment,
	Modelo varchar(100) not null
);

ceate table if not exists Produto (
	Produto int not null primary key auto_increment,
	FK_Nota int(9) not null,
	FK_Modelo int(3) not null,
	FK_Marca int(3) not null,
	Descricao varchar(255) not null,
	Serial varchar(255) not null,
	FK_Relacao_Destino int(2) not null,
	FK_Setor_Destino varchar(6) not null,
	FK_Relacao_Atual int(2) not null,
	FK_Setor_Atual varchar(6) not null,
	FK_Funcionario varchar(9) not null,
	foreign key(FK_Nota) references Nota(Numero),
	foreign key(FK_Modelo) references Modelo(ID_Modelo),
	foreign key(FK_Marca) references Marca(ID_Marca),
	foreign key(FK_Relacao_Destino) references (ID_Relacao),
	foreign key(FK_Setor_Destino) references Setor(Centro_Custo),
	foreign key(FK_Relacao_Atual) references (ID_Relacao),
	foreign key(FK_Setor_Atual) references Setor(Centro_Custo),
	foreign key(FK_Funcionario) references Funcionario(Chapa)
);

create view vw_preencher_tabela as select Nota.Numero as "Nota", Nota.Chave as "Chave", Nota.Emissao as "Data", Nota.CNPJ_Emitente as "CNPJ", Empresa.Empresa as "Empresa", Produto.FK_Relacao_Destino as "RD", Relacao.ID_Relacao as "RelacaoD", Setor.Centro_Custo as "Centro_de_Custo", Setor.Setor, Funcionario.Funcionario as "Funcionario" from Nota inner join Empresa on Nota.CNPJ_Emitente = Empresa.CNPJ inner join Produto on Nota.Numero = Produto.FK_Nota inner join Relacao on Relacao.ID_Relacao = Produto.FK_Relacao_Destino inner join Setor on Setor.Centro_Custo = Produto.FK_Setor_Destino;

create view vw_tabela_produtos as select Produto.Produto as "ID_Produto", Produto.FK_Nota as "Nota", Nota.Emissao as "Data", Nota.Chave as "Chave", Setor.Setor as "Setor", Modelo.Modelo as "Modelo", Marca.Marca as "Marca", Produto.Descricao as "Descricao", Produto.FK_Setor_Destino as "SD", Produto.FK_Setor_Atual as "SA" from Produto inner join Modelo on Produto.Produto = Modelo.ID_Modelo inner join Marca on Produto.ID_Marca = Marca.ID_Marca inner join Setor on Produto.FK_Setor_Destino = Setor.Centro_Custo inner join Nota on Nota.Numero = Produto.FK_Nota group by Produto.FK_Nota; 

create view vw_tabela_produtos as select Produto.Produto as "ID_Produto", Produto.FK_Nota as "Nota", Nota.Emissao as "Data", Nota_Fiscal.Chave as "Chave", Empresa.CNPJ as "CNPJ", Empresa.Empresa as "Empresa", Setor.Setor as "Setor", Modelo.Modelo as "Modelo", Marcas.Marca as "Marca", Produto.Descricao as "Descricao", Relacao.Relacao, Produto.FK_Relacao_Destino as "RD", Produto.FK_Setor_Destino as "SD", Produto.FK_Relacao_Atual as "RA", Produto.FK_Setor_Atual as "SA", Produto.FK_Funcionario, Nota.PDF as "PDF" from Produto inner join Modelo on Produto.FK_Modelo = Modelos.ID_Modelo inner join Marca on Produto.FK_Marca = Marca.ID_Marca inner join Setor on Produto.FK_Setor_Destino = Setor.Centro_Custo inner join Nota on Produto.FK_Nota = Nota.Numero inner join Relacao on Produto.FK_Relacao_Destino = Relacao.ID_Relacao inner join Empresa on Nota.CNPJ_Emitente = Empresa.CNPJ group by Produto.FK_Nota order by Produto.Produto desc;

insert into Setor values ("0001", 1, "Presidência / Assessoria")
	,("0010", 1, "Assessoria Judiciaria")
	,("1110", 1, "Departamento Financeiro")
	,("2210", 1, "Custos e Orcamentos")
	,("3100", 1, "Contabilidade geral")	
	,("3120", 1, "Faturamento")
	,("4100", 1, "C.P.D")
	,("5100", 1, "Departamento de Recursos Humanos / Administração Pessoal")
	,("5120", 1, "Servicos ao Pessoal")
	,("5130", 1, "Treinamento")
	,("5150", 1, "Seguranca / Portaria")
	,("5160", 1, "Serviço de segurança e médias de tranposte")
	,("6100", 2, "Departamento Comercial / Administração de Vendas")
	,("6110", 2, "Vendedores e Representantes")
	,("6200", 2, "Frete s/ Vendas")
	,("7100", 1, "Suprimentos / Compras")
	,("7120", 3, "Almoxarifado Geral")
	,("7130", 1, "Fazenda")
	,("7200", 3, "Compras Aparas")
	,("7220", 3, "Almoxarifado de matéria prima")
	,("9100", 3, "Produção")
	,("9110", 4, "Produção")
	,("9111A", 5, "Preparação de Massa")
	,("9112A", 6, "Preparação de Massa")
	,("9113A", 7, "Preparação de Massa")
	,("9114A", 8, "Preparação de Massa")
	,("9111B", 5, "Máquina Continua")
	,("9112B", 6, "Máquina Continua")
	,("9113B", 7, "Máquina Continua")
	,("9114B", 8, "Máquina Continua")
	,("9111C", 5, "Coating")
	,("9112C", 6, "Coating")
	,("9113C", 7, "Coating")
	,("9114C", 8, "Coating")
	,("9113D", 7, "Size Press")
	,("9114D", 8, "Size Press");


insert into Relacao values (1, "Administrativo"),
	(2, "Comercial"),
	(3, "Indireto"),
	(4, "Rateio"),
	(5, "Maquina 1"),
	(6, "Máquina 2"),
	(7, "Máquina 3"),
	(8, "Máquina 4");