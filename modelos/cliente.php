<?php

include_once 'Conexion.php';

class Cliente extends Conexion
{

    public $cli_id;
    public $cli_nombres;
    public $cli_apellidos;
    public $cli_telefono;
    public $cli_nit;
    public $cli_situacion;

    public function __construct($args = [])
    {
        $this->cli_id = $args['cli_id'] ?? null;
        $this->cli_nombres = $args['cli_nombres'] ?? '';
        $this->cli_apellidos = $args['cli_apellidos'] ?? '';
        $this->cli_telefono = $args['cli_telefono'] ?? '';
        $this->cli_nit = $args['cli_nit'] ?? '';
        $this->cli_situacion = $args['cli_situacion'] ?? 1;
    }

    public function guardar()
    {

        $sql = "INSERT INTO clientes(cli_nombres, cli_apellidos, cli_nit, cli_telefono)
                VALUES (:nombres, :apellidos, :nit, :telefono)";

        $params =[
            ':nombres' => $this->cli_nombres,
            ':apellidos' => $this->cli_apellidos,
            ':nit' => $this->cli_nit,
            ':telefono' => $this->cli_telefono
           
        ];


        return $this->ejecutar($sql, $params);
    }

    public function buscar(...$columnas)
{
    $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $cols FROM clientes WHERE cli_situacion = 1";
    $params = [];

    if (!empty($this->cli_nombres)) {
        $sql .= " AND cli_nombres LIKE :nombres";
        $params[':nombres'] = "%{$this->cli_nombres}%";
    }

    if (!empty($this->cli_apellidos)) {
        $sql .= " AND cli_apellidos LIKE :apellidos";
        $params[':apellidos'] = "%{$this->cli_apellidos}%";
    }

    if (!empty($this->cli_nit)) {
        $sql .= " AND cli_nit = :nit";
        $params[':nit'] = $this->cli_nit;
    }

    return self::servir($sql, $params); // ¡ya acepta parámetros!
}

public function buscarID($ID){
        
    $sql = "SELECT * FROM clientes where cli_situacion = 1 AND cli_id = $ID ";

    $resultado =  array_shift(self::servir($sql));
    return $resultado;
}

public function modificar()
{
    $sql = "UPDATE clientes 
            SET cli_nombres = :nombres, 
                cli_apellidos = :apellidos, 
                cli_nit = :nit, 
                cli_telefono = :telefono 
            WHERE cli_situacion = 1 AND cli_id = :id";

    $params = [
        ':nombres'   => $this->cli_nombres,
        ':apellidos' => $this->cli_apellidos,
        ':nit'      => $this->cli_nit,
        ':telefono' => $this->cli_telefono,
        ':id'   => $this->cli_id
    ];

    return $this->ejecutar($sql, $params);
}

public function eliminar() {
    $sql = "UPDATE clientes SET cli_situacion = 0 WHERE cli_id = :id";

    $params = [
        ':id' => $this->cli_id
    ];

    return $this->ejecutar($sql, $params);
}

}

include_once '../../views/templates/footer.php';