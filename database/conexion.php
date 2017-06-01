<?php

  /**
   * Clase dedicada a la conexion con la base de datos
   */
  class conexion {

    //declaracion de variables

    private $host;
    private $usuario;
    private $pass;
    private $database;

    private $con;
    //Se utiliza el constructor para inicializar las variables
    function __construct(){
      $this->host     = "127.0.0.1";
      $this->usuario  = "root";
      $this->pass     = "";
      $this->database = "sofyllano";

      $this->con = new mysqli($this->host,$this->usuario,$this->pass,$this->database);

      if ($this->con->connect_errno) {
        echo "Lo siento EL sistema ha experimentado un error con la conexion de la base de datos";
        exit();
      }
    }

    public function consultaSimple($sql){
      $consulta = $this->con->query($sql);

    }

    public function consultaRetorno($sql){
      $consulta = $this->con->query($sql);
      return $consulta;

    }


  }


 ?>
