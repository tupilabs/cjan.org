<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CJAN_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('PluginManager');
    }
    
	function index()	{
	    $plugins = $this->pluginmanager->get_plugins();
	    $helloworld_plugin = $plugins['helloworld'];
		$this->load->view('home');
	}
}
