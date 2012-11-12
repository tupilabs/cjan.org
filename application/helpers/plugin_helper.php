<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('get_plugin_entry_point')) {
    function get_plugin_entry_point($plugin_home, $plugin_name) {
        $plugin_name = $plugin_name . '.php';
        $filenames = get_filenames($plugin_home, FALSE, FALSE);
        foreach($filenames as $filename) {
            // plugin_name.php/i
            if($plugin_name === strtolower($filename))
                if(file_exists($plugin_home . $filename))
                    return $plugin_home . $filename;
            
            // pluginname.php/i
            if($plugin_name === strtolower(str_replace('_', '', $filename)))
                if(file_exists($plugin_home . $filename))
                return $plugin_home . $filename;
        }
        
        return FALSE;
    }
}
?>