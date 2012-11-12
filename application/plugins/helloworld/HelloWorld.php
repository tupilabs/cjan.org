<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once __DIR__ . '/../Plugin.class.php';


class HelloWorldPlugin extends Plugin {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function register() {
        
    }
    
    function say_hello_world($name) {
        return "Hello World $name";
    }
}

?>