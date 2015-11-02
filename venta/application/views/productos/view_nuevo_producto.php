<input type="hidden" name="id" id="id" value="<?php echo @$productos[0]->id; ?>"> 

<input type="hidden" name="cat" id="cat" value="<?php echo @$productos[0]->id_categoria; ?>"> 

<input type="hidden" name="prov" id="prov" value="<?php echo @$productos[0]->id_proveedor; ?>"> 

<script type="text/javascript">

  var baseurl = "<?php echo base_url(); ?>";

  var id_categoria  = 0;

  var idprov        = 0;

  var ids           = document.getElementById("id").value;

  ids               = parseInt(ids.length);

  

  if(ids==0){

    id_categoria = 0;

    idprov       = 0;

  }else{

    id_categoria     = document.getElementById("cat").value;

    idprov           = document.getElementById("prov").value;

  }

  function regresar(){

    window.location="<?php echo base_url()?>productos";

  }

</script>

<?php

  //Codigo Barras

  $codigoBarras = array(

  'name'        => 'codigo',

  'id'          => 'codigo',

  'size'        => 50,

  'value'       => set_value('codigo',@$productos[0]->codigo),

  'type'        => 'text',

  'class'       => 'form-control',

  //'onkeypress'  => 'return letras(event)',

  );

  //Nombre

  $Nombre  = array(

  'name'        => 'nombre',

  'id'          => 'nombre',

  'size'        => 50,

  'value'       => set_value('nombre',@$productos[0]->nombre),

  //'rows'        => '1',
  'type'        => 'text',

  'class'       => 'form-control',

  );

  //Precio Compra

  $PCompra      = array(

  'name'        => 'pcompra',

  'id'          => 'pcompra',

  'size'        => 50,

  'value'       => set_value('pcompra',@$productos[0]->precio_compra),

  'type'        => 'text',

  'onkeypress'  => "return  SoloNumerosDecimales3(event, '0.0', 4, 2);",

  'class'       => 'form-control',

  );

  //Precio Venta
  $PVenta      = array(

  'name'        => 'pventa',

  'id'          => 'pventa',

  'size'        => 50,

  'value'       => set_value('pventa',@$productos[0]->precio_venta),

  'type'        => 'text',

  'onkeypress'  => "return  SoloNumerosDecimales3(event, '0.0', 4, 2);",

  'class'       => 'form-control',

  );



  //Stock Mínimo
  $Stock      = array(

  'name'        => 'stock',

  'id'          => 'stock',

  'size'        => 50,

  'value'       => set_value('stock',@$productos[0]->stock),

  'type'        => 'text',

  'onkeypress'  => "return  validarNumeros(event)",

  'class'       => 'form-control',

  );

   $TipoPlanta= array(
  '0'                 => '---Elige el tipo de planta---',
  'Anúal'                         => 'Anúal',
  'Aromática'                     => 'Aromática',
  'Carnivora'                     => 'Carnivora',
  'De interior'                   => 'De interior',
  'De invernadero'                => 'De invernadero',
  'Medicinal'                     => 'Medicinal',
  'Trepadora'                     => 'Trepadora',
  );

$TipoProveedor= array(
  '0'                 => '---Elige el proveedor---',
  'Vivero San Lorenzo'            => 'Vivero San Lorenzo',
  'Vivero Forestal Encanto'       => 'Vivero Forestal Encanto',
  'Monte Verde'                   => 'Monte Verde ',
  'Grupo Fioretto'                => 'Grupo Fioretto',
  'Flore Galli'                   => 'Flore Galli',
  'Floreria Chic'                 => 'Floreria Chic',
  'Campomanes'                    => 'Campomanes',
  );

?>

<script src="<?php echo base_url();?>js/JsonProductos.js"></script>

<h1 class="page-header"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h1>

<div id="mensaje"></div>

<form class="form-horizontal" name="formulario" id="formulario" role="form">

  <div class="form-group">

    <label for="codigo" class="col-lg-3 control-label">Código de Barras:</label>

    <div class="col-lg-3">

    <?php echo form_input($codigoBarras); ?>

    </div>

  </div>

  <div class="form-group">

    <label for="nombre" class="col-lg-3 control-label">Nombre:</label>

    <div class="col-lg-3">

      <?php  echo form_input($Nombre); ?>

    </div>

  </div>



  <div class="form-group">

    <label for="pcompra" class="col-lg-3 control-label">Precio Compra:</label>

    <div class="col-lg-3">

    <?php echo form_input($PCompra); ?>

    </div>

  </div>



  <div class="form-group">

    <label for="pventa" class="col-lg-3 control-label">Precio Venta:</label>

    <div class="col-lg-3">

      <?php echo form_input($PVenta); ?> 

    </div>

  </div>



  <div class="form-group">

    <label for="tipoPlanta" class="col-lg-3 control-label">Tipo de planta:</label>

    <div class="col-lg-3">

      <?php echo  form_dropdown('tipoPlanta', $TipoPlanta, set_value('tipoPlanta',@$productos[0]->tipoPlanta),'class="form-control" id="unidadmedida"'); ?>

    </div>

  </div>




   <div class="form-group">

    <label for="stock" class="col-lg-3 control-label">Stock Minimo:</label>

    <div class="col-lg-3">

      <?php echo form_input($Stock); ?>

    </div>

  </div>



  <div class="form-group">

    <label for="proveedor" class="col-lg-3 control-label">Nombre del proveedor:</label>

    <div class="col-lg-3">

      <?php echo  form_dropdown('proveedor', $TipoProveedor, set_value('proveedor',@$productos[0]->proveedor),'class="form-control" id="proveedor"'); ?>

    </div>

  </div>


 

  <div class="form-group">

    <div class="col-lg-offset-3 col-lg-10">

      <button type="button" onclick="regresar()" class="btn btn-default">Regresar</button>

      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-saved"></span> Guardar Producto</button>

      <?php if($titulo=="Nuevo Producto"){ ?>

      <button type="reset" class="btn btn-default">Nuevo</button>

      <?php } ?>

    </div>

  </div>

  <hr/>

</form>   
