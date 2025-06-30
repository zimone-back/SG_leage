USE sangiorgioleague;

CREATE TABLE Presidenti (
    ID_presidenti INT PRIMARY KEY NOT NULL,
    Nome VARCHAR(30),
    Cognome VARCHAR(30)
);

CREATE TABLE Campionati (
    ID_campionato INT PRIMARY KEY NOT NULL,
    Nome VARCHAR(50),
    Nazione VARCHAR(50)
);

CREATE TABLE Squadre (
    ID_squadre INT PRIMARY KEY NOT NULL,
    Nome VARCHAR(30),
    Città VARCHAR(30),
    Cod_presidenti INT,
    Cod_campionato INT,
    FOREIGN KEY (Cod_presidenti) REFERENCES Presidenti(ID_presidenti),
    FOREIGN KEY (Cod_campionato) REFERENCES Campionati(ID_campionato)
);

CREATE TABLE Giocatori (
    ID_giocatori INT PRIMARY KEY NOT NULL,
    Nome VARCHAR(30),
    Cognome VARCHAR(30),
    Cod_squadre INT,
    FOREIGN KEY (Cod_squadre) REFERENCES Squadre(ID_squadre)
);

CREATE TABLE Cont_goal (
    ID_cont_goal INT PRIMARY KEY NOT NULL,
    Cod_giocatori INT,
    Goal INT,
    Data DATE,
    FOREIGN KEY (Cod_giocatori) REFERENCES Giocatori(ID_giocatori)
);
