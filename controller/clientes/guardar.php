<?php
include_once '../../views/templates/header.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require '../../modelos/cliente.php';

$_POST['cli_nombres'] = htmlspecialchars($_POST['cli_nombres']);
$_POST['cli_apellidos'] = htmlspecialchars($_POST['cli_apellidos']);
$_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_SANITIZE_NUMBER_INT);
$_POST['cli_nit'] = filter_var($_POST['cli_nit'], FILTER_SANITIZE_NUMBER_INT);

try{

    $nuevo_usuario = new Cliente($_POST);
    $usuario = $nuevo_usuario->guardar();

    $resultado =[
        'mensaje'=>'CLIENTE INGRESADO SATISFACTORIAMENTE',
        'codigo' => 1,
    ];

}catch (Exception $e){
    $resultado =[
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCION', 
        'detalle' => $e->getMessage(),
        'codigo' => 0,
    ];

}
$colores =['danger', 'success'];
?>

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-6 bg-<?= $resultado['codigo'] ?>">
            <h3 class="text-center"><?= $resultado['mensaje'] ?></h3>
        </div>
    </div>
</div>



<?php
echo $resultado['mensaje'];
include_once '../../views/templates/footer.php';
?>