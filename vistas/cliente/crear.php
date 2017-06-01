<?php
$controladorCliente = new controladorClientes();
//se guarda en las variables los datos de los metodos para pasarlos a un combobox
$zonas            = $controladorCliente->consultarZonas();
$tipo_clientes    = $controladorCliente->consultarTipoCliente();
$tipo_documentos  = $controladorCliente->consultarTipoDocumento();
//se pregunta si la variable enviar existe, es decir, si se ha activado
if (isset($_POST['enviar'])) {
  $r = $controladorCliente->crear($_POST['fk_tipo_cliente'],$_POST['fk_tipo_documento'],
                                  $_POST['cl_documento'],$_POST['cl_nombre'],$_POST['cl_apellido'],
                                  $_POST['cl_telefono'],$_POST['cl_direccion'],$_POST['fk_zona']);

  if($r){
    echo "Se ha registrado el CLiente";
  }
  header("location: index.php");                                                //Se redirige a la pagina principal

}
 ?>
 <div class="titulo-modulo">
    <h3>Registro de Clientes </h3>
 </div>

<form action="" method="POST" >
  <div class="contenedor-principal">
    <div class="contenedor-input">
      <label>Tipo de Cliente:</label>
      <select>
      <?php  while ($fila = mysqli_fetch_array($tipo_clientes)){ ?>
         <?php echo "<option value = ".$fila['tc_id']." > ".$fila['tc_nombre']." </option>"; ?>
      <?php }?>
      </select>
    </div>
    <div class="contenedor-input">
      <label>Tipo Documento:</label>
      <select>
      <?php  while ($fila = mysqli_fetch_array($tipo_documentos)){ ?>
         <?php echo "<option value = ".$fila['td_id']." > ".$fila['td_nombre']." </option>"; ?>
      <?php }?>
      </select>
    </div>

      <label>Documento:</label>
      <input type="numer" name="cl_documento" maxlength="10" placeholder="Ej: 3191630">

      <label>Nombre:</label>
      <input type="text" name="cl_nombre"  placeholder="Ej: Maria" required>

      <label>Apellidos:</label>
      <input type="text" name="cl_apellido"  placeholder="Ej: Alarcon">

      <label>Telefono:</label>
      <input type="numer" name="cl_telefono"  placeholder="Ej: 5374575">

      <label>Direccion:</label>
      <input type="text" name="cl_direccion" placeholder="Ej: Calle 123# 34-54">

      <label>Zona o Ruta:</label>
      <select>
      <?php  while ($fila = mysqli_fetch_array($zonas)){ ?>
         <?php echo "<option value = ".$fila['zn_id']." > ".$fila['zn_nombre']." </option>"; ?>
      <?php }?>
      </select>

      <input type="submit" name="enviar" value="Registrar">

    </div>


</form>
