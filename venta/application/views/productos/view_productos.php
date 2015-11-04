<style type="text/css">

th, td { white-space: nowrap; }

    div.dataTables_wrapper {

        width: 100%;

        margin: 0 auto;

    }

</style>

<script type="text/javascript">

var baseurl = "<?php echo base_url(); ?>";

var currentLocation = window.location;

function EliminarProducto(producto, id,codigo){

    confirmar=confirm("Eliminar Producto: " + producto + ", Recuerda Una vez Eliminado No podras Recuperarlo"); 



    if (confirmar){

    	document.getElementById('mensaje').innerHTML = "<div class='modal1'><div class='center1'> <center> <img src='"+ baseurl +"/img/gif-load.gif'> Eliminando Producto...</center></div></div>";

    	 var Producto 		 = new Object();

		Producto.Id      	 = id;

		Producto.Codigo      = codigo;

		var DatosJson = JSON.stringify(Producto);

		$.post(currentLocation + '/deleteproducto',

		{ 

			MiProducto: DatosJson

		},

		function(data, textStatus) {

			//

			$("#mensaje").html(data.error_msg);

		}, 

		"json"		

		);

    } else{

    } 

  }

  

</script>

<h1 class="page-header"><span class="glyphicon glyphicon-list-alt"></span> Catalogo de Productos</h1>

<div id="mensaje"></div>

	<p align="right">

 	 <a href="productos/nuevo">

 	 	<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Nuevo Producto</button>


 	 </a>  

 	 </p>

 	 <br/>

 	 

	<table id="productos" border="0" cellpadding="0" cellspacing="0" width="100%" class="pretty">

		<thead>

			<tr>



				<th></th>

				<th>Clave</th>

				<th>Nombre Planta</th>

				<th>Existencia</th>

				<th>Costo</th>

				<th>Precio</th>

				<th>Tipo Planta</th>

				<th>Proveedor</th>

			</tr>

		</thead>

		<tbody>

			<?php 
				$TipoPlanta = array(1 => "Anúal", 2 => "Aromática", 3 => "Carnivora", 4 => "De interior", 5 => "De invernadero", 6 => "Medicinal", 7 => "Trepadora");
				$Proveedor = array(1 => "Vivero San lorenzo", 2 => "Vivero Forestal Encanto", 3 => "Monte Verde", 4 => "Grupo Fioretto", 5 => "Flore Galli", 6 => "Floreria Chic", 7 => "Campomanes");
			?> 
			<?php foreach($query as $row):
					$codigo       = base64_encode($row->codigo);
					$id           = base64_encode($row->id); ?>
				
				<tr> 
					<td>
						<?php 
						echo '<a href="productos/editarProducto/'.$id.'/'.$codigo.'"><button type="button" title="Editar Producto" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></button></a> &nbsp;';
						echo '<a href="productos/view_img/'.$id.'/'.$codigo.'"><button type="button" title="Cargar Imagenes" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-open"></span></button></a> &nbsp;';
						?>						 
						<a ><button onclick="EliminarProducto('<?php echo $row->descripcion; ?>','<?php echo $id; ?>','<?php echo $codigo; ?>');" type="button" title="Eliminar Producto" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a>
					</td>
					<td><?php echo $row->codigo; ?></td>
					<td><?php echo $row->descripcion; ?></td>
					<td><?php echo $row->cantidad; ?></td>
					<td><?php echo $row->precio_compra; ?></td>
					<td><?php echo $row->precio_venta; ?></td>
					<td><?php echo $TipoPlanta[$row->id_categoria]; ?></td>
					<td><?php echo $Proveedor[$row->id_proveedor]; ?></td>
				</tr>
			<?php endforeach; ?>

		</tbody>

	</table>

<script type="text/javascript">



    $(document).ready(function() {

    $('#productos').dataTable( {

        "scrollX": true

    } );

} );



</script>
