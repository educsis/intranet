<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mudanzas extends CI_Controller {

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
		$dh['title'] = 'Ingreso / Salida';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if($_SESSION['type'] == 'intranet'){

			$d['torres'] = $this->intranet_model->get_torres();

			if(isset($_POST['enviar_sociedad_anonima'])){
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "CAMBIO DE PROPIETARIO – SOCIEDAD ANONIMA";

				$array = array(
					'empresaid'	=>	$empresaid,
					'tipo'			=>	$tipo,
					'fecha'			=>	$fecha
				);

				$this->db->insert('mudanzas', $array);
				$insert_id = $this->db->insert_id();

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 4000;
				$config['overwrite'] = true;

				$this->load->library('upload', $config);

				while($co <= 17){
					if(isset($_FILES['file'.$co])){
						if($_FILES['file'.$co]['error'] == 0){
							$extArray = explode('.', $_FILES['file' . $co]['name']);
							$ext = $extArray[1];
							$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99) . '.' . $ext;

							$config['file_name'] = $newfile;
							$this->upload->initialize($config);

							if (!$this->upload->do_upload('file' . $co)) {
								die('error');
							} else {
								$array = array(
									'file'.$co	=>	$newfile
								);

								$this->db->where('idmudanza', $insert_id);
								$this->db->update('files_mudanza', $array);
							}
						}
					}
					$co += 1;
				}

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviar_ingreso_individual'])) {
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "CAMBIO DE PROPIETARIO – PERSONA INDIVIDUAL ";

				$array = array(
					'empresaid'	=>	$empresaid,
					'tipo'			=>	$tipo,
					'fecha'			=>	$fecha
				);

				$this->db->insert('mudanzas', $array);
				$insert_id = $this->db->insert_id();

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 4000;
				$config['overwrite'] = true;

				$this->load->library('upload', $config);

				while ($co <= 17) {
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

								$this->db->where('idmudanza', $insert_id);
								$this->db->update('files_mudanza', $array);
							}
						}
					}
					$co += 1;
				}

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviar_cambiosa'])) {
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "Cambio sociedad anonima";

				$array = array(
					'empresaid'	=>	$empresaid,
					'tipo'			=>	$tipo,
					'fecha'			=>	$fecha
				);

				$this->db->insert('mudanzas', $array);
				$insert_id = $this->db->insert_id();

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 4000;
				$config['overwrite'] = true;

				$this->load->library('upload', $config);

				while ($co <= 17) {
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

								$this->db->where('idmudanza', $insert_id);
								$this->db->update('files_mudanza', $array);
							}
						}
					}
					$co += 1;
				}

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviar_cambio_individual'])) {
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "Cambio persona individual";

				$array = array(
					'empresaid'	=>	$empresaid,
					'tipo'			=>	$tipo,
					'fecha'			=>	$fecha
				);

				$this->db->insert('mudanzas', $array);
				$insert_id = $this->db->insert_id();

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 4000;
				$config['overwrite'] = true;

				$this->load->library('upload', $config);

				while ($co <= 17) {
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

								$this->db->where('idmudanza', $insert_id);
								$this->db->update('files_mudanza', $array);
							}
						}
					}
					$co += 1;
				}

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviar_salida_inquilino'])) {
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "SALIDA DE INQUILINO";

				$array = array(
					'empresaid'	=>	$empresaid,
					'tipo'			=>	$tipo,
					'fecha'			=>	$fecha
				);

				$this->db->insert('mudanzas', $array);
				$insert_id = $this->db->insert_id();

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 4000;
				$config['overwrite'] = true;

				$this->load->library('upload', $config);

				while ($co <= 17) {
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

								$this->db->where('idmudanza', $insert_id);
								$this->db->update('files_mudanza', $array);
							}
						}
					}
					$co += 1;
				}

				$d['msg'] = 'success';
			}

			$d['solicitudes'] = $this->intranet_model->get_solicitudes_mudanzas($_SESSION['idoficina']);

			$this->load->view('header_view', $dh);
			$this->load->view('solicitud_mudanza_view', $d);
			$this->load->view('footer_view', $df);
		}else{

			$d['solicitudes'] = $this->intranet_model->get_solicitudes_mudanzas_all();
			$this->load->view('header_view', $dh);
			$this->load->view('mudanzas_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function estatus_change_mudanza()
	{
		if(isset($_POST['aprobar_mudanza'])){
			$ids = $_POST['ids'];
			$razon = $_POST['razon'];

			$array = array(
				'razon'							=>	$razon,
				'status_mudanza'		=>	1
			);

			$this->db->where('id', $ids);
			$this->db->update('mudanzas', $array);

			$m['titleMail'] = "Mudanza aprobada";

			// $remoInfo = $this->intranet_model->
			$configuracion = $this->intranet_model->get_configuracion($_SESSION['iduser']);
			$dataMudanza = $this->intranet_model->get_solicitudes_mudanzas_id($ids);

			$m['titulo'] = $dataMudanza[0]['titulo'];
			$m['oficina'] = $dataMudanza[0]['nombre_oficina'];
			$m['torre'] = $dataMudanza[0]['torre'];
			$m['numero'] = $dataMudanza[0]['oficina'];
			$m['descripcion'] = $dataMudanza[0]['descripcion'];
			$m['razon'] = $dataMudanza[0]['razon'];
			$m['fechahora'] = date('d-m-Y H:i', strtotime($dataMudanza[0]['fechahora']));
			$m['mail'] = $dataMudanza[0]['email1'];

			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($configuracion[0]['from_email'], 'Intranet Zona Pradera');
			$this->email->to($configuracion[0]['email']);
			// $this->email->to($m['mail']);
			// $this->email->cc($configuracion[0]['email']);
			$this->email->subject('Mudanza Aprobada');
			$html = $this->load->view('mail_intranet_view', $m, TRUE);
			$this->email->message($html);

			$this->email->send();

			redirect(base_url('mudanzas'));
		}

		if(isset($_POST['negar_mudanza'])){
			$ids = $_POST['ids'];
			$razon = $_POST['razon'];

			$array = array(
				'razon'							=>	$razon,
				'status_mudanza'		=>	2
			);

			$this->db->where('id', $ids);
			$this->db->update('mudanzas', $array);

			$m['titleMail'] = "Mudanza negada";

			// $remoInfo = $this->intranet_model->
			$configuracion = $this->intranet_model->get_configuracion($_SESSION['iduser']);
			$dataMudanza = $this->intranet_model->get_solicitudes_mudanzas_id($ids);

			$m['titulo'] = $dataMudanza[0]['titulo'];
			$m['oficina'] = $dataMudanza[0]['nombre_oficina'];
			$m['torre'] = $dataMudanza[0]['torre'];
			$m['numero'] = $dataMudanza[0]['oficina'];
			$m['descripcion'] = $dataMudanza[0]['descripcion'];
			$m['razon'] = $dataMudanza[0]['razon'];
			$m['fechahora'] = date('d-m-Y H:i', strtotime($dataMudanza[0]['fechahora']));
			$m['mail'] = $dataMudanza[0]['email1'];

			$this->load->library('email');
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($configuracion[0]['from_email'], 'Intranet Zona Pradera');
			$this->email->to($configuracion[0]['email']);
			// $this->email->to($m['mail']);
			// $this->email->cc($configuracion[0]['email']);
			$this->email->subject('Mudanza Negada');
			$html = $this->load->view('mail_intranet_view', $m, TRUE);
			$this->email->message($html);

			$this->email->send();

			redirect(base_url('mudanzas'));
		}
	}
}
