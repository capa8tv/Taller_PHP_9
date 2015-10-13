<?php
//namespace User;
require_once("conectar.php");
//use Capa8\Conectar;
class Datos extends Conectar
{
    private $con;
    public function __construct()
    {
        $this->con=parent::con();
        //acá le informamos a PHP que el cotejamiento es UTF8
        parent::setNames();
    }
    public function getUsuarios()
    {
        $sql="select id,nombre,correo,fecha_nacimiento,pass from usuarios;";
        //el método prepare retorna un objeto que tiene sus propios métodos
        $datos=$this->con->prepare($sql);
        //el execute ejecuta la consulta SQL
        $datos->execute();
        //el fetchAll toma los datos, los pone un array es bidimensional
        return $datos->fetchAll();
    }
    public function getUsuariosPorId($id)
    {
        $sql="select id,nombre,correo,fecha_nacimiento,pass from usuarios where id = ?;";
        //echo $sql;exit;
        $datos=$this->con->prepare($sql);
        //$datos->bindValue(1,$id,PDO::PARAM_INT);
        $datos->bindParam(1,$id,PDO::PARAM_INT);
        //$datos->execute(array($id));
        $datos->execute();
        return $datos->fetchAll();
    }
    public function cerrar()
    {
        //acá le decimos que el atributo ya no es instancia de PDO
        return $this->con=null;
    }
    
}
