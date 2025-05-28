create database empresa;
use empresa;

create table clientes (
id_cliente int not null auto_increment,
nome varchar(50) not null,
endereco varchar(80) not null,
telefone varchar(20) not null,
email varchar(50) not null,
primary key (id_cliente)
);

insert into clientes (nome, endereco, telefone, email) values
('João Silva', 'Rua das Flores, 123 - Centro', '(11) 91234-5678', 'joao.silva@email.com'),
('Maria Oliveira', 'Av. Brasil, 456 - Jardim América', '(21) 99876-5432', 'maria.oliveira@email.com'),
('Carlos Souza', 'Rua Afonso Pena, 789 - Copacabana', '(31) 98765-4321', 'carlos.souza@email.com'),
('Ana Costa', 'Rua das Palmeiras, 321 - Liberdade', '(41) 97654-3210', 'ana.costa@email.com'),
('Fernanda Lima', 'Av. Paulista, 1000 - Bela Vista', '(51) 96543-2109', 'fernanda.lima@email.com'),
('Lucas Martins', 'Rua São João, 12 - Centro', '(61) 92345-6789', 'lucas.martins@email.com'),
('Juliana Alves', 'Av. Sete de Setembro, 800 - Batel', '(71) 93456-7890', 'juliana.alves@email.com'),
('Rafael Pereira', 'Rua XV de Novembro, 150 - Centro', '(81) 94567-8901', 'rafael.pereira@email.com'),
('Camila Rocha', 'Rua das Acácias, 78 - Jardim Botânico', '(91) 95678-9012', 'camila.rocha@email.com'),
('Bruno Fernandes', 'Av. Atlântica, 456 - Leme', '(85) 96789-0123', 'bruno.fernandes@email.com'),
('Patrícia Mendes', 'Rua do Sol, 300 - Centro', '(82) 97890-1234', 'patricia.mendes@email.com'),
('Diego Moreira', 'Av. Independência, 900 - Jardim Europa', '(92) 98901-2345', 'diego.moreira@email.com'),
('Larissa Ribeiro', 'Rua das Laranjeiras, 55 - Santa Cecília', '(95) 99012-3456', 'larissa.ribeiro@email.com'),
('Gabriel Lima', 'Rua Bento Gonçalves, 432 - Menino Deus', '(96) 90123-4567', 'gabriel.lima@email.com'),
('Amanda Nunes', 'Av. das Nações, 1234 - Asa Norte', '(97) 91234-5678', 'amanda.nunes@email.com'),
('Felipe Araújo', 'Rua das Margaridas, 66 - Jardim das Flores', '(98) 92345-6789', 'felipe.araujo@email.com'),
('Vanessa Teixeira', 'Av. Central, 777 - Centro', '(99) 93456-7890', 'vanessa.teixeira@email.com'),
('Thiago Batista', 'Rua Projetada, 200 - Nova Esperança', '(83) 94567-8901', 'thiago.batista@email.com'),
('Renata Cardoso', 'Rua do Comércio, 888 - Centro', '(84) 95678-9012', 'renata.cardoso@email.com'),
('Eduardo Gomes', 'Av. Beira Mar, 159 - Praia Grande', '(86) 96789-0123', 'eduardo.gomes@email.com');



create table usuario(
nome varchar(50) default null,
usuario varchar(10) default null,
senha varchar(32) default null,
nivel int default null
);
 
 
 