<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contrasena extends CI_Controller
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
		$dh['title'] = 'Contraseña';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		if(isset($_POST['guardar'])){
			$actual = sha1($_POST['passwordactual']);
			$nueva = sha1($_POST['passwordnueva']);
			$verifica = sha1($_POST['passwordverifica']);
			$iduser = $_SESSION['iduser'];

			if($_SESSION['type'] == 'admin'){
				$usuarioInfoAdmin = $this->intranet_model->check_pass_admin($actual, $iduser);
				@$dbpass = $usuarioInfoAdmin[0]['password'];
				if ($actual == $dbpass) {
					if ($nueva == $verifica) {
						//change password
						$array = array(
							'password_usuarios'	=>	$nueva
						);
						$this->db->where('id_usuarios', $iduser);
						$this->db->update('usuarios', $array);
						$d['msg'] = "changed";
					} else {
						$d['msg'] = "notequal";
					}
				} else {
					$d['msg'] = 'noexiste';
				}
			}else{
				$usuarioInfoIntranet = $this->intranet_model->check_pass_intranet($actual, $iduser);
				@$dbpass = $usuarioInfoIntranet[0]['password'];
				if($actual == $dbpass){
					if($nueva == $verifica){
						//change password
						$array = array(
							'password'	=>	$nueva
						);
						$this->db->where('id', $iduser);
						$this->db->update('intranet_usuarios', $array);
						$d['msg'] = "changed";
					}else{
						$d['msg'] = "notequal";
					}
				}else{
					$d['msg'] = 'noexiste';
				}
			}
		}

		$this->load->view('header_view', $dh);
		$this->load->view('contrasena_view', $d);
		$this->load->view('footer_view', $df);
	}
}
