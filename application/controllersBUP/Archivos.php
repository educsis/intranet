<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

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
		$dh['title'] = 'Archivos PDF';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if($_SESSION['type'] == 'intranet'){
			$d['archivos'] = $this->intranet_model->all_archivos_pdf();

			$this->load->view('header_view', $dh);
			$this->load->view('archivos_intranet_view', $d);
			$this->load->view('footer_view', $df);
		}else{
			if(isset($_POST['enviar'])){
				$titulo = $_POST['titulo'];
				$date = date('Y-m-d');
				$newfile = rand(10,99) . '-' . $date . '-' . rand(10,99);

				$config['upload_path'] = './pdf/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 4000;
				$config['overwrite'] = true;
				$config['file_name'] = $newfile;

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('archivo')) {
					die('error');
				} else {
				}

				$array = array(
					'fecha'				=>	$date,
					'titulo'			=>	$titulo,
					'fecha'				=>	$date,
					'archivo'			=>	$newfile . '.pdf'
				);

				$this->db->insert('pdf', $array);
				$d['msg'] = 'success';
			}

			$d['archivos'] = $this->intranet_model->all_archivos_pdf();

			$this->load->view('header_view', $dh);
			$this->load->view('archivos_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function eliminararchivo($id){
		$archivoInfo = $this->intranet_model->get_archivo_pdf($id);

		$archivo = $archivoInfo[0]['archivo'];
		unlink('pdf/' . $archivo);

		$this->db->where('id', $id);
		$this->db->delete('pdf');
		redirect(base_url('archivos'));
	}
}