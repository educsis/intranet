<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$d['msg'] = '';

		if(isset($_POST['entrar'])){
			$emailForm = $_POST['email'];
			$password = sha1($_POST['password']);
			$type = '';
			$nombres = '';
			$email = '';
			$iduser = 0;
			$idoficina = 0;

			//check if super admin
			$check_admin = $this->intranet_model->login_admin($emailForm, $password);

			if($check_admin){
				$type = 'admin';
				$nombres = $check_admin[0]['nombre_usuarios'];
				$email = $check_admin[0]['email_usuarios'];
				$iduser = $check_admin[0]['id_usuarios'];
			}

			$check_intranet = $this->intranet_model->login_intranet($emailForm, $password);

			if($check_intranet){
				$type = 'intranet';
				$nombres = $check_intranet[0]['nombres'] . ' ' . $check_intranet[0]['apellidos'];
				$email = $check_intranet[0]['email'];
				$iduser = $check_intranet[0]['id'];
				$idoficina = $check_intranet[0]['id_oficina'];
			}

			if($type == ''){
				$d['msg'] = 'error';
			}else{
				session_start();
				$_SESSION['type'] = $type;
				$_SESSION['nombres'] = $nombres;
				$_SESSION['email'] = $email;
				$_SESSION['logged'] = 1;
				$_SESSION['iduser'] = $iduser;
				$_SESSION['idoficina'] = $idoficina;
				redirect('inicio');
			}
		}

		if (isset($_GET['recuperada'])) {
			$d['msg'] = 'cambio';
		}

		$this->load->view('login_view', $d);
	}

	public function olvide()
	{
		$d['msg'] = '';

		if(isset($_POST['recuperar'])){
			$find = 0;
			$email = $_POST['email'];
			$type = 0;

			//find if super admin exists
			$findadminemail = $this->intranet_model->check_exist_superadmin($email);
			@$id = $findadminemail[0]['id_usuarios'];

			if(!empty($findadminemail)){
					$find = 1;
					$type = 1;
			}

			if($find == 0){
				$findintranetemail = $this->intranet_model->check_exist_intranet($email);
				@$id = $findintranetemail[0]['id'];
				if(!empty($findintranetemail)){
					$find = 2;
					$type = 2;
				}
			}

			if($find == 0){
				$d['msg'] = "no";
			}elseif($find == 1 || $find == 2){
				$d['msg'] = "yes";

				//encrypt
				$rand = rand(100, 999);
				$dm['token'] = $rand . '-' . $type . '-' . $id;

				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from(FROM_EMAIL, 'Intranet ZonaPradera');
				$this->email->to($email);
				$this->email->subject("Recuperar clave");
				$dm['info'] = '';
				$html = $this->load->view('mail_recuperar', $dm, TRUE);
				$this->email->message($html);
				// $this->email->from(FROM_EMAIL, 'Your Name');
				// $this->email->to($email);
				// $this->email->subject('Email Test');
				// $this->email->message('Testing the email class.');

				$this->email->send();
				$d['msg'] = 'sent';
			}

			// echo $d['msg'] . ' ' . FROM_EMAIL;

			// die();
		}


		$this->load->view('olvide_view', $d);
	}

	public function cambiar_la_clave($token){
		$getToken = explode('-', $token);
		$type = $getToken[1];
		$iduser = $getToken[2];
		$d['msg'] = "";

		// echo "<pre>";
		// print_r($getToken);
		// die();

		if($type == 1){
			if (isset($_POST['modificar'])) {
				$p1 = sha1($_POST['password1']);
				$p2 = sha1($_POST['password2']);

				if ($p1 == $p2) {
					//change password
					$array = array(
						'password_usuarios'	=>	$p1
					);
					$this->db->where('id_usuarios', $iduser);
					$this->db->update('usuarios', $array);
					redirect(base_url()."?recuperada=true");
				} else {
					$d['msg'] = "notequal";
				}
			}
		}elseif($type == 2){
			if(isset($_POST['modificar'])){
				$p1 = sha1($_POST['password1']);
				$p2 = sha1($_POST['password2']);

				if($p1 == $p2){
					//change password
					$array = array(
						'password'	=>	$p1
					);
					$this->db->where('id', $iduser);
					$this->db->update('intranet_usuarios', $array);
					redirect(base_url() . "?recuperada=true");
				}else{
					$d['msg'] = "notequal";
				}
			}
		}

		$this->load->view('modificar_clave', $d);
	}
}
