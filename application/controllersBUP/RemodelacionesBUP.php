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

				$descripcion = $_POST['descripcion'];

				$array = array(
					'empresaid'			=>	$empresaid,
					'torre_id'			=>	$torre,
					'oficina'				=>	$oficina,
					'fechainicio'		=>	$fechaInicio,
					'fechafin'			=>	$fechaFin,
					'descripcion'		=>	$descripcion
				);

				$this->db->insert('remodelaciones', $array);

				$insert_id = $this->db->insert_id();
				$fecha = date('Y-m-d');

				$co = 1;

				$config['upload_path'] = './remodelaciones-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 4000;
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
			$razon = $_POST['razon'];

			$array = array(
				'razon'									=>	$razon,
				'status_remodelacion'		=>	1
			);

			$this->db->where('id', $ids);
			$this->db->update('remodelaciones', $array);

			$m['titleMail'] = "Remodelaci&oacute;n aprobada";

			// $remoInfo = $this->intranet_model->
			$configuracion = $this->intranet_model->get_configuracion($_SESSION['iduser']);
			$dataRemodelacion = $this->intranet_model->get_solicitudes_remodelaciones_id($ids);

			$m['titulo'] = $dataRemodelacion[0]['titulo'];
			$m['oficina'] = $dataRemodelacion[0]['nombre_oficina'];
			$m['torre'] = $dataRemodelacion[0]['torre'];
			$m['numero'] = $dataRemodelacion[0]['oficina'];
			$m['descripcion'] = $dataRemodelacion[0]['descripcion'];
			$m['razon'] = $dataRemodelacion[0]['razon'];
			$m['fechahora'] = date('d-m-Y H:i', strtotime($dataRemodelacion[0]['fechahora']));
			$m['mail'] = $dataRemodelacion[0]['email1'];

			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($configuracion[0]['from_email'], 'Intranet Zona Pradera');
			$this->email->to($configuracion[0]['email']);
			// $this->email->to($m['mail']);
			// $this->email->cc($configuracion[0]['email']);
			$this->email->subject('Remodelación Aprobada');
			$html = $this->load->view('mail_intranet_view', $m, TRUE);
			$this->email->message($html);

			$this->email->send();

			redirect(base_url('remodelaciones'));
		}

		if(isset($_POST['negar_remodelacion'])){
			$ids = $_POST['ids'];
			$razon = $_POST['razon'];

			$array = array(
				'razon'									=>	$razon,
				'status_remodelacion'		=>	2
			);

			$this->db->where('id', $ids);
			$this->db->update('remodelaciones', $array);

			$m['titleMail'] = "Remodelaci&oacute;n negada";

			// $remoInfo = $this->intranet_model->
			$configuracion = $this->intranet_model->get_configuracion($_SESSION['iduser']);
			$dataRemodelacion = $this->intranet_model->get_solicitudes_remodelaciones_id($ids);

			$m['titulo'] = $dataRemodelacion[0]['titulo'];
			$m['oficina'] = $dataRemodelacion[0]['nombre_oficina'];
			$m['torre'] = $dataRemodelacion[0]['torre'];
			$m['numero'] = $dataRemodelacion[0]['oficina'];
			$m['descripcion'] = $dataRemodelacion[0]['descripcion'];
			$m['razon'] = $dataRemodelacion[0]['razon'];
			$m['fechahora'] = date('d-m-Y H:i', strtotime($dataRemodelacion[0]['fechahora']));
			$m['mail'] = $dataRemodelacion[0]['email1'];

			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($configuracion[0]['from_email'], 'Intranet Zona Pradera');
			$this->email->to($configuracion[0]['email']);
			// $this->email->to($m['mail']);
			// $this->email->cc($configuracion[0]['email']);
			$this->email->subject('Remodelación Negada');
			$html = $this->load->view('mail_intranet_view', $m, TRUE);
			$this->email->message($html);

			$this->email->send();

			redirect(base_url('remodelaciones'));
		}
	}
}
