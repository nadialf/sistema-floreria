<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('America/Mexico_City');

class productos extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('seguridad_model');

		$this->load->model('productos_model');

		$this->load->helper('date');

	}

	public function index(){

          $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

          $this->seguridad_model->SessionActivo($url);

          
          $this->load->view('constant');

          $this->load->view('view_header');

          $data['productos'] = $this->productos_model->ListarProductos();
          $data['query'] = $this->productos_model->ListarProductos();
         $this->load->view('productos/view_productos', $data);

          $this->load->view('view_footer');

          

	}

	public function deleteproducto(){

		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

          $this->seguridad_model->SessionActivo($url);

		$Productos 		= json_decode($this->input->post('MiProducto'));

		$id             = base64_decode($Productos->Id);

		$codigo 		= base64_decode($Productos->Codigo);

		/*Array de response*/

		 $response = array (

				"estatus"   => false,

	            "error_msg" => ""

	    );

		 $this->productos_model->EliminarProducto($id);

		 $response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Producto Eliminado Correctamente Clave: <strong>".$codigo."</strong>, La Información de Actualizara en 5 Segundos <meta http-equiv='refresh' content='5'></div>";

		 echo json_encode($response);

	}
	public function view_img($id){
		$id 			   = base64_decode($id); 
		$data["id"]        = $id;
		$this->load->view('constant');
		$this->load->view('view_header');
		$this->load->view('productos/view_img',$data);
		$this->load->view('view_footer');
	}
	public function SubeImg(){
		$img1= "";
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        for($i=0;$i<5;$i++) {
            $img1 .= substr($str,rand(0,62),1);
        }
		$idimg     = $this->input->post('id');
		$nombreimg = $idimg."_".$img1;
		$config['upload_path'] = realpath(APPPATH."../images/products");
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1048576';
        $config['max_width'] = '900';
        $config['max_height'] = '900';
		$config['file_name']= $idimg."_".$img1;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) {
			echo  $this->upload->display_errors();
		}else{
			$file_info = $this->upload->data();
			$data      = array('upload_data'=>$this->upload->data());
			echo "Imagen Subido Correctamente.";
			$img = array("ID_PRODUCTO"=>$idimg,"IMG"=>$nombreimg.$file_info["file_ext"]);
			$this->productos_model->GuardaImg($img);
		}
	}
	public function editarProducto($id = NULL){

		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

          $this->seguridad_model->SessionActivo($url);

		$id 			   = base64_decode($id); 

		$data["productos"] = $this->productos_model->BuscarProducto($id);

		$data["titulo"]    = "Editar Producto";

		$this->load->view('constant');

		$this->load->view('view_header');

		$this->load->view('productos/view_nuevo_producto',$data);

		$this->load->view('view_footer');

	}

	public function nuevo(){

		



       //	$this->seguridad_model->SessionActivo($url);

		$this->load->view('constant');

		$this->load->view('view_header');

		$data["titulo"]    = "Nuevo Producto";

		$this->load->view('productos/view_nuevo_producto',$data);

		$this->load->view('view_footer');

	}

	public function categorias(){

		$categorias = $this->productos_model->Categorias();

		echo json_encode($categorias);

	}

	public function subcategorias(){

		$idCategoria   = $this->input->get("filtro");

		$subcategorias = $this->productos_model->Subcategorias($idCategoria);

		echo json_encode($subcategorias);

	}

	public function proveedores(){

		$proveedores = $this->productos_model->Proveedores();

		echo json_encode($proveedores);

	}

	public function GuardaProductos(){

		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		
		$codB = $this->input->post('codB');
		$nombre = $this->input->post('nombre');
		$precioC = $this->input->post('precioC');
		$precioV = $this->input->post('precioV');
		$tipoPlanta = $this->input->post('tipoPlanta');
		$opcion = $this->input->post('opcion');
		$stock = $this->input->post('stock');
		$proveedor = $this->input->post('proveedor');

		$productos = $this->productos_model->SaveProductos($codB, $nombre, $precioC, $precioV, $tipoPlanta, $opcion, $stock, $proveedor);

	}



}
