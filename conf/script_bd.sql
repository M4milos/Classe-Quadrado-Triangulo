CREATE SCHEMA IF NOT EXISTS quadrado DEFAULT CHARACTER SET utf8 ;
USE quadrado;


    create table if not exists Tabuleiro(
        idTabuleiro int primary key not null auto_increment,
        Lado int);

    create table if not exists quadrado (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Lado INT(250),
    Cor VARCHAR(255),
    idTabuleiro INT(250),
    foreign key(idTabuleiro) references Tabuleiro (idTabuleiro));

    create table if not exists usuario(
        idUsuario int primary key not null auto_increment,
        nome VARCHAR(250),
        login VARCHAR(250) NOT NULL,
        senha VARCHAR(250) NOT NULL
    );
    CREATE TABLE IF NOT EXISTS triangulo(
        ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        base INT (250),
        lado1 INT (250),
        lado2 INT (250)
    );