<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model for plug-ins table.
 */
class Plugins_Model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Gets all plug-ins.
     * @return array Plug-in array
     */
    function get_all() {
        $query = $this->db->get('plugins');
        return $query->result();
    }
    
}

?>