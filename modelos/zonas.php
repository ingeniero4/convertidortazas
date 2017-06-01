<?php
  //Se incluye la clase Conexion
  include_once(__DIR__."/../database/conexion.php");

/**
 * Clase que maneja los clientes que se tienen
 */
class zonas{
  //declaracion de atributos
  private $id;
  private $nombre;

  //atributo para la conexion con mysql
  private $con;

  function __construct()
  {
    $this->con = new conexion();
  }

  public function set($atributo,$valor){
    $this->$atributo = $valor;
  }

  public function get($atributo){
      return $this->$atributo;

  }

  public function listarTodo(){
    $sql = "SELECT * FROM zona";
    $resultado = $this->con->consultaRetorno($sql);
    return $resultado;
  }

  public function crear(){
    $sql = "SELECT * FROM zona WHERE zn_nombre = '{$this->nombre}'";
    $resultado = $this->con->consultaRetorno($sql);
    $numero = mysql_num_rows($resultado);

    if($num != 0){
      return false;
    }else{
      $sql1 = "INSERT INTO zona(zn_nombre) VALUES ('{$this->nombre}')";
      $this->con->consultaSimple($sql1);

      return true;

    }
  }

  public function eliminar(){
    $sql = "DELETE FROM zona WHERE zn_id = '{$this->id}'";
    $this->consultaSimple($sql);
  }

  public function ver(){
    $sql = "SELECT * FROM zona where zn_id = '{$this->id}' LIMIT 1";
    $resultado = $this->con->consultaRetorno($sql);
    $filas = mysqli_fetch_array($resultado);

    //asignamos los resultados a las variables.

    $this->id       = $filas['zn_id'];
    $this->nombre   = $filas['zn_nombre'];

    return $filas;
  }

  public function editar(){
    $sql = "UPDATE zona SET zn_nombre = '{$this->nombre}'";
     $this->con->consultaSimple($sql);
  }





}


 ?>
