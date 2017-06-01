<?php

  /**
   * CLase que direcciona a las diferentes vistas
   */
  class enrutador{

    public function cargarVista($vista, $modulo){

      switch ($modulo) {
        case 'cliente':
          switch ($vista) {
            case 'crear':
              include_once('vistas/'. $modulo. '/'. $vista. '.php');
              break;
            case "ver":
              include_once('vistas/'. $modulo. '/'.$vista.'.php');
              break;
            case "editar":
              include_once('vistas/'. $modulo. '/'.$vista.'.php');
              break;
            case "eliminar":
              include_once('vistas/'. $modulo. '/'.$vista.'.php');
              break;
            default:
              include_once(__DIR__.'/../vistas/plantillas/errorRuta.php');
            break;
            }
            break;
        case 'producto':
        break;

        default:
          include_once(__DIR__.'/../vistas/plantillas/errorRuta.php');
          break;

      }
      /*
      switch ($vista) {
        case 'crear':
            include_once('vistas/'. $modulo. '/'. $vista. '.php');
          break;
        case "ver":
          include_once('vistas/'. $modulo. '/'.$vista.'.php');
          break;
        case "editar":
          include_once('vistas/'. $modulo. '/'.$vista.'.php');
          break;
        case "eliminar":
          include_once('vistas/'. $modulo. '/'.$vista.'.php');
          break;

        default:
            include_once(__DIR__.'/../vistas/plantillas/errorRuta.php');
          break;
      }
      */
    }
    public function validarVariables($modulo, $vista){
			if(empty($vista) or empty($modulo) ){
				include_once('vistas/inicio.php');
			}else
			return true;

		}



  }

 ?>
