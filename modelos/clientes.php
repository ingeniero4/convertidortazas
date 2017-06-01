<?php
  //Se incluye la clase Conexion
  include_once(__DIR__."/../database/conexion.php");

/**
 * Clase que maneja los clientes que se tienen
 */
class clientes{
  //declaracion de atributos
  private $id;
  private $fk_tipo_cliente;
  private $fk_tipo_documento;
  private $documento;
  private $apellido;
  private $telefono;
  private $direccion;
  private $fk_zona;

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
    $sql = "SELECT * FROM cliente";
    $resultado = $this->con->consultaRetorno($sql);
    return $resultado;
  }

  public function crear(){
    $sql1 = "INSERT INTO cliente(fk_tipo_cliente,fk_tipo_documento,cl_documento,
                                cl_nombre,cl_apellido,cl_telefono,cl_direccion,fk_zona)
                                 VALUES ('{$this->fk_tipo_cliente}','{$this->fk_tipo_documento}','{$this->documento}',
                                        '{$this->nombre}','{$this->apellido}','{$this->telefono}','{$this->direccion}','{$this->fk_zona}')";
    $this->con->consultaSimple($sql1);

    return true;

  }

  public function eliminar(){
    $sql = "DELETE FROM cliente WHERE id = '{$this->id}'";
    $this->consultaSimple($sql);


  }

  public function ver(){
    $sql = "SELECT * FROM cliente where id = '{$this->id}' LIMIT 1";
    $resultado = $this->con->consultaRetorno($sql);
    $filas = mysqli_fetch_array($resultado);

    //asignamos los resultados a las variables.

    $this->id                  = $filas['id'];
    $this->fk_tipo_cliente     = $filas['fk_tipo_cliente'];
    $this->fk_tipo_documento   = $filas['fk_tipo_documento'];
    $this->documento           = $filas['cl_documento'];
    $this->nombre              = $filas['cl_nombre'];
    $this->apellido            = $filas['cl_apellido'];
    $this->telefono            = $filas['cl_telefono'];
    $this->direccion           = $filas['cl_direccion'];
    $this->fk_zona             = $filas['fk_zona'];

    return $filas;
  }

  public function editar(){
    $sql = "UPDATE cliente SET fk_tipo_cliente = '{$this->fk_tipo_cliente}', fk_tipo_documento = '{$this->fk_tipo_documento}',
      cl_documento = '{$this->documento}', cl_nombre = '{$this->nombre}', cl_apellido = '{$this->apellido}',
     cl_telefono = '{$this->telefono}', cl_direccion = '{$this->direccion}', fk_zona = '{$this->fk_zona}'";


     $this->con->consultaSimple($sql);
  }





}


 ?>
