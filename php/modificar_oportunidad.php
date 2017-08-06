<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';

if (isset($_GET['id'])) {

    $id  = $_GET["id"];
    $sql = $conexion->prepare("SELECT * FROM  oportunidades WHERE id =:id");
    $sql->execute(array(':id' => $id));
    $res                        = $sql->fetchAll(PDO::FETCH_OBJ);
    $_SESSION['oportunidad_id'] = $id;

}

if (isset($_POST['modificar'])) {

    $usuario_id          = $_SESSION['idusuario'];
    $idopur              = $_POST["id"];
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
    $fecha_modificacion  = $_POST['fecha_modificacion'];
    $fecha_cierre        = $_POST['fecha_cierre'];

    /*tabla estado_oportunidades*/
    $estado = $_POST['estado'];
    /*Tabla areas*/
    $area = $_POST['area'];

    /*Update a oportunidades*/
    $updateopor = "UPDATE oportunidades SET
    tema=:tema ,
    usuario_id=:usuario_id ,
    cuenta_id=:cuenta_id ,
    contacto_id=:contacto_id,
    importe_presupuesto=:importe_presupuesto,
    ingresos_estimados=:ingresos_estimados,
    ingresos_reales=:ingresos_reales,
    importe=:importe_real,
    situacionactual=:situacionactual,
    necesidadcliente=:necesidadcliente,
    solucionpropuesta=:solucionpropuesta,
    descripcion=:descripcion,
    fecha_modificacion=:fecha_modificacion,
    fecha_cierre=:fecha_cierre

     WHERE id=:idopur";

    $resultado = $conexion->prepare($updateopor);
    $resultado->execute(array(
        ':idopur'              => $idopur,
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
        ':fecha_modificacion'  => $fecha_modificacion,
        ':fecha_cierre'        => $fecha_cierre));

    // var_dump($estado);

    // var_dump($area);

/*Update a Areas*/

    $updatearea = "UPDATE areas SET

         oportunidad_id=:idopur,
             tipoarea_id=:area
            WHERE oportunidad_id=:idopur";

    $resultado2 = $conexion->prepare($updatearea);
    $resultado2->execute(array(

        ':idopur' => $idopur,
        ':area'   => $area));
    // UPDATE ALATABLAestado_oportunidades
    var_dump($estado);

    $updateestado = "UPDATE estado_oportunidades SET oportunidad_id=:idopur,tipos_estado_id=:estado

                WHERE oportunidad_id=:idopur";

    $resultado3 = $conexion->prepare($updateestado);
    $resultado3->execute(array(

        ':idopur' => $idopur,
        ':estado' => $estado));

    header('location:index.php?exitomodificar');

}

require '../views/oportunidades/modificar_oportunidad.view.php';
