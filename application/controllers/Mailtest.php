<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailtest extends CI_Controller {


	public function index()
	{
        echo 'The test';
        mailtesthelper();
    }

}