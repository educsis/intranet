<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

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
		$dh['title'] = 'Noticias';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if($_SESSION['type'] == 'intranet'){

			$d['noticias'] = $this->intranet_model->get_noticias();

			$this->load->view('header_view', $dh);
			$this->load->view('noticias_view', $d);
			$this->load->view('footer_view', $df);
		}else{

			if(isset($_POST['guardar'])){
				$titulo = $_POST['titulo'];
				$noticia = $_POST['noticia'];
				$fecha = date('Y-m-d');

				$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99);

				$config['upload_path'] = './noticias-image/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = 4000;
				$config['overwrite'] = true;
				$config['file_name'] = $newfile;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('archivo')) {
					die('error');
				} else {
				}

				$array = array(
					'fecha'			=>	$fecha,
					'titulo'		=>	$titulo,
					'noticia'		=>	$noticia,
					'archivo'		=>	$newfile . '.jpg'
				);

				$this->db->insert('noticias', $array);
				$d['msg'] = 'success';
			}

			$d['noticias'] = $this->intranet_model->get_noticias();

			$this->load->view('header_view', $dh);
			$this->load->view('crear_noticias_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function leer($id)
	{
		$dh['title'] = 'Noticias';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['noticia'] = $this->intranet_model->get_noticia($id);

		$this->load->view('header_view', $dh);
		$this->load->view('noticia_view', $d);
		$this->load->view('footer_view', $df);
	}

	public function editar_noticia($id)
	{
		$dh['title'] = 'Noticias';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if ($_SESSION['type'] == 'intranet') {
			die('no tiene permisos');
		} else {

			if (isset($_POST['guardar'])) {
				$titulo = $_POST['titulo'];
				$noticia = $_POST['noticia'];
				$fecha = date('Y-m-d');

				$noticiaInfo = $this->intranet_model->get_noticia($id);


				if($_FILES['archivo']['error'] !== 4){
					$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99);
					$config['upload_path'] = './noticias-image/';
					$config['allowed_types'] = 'jpg';
					$config['max_size'] = 2000;
					$config['overwrite'] = true;
					$config['file_name'] = $newfile;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('archivo')) {
						die('error');
					} else {
						$newfile = $newfile . '.jpg';
					}
				}else{
					$newfile = $noticiaInfo[0]['archivo'];
				}

				$array = array(
					'fecha'			=>	$fecha,
					'titulo'		=>	$titulo,
					'noticia'		=>	$noticia,
					'archivo'		=>	$newfile
				);

				// print_r($noticia);
				// echo "<br>";
				// die($newfile);

				$this->db->where('id', $id);
				$this->db->update('noticias', $array);
				$d['msg'] = 'success';
			}

			$d['noticia'] = $this->intranet_model->get_noticia($id);

			$this->load->view('header_view', $dh);
			$this->load->view('editar_noticia_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function eliminar_noticia($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('noticias');
		redirect('noticias');
	}
}
