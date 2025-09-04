<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inmuebles extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		session_start();
		if (!isset($_SESSION['logged'])) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$dh['title'] = 'Inmuebles';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if ($_SESSION['type'] == 'intranet') {
			$d['inmuebles'] = $this->intranet_model->get_inmuebles();

			$this->load->view('header_view', $dh);
			$this->load->view('ver_inmuebles_view', $d);
			$this->load->view('footer_view', $df);
		} else {

			if (isset($_POST['guardar'])) {
				$titulo = $_POST['titulo'];
				$detalle = $_POST['detalle'];
				$metros = $_POST['metros'];
				$precio = $_POST['precio'];
				$torre = $_POST['torre'];
				$oficina = $_POST['oficina'];
				$fecha = date('Y-m-d');

				$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99);

				$config['upload_path'] = './inmuebles-image/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = 2000;
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
					'detalle'		=>	$detalle,
					'metros'		=>	$metros,
					'precio'		=>	$precio,
					'torre'			=>	$torre,
					'oficina'		=>	$oficina,
					'imagen'		=>	$newfile . '.jpg'
				);

				$this->db->insert('inmuebles', $array);
				$d['msg'] = 'success';
			}

			$d['inmuebles'] = $this->intranet_model->get_inmuebles();

			$this->load->view('header_view', $dh);
			$this->load->view('crear_inmuebles_view', $d);
			$this->load->view('footer_view', $df);
		}
	}

	public function detalle($id)
	{
		$dh['title'] = 'Noticias';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['inmueble'] = $this->intranet_model->get_inmueble($id);

		$this->load->view('header_view', $dh);
		$this->load->view('inmueble_view', $d);
		$this->load->view('footer_view', $df);
	}

	function editar_inmuebles($id)
	{
		$dh['title'] = 'Editar Inmueble';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if (isset($_POST['editar'])) {
			$titulo = $_POST['titulo'];
			$detalle = $_POST['detalle'];
			$metros = $_POST['metros'];
			$precio = $_POST['precio'];
			$torre = $_POST['torre'];
			$oficina = $_POST['oficina'];
			$fecha = date('Y-m-d');

			// if new image is uploaded
			if($_FILES['archivo']['name'] != ''){
				$newfile = rand(10, 99) . '-' . $fecha . '-' . rand(10, 99);

				$config['upload_path'] = './inmuebles-image/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = 2000;
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
					'detalle'		=>	$detalle,
					'metros'		=>	$metros,
					'precio'		=>	$precio,
					'torre'			=>	$torre,
					'oficina'		=>	$oficina,
					'imagen'		=>	$newfile . '.jpg'
				);
			} else {
				$array = array(
					'fecha'			=>	$fecha,
					'titulo'		=>	$titulo,
					'detalle'		=>	$detalle,
					'metros'		=>	$metros,
					'precio'		=>	$precio,
					'torre'			=>	$torre,
					'oficina'		=>	$oficina,
				);
			}

			$this->db->where('id', $id);
			$this->db->update('inmuebles', $array);
			redirect(base_url('inmuebles'));
		}

		$d['inmueble'] = $this->intranet_model->get_inmueble($id);
		$d['idedit'] = $id;

		$this->load->view('header_view', $dh);
		$this->load->view('editar_inmueble_view', $d);
		$this->load->view('footer_view', $df);
	}

	function eliminar_inmueble($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('inmuebles');

		redirect(base_url('inmuebles'));
	}
}
