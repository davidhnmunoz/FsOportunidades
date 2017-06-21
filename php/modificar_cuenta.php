<?php session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../login/login.php');
}
require 'conexion.php';
//EDITAR

$errorcuit = '';
$enviado   = '';
$enviar    = '';

//Saco los datos de la cuenta
if (isset($_GET['id'])) {

    $id  = $_GET["id"];
    $sql = $conexion->prepare("SELECT * FROM  cuentas WHERE id =:id");
    $sql->execute(array(':id' => $id));
    $res = $sql->fetchAll(PDO::FETCH_OBJ);

}

if (isset($_POST['modificar'])) {

    $idUsu         = $_POST["id"];
    $cuit          = $_POST["cuit"];
    $nombreempresa = $_POST["nombreempresa"];
    $telefono      = $_POST["telefono"];
    $sitioweb      = $_POST["sitioweb"];
    $descripcion   = $_POST["descripcion"];
    $usuario_id    = $_POST["usuario_id"];
    /*Valor hacia  la tabla Origenes*/
    $tiorigen = $_POST["tiorigen"];
/*Valor hacia  la tabla Propiedades*/
    $tiprop = $_POST["tiprop"];
/*Valor hacia  la tabla Organizaciones*/
    $tiorga = $_POST["tiorga"];
/*Valor hacia  la tabla Empleados*/
    $tinemp = $_POST["tinemp"];
/*Valor hacia  la tabla Sectores*/
    $tisec = $_POST["tisec"];
/*Tabla direcciones*/
    $direccion_id = $_POST["direccion_id"];
    $provincia    = $_POST["provincia"];
    $departamento = $_POST["departamento"];
    $localidad    = $_POST["localidad"];
    $direccion    = $_POST["direccion"];

/*Comprobacion de Cuit*/
    $vcuit = $conexion->prepare("SELECT id,cuit FROM cuentas where id <>:idUsu");
    $vcuit->execute(array(':idUsu' => $idUsu));
    $resultadocuit = $vcuit->fetchAll(PDO::FETCH_OBJ);

    //var_dump($idUsu);
    foreach ($resultadocuit as $key) {

        if ($cuit == $key->cuit) {
            //  var_dump($key->cuit);

            header('location:repe.php');
        } else {

            $sql       = "UPDATE cuentas SET nombreempresa=:nombreempresa , telefono=:telefono ,sitioweb=:sitioweb, cuit=:cuit,descripcion=:descripcion,direccion_id=:direccion_id, usuario_id=:usuario_id  WHERE id=:idUsu";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array(
                ":idUsu"         => $idUsu,
                ":nombreempresa" => $nombreempresa,
                ":telefono"      => $telefono,
                ":sitioweb"      => $sitioweb,
                ":cuit"          => $cuit,
                ":descripcion"   => $descripcion,
                ":direccion_id"  => $direccion_id,
                ":usuario_id"    => $usuario_id));
            /*Insert a tabla direcciones
             */

            $query      = "UPDATE  direcciones SET provincia_id=:provincia ,departamento_id=:departamento, localidad_id=:localidad ,CodPostal=:direccion WHERE id=$direccion_id";
            $resultado0 = $conexion->prepare($query);
            $resultado0->execute(array(
                ":provincia"    => $provincia,
                ":departamento" => $departamento,
                ":localidad"    => $localidad,
                ":direccion"    => $direccion));

            /*Actualizar a la tabla Origenes
             */

            $statment   = "UPDATE origenes SET tipoorigen_id=:tiorigen WHERE cuenta_id=$idUsu";
            $resultado1 = $conexion->prepare($statment);
            $resultado1->execute(array(
                ":tiorigen" => $tiorigen));
/*Actualizar la tabla Propiedades
 */
            $statment1  = "UPDATE propiedades SET tipopropiedad_id=:tiprop WHERE cuenta_id=$idUsu";
            $resultado2 = $conexion->prepare($statment1);
            $resultado2->execute(array(
                ":tiprop" => $tiprop));

/*Actualizar la tabla Organizacion
 */
            $statment2 = "UPDATE organizaciones SET tipoorganizacion_id=:tiorga WHERE  cuenta_id=$idUsu";

            $resultado3 = $conexion->prepare($statment2);
            $resultado3->execute(array(":tiorga" => $tiorga));

/*Actualizar la tabla Numero empleados

 */

            $statment3 = "UPDATE numeroempleados SET tiponumeroempleados_id=:tinemp WHERE  cuenta_id=$idUsu";

            $resultado4 = $conexion->prepare($statment3);
            $resultado4->execute(array(":tinemp" => $tinemp));

/*Actualizar la tabla Sectores
 */

            $statment4 = "UPDATE sectores SET tiposector_id=:tisec WHERE  cuenta_id=$idUsu";

            $resultado5 = $conexion->prepare($statment4);
            $resultado5->execute(array(":tisec" => $tisec));

            header('location:index_cuenta.php?exito');

        }
    }

}

require '../views/cuentas/modificar_cuenta.view.php';
