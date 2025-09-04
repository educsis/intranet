<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
		$dh['title'] = 'Inicio';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['noticias'] = $this->intranet_model->get_noticias_home();

		$this->load->view('header_view', $dh);
		$this->load->view('dashboard_view', $d);
		$this->load->view('footer_view', $df);
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
}
