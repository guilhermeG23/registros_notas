create database if not exists Maquinas_Ramenzoni;

use Maquinas_Ramenzoni;

create table if not exists Nota_Fiscal(
	Nota_Fiscal varchar(9) not null primary key,
	Chave_Acesso varchar(44) not null,
	Emissao date not null,
	Empresa varchar(140) not null,
	Nota_Nome varchar(20) not null,
	Nota_PDF mediumblob
	);

	create table if not exists Setor(
		Centro_custo varchar(6) not null primary key,
		Setor varchar(40) not null
		);

		create table if not exists Marcas (
			ID_Marca int not null auto_increment primary key,
			Marca varchar(100) not null
			); 

			create table if not exists Modelos (
				ID_Modelo int not null auto_increment primary key,
				Tipo varchar(40) not null
				);

				create table if not exists Funcionario (
					ID_Funcionario int not null primary key,
					Nome varchar(100) not null,
					Ex_Centro_custo varchar(6) not null,
					foreign key (Ex_Centro_custo) references Setor(Centro_custo)
					);

					create table if not exists Produto (
						ID_Produto int not null auto_increment primary key,
						ID_Nota varchar(44) not null,
						ID_Ex_Modelo int not null,
						ID_Ex_Marca int not null,
						Descricao varchar(100) not null,
						Key_Serial varchar(50) default NULL,
						Relacao_Destino int(11) not null,
						Setor_Destino varchar(6) not null,
						Relacao_Atual int(11) not null,
						Setor_Atual varchar(6) not null,
						ID_Ex_Funcionario int not null,
						foreign key (ID_Nota) references Nota_Fiscal(Nota_Fiscal),
						foreign key (ID_Ex_Modelo) references Modelos(ID_Modelo),
						foreign key (ID_Ex_Marca) references Marcas(ID_Marca),
						foreign key (Setor_Destino) references Setor(Centro_custo),
						foreign key (Setor_Atual) references Setor(Centro_custo),
						foreign key (Relacao_Destino) references Relacao_Setor(ID_Relacao),
						foreign key (Relacao_Atual) references Relacao_Setor(ID_Relacao),
						foreign key (ID_Ex_Funcionario) references Funcionario(ID_Funcionario)
						);

						#usuario
						create user "maquinas"@"%" identified by "rr";
						create user "maquinas"@"localhost" identified by "rr";
						grant all privileges on Maquinas_Ramenzoni . * to "maquinas"@"%";
						grant all privileges on Maquinas_Ramenzoni . * to "maquinas"@"localhost";
						flush privileges;
