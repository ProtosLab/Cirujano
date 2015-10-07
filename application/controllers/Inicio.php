<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->view('fronted_inicio/head_inicio');
		$this->load->view('fronted_inicio/index');
	}
}
