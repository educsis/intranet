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

		if(isset($_GET['stat'])) {
			$tipoestatus = $_GET['stat'];
			$d['tipostatus'] = $tipoestatus;
		} else {
			$tipoestatus = 0;
			$d['tipostatus'] = 0;
		}
		

		$tipoestatus;

		if($_SESSION['type'] == 'intranet'){
			$d['torres'] = $this->intranet_model->get_torres();
			$oficinaInfo = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);

			$oficinaEmail = $oficinaInfo[0]['email1'];

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
				$lastid = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $lastid,
					'form' 			=> $form,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				//Solicitud elevadores
				$link = base_url('solicitudes/solicitud_elevador/' . $lastid);
				mailsolicitudelevadores($oficinaEmail, $form, $link);

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
				$lastid = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $lastid,
					'form' 			=> $form,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				$link = base_url('solicitudes/solicitud_elevador/' . $lastid);
				mailsolicitudelevadores($oficinaEmail, $form, $link);

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviarGrande'])) {
				// echo "<pre>";
				// print_r($_POST);
				// die();
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
				$lastid = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $lastid,
					'form' 			=> $form,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				//Solicitud elevadores
				$link = base_url('solicitudes/solicitud_elevador/' . $lastid);
				mailsolicitudelevadores($oficinaEmail, $form, $link);

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
				$lastid = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $lastid,
					'form' 			=> $form,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				//Solicitud elevadores
				$link = base_url('solicitudes/solicitud_elevador/' . $lastid);
				mailsolicitudelevadores($oficinaEmail, $form, $link);

				$d['msg'] = 'success';
			}

			$d['solicitudes'] = $this->intranet_model->get_solicitudes_elevadores($_SESSION['idoficina']);

			// echo "<pre>";
			// print_r($d['solicitudes']);
			// die();

			$this->load->view('header_view', $dh);
			$this->load->view('solicitud_elevadores_view', $d);
			$this->load->view('footer_view', $df);
		}else{

			// $d['solicitudes'] = $this->intranet_model->get_solicitudes_elevadores_all();
			$d['solicitudes'] = $this->intranet_model->get_solicitudes_elevadores_all_status($tipoestatus);
			if($tipoestatus == 0) {
				$d['vista'] = 'ajax/elevadores/elevadores_pendientes';
			} elseif($tipoestatus == 1) {
				$d['vista'] = 'ajax/elevadores/elevadores_aprobados';
			} elseif($tipoestatus == 2) {
				$d['vista'] = 'ajax/elevadores/elevadores_denegadas';
			} elseif($tipoestatus == 3) {
				$d['vista'] = 'ajax/elevadores/elevadores_completa';
			}
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

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'form' 			=> '',
				'log'			=> 'Solicitud de elevador aprobada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de elevador aprobada";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('elevadores'));
		}

		if(isset($_POST['negar_elevador'])){
			$ids = $_POST['ids'];
			$razon = $_POST['razon'];

			$array = array(
				'razon'					=>	$razon,
				'status_elevador'		=>	2
			);

			$this->db->where('id', $ids);
			$this->db->update('elevadores', $array);

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'form' 			=> '',
				'log'			=> 'Solicitud de elevador rechazada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de elevador rechazada";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('elevadores'));
		}

		if(isset($_POST['completar_elevador'])){
			$ids = $_POST['ids'];
			// $razon = $_POST['razon'];

			$array = array(
				'status_elevador'		=>	3
			);

			$this->db->where('id', $ids);
			$this->db->update('elevadores', $array);

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'form' 			=> '',
				'log'			=> 'Solicitud de elevador completada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de elevador completada";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

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
		$this->load->view('footer_solicitud_view', $df);
	}

	public function editar_elevador($id, $tiposol)
	{
		$dh['title'] = 'Editar Elevadores';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if(isset($_POST['editarElevadoresInternos'])){
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
				'fecha'							=>	$fecha,
				'horario'						=>	$horario,
				'requerimiento'					=>	$requerimiento,
				'carga'							=>	$carga,
				'detalle'						=>	$detalle,
				'motivo'						=>	$motivo,
				'empresa_proveedor'				=>	$empresa_proveedor,
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
				'autorizatelefono'		=>	$autorizatelefono,
				'autorizaemail'			=>	$autorizaemail
			);

			$this->db->where('id', $id);
			$this->db->update('elevadores', $array);

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> '',
				'log'			=> 'Solicitud de elevador editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			redirect(base_url('elevadores'));
			// echo "<pre>";
			// print_r($array);
			// die();
		}

		if (isset($_POST['editarElevadoresPequena'])) {
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

			$this->db->where('id', $id);
			$this->db->update('elevadores', $array);

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> '',
				'log'			=> 'Solicitud de elevador editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			redirect(base_url('elevadores'));
		}

		if (isset($_POST['editarElevadoresGrande'])) {
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

			$this->db->where('id', $id);
			$this->db->update('elevadores', $array);

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> '',
				'log'			=> 'Solicitud de elevador editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			redirect(base_url('elevadores'));
		}

		$d['elevador_info'] = $this->intranet_model->get_solicitud_elevador($id);
		$d['tiposol'] = $tiposol;
		$d['idsol'] = $id;
		$d['formID'] = $d['elevador_info'][0]['form'];
		
		// die(date('d/m/Y', strtotime($d['elevador_info'][0]['fecha'])));
		// echo "<pre>";
		// print_r($d['elevador_info']);
		// die();

		$this->load->view('header_view', $dh);
		$this->load->view('editar_elevadores_view', $d);
		$this->load->view('footer_view', $df);
	}
}
