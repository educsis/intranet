<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

	public function index()
	{
	}

	public function solicitud_elevador($id)
	{
		$dh['title'] = 'Elevadores';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['elevador_info'] = $this->intranet_model->get_solicitud_elevador($id);

		$this->load->view('header_solicitud_view', $dh);
		$this->load->view('verificar_elevadores_view', $d);
		$this->load->view('footer_view', $df);
	}

	public function solicitud_mudanzas($id)
	{
		$dh['title'] = 'Ingreso / Salida';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['mudanzas_info'] = $this->intranet_model->get_solicitudes_mudanzas_id($id);

		$this->load->view('header_solicitud_view', $dh);
		$this->load->view('verificar_mudanzas_view', $d);
		$this->load->view('footer_view', $df);
	}
	
	public function solicitud_remodelaciones($id)
	{
		$dh['title'] = 'Remodelaciones';
		$d['msg'] = '';
		$dh['plugins'] = array();
		$df['plugins'] = array();

		$d['remodelaciones_info'] = $this->intranet_model->get_solicitudes_remodelaciones_id($id);

		$this->load->view('header_solicitud_view', $dh);
		$this->load->view('verificar_remodelaciones_view', $d);
		$this->load->view('footer_view', $df);
	}
}