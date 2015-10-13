<?php
require_once("pdo/datos.php");
//use User\Datos;
$d=new Datos();
if(isset($_GET["id"]) and is_numeric($_GET["id"]))
{
    $datos=$d->getUsuariosPorId($_GET["id"]);
    $d->cerrar();
}else
{
   header("Location: error.php"); 
}
if(sizeof($datos)==0)
{
    header("Location: error.php"); 
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />   
    </head>
    <body>
       
        <div class="container">
            <div class="row">
            <ol class="breadcrumb">
              <li><a href="listado.php">Listado</a></li>
              <li class="active">Detalle de Usuario <?php echo $datos[0]["nombre"]?></li>
            </ol>
                <h1>Listado de Usuarios</h1>
            <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>E-Mail</th>
                <th>Fecha Nacimiento</th>
                <th>Contraseña</th>
               
            </thead>
            <tbody>
                
                    <tr>
                        <td><?php echo $datos[0]["id"]?></td>
                        <td><?php echo $datos[0]["nombre"]?></td>
                        <td><?php echo $datos[0]["correo"]?></td>
                        <td><?php echo $datos[0]["fecha_nacimiento"]?></td>
                        <td><?php echo $datos[0]["pass"]?></td>
                        
                    </tr>
                   
            </tbody>
        </table>
            </div>
        </div>
    </body>
</html>
<?php 

?>
