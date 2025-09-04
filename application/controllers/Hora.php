<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hora extends CI_Controller
{

	public function index()
	{
		echo "Fecha y hora: " . date('d-m-Y H:i:s') . " Solo hora: " . date("G:i");
	}
}
