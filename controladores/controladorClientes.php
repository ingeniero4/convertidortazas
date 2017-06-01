<?php

  include_once(__DIR__."/../modelos/clientes.php");
  //Se incluye el modelo de las zonas para hacer consultas a travez de este.
  include_once(__DIR__."/../modelos/zonas.php");
  include_once(__DIR__."/../modelos/tipo_Documento.php");
  include_once(__DIR__."/../modelos/tipo_Cliente.php");
/**
 * Controlador que manipulara los datos de el cliente
 */
class controladorClientes{

  private $cliente;
  private $zona;
  function __construct(){
    $this->cliente  = new clientes();
   }

   public function index(){
     $resultado = $this->cliente->listarTodo();
     return $resutlado;
   }

   public function crear($fk_tipo_cliente,$fk_tipo_documento,$documento,$nombre,$apellido,$telefono,$direccion,$fk_zona){

     $this->cliente->set("fk_tipo_cliente", $fk_tipo_cliente);
     $this->cliente->set("fk_tipo_documento", $fk_tipo_documento);
     $this->cliente->set("documento",$documento);
     $this->cliente->set("nombre",$nombre);
     $this->cliente->set("apellido",$apellido);
     $this->cliente->set("telefono",$telefono);
     $this->cliente->set("direccion",$direccion);
     $this->cliente->set("fk_zona",$fk_zona);

     $resultado = $this->cliente->crear();
     return $resultado;
   }

   public function eliminar($id){
     $this->cliente->set("id",$id);
     $this->cliente->eliminar();

   }

   public function ver($id){
     $this->cliente->set("id",$id);
     $datos = $this->cliente->ver();
     return $datos;
   }

   public function editar(){
     $this->cliente->set("id",$id);
     $this->cliente->set("fk_tipo_cliente",$fk_tipo_cliente);
     $this->cliente->set("fk_tipo_documento",$fk_tipo_documento);
     $this->cliente->set("documento",$documento);
     $this->cliente->set("nombre",$nombre);
     $this->cliente->set("apellido",$apellido);
     $this->cliente->set("telefono",$telefono);
     $this->cliente->set("direccion",$direccion);
     $this->cliente->set("fk_zona",$fk_zona);

     $this->cliente->editar();
   }

   public function consultarZonas(){
     $this->zona     = new zonas();
     $zonas = $this->zona->listarTodo();
     return $zonas;
   }

   public function consultarTipoCliente(){
     $tipoCliente = new tipoClientes();
     $tp_clientes = $tipoCliente->listarTodo();
     return $tp_clientes;
   }

   public function consultarTipoDocumento(){
     $tipoDocumento = new tipoDocumentos();
     $tp_documentos = $tipoDocumento->listarTodo();
     return $tp_documentos;
  }

}



 ?>
