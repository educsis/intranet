<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remodelaciones extends CI_Controller {

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
		$dh['title'] = 'Remodelaciones';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if($_SESSION['type'] == 'intranet'){

			$d['torres'] = $this->intranet_model->get_torres();

			if(isset($_POST['enviar'])){

				// echo "<pre>";
				// print_r($_POST);
				// die();

				$torre = $_POST['torre'];
				$oficina = $_POST['oficina'];
				$empresaid = $_POST['empresaid'];
				$fechaInicio = date('Y-m-d', strtotime($_POST['fecha_inicio']));
				$fechaFin = date('Y-m-d', strtotime($_POST['fecha_fin']));

				$oficinaInfo = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
				$oficinaEmail = $oficinaInfo[0]['email1'];
				$tipo = "SOLICITUD DE REMODELACIONES";

				$descripcion = $_POST['descripcion'];

				$array = array(
					'empresaid'			=>	$empresaid,
					'torre_id'			=>	$torre,
					'oficina'			=>	$oficina,
					'fechainicio'		=>	$fechaInicio,
					'fechafin'			=>	$fechaFin,
					'descripcion'		=>	$descripcion
				);

				$this->db->insert('remodelaciones', $array);

				$insert_id = $this->db->insert_id();
				$fecha = date('Y-m-d');

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $insert_id,
					'form' 			=> 'Remodelaciones',
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				$co = 1;

				$config['upload_path'] = './remodelaciones-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 24000;
				$config['overwrite'] = true;

				$this->load->library('upload', $config);

				while ($co <= 5) {
					if (isset($_FILES['file' . $co])) {
						if ($_FILES['file' . $co]['error'] == 0) {
							$extArray = explode('.', $_FILES['file' . $co]['name']);
							$ext = $extArray[1];
							$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99) . '.' . $ext;

							$config['file_name'] = $newfile;
							$this->upload->initialize($config);

							if (!$this->upload->do_upload('file' . $co)) {
								die('error');
							} else {
								$array = array(
									'file' . $co	=>	$newfile
								);

								$this->db->where('id', $insert_id);
								$this->db->update('remodelaciones', $array);
							}
						}
					}
					$co += 1;
				}

				$link = base_url('solicitudes/solicitud_remodelaciones/' . $insert_id);
				mailsolicitudmudanzas($oficinaEmail, $tipo, $link);

				$d['msg'] = 'success';
			}

			$d['solicitudes'] = $this->intranet_model->get_solicitudes_remodelaciones($_SESSION['idoficina']);

			$this->load->view('header_view', $dh);
			$this->load->view('solicitud_remodelacion_view', $d);
			$this->load->view('footer_view', $df);
		}else{
			$d['solicitudes'] = $this->intranet_model->get_solicitudes_remodelaciones_all();
			$this->load->view('header_view', $dh);
			$this->load->view('remodelaciones_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function estatus_change_remodelacion()
	{
		if(isset($_POST['aprobar_remodelacion'])){
			$ids = $_POST['ids'];

			$array = array(
				'status_remodelacion'		=>	1
			);

			$this->db->where('id', $ids);
			$this->db->update('remodelaciones', $array);

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'log'			=> 'Solicitud de remodelaci&oacute;n aprobada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de remodelaci&oacute;n aprobada.";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('remodelaciones'));
		}

		if(isset($_POST['negar_remodelacion'])){
			$ids = $_POST['ids'];
			$razon = $_POST['razon'];

			$array = array(
				'razon'						=>	$razon,
				'status_remodelacion'		=>	2
			);

			$this->db->where('id', $ids);
			$this->db->update('remodelaciones', $array);

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'log'			=> 'Solicitud de remodelaci&oacute;n rechazada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de remodelaci&oacute;n rechazada";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('remodelaciones'));
		}

		if(isset($_POST['completar_remodelacion'])){
			$ids = $_POST['ids'];

			$array = array(
				'status_remodelacion'		=>	3
			);

			$this->db->where('id', $ids);
			$this->db->update('remodelaciones', $array);

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'log'			=> 'Solicitud de remodelaci&oacute;n completada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de remodelaci&oacute;n completada.";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('remodelaciones'));
		}
	}

	public function editar_remodelaciones($id)
	{
		$dh['title'] = 'Editar Remodelaciones';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if(isset($_POST['editar'])){
			$torre = $_POST['torre'];
			$oficina = $_POST['oficina'];
			$empresaid = $_POST['empresaid'];
			$fechaInicio = date('Y-m-d', strtotime($_POST['fecha_inicio']));
			$fechaFin = date('Y-m-d', strtotime($_POST['fecha_fin']));

			$oficinaInfo = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);
			$oficinaEmail = $oficinaInfo[0]['email1'];
			$tipo = "SOLICITUD DE REMODELACIONES";

			$descripcion = $_POST['descripcion'];

			$array = array(
				'torre_id'			=>	$torre,
				'oficina'			=>	$oficina,
				'fechainicio'		=>	$fechaInicio,
				'fechafin'			=>	$fechaFin,
				'descripcion'		=>	$descripcion
			);

			// echo $id;
			// echo "<pre>";
			// print_r($array);
			// die();

			$this->db->where('id', $id);
			$this->db->update('remodelaciones', $array);

			// $insert_id = $this->db->insert_id();
			// $fecha = date('Y-m-d');

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> 'Remodelaciones',
				'log'			=> 'Solicitud editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$fecha = date('Y-m-d');

			$co = 1;

			$config['upload_path'] = './remodelaciones-docs/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
			$config['max_size'] = 24000;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			while ($co <= 5) {
				if (isset($_FILES['file' . $co])) {
					if ($_FILES['file' . $co]['error'] == 0) {
						$extArray = explode('.', $_FILES['file' . $co]['name']);
						$ext = $extArray[1];
						$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99) . '.' . $ext;

						$config['file_name'] = $newfile;
						$this->upload->initialize($config);

						if (!$this->upload->do_upload('file' . $co)) {
							die('error');
						} else {
							$array = array(
								'file' . $co	=>	$newfile
							);

							$this->db->where('id', $id);
							$this->db->update('remodelaciones', $array);
						}
					}
				}
				$co += 1;
			}

			// $link = base_url('solicitudes/solicitud_remodelaciones/' . $insert_id);
			// mailsolicitudmudanzas($oficinaEmail, $tipo, $link);

			redirect(base_url('remodelaciones'));
		}

		$d['remodelaciones_info'] = $this->intranet_model->get_solicitudes_remodelaciones_id($id);
		$d['torres'] = $this->intranet_model->get_torres();

		$d['idsol'] = $id;

		// echo "<pre>";
		// print_r($d['remodelaciones_info']);
		// die();

		$this->load->view('header_solicitud_view', $dh);
		$this->load->view('editar_remodelaciones_view', $d);
		$this->load->view('footer_view', $df);
	}
}
