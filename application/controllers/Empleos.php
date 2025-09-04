<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleos extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    session_start();
		if(!isset($_SESSION['logged'])){
        redirect(base_url());
    }
  }

	public function index()
	{
		$dh['title'] = 'Empleos';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if($_SESSION['type'] == 'intranet'){

			if(isset($_POST['enviar'])){
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$idempresa = $_POST['empresaid'];
				$duracion = $_POST['duracion'];
				$moneda = $_POST['moneda'];
				$tipo_c = $_POST['tipo_contrato'];
				$nivel_a = $_POST['estudios'];
				$exp = $_POST['experiencia'];
				$cat = $_POST['categoria'];
				$email = $_POST['email_empresa'];

				if($moneda == 'AC'){
					$salario = 0.00;
				}else{
					$salario = $_POST['cantidad'];
				}

				$oferta = 'PU';
				if(isset($_POST['privada'])){
					$oferta = 'PR';
				}

				$hoy = date('Y-m-d H:i:s');

				$array = array(
					'titulo'							=>	$titulo,
					'descripcion'					=>	$descripcion,
					'id_empresa'					=>	$idempresa,
					'fecha_solicitud'			=>	$hoy,
					'fecha_publicacion'		=>	NULL,
					'dias_publicacion'		=>	$duracion,
					'salario'							=>	$salario,
					'moneda'							=>	$moneda,
					'tipo_contratacion'		=>	$tipo_c,
					'nivel_academico'			=>	$nivel_a,
					'experiencia_laboral'	=>	$exp,
					'id_categoria'				=>	$cat,
					'oferta'							=>	$oferta,
					'email_envio'					=>	$email
				);

				$this->db->insert('plazas', $array);
				$d['msg'] = 'success';
			}

			$d['cat_empleos'] = $this->intranet_model->get_categorias_empleos();
			$d['empleos'] = $this->intranet_model->get_empleos_oficina($_SESSION['idoficina']);
			// echo "<pre>";
			// print_r($d['empleos']);
			// die();

			$this->load->view('header_view', $dh);
			$this->load->view('empleo_solicitud_view', $d);
			$this->load->view('footer_view', $df);
		}else{
			if(isset($_POST['pausa'])){
				$idempleo = $_POST['idempleo'];

				$array = array(
					'status_plaza'	=>	3
				);

				$this->db->where('id_plaza', $idempleo);
				$this->db->update('plazas', $array);
			}

			if(isset($_POST['nopausa'])){
				$idempleo = $_POST['idempleo'];

				$array = array(
					'status_plaza'	=>	2
				);

				$this->db->where('id_plaza', $idempleo);
				$this->db->update('plazas', $array);
			}

			$d['empleos'] = $this->intranet_model->get_empleos();
			// echo "<pre>";
			// print_r($d['empleos']);
			// die();
			$this->load->view('header_view', $dh);
			$this->load->view('empleos_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function delete_empleo()
	{
		$tabla = $_POST['tabla'];
		$id = $_POST['id'];

		$this->db->where('id_plaza', $id);
		$this->db->delete('plazas');
	}

	public function editar_empleo($idempleo)
	{
		$dh['title'] = 'Empleos';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if(isset($_POST['editar'])){
			$idempleo = $_POST['idempleo'];
			$titulo = $_POST['titulo'];
			$descripcion = $_POST['descripcion'];
			$moneda = $_POST['moneda'];
			$tipo_c = $_POST['tipo_contrato'];
			$nivel_a = $_POST['estudios'];
			$exp = $_POST['experiencia'];
			$cat = $_POST['categoria'];
			$email = $_POST['email_empresa'];

			if($moneda == 'AC'){
				$salario = 0.00;
			}else{
				$salario = $_POST['cantidad'];
			}

			$oferta = 'PU';
			if(isset($_POST['privada'])){
				$oferta = 'PR';
			}

			// $hoy = date('Y-m-d H:i:s');

			$array = array(
				'titulo'							=>	$titulo,
				'descripcion'					=>	$descripcion,
				'salario'							=>	$salario,
				'moneda'							=>	$moneda,
				'tipo_contratacion'		=>	$tipo_c,
				'nivel_academico'			=>	$nivel_a,
				'experiencia_laboral'	=>	$exp,
				'id_categoria'				=>	$cat,
				'oferta'							=>	$oferta,
				'email_envio'					=>	$email
			);

			$this->db->where('id_plaza', $idempleo);
			$this->db->update('plazas', $array);

			$d['msg'] = 'success';
		}

		if(isset($_POST['aprobar'])){
			$idempleo = $_POST['idempleo'];

			$hoy = date('Y-m-d H:i:s');

			$array = array(
				'fecha_publicacion'		=>	$hoy,
				'status_plaza'				=>	2
			);

			$this->db->where('id_plaza', $idempleo);
			$this->db->update('plazas', $array);

			$d['msg'] = 'aprobado';
		}

		if(isset($_POST['desactivar'])){
			$idempleo = $_POST['idempleo'];

			$hoy = date('Y-m-d H:i:s');

			$array = array(
				// 'fecha_publicacion'		=>	NULL,
				'status_plaza'				=>	0
			);

			$this->db->where('id_plaza', $idempleo);
			$this->db->update('plazas', $array);

			$d['msg'] = 'desactivar';
		}

		if(isset($_POST['rechazar'])){
			$idempleo = $_POST['idempleo'];

			$this->db->where('id_plaza', $idempleo);
			$this->db->delete('plazas');

			redirect(base_url('empleos'));
		}

		$empleo = $this->intranet_model->get_empleo_single($idempleo);
		$d['empleo'] = $empleo[0];
		// $d['empresas'] = $this->modelo->get_oficina_empresas();
		$d['cat_empleos'] = $this->intranet_model->get_categorias_empleos();

		$this->load->view('header_view', $dh);
		$this->load->view('editar_empleo_view', $d);
		$this->load->view('footer_view', $df);
	}
}
