create database restaurante_ifood;
use restaurante_ifood;

create table clientes(
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null,
    telefone varchar(20),
    endereco varchar(200)
);

create table restaurante(
    id int auto_increment primary key,
    nome varchar(100) not null,
    categoria varchar(100) not null,
    telefone varchar(20),
    endereco varchar(200)
);

CREATE TABLE pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    restaurante_id INT NOT NULL,
    data_pedido DATETIME NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    status VARCHAR(50) NOT NULL,

    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (restaurante_id) REFERENCES restaurante(id)
);
