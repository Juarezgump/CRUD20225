<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);


require '../../modelos/cliente.php';

// consulta
try {
    $nit = $_GET['cli_nit'];
    $telefono = $_GET['cli_telefono'];
    $_GET['cli_nombres'] = htmlspecialchars($_GET['cli_nombres']);
    $_GET['cli_apellidos'] = htmlspecialchars($_GET['cli_apellidos']);
    $_GET['cli_telefono'] = filter_var($telefono, FILTER_VALIDATE_INT);
    $_GET['cli_nit'] = filter_var($nit, FILTER_VALIDATE_INT);
    

    $Cli_Consulta = new Cliente($_GET);
    $cliente = $Cli_Consulta->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $cliente,
        'codigo' => 1
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}
$alertas = ['danger', 'success', 'warning'];

include_once '../../views/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../views/clientes/buscar.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>

<h1 class="text-center">Clientes Ingresados </h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead> 
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>NIT</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 ) : ?>
                        <?php foreach ($cliente as $key => $opcion) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $opcion['cli_nombres'] ?></td>
                                <td><?= $opcion['cli_apellidos'] ?></td>
                                <td><?= $opcion['cli_nit'] ?></td>
                                <td><?= $opcion['cli_telefono'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../../vistas/clientes/ModificarCliente.php?cli_codigo=<?= base64_encode($opcion['cli_codigo'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="eliminar.php?cli_codigo=<?= base64_encode($opcion['cli_codigo'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay clientes registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        

<?php include_once '../../views/templates/footer.php'; ?>