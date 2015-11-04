<!--<script src="<?php echo base_url()?>js/jquery-1.10.2.js"></script>

<script src="<?php echo base_url()?>js/jquery-ui.js"></script>

<script type="text/javascript">

  var baseurl = "<?php echo base_url(); ?>";

</script>

<script src="<?php echo base_url();?>js/JsonOrdenCompra.js"></script>

<script type="text/javascript">

function AsignaSession(){

  document.getElementById("idsession").value="<?php echo md5(rand(1000,50000)); ?>";

}

</script>
-->

<h1 class="page-header"><span class="glyphicon glyphicon-list"></span> Ordenes de Compra</h1> 

<div id="mensaje"></div>

<hr/><br/>

<table border=0 width="100%">


<form 

 class="form-horizontal" role="form" id="form" name="form" action="<?=base_url()?>index.php/ordencompra/enviarOrden" method="POST">

        <td>Producto: </td>

      <td><input type="text" name="Producto" id="Producto" class="form-control input-sm" autocomplete="off" size="30" /></td>

      <td>Cantidad:</td>

      <td><input type="text" name="Cantidad" id="Cantidad" class="form-control input-sm" autocomplete="off" size="30" /></td>

              <td> 
              <center>
              <button type="submit"class="btn btn-primary"id="guardar" name="guardar"><span class="glyphicon glyphicon-floppy-saved"></span> Enviar Orden Compra</button></center>
              </td>             
           
        </form>
