-- Insert de dados

-- Usuários

insert into usuarios values (1,'Carlos Benjamim', 'carlosbarten@gmail.com',35999057700, 'password');
insert into usuarios values (2,'Tiago Nigro', 'primorico@gmail.com',119998778956, 'password2');
insert into usuarios values (3,'Paula Fernandes', 'passarodefogo@gmail.com',7123569898, 'password3');
insert into usuarios values (4,'Tim Maia', 'lemeaopontal@gmail.com',1578784554, 'password4');
insert into usuarios values (5,'Pe DrO Sam Pai O', 'dancarina@gmail.com',1112124545, 'password5');

select * from usuarios;

-- ---------------------------------------------------------------------

-- Inventário

insert into inventario values(1,'Tacho','Producao',2,1254.65);
insert into inventario values(2,'Barril','Producao',8,500.00);
insert into inventario values(3,'Mesa','Producao',2,100.25);
insert into inventario values(4,'Chopeira','Venda',3,3000.12);
insert into inventario values(5,'Cilindro CO2','Venda',3,550.85);

select * from inventario;

-- ----------------------------------------------------------------------

-- Tipo Receita
insert into tipo_cerveja values(1,'Premium Lager',20,4.8,15.8,4.9,'Saccharification: Adicionar 17.04 L de água a 68.9 C 64.4 C 60 min','1o Após o Mash Out, esgotar todo a mistura','Hallertauer Mittelfrueh [3.60 %] - Fervura 60.0 min','2.0 pkg Saflager Lager W-34/70 (DCL/Fermentis',1.045,1.008,10,10);
insert into tipo_cerveja values(2,'IPA Citra',50,5.8,19.8,5.9,'Saccharification: Adicionar 25.04 L de água a 68.9 C 64.4 C 60 min','1o Após o Mash Out, esgotar todo a mistura','Citra [3.60 %] - Fervura 60.0 min','2.0 pkg US-05',1.055,1.011,7,15);

select * from tipo_cerveja;

-- ----------------------------------------------------------------------

-- Ingredientes

insert into ingredientes values(1,'Malte Pilsen',250,'Kg',9.99);
insert into ingredientes values(2,'Malte Vienna',50,'Kg',19.59);
insert into ingredientes values(3,'Malte Munique',59,'Kg',21.99);
insert into ingredientes values(4,'Lupulo MittelFrueh',0.8,'Kg',59.99);
insert into ingredientes values(5,'Fermento Lager',500,'g',99.99);
insert into ingredientes values(6,'Malte IPA 1',140,'Kg',7.99);
insert into ingredientes values(7,'Malte IPA 2',78,'Kg',23.95);
insert into ingredientes values(8,'Lupulo Citra',20,'g',69.99);
insert into ingredientes values(9,'Lupulo Cascade',20,'Kg',2.99);
insert into ingredientes values(10,'Fermento US05',2,'Kg',39.99);


select* from ingredientes;

-- ---------------------------------------------------------------------

-- Receita

-- Lager
insert into receita values (1,1,4.0,'Kg',51.66);
insert into receita values (1,3,0.7,'Kg',32.66);
insert into receita values (1,4,50,'g',88.00);
insert into receita values (1,5,100,'g',99.66);
-- Ipa
insert into receita values (2,1,9.0,'Kg',78.66);
insert into receita values (2,6,0.7,'Kg',32.66);
insert into receita values (2,7,0.9,'Kg',58.00);
insert into receita values (2,8,200,'g',129.66);
insert into receita values (2,10,100,'g',120.66);

select* from receita;

-- ------------------------------------------------------------

-- Lote

insert into lote values (1,1.039,1.012,'L12',20230302,50,20230312,20230412,1);
insert into lote values (2,1.040,null,'L13',20230302,50,null,null,1);

select* from lote;

-- -------------------------------------------------------------

-- Produto acabado



