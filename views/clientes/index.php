<?php

include_once '../templates/header.php';


?>
<div class="container justify-content-center mt-3"></div>
<div class="row">
    <div class="col">
    <h1 class="text-center mb-2">REGISTRO DE CLIENTES</h1>

    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
        <form action="/CRUD20225/controller/clientes/guardar.php" method="POST" class="form-control">
        <div class="row mb-3">
            <label for="cli_nombres">INGRESE SU NOMBRE</label>
            <input type="text" name="cli_nombres" class="form-control" placeholder="Ingresa tu nombre" required>
        </div>
        <div class="row mb-3">
            <label for="cli_apellidos">INGRESE SU APELLIDO</label>
            <input type="text" name="cli_apellidos" class="form-control" placeholder="Ingresa tu apellido" required>
        </div>
        <div class="row mb-3">
            <label for="cli_telefono">INGRESE SU NUMERO DE TELEFONO</label>
            <input type="number" name="cli_telefono" class="form-control" placeholder="Ingresa tu numero de telfono" required>
        </div>
        <div class="row mb-3">
            <label for="cli_nit">INGRESE SU NUMERO DE NIT</label>
            <input type="number" name="cli_nit" class="form-control" placeholder="Ingresa tu numero de nit" required>
        </div>
       <div class="row justify-content-center">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-secondary">Limpiar</button>
            </div>
       </div>
    </form>
        </div>
    </div>
</div>
    

<?php
include_once '../templates/footer.php';

?>