<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotFound extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
	}

	public function index()
	{
		$this->notfound();
	}

	public function notfound()
	{
		$data['title'] = 'Erro 404 - Página não encontrada';
		$this->output->set_status_header('404'); 

		$this->load->view('templates/header', $data);
        $this->load->view('notfound', $data);
	}

}
