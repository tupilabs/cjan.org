<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Plugin {
    
    public function __construct() {
        $this->register();
    }
    
    public abstract function register();
    
}
?>