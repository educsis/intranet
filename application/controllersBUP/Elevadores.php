<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elevadores extends CI_Controller {

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
		$dh['title'] = 'Elevadores';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if($_SESSION['type'] == 'intranet'){

			$d['torres'] = $this->intranet_model->get_torres();

			if(isset($_POST['enviarInternos'])){
				$form = 'Trabajos Internos';
				$empresaid = $_POST['empresaid'];
				$tipo = $_POST['tipo'];
				$fecha = date('Y-m-d', strtotime($_POST['fecha']));
				$horario = $_POST['horario'];
				$requerimiento = $_POST['requerimiento'];

				$cargaArr = array();
				foreach($_POST['carga'] as $c){
					array_push($cargaArr, $c);
				}

				$carga = implode(',', $cargaArr);

				$detalle = $_POST['detalle'];
				$motivo = $_POST['motivo'];

				$empresa_proveedor = $_POST['empresa_proveedor'];
				$marca1 = $_POST['marca1'];
				$color1 = $_POST['color1'];
				$placa1 = $_POST['placa1'];

				$marca2 = $_POST['marca2'];
				$color2 = $_POST['color2'];
				$placa2 = $_POST['placa2'];

				$marca3 = $_POST['marca3'];
				$color3 = $_POST['color3'];
				$placa3 = $_POST['placa3'];

				$personalNombreArr = array();
				foreach ($_POST['personal_name'] as $c) {
					array_push($personalNombreArr, $c);
				}

				$personalNombre = implode(',', $personalNombreArr);

				$personalDpiArr = array();
				foreach ($_POST['personal_dpi'] as $c) {
					array_push($personalDpiArr, $c);
				}

				$personalDpi = implode(',', $personalDpiArr);

				$autorizaNombre = $_POST['autorizanombre'];
				$autorizaCargo = $_POST['autorizacargo'];
				$autorizatelefono = $_POST['autorizatelefono'];
				$autorizaemail = $_POST['autorizaemail'];

				$array = array(
					'form'							=>	$form,
					'empresaid'					=>	$empresaid,
					'fecha'							=>	$fecha,
					'horario'						=>	$horario,
					'requerimiento'			=>	$requerimiento,
					'carga'							=>	$carga,
					'detalle'						=>	$detalle,
					'motivo'						=>	$motivo,
					'empresa_proveedor'	=>	$empresa_proveedor,
					'marca1'							=>	$marca1,
					'color1'							=>	$color1,
					'placa1'							=>	$placa1,
					'marca2'							=>	$marca2,
					'color2'							=>	$color2,
					'placa2'							=>	$placa2,
					'marca3'							=>	$marca3,
					'color3'							=>	$color3,
					'placa3'							=>	$placa3,
					'personal_nombre'		=>	$personalNombre,
					'personal_dpi'			=>	$personalDpi,
					'autorizanombre'		=>	$autorizaNombre,
					'autorizacargo'			=>	$autorizaCargo,
					'autorizatelefono'	=>	$autorizatelefono,
					'autorizaemail'			=>	$autorizaemail
				);

				$this->db->insert('elevadores', $array);
				$d['msg'] = 'success';
			}

			if (isset($_POST['enviarPequena'])) {
				$form = 'Carga Pequeña';
				$empresaid = $_POST['empresaid'];
				$tipo = $_POST['tipo'];
				$fecha = date('Y-m-d', strtotime($_POST['fecha']));
				$horario = $_POST['horario'];
				$requerimiento = $_POST['requerimiento'];

				$cargaArr = array();
				foreach ($_POST['carga'] as $c) {
					array_push($cargaArr, $c);
				}

				$carga = implode(',', $cargaArr);

				$detalle = $_POST['detalle'];
				$motivo = $_POST['motivo'];

				$empresa_proveedor = $_POST['empresa_proveedor'];
				$marca1 = $_POST['marca1'];
				$color1 = $_POST['color1'];
				$placa1 = $_POST['placa1'];

				$marca2 = $_POST['marca2'];
				$color2 = $_POST['color2'];
				$placa2 = $_POST['placa2'];

				$marca3 = $_POST['marca3'];
				$color3 = $_POST['color3'];
				$placa3 = $_POST['placa3'];

				$personalNombreArr = array();
				foreach ($_POST['personal_name'] as $c) {
					array_push($personalNombreArr, $c);
				}

				$personalNombre = implode(',', $personalNombreArr);

				$personalDpiArr = array();
				foreach ($_POST['personal_dpi'] as $c) {
					array_push($personalDpiArr, $c);
				}

				$personalDpi = implode(',', $personalDpiArr);

				$autorizaNombre = $_POST['autorizanombre'];
				$autorizaCargo = $_POST['autorizacargo'];
				$autorizatelefono = $_POST['autorizatelefono'];
				$autorizaemail = $_POST['autorizaemail'];

				$array = array(
					'form'							=>	$form,
					'empresaid'					=>	$empresaid,
					'tipo'							=>	$tipo,
					'fecha'							=>	$fecha,
					'horario'						=>	$horario,
					'requerimiento'			=>	$requerimiento,
					'carga'							=>	$carga,
					'detalle'						=>	$detalle,
					'motivo'						=>	$motivo,
					'empresa_proveedor'	=>	$empresa_proveedor,
					'marca1'							=>	$marca1,
					'color1'							=>	$color1,
					'placa1'							=>	$placa1,
					'marca2'							=>	$marca2,
					'color2'							=>	$color2,
					'placa2'							=>	$placa2,
					'marca3'							=>	$marca3,
					'color3'							=>	$color3,
					'placa3'							=>	$placa3,
					'personal_nombre'		=>	$personalNombre,
					'personal_dpi'			=>	$personalDpi,
					'autorizanombre'		=>	$autorizaNombre,
					'autorizacargo'			=>	$autorizaCargo,
					'autorizatelefono'	=>	$autorizatelefono,
					'autorizaemail'			=>	$autorizaemail
				);

				$this->db->insert('elevadores', $array);
				$d['msg'] = 'success';
			}

			if (isset($_POST['enviarGrande'])) {
				$form = 'Carga Grande';
				$empresaid = $_POST['empresaid'];
				$tipo = $_POST['tipo'];
				$fecha = date('Y-m-d', strtotime($_POST['fecha']));
				$horario = $_POST['horario'];
				$requerimiento = $_POST['requerimiento'];

				$cargaArr = array();
				foreach ($_POST['carga'] as $c) {
					array_push($cargaArr, $c);
				}

				$carga = implode(',', $cargaArr);

				$detalle = $_POST['detalle'];
				$motivo = $_POST['motivo'];

				$empresa_proveedor = $_POST['empresa_proveedor'];
				$marca1 = $_POST['marca1'];
				$color1 = $_POST['color1'];
				$placa1 = $_POST['placa1'];

				$marca2 = $_POST['marca2'];
				$color2 = $_POST['color2'];
				$placa2 = $_POST['placa2'];

				$marca3 = $_POST['marca3'];
				$color3 = $_POST['color3'];
				$placa3 = $_POST['placa3'];

				$personalNombreArr = array();
				foreach ($_POST['personal_name'] as $c) {
					array_push($personalNombreArr, $c);
				}

				$personalNombre = implode(',', $personalNombreArr);

				$personalDpiArr = array();
				foreach ($_POST['personal_dpi'] as $c) {
					array_push($personalDpiArr, $c);
				}

				$personalDpi = implode(',', $personalDpiArr);

				$autorizaNombre = $_POST['autorizanombre'];
				$autorizaCargo = $_POST['autorizacargo'];
				$autorizatelefono = $_POST['autorizatelefono'];
				$autorizaemail = $_POST['autorizaemail'];

				$array = array(
					'form'							=>	$form,
					'empresaid'					=>	$empresaid,
					'tipo'							=>	$tipo,
					'fecha'							=>	$fecha,
					'horario'						=>	$horario,
					'requerimiento'			=>	$requerimiento,
					'carga'							=>	$carga,
					'detalle'						=>	$detalle,
					'motivo'						=>	$motivo,
					'empresa_proveedor'	=>	$empresa_proveedor,
					'marca1'							=>	$marca1,
					'color1'							=>	$color1,
					'placa1'							=>	$placa1,
					'marca2'							=>	$marca2,
					'color2'							=>	$color2,
					'placa2'							=>	$placa2,
					'marca3'							=>	$marca3,
					'color3'							=>	$color3,
					'placa3'							=>	$placa3,
					'personal_nombre'		=>	$personalNombre,
					'personal_dpi'			=>	$personalDpi,
					'autorizanombre'		=>	$autorizaNombre,
					'autorizacargo'			=>	$autorizaCargo,
					'autorizatelefono'	=>	$autorizatelefono,
					'autorizaemail'			=>	$autorizaemail
				);

				$this->db->insert('elevadores', $array);
				$d['msg'] = 'success';
			}

			if (isset($_POST['enviarMudanza'])) {
				$form = 'Mudanza';
				$empresaid = $_POST['empresaid'];
				$tipo = $_POST['tipo'];
				$fecha = date('Y-m-d', strtotime($_POST['fecha']));
				$horario = $_POST['horario'];
				$requerimiento = $_POST['requerimiento'];

				$cargaArr = array();
				foreach ($_POST['carga'] as $c) {
					array_push($cargaArr, $c);
				}

				$carga = implode(',', $cargaArr);

				$detalle = $_POST['detalle'];

				$empresa_proveedor = $_POST['empresa_proveedor'];
				$marca1 = $_POST['marca1'];
				$color1 = $_POST['color1'];
				$placa1 = $_POST['placa1'];

				$marca2 = $_POST['marca2'];
				$color2 = $_POST['color2'];
				$placa2 = $_POST['placa2'];

				$marca3 = $_POST['marca3'];
				$color3 = $_POST['color3'];
				$placa3 = $_POST['placa3'];

				$personalNombreArr = array();
				foreach ($_POST['personal_name'] as $c) {
					array_push($personalNombreArr, $c);
				}

				$personalNombre = implode(',', $personalNombreArr);

				$personalDpiArr = array();
				foreach ($_POST['personal_dpi'] as $c) {
					array_push($personalDpiArr, $c);
				}

				$personalDpi = implode(',', $personalDpiArr);

				$autorizaNombre = $_POST['autorizanombre'];
				$autorizaCargo = $_POST['autorizacargo'];
				$autorizatelefono = $_POST['autorizatelefono'];
				$autorizaemail = $_POST['autorizaemail'];

				$array = array(
					'form'							=>	$form,
					'empresaid'					=>	$empresaid,
					'tipo'							=>	$tipo,
					'fecha'							=>	$fecha,
					'horario'						=>	$horario,
					'requerimiento'			=>	$requerimiento,
					'carga'							=>	$carga,
					'detalle'						=>	$detalle,
					'empresa_proveedor'	=>	$empresa_proveedor,
					'marca1'							=>	$marca1,
					'color1'							=>	$color1,
					'placa1'							=>	$placa1,
					'marca2'							=>	$marca2,
					'color2'							=>	$color2,
					'placa2'							=>	$placa2,
					'marca3'							=>	$marca3,
					'color3'							=>	$color3,
					'placa3'							=>	$placa3,
					'personal_nombre'		=>	$personalNombre,
					'personal_dpi'			=>	$personalDpi,
					'autorizanombre'		=>	$autorizaNombre,
					'autorizacargo'			=>	$autorizaCargo,
					'autorizatelefono'	=>	$autorizatelefono,
					'autorizaemail'			=>	$autorizaemail
				);

				$this->db->insert('elevadores', $array);
				$d['msg'] = 'success';
			}

			$d['solicitudes'] = $this->intranet_model->get_solicitudes_elevadores($_SESSION['idoficina']);

			$this->load->view('header_view', $dh);
			$this->load->view('solicitud_elevadores_view', $d);
			$this->load->view('footer_view', $df);
		}else{

			$d['solicitudes'] = $this->intranet_model->get_solicitudes_elevadores_all();
			$this->load->view('header_view', $dh);
			$this->load->view('elevadores_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function estatus_change_elevadores()
	{
		if(isset($_POST['aprobar_elevador'])){
			$ids = $_POST['ids'];
			$array = array(
				'status_elevador'		=>	1
			);

			$this->db->where('id', $ids);
			$this->db->update('elevadores', $array);

			redirect(base_url('elevadores'));
		}

		if(isset($_POST['negar_elevador'])){
			$ids = $_POST['ids'];
			$array = array(
				'status_elevador'		=>	2
			);

			$this->db->where('id', $ids);
			$this->db->update('elevadores', $array);

			redirect(base_url('elevadores'));
		}
	}

	public function verificar_elevadores($id)
	{
		$dh['title'] = 'Elevadores';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['elevador_info'] = $this->intranet_model->get_solicitud_elevador($id);

		$this->load->view('header_view', $dh);
		$this->load->view('verificar_elevadores_view', $d);
		$this->load->view('footer_view', $df);
	}
}
