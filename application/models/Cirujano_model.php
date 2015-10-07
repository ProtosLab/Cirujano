	<?php if ( ! defined('BASEPATH')) exit('Acceso denegado a este script');
	
	class Cirujano_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}


		public function val_log($usuario,$clave){
			$query = $this->db->query("select * from usuario where usuario = '$usuario' and clave = '$clave' ");
			return $query;
		}

		public function get_procedimientos(){
			$query = $this->db->query("select * from procedimientos");
			return $query;	
		}

		public function get_contactos(){
			$query = $this->db->query("select * from contacto");
			return $query;	
		}

		public function del_contacto( $id_contacto ){
			$this->db->query("delete from contacto where id_contacto = $id_contacto");
		}

		public function del_procedimiento( $id_procedimiento){
			$this->db->query("delete from procedimientos where id_procedimiento = $id_procedimiento");
			$this->db->query("delete from img_procedimientos where id_procedimiento = $id_procedimiento");
		}

		public function curriculum( $contenido_curriculum ){
			$this->db->insert("asignacion_direccion_interna", [ "curriculum_completo" => $contenido_curriculum ] );
		}

		public function get_curriculum(){
			$query = $this->db->query("select * from curriculum_doc limit 1");
			return $query;	
		}

		public function actualizar_curriculum($curriculum_completo){
			$update="update curriculum_doc set curriculum_completo= '$curriculum_completo' where id_curriculum = 1";
			$this->db->query($update);
		}

		public function actualizar_procedimiento($id_procedimiento,$titulo,$subtitulo,$detalle,$img_procedimiento){
			$update="update procedimientos set titulo= '$titulo',sub_titulo ='$subtitulo', detalle= '$detalle', img_principal_procedimiento = '$img_procedimiento' where id_procedimiento = $id_procedimiento";
			$this->db->query($update);
		}

		public function insert_galeria($nombreArchivos,$num_archivos){

			for($i=0; $i < $num_archivos; $i++){ /*$insertar_file=*/
				$this->db->insert('galeria',array(
					"nombre_img"		=>$nombreArchivos[$i]
					)
				);
		   	}#llave for
		   }

		   public function get_galeria(){
		   	$query = $this->db->query("select * from galeria");
		   	return $query;	
		   }

		   public function get_testimonios(){
		   	$query = $this->db->query("select * from testimonios");
		   	return $query;	
		   }
		   /*******************************Llave clase********************************************/
		}