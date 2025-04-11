<?php
include_once 'conexion.php';

class Cliente extends conexion{
    public $cli_id; 
    public $cli_nombres;
    public $cli_apellidos; 
    public $cli_telefono; 
    public $cli_nit;
    public $cli_situacion; 


    public function __construct($args = []){
        $this->cli_id = $args['cli_id'] ?? null;
        $this->cli_nombres = $args['cli_nombres'] ?? '';
        $this->cli_apellidos = $args['cli_apellidos'] ?? '';
        $this->cli_telefono = $args['cli_telefono'] ?? '';
        $this->cli_nit = $args['cli_nit'] ?? '';
        $this->cli_situacion = $args['cli_situacion'] ?? 1; 
        
    }
    public function guardar(){
        $sql = "INSERT INTO clientes(cli_nombres, cli_apellidos, cli_telefono, cli_nit, cli_situacion)
        VALUES ('$this->cli_nombres', '$this->cli_apellidos', '$this->cli_telefono', '$this->cli_nit', '$this->cli_situacion')";
        $date = $this->ejecutar($sql);
        return $date;
    }
}