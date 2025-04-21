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
        $sql = "INSERT INTO clientes(cli_nombres, cli_apellidos, cli_telefono, cli_nit)
        VALUES (:nombre, :apellido,  :telefono, :nit)";

        $params = [
            ':nombre' => $this->cli_nombres,
            ':apellido' => $this->cli_apellidos,
            ':telefono' => $this->cli_telefono,
            ':nit' => $this->cli_nit
            
        ];

        $date = $this->ejecutar($sql, $params);
        return $date;
    }

    public function buscar(...$columnas)
{
    $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $cols FROM clientes WHERE cli_situacion = 1";
    $params = [];

    if (!empty($this->cli_nombres)) {
        $sql .= " AND cli_nombres LIKE :nombre";
        $params[':nombre'] = "%{$this->cli_nombres}%";
    }

    if (!empty($this->cli_apellidos)) {
        $sql .= " AND cli_apellidos LIKE :apellido";
        $params[':apellido'] = "%{$this->cli_apellidos}%";
    }

    if (!empty($this->cli_nit)) {
        $sql .= " AND cli_nit = :nit";
        $params[':nit'] = $this->cli_nit;
    }

    if (!empty($this->cli_telefono)) {
        $sql .= " AND cli_telefono = :telefono";
        $params[':telefono'] = $this->cli_telefono;
    }
    return self::servir($sql, $params); 
}
public function buscarID($ID){
    $sql = "SELECT * FROM clientes WHERE cli_situacion = 1 AND cli_id = :id";

    $params = [':id' => $ID];

    $resultado = self::servir($sql, $params);

    return array_shift($resultado); 
}

public function modificar()
{
    $sql = "UPDATE cliente_crud 
            SET cli_nombre = :nombre, 
                cli_apellido = :apellido, 
                cli_nit = :nit, 
                cli_telefono = :telefono 
            WHERE cli_situacion = 1 AND cli_codigo = :codigo";

    $params = [
        ':nombre'   => $this->cli_nombres,
        ':apellido' => $this->cli_apellidos,
        ':nit'      => $this->cli_nit,
        ':telefono' => $this->cli_telefono,
        ':codigo'   => $this->cli_id
    ];

    return $this->ejecutar($sql, $params);
}

public function eliminar() {
    $sql = "UPDATE cliente_crud SET cli_situacion = 0 WHERE cli_codigo = :codigo";

    $params = [
        ':id' => $this->cli_id
    ];

    return $this->ejecutar($sql, $params);
}

}