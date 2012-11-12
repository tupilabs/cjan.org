<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
abstract class Plugin {
    
    public function __construct() {
        $this->register();
    }
    
    public abstract function register();
    
}
?>