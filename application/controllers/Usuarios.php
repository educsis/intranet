<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
	}

	public function intranet()
	{
		$dh['title'] = 'Usuarios intranet';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['oficinas'] = $this->intranet_model->get_oficina_empresas();

		if(isset($_POST['guardar'])){
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$email = $_POST['email'];
			$oficina = $_POST['oficina'];
			$password = sha1($_POST['password']);

			$check_intranet = $this->intranet_model->check_exist_intranet($email);

			if($check_intranet){
				$d['msg'] = 'exist';
			}else{
				$array = array(
					'nombres'			=>	$nombres,
					'apellidos'		=>	$apellidos,
					'id_oficina'	=>	$oficina,
					'email'				=>	$email,
					'password'		=>	$password
				);

				$this->db->insert('intranet_usuarios', $array);
				$d['msg'] = 'success';
			}
		}

		if (isset($_GET['msg'])) {
			$d['msg'] = 'edited';
		}

		$d['usuarios'] = $this->intranet_model->get_intranet_usuarios();
		// echo "<pre>";
		// print_r($d['usuarios']);
		// die();

		$this->load->view('header_view', $dh);
		$this->load->view('usuarios_intranet_view', $d);
		$this->load->view('footer_view', $df);
	}

	public function editar_intranet($idi)
	{
		$dh['title'] = 'Usuarios intranet';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if(isset($_POST['guardar'])){
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$email = $_POST['email'];
			$oficina = $_POST['empresaid'];
			$userid = $_POST['userid'];

			$array = array(
				'nombres'			=>	$nombres,
				'apellidos'		=>	$apellidos,
				'id_oficina'	=>	$oficina,
				'email'				=>	$email
			);

			$this->db->where('id', $userid);
			$this->db->update('intranet_usuarios', $array);

			redirect(base_url('usuarios/intranet?msg="edited"'));
		}

		$usuario = $this->intranet_model->single_intranet_usuarios($idi);
		$d['usuario'] = $usuario[0];

		$this->load->view('header_view', $dh);
		$this->load->view('editar_usuarios_intranet_view', $d);
		$this->load->view('footer_view', $df);
	}

	public function superadmin()
	{
		$dh['title'] = 'Usuarios super admin';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if(isset($_POST['guardar'])){
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$fullname = $nombres . ', ' . $apellidos;
			$email = $_POST['email'];
			$password = sha1($_POST['password']);

			//check if exists
			$check_exist = $this->intranet_model->check_exist_superadmin($email);

			if($check_exist){
				$d['msg'] = 'exist';
			}else{
				$array = array(
					'email_usuarios'		=>	$email,
					'nombre_usuarios'		=>	$fullname,
					'password_usuarios'	=>	$password
				);

				$this->db->insert('usuarios', $array);
				$d['msg'] = 'success';
			}
		}

		if(isset($_GET['msg'])){
			$d['msg'] = 'edited';
		}

		$d['usuarios'] = $this->intranet_model->get_usuarios();

		$this->load->view('header_view', $dh);
		$this->load->view('usuarios_super_admin_view', $d);
		$this->load->view('footer_view', $df);
	}

	public function editar_superadmin($ids){
		$dh['title'] = 'Usuarios super admin';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if(isset($_POST['guardar'])){
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$fullname = $nombres . ', ' . $apellidos;
			$email = $_POST['email'];


			$array = array(
				'email_usuarios'		=>	$email,
				'nombre_usuarios'		=>	$fullname
			);

			$this->db->where('id_usuarios', $ids);
			$this->db->update('usuarios', $array);

			redirect(base_url('usuarios/superadmin?msg="edited"'));
		}

		$usuario = $this->intranet_model->single_usuario($ids);
		$d['usuario'] = $usuario[0];

		$this->load->view('header_view', $dh);
		$this->load->view('editar_super_admin_view', $d);
		$this->load->view('footer_view', $df);
	}
}
