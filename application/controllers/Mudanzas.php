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
			$oficinaInfo = $this->intranet_model->get_oficina_single($_SESSION['idoficina']);

			$oficinaEmail = $oficinaInfo[0]['email1'];

			if(isset($_POST['enviar_ingreso_sociedad_anonima'])){
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "INGRESO DE INQUILINO/PROPIETARIO SOCIEDAD ANONIMA";

				$array = array(
					'empresaid'	=>	$empresaid,
					'tipo'			=>	$tipo,
					'fecha'			=>	$fecha
				);

				$this->db->insert('mudanzas', $array);
				$insert_id = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $insert_id,
					'form' 			=> $tipo,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$lastid = $this->db->insert_id();

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 24000;
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
								$d['msg'] = "Erro con los archivos";
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

				$link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
				mailsolicitudmudanzas($oficinaEmail, $tipo, $link);

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviar_ingreso_individual'])) {
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL";

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

				$lastid = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $lastid,
					'form' 			=> $tipo,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 24000;
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
								$d['msg'] = "Erro con los archivos";
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

				$link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
				mailsolicitudmudanzas($oficinaEmail, $tipo, $link);

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviar_cambiosa'])) {
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

				$lastid = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $lastid,
					'form' 			=> $tipo,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 24000;
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
								$d['msg'] = "Erro con los archivos";
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

				$link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
				mailsolicitudmudanzas($oficinaEmail, $tipo, $link);

				$d['msg'] = 'success';
			}

			if (isset($_POST['enviar_cambio_individual'])) {
				$empresaid = $_POST['empresaid'];
				$fecha = date('Y-m-d');
				$tipo = "CAMBIO DE PROPIETARIO – PERSONA INDIVIDUAL";

				$array = array(
					'empresaid'	=>	$empresaid,
					'tipo'			=>	$tipo,
					'fecha'			=>	$fecha
				);

				$this->db->insert('mudanzas', $array);
				$insert_id = $this->db->insert_id();

				$lastid = $this->db->insert_id();

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $lastid,
					'form' 			=> $tipo,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 24000;
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
								$d['msg'] = "Erro con los archivos";
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

				$link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
				mailsolicitudmudanzas($oficinaEmail, $tipo, $link);

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

				//registrar log

				$array = array(
					'user'			=> $_SESSION['nombres'],
					'idSolicitud' 	=> $insert_id,
					'form' 			=> $tipo,
					'log'			=> 'Solicitud creada.',
					'fechaHora'		=> date('Y-m-d H:i:s')
				);

				$this->db->insert('logs', $array);

				$array = array(
					'idmudanza'		=>	$insert_id
				);

				$this->db->insert('files_mudanza', $array);

				$co = 1;

				$config['upload_path'] = './mudanzas-docs/';
				$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
				$config['max_size'] = 24000;
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
								$d['msg'] = "Erro con los archivos";
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

			$array = array(
				'status_mudanza'		=>	1
			);

			$this->db->where('id', $ids);
			$this->db->update('mudanzas', $array);

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'log'			=> 'Solicitud de ingreso/salida aprobada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de ingreso/salida aprobada";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('mudanzas'));
		}

		if(isset($_POST['negar_mudanza'])){
			$ids = $_POST['ids'];
			$razon = $_POST['razon'];

			$array = array(
				'razon'					=>	$razon,
				'status_mudanza'		=>	2
			);

			$this->db->where('id', $ids);
			$this->db->update('mudanzas', $array);

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'log'			=> 'Solicitud de ingreso/salida negada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de ingreso/salida negada";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('mudanzas'));
		}

		if(isset($_POST['completar_mudanza'])){
			$ids = $_POST['ids'];

			$array = array(
				'status_mudanza'		=>	3
			);

			$this->db->where('id', $ids);
			$this->db->update('mudanzas', $array);

			//registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $ids,
				'log'			=> 'Solicitud de ingreso/salida completada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$form = "Solicitud de ingreso/salida completada";
			$link = base_url('solicitudes/solicitud_elevador/' . $ids);
			mailstatuschange($form, $link);

			redirect(base_url('mudanzas'));
		}
	}

	public function editar_mudanzas($id, $tiposol)
	{
		$dh['title'] = 'Editar Mudanzas';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['mudanzas_info'] = $this->intranet_model->get_solicitudes_mudanzas_id($id);


		if(isset($_POST['editar_ingreso_sociedad_anonima'])){
			$empresaid = $_POST['empresaid'];
			$fecha = date('Y-m-d');
			$tipo = "INGRESO DE INQUILINO/PROPIETARIO SOCIEDAD ANONIMA";

			// $array = array(
			// 	'empresaid'	=>	$empresaid,
			// 	'tipo'			=>	$tipo,
			// 	'fecha'			=>	$fecha
			// );

			// $this->db->insert('mudanzas', $array);
			// $insert_id = $this->db->insert_id();

			// registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> $tipo,
				'log'			=> 'Solicitud editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			// $array = array(
			// 	'idmudanza'		=>	$insert_id
			// );

			// $this->db->insert('files_mudanza', $array);

			// $lastid = $this->db->insert_id();

			$co = 1;

			$config['upload_path'] = './mudanzas-docs/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
			$config['max_size'] = 24000;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			while($co <= 17){
				if(isset($_FILES['file'.$co])){
					if($_FILES['file'.$co]['error'] == 0){
						// echo "si hay file $co";
						// echo "<br>";
						$extArray = explode('.', $_FILES['file' . $co]['name']);
						$ext = $extArray[1];
						$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99) . '.' . $ext;

						$config['file_name'] = $newfile;
						$this->upload->initialize($config);

							if (!$this->upload->do_upload('file' . $co)) {
								$d['msg'] = "Error con los archivos";
							} else {
							$array = array(
								'file'.$co	=>	$newfile
							);

							$this->db->where('idmudanza', $id);
							$this->db->update('files_mudanza', $array);
						}
					}
				}
				$co += 1;
			}

			// die();

			// $link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
			// mailsolicitudmudanzas($oficinaEmail, $tipo, $link);

			// $d['msg'] = 'success';
			
			redirect(base_url('mudanzas'));
				
		}

		if(isset($_POST['editar_ingreso_individual'])){
			$empresaid = $_POST['empresaid'];
			$fecha = date('Y-m-d');
			$tipo = "INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL";

			// registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> $tipo,
				'log'			=> 'Solicitud editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$co = 1;

			$config['upload_path'] = './mudanzas-docs/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
			$config['max_size'] = 24000;
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
								$d['msg'] = "Error con los archivos";
							} else {
							$array = array(
								'file'.$co	=>	$newfile
							);

							$this->db->where('idmudanza', $id);
							$this->db->update('files_mudanza', $array);
						}
					}
				}
				$co += 1;
			}

			// $link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
			// mailsolicitudmudanzas($oficinaEmail, $tipo, $link);
			
			redirect(base_url('mudanzas'));
				
		}

		if(isset($_POST['editar_salida_inquilino'])){
			$empresaid = $_POST['empresaid'];
			$fecha = date('Y-m-d');
			$tipo = "INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL";

			// registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> $tipo,
				'log'			=> 'Solicitud editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$co = 1;

			$config['upload_path'] = './mudanzas-docs/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
			$config['max_size'] = 24000;
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
								$d['msg'] = "Error con los archivos";
							} else {
							$array = array(
								'file'.$co	=>	$newfile
							);

							$this->db->where('idmudanza', $id);
							$this->db->update('files_mudanza', $array);
						}
					}
				}
				$co += 1;
			}

			// $link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
			// mailsolicitudmudanzas($oficinaEmail, $tipo, $link);
			
			redirect(base_url('mudanzas'));
				
		}

		if(isset($_POST['editar_cambio_propietario_sa'])){
			$empresaid = $_POST['empresaid'];
			$fecha = date('Y-m-d');
			$tipo = "INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL";

			// registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> $tipo,
				'log'			=> 'Solicitud editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$co = 1;

			$config['upload_path'] = './mudanzas-docs/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
			$config['max_size'] = 24000;
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
								$d['msg'] = "Error con los archivos";
							} else {
							$array = array(
								'file'.$co	=>	$newfile
							);

							$this->db->where('idmudanza', $id);
							$this->db->update('files_mudanza', $array);
						}
					}
				}
				$co += 1;
			}

			// $link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
			// mailsolicitudmudanzas($oficinaEmail, $tipo, $link);
			
			redirect(base_url('mudanzas'));
				
		}

		if(isset($_POST['editar_cambio_individual'])){
			$empresaid = $_POST['empresaid'];
			$fecha = date('Y-m-d');
			$tipo = "INGRESO DE INQUILINO/PROPIETARIO PERSONA INDIVIDUAL";

			// registrar log

			$array = array(
				'user'			=> $_SESSION['nombres'],
				'idSolicitud' 	=> $id,
				'form' 			=> $tipo,
				'log'			=> 'Solicitud editada.',
				'fechaHora'		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('logs', $array);

			$co = 1;

			$config['upload_path'] = './mudanzas-docs/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|docx';
			$config['max_size'] = 24000;
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
								$d['msg'] = "Error con los archivos";
							} else {
							$array = array(
								'file'.$co	=>	$newfile
							);

							$this->db->where('idmudanza', $id);
							$this->db->update('files_mudanza', $array);
						}
					}
				}
				$co += 1;
			}

			// $link = base_url('solicitudes/solicitud_mudanzas/' . $lastid);
			// mailsolicitudmudanzas($oficinaEmail, $tipo, $link);
			
			redirect(base_url('mudanzas'));
				
		}


		$d['tiposol'] = $tiposol;
		$d['idsol'] = $id;
		$d['formID'] = $d['mudanzas_info'][0]['tipo'];

		// die($d['tiposol'] . ' ' . $d['formID'] . ' ' . $d['idsol']);

		$this->load->view('header_solicitud_view', $dh);
		$this->load->view('editar_mudanzas_view', $d);
		$this->load->view('footer_view', $df);
	}
}
