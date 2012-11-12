<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CJAN_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('PluginManager');
    }
    
	function index()	{
	    $plugins = $this->pluginmanager->get_plugins();
	    $helloworld_plugin = $plugins['helloworld'];
	    $text = $helloworld_plugin->say_hello_world('Socrates');
	    $data = array();
	    $data['message'] = $text;
		$this->load->view('home', $data);
	}
}
