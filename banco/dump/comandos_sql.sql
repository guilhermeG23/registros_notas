create view vw_notas as select distinct Nota_Fiscal.Nota_Fiscal as "Nota", Nota_Fiscal.Chave_Acesso as "Chave", Nota_Fiscal.Empresa as "Empresa", Nota_Fiscal.Emissao as "Data", Setor.Setor as "Setor", Nota_Fiscal.Nota_PDF as "PDF" from Nota_Fiscal inner join Produto on Nota_Fiscal.Nota_Fiscal = Produto.ID_Nota inner join Setor on Produto.Setor_Atual = Setor.Centro_custo;

insert into Modelos values (default, "Perifericos"), (default, "Monitor"), (default, "Impressora"), (default, "Server"), (default, "Notebook");

create view vw_prod as select Modelos.Modelo from Produto inner join Modelos on Produto.ID_Ex_Modelo = Modelos.ID_Modelo;

create view vw_tabela_produtos as select Produto.ID_Produto as "ID_Produto", Produto.ID_Nota as "Nota", Setor.Setor as "Setor", Modelos.Modelo as "Modelo", Marcas.Marca as "Marca", Produto.Descricao as "Descricao", Produto.Setor_Destino as "SD", Produto.Setor_Atual as "SA" from Produto inner join Modelos on Produto.ID_Ex_Modelo = Modelos.ID_Modelo inner join Marcas on Produto.ID_Ex_Marca = Marcas.ID_Marca inner join Setor on Produto.Setor_Atual = Setor.Centro_custo; 

create view vw_tabela_produtos as select Produto.ID_Produto as "ID_Produto", Produto.ID_Nota as "Nota", Nota_Fiscal.Emissao as "Data", Nota_Fiscal.Chave_Acesso as "Chave", Nota_Fiscal.Empresa as "Empresa", Setor.Setor as "Setor", Modelos.Modelo as "Modelo", Marcas.Marca as "Marca", Produto.Descricao as "Descricao", Produto.Setor_Destino as "SD", Produto.Setor_Atual as "SA" from Produto inner join Modelos on Produto.ID_Ex_Modelo = Modelos.ID_Modelo inner join Marcas on Produto.ID_Ex_Marca = Marcas.ID_Marca inner join Setor on Produto.Setor_Atual = Setor.Centro_custo inner join Nota_Fiscal on Nota_Fiscal.Nota_Fiscal = Produto.ID_Nota group by Produto.ID_Nota; 


