	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin  extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			$this->load->helper('url');
			$this->load->model('Cirujano_model');
		}

		public function index()
		{
			if( $this->session->userdata('usuario') ){
				
				redirect('Admin/panel');

			}else{
				
				$this->load->view("layout/head.php",[ "titulo" => "Login"]);
				$this->load->view("login");				

			}

		}

		public function valogin(){

			print_r($_POST);

			$usuario = $this->input->post("usuario");
			$clave   = $this->input->post("clave");
			//echo md5($clave);
			$this->Cirujano_model->val_log($usuario,$clave);

			$num_rows = $this->Cirujano_model->val_log($usuario,$clave)->num_rows();

			if( $num_rows > 0){
				$sesion = array();

				$sesion =array('usuario' => $usuario,
					'login'   => true
					);

				$this->session->set_userdata($sesion);

				redirect('Admin/panel');
			}else{
				redirect('Admin?error');
			}


		}

		public function panel(){
			if($this->session->userdata('usuario')){
				
				$this->load->view("layout/head.php",[ "titulo" => "Panel administrativo"]);
				$this->load->view("admin/menu");
				$this->load->view("admin/cuerpo",[ 
					"usuario" => $this->session->userdata('usuario') , 
					"procedimientos" => $this->Cirujano_model->get_procedimientos(),
					"contactos" => $this->Cirujano_model->get_contactos(),
					"curriculum" => $this->Cirujano_model->get_curriculum(),
					"galeria" => $this->Cirujano_model->get_galeria(),
					"testimonios" => $this->Cirujano_model->get_testimonios()
					]);

			}else{
				redirect('Admin');
			}

		}

		public function eliminar_contacto(){
			$id_contacto = $this->input->post("id_eliminar_contacto");
			$this->Cirujano_model->del_contacto($id_contacto);
			redirect('Admin');
		}

		public function eliminar_procedimiento(){
			$id_proc = $this->input->post("id_eliminar_procedimiento");
			$this->Cirujano_model->del_procedimiento($id_proc);
			redirect('Admin');
		}

		public function editar_proc(){
			$id_procedimiento = $this->input->post("id_procedimiento");

			$titulo = $this->input->post("nombre_procedimiento");
			$subtitulo = $this->input->post("subtitulo_procedimiento");
			$detalle = $this->input->post("detalle_procedimiento");
			$img_procedimiento = "null";

			$this->Cirujano_model->actualizar_procedimiento($id_procedimiento,$titulo,$subtitulo,$detalle,$img_procedimiento);
			redirect('Admin');
		}

		public function editar_curriculum(){
			$curriculum_completo = $this->input->post("text_curriculum");
			$this->Cirujano_model->actualizar_curriculum($curriculum_completo);
			redirect('Admin');
		}

		public function insert_galeria(){
			/*echo "<pre>";
			print_r($_FILES);
			echo "</pre>";*/
			$nombre_archivos = array();

			$uploads_dir ='./fronted/img/cirujano/galeria/';
			opendir($uploads_dir);

			foreach ($_FILES["archivosgaleria"]["error"] as $key => $error){
				if ($error == UPLOAD_ERR_OK){
					if(  $_FILES["archivosgaleria"]["name"] != null){
						$tmp_name 		= $_FILES["archivosgaleria"]["tmp_name"][$key];
						$nombre_archivo = $_FILES["archivosgaleria"]["name"][$key];
						$nombre_archivos[] = $_FILES["archivosgaleria"]["name"][$key];
						move_uploaded_file($tmp_name,$uploads_dir.$nombre_archivo);

					}

				}
			}    

			$num_archivos = sizeof($nombre_archivos);
			
			$this->Cirujano_model->insert_galeria($nombre_archivos,$num_archivos);
			redirect('Admin');

		}





		///*************************************************************///
		public function salir(){
			$datasession = array();
			$this->session->unset_userdata($datasession);
			$this->session->sess_destroy();
			redirect("Admin");
		}
		///*************************************************************///
	}

