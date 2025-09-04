<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {

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
		$dh['title'] = 'Configuración';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if($_SESSION['type'] == 'intranet'){
			$d['archivos'] = $this->intranet_model->all_archivos_pdf();

			$this->load->view('header_view', $dh);
			$this->load->view('archivos_intranet_view', $d);
			$this->load->view('footer_view', $df);
		}else{
			if(isset($_POST['guardar'])){
				$email = $_POST['email'];
				$fromemail = $_POST['from_email'];

				$array = array(
					'email'				=>	$email,
					'from_email'	=>	$fromemail
				);

				$this->db->where('id_usuario', $_SESSION['iduser']);
				$this->db->update('configuracion', $array);
				$d['msg'] = 'success';
			}

			$d['configuracion'] = $this->intranet_model->get_configuracion($_SESSION['iduser']);

			$this->load->view('header_view', $dh);
			$this->load->view('configuracion_view', $d);
			$this->load->view('footer_view', $df);
		}
	}
}