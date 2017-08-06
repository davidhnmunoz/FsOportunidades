

<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

//agregar
$errorid = '';

// $enviado = '';
// $enviar  = '';

if (isset($_POST['agregar'])) {

    $usuario_id = $_SESSION['idusuario'];

    $id                  = $_POST['id'];
    $tema                = $_POST['tema'];
    $cuenta_id           = $_POST['cuenta_id'];
    $contacto_id         = $_POST['contacto_id'];
    $importe_presupuesto = $_POST['importe_presupuesto'];
    $importe_real        = $_POST['importe_real'];
    $ingresos_estimados  = $_POST['ingresos_estimados'];
    $ingresos_reales     = $_POST['ingresos_reales'];
    $situacionactual     = $_POST['situacionactual'];
    $necesidadcliente    = $_POST['necesidadcliente'];
    $solucionpropuesta   = $_POST['solucionpropuesta'];
    $descripcion         = $_POST['descripcion'];
    $estado              = $_POST['estado'];
    $fecha_alta          = $_POST['fecha_alta'];
    $fecha_cierre        = $_POST['fecha_cierre'];

/*Tabla areas*/
    $area = $_POST['area'];

/*Validacion id oportunidades*/
    $vid = $conexion->prepare('SELECT * FROM oportunidades WHERE id = :id');
    $vid->execute(array(':id' => $id));
    $resultadoid = $vid->fetch();

    if ($resultadoid == true) {
        $errorid .= '<strong>ID en uso</strong>';
    } else {

        /*Insert A Tabla oportunidades*/
        $sql = $conexion->prepare('INSERT INTO oportunidades (id,tema , usuario_id , cuenta_id , contacto_id,importe_presupuesto,ingresos_estimados,ingresos_reales,importe, situacionactual,necesidadcliente,solucionpropuesta,descripcion,fecha_alta,fecha_cierre)

                VALUES (:id,:tema , :usuario_id , :cuenta_id , :contacto_id , :importe_presupuesto,
                :ingresos_estimados,:ingresos_reales,:importe_real,:situacionactual,:necesidadcliente,
                :solucionpropuesta,:descripcion,:fecha_alta,:fecha_cierre )');

        $sql->execute(array(
            ':id'                  => $id,
            ':tema'                => $tema,
            ':usuario_id'          => $usuario_id,
            ':cuenta_id'           => $cuenta_id,
            ':contacto_id'         => $contacto_id,
            ':importe_presupuesto' => $importe_presupuesto,
            ':ingresos_estimados'  => $ingresos_estimados,
            ':ingresos_reales'     => $ingresos_reales,
            ':importe_real'        => $importe_real,
            ':situacionactual'     => $situacionactual,
            ':necesidadcliente'    => $necesidadcliente,
            ':solucionpropuesta'   => $solucionpropuesta,
            ':descripcion'         => $descripcion,
            ':fecha_alta'          => $fecha_alta,
            ':fecha_cierre'        => $fecha_cierre));

        /*Insertar a la tabla Origenes*/
        $sql1 = $conexion->prepare('INSERT INTO areas (oportunidad_id,tipoarea_id)

                VALUES (:id,:area )');

        $sql1->execute(array(
            ':id'   => $id,
            ':area' => $area));

        /*INSERTAR A LA TABLA estado_oportunidades*/

        $sql2 = $conexion->prepare('INSERT INTO estado_oportunidades (oportunidad_id,tipos_estado_id)

                VALUES (:id,:estado )');

        $sql2->execute(array(
            ':id'     => $id,
            ':estado' => $estado));

        header('location:index.php?exitoagregar');

    }
}
require '../views/oportunidades/agregar_oportunidad.view.php';