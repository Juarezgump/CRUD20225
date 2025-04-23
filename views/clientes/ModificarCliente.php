<?php

require "../../modelos/cliente.php";
include_once '../templates/header.php';
$_GET['cli_id'] = filter_var(base64_decode($_GET['cli_id']), FILTER_SANITIZE_NUMBER_INT);

$modificar = new Cliente();
$ClienteModificar = $modificar->buscarID($_GET['cli_id']);

// var_dump($ClienteModificar);?>

<h1 class="text-center">Formulario para Modificar Clientes</h1>
<div class="row justify-content-center">
    <form action="../../Controller/clientes/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
            <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="cli_id" id="cli_id" class="form-control" value="<?= $ClienteModificar['cli_id'] ?>">
            </div>
        </div>    
    <div class="row mb-3">
            <div class="col">
                <label for="cli_nombres">Nombre del Cliente</label>
                <input type="text" name="cli_nombres" id="cli_nombres" class="form-control" value="<?= $ClienteModificar['cli_nombres'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellidos">Apellidos del Cliente</label>
                <input type="text" name="cli_apellidos" id="cli_apellidos" class="form-control" value="<?= $ClienteModificar['cli_apellidos'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">No. de NIT</label>
                <input type="number" name="cli_nit" id="cli_nit"  class="form-control" value="<?= $ClienteModificar['cli_nit'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">Telefono</label>
                <input type="number" name="cli_telefono" id="cli_telefono"  class="form-control" value="<?= $ClienteModificar['cli_telefono'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100">MODIFICAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../Controller/clientes/buscar.php" class="btn btn-success w-100">CANCELAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>