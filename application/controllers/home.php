<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CJAN_Controller {

	public function index()
	{
		$this->load->view('home');
	}
}
