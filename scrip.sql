CREATE TABLE clientes (  
    cli_id SERIAL PRIMARY KEY,
    cli_nombres VARCHAR(250) NOT NULL,
    cli_apellidos Varchar(250) NOT NULL,
    cli_telefono INT NOT NULL, 
    cli_nit INT NOT NULL, 
    cli_situacion SMALLINT DEFAULT 1
);